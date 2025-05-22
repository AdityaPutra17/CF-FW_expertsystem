<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Aturan;
use Illuminate\Http\Request;

use App\Exports\DiagnosaExport;
use Maatwebsite\Excel\Facades\Excel;

class DiagnosisController extends Controller
{
    public function showForm()
    {
        return view('diagnosis.form');
    }

    public function startDiagnosis(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        session([
            'user_nama' => $request->nama, 
            'answers' => [],
            'possibleDiseases' => Aturan::pluck('penyakit_id')->unique()->toArray()
        ]);

        $firstGejala = Aturan::pluck('gejala_id')->unique()->first();
        return redirect()->route('diagnosis.question', ['id' => $firstGejala]);
    }

    public function question($id)
    {
        if (!session()->has('user_nama')) {
            return redirect('/')->with('error', 'Silakan masukkan nama terlebih dahulu.');
        }

        $gejala = Gejala::find($id);
        
        if (!$gejala) {
            return redirect()->route('diagnosis.result');
        }

        return view('diagnosis.question', compact('gejala'));
    }

    public function processAnswer(Request $request)
    {
        $request->validate([
            'idgejala' => 'required|numeric',
            'answer' => 'required',
        ]);

        // Konversi nilai jawaban menjadi 1 atau 0
        $answer = $request->answer == 'true' || $request->answer == 1 || $request->answer === true ? 1 : 0;

        $answers = session('answers', []);
        $answers[$request->idgejala] = $answer;
        session(['answers' => $answers]);

        $possibleDiseases = session('possibleDiseases', []);

        if ($answer == 0) {
            $possibleDiseases = array_values(array_filter($possibleDiseases, function ($penyakitId) use ($request) {
                return !Aturan::where('penyakit_id', $penyakitId)->where('gejala_id', $request->idgejala)->exists();
            }));
        }

        session(['possibleDiseases' => $possibleDiseases]);

        $diseaseScores = [];

        foreach (Penyakit::pluck('id') as $penyakitId) {
            $aturans = Aturan::where('penyakit_id', $penyakitId)->get();
            $matchedGejala = 0;
            $totalGejala = $aturans->count();

            $cfOld = 0;
            foreach ($aturans as $aturan) {
                $jawaban = $answers[$aturan->gejala_id] ?? null;

                if ($jawaban == 1) {
                    $matchedGejala++;
                    $cf = $aturan->cf;
                    if ($cfOld == 0) {
                        $cfOld = $cf;
                    } else {
                        $cfOld = $cfOld + ($cf * (1 - $cfOld));
                    }
                }
            }

            $percentage = $totalGejala > 0 ? ($matchedGejala / $totalGejala) * 100 : 0;

            $diseaseScores[$penyakitId] = [
                'percentage' => round($percentage, 2),
                'cf' => round($cfOld * 100, 2),
            ];
        }

        // Ambil hanya penyakit dengan CF > 0
        $filtered = collect($diseaseScores)->filter(fn($item) => $item['cf'] > 0);

        // Hitung total CF
        $totalCF = $filtered->sum(fn($item) => $item['cf']);

        // Hitung ulang persentase berdasarkan proporsi CF
        $diseaseScores = $filtered->map(function ($item) use ($totalCF) {
            $cf = $item['cf'];
            $percentage = $totalCF > 0 ? ($cf / $totalCF) * 100 : 0;
            return [
                'cf' => $cf,
                'percentage' => round($percentage, 2),
            ];
        })->toArray();

        session(['diseaseScores' => $diseaseScores]);

        $nextGejala = Aturan::whereIn('penyakit_id', $possibleDiseases)
                            ->whereNotIn('gejala_id', array_keys($answers))
                            ->pluck('gejala_id')
                            ->unique()
                            ->first();

        if (!$nextGejala) {
            return redirect()->route('diagnosis.result');
        }

        return redirect()->route('diagnosis.question', ['id' => $nextGejala]);
    }


    
    public function result()
    {
        if (!session()->has('user_nama')) {
            return redirect('/')->with('error', 'Silakan masukkan nama terlebih dahulu.');
        }

        $diseaseScores = session('diseaseScores', []);

        // Urutkan berdasarkan CF terbesar
        $sortedScores = collect($diseaseScores)->sortByDesc(fn($item) => $item['cf']);

        $detectedDiseases = [];
        foreach ($sortedScores as $penyakitId => $data) {
            $detectedDiseases[] = [
                'penyakit' => Penyakit::find($penyakitId),
                'percentage' => $data['percentage'],
                'cf' => $data['cf']
            ];
        }

        $allZero = collect($detectedDiseases)->every(fn($item) => $item['percentage'] == 0 && $item['cf'] == 0);

        // Simpan hasil diagnosis
        Diagnosis::create([
            'user_nama' => session('user_nama'),
            'answer_log' => json_encode(session('answers', [])),
            'penyakit_id' => json_encode($diseaseScores), // menyimpan CF dan persentase
        ]);

        session()->forget(['user_nama', 'answers', 'diseaseScores', 'possibleDiseases']);

        return view('diagnosis.result', compact('detectedDiseases', 'allZero'));
    }

    public function admin()
    {
        $diagnoses = Diagnosis::with('penyakit')->latest()->paginate(255);
        return view('admin.diagnosa.index', compact('diagnoses'));
    }

    public function exportExcel()
    {
        return Excel::download(new DiagnosaExport, 'data_diagnosa.xlsx');
    }
}
