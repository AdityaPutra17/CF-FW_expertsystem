<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Diagnosis;

class DashboardController extends Controller
{
    //
    public function index()
{
    $totalPenyakit = Penyakit::count();
    $totalGejala = Gejala::count();
    $totalAturan = Aturan::count();
    $totalDiagnosa = Diagnosis::count();

    // Ambil semua data diagnosa
    $diagnoses = Diagnosis::all();

    // Hitung jumlah kemunculan setiap penyakit
    $penyakitCounts = [];

    foreach ($diagnoses as $diagnosis) {
        $penyakitList = json_decode($diagnosis->penyakit_id, true); // contoh: [1 => 85.5, 2 => 60.3]

        if (is_array($penyakitList) && !empty($penyakitList)) {
            // Ambil penyakit dengan persentase tertinggi
            arsort($penyakitList); // Urutkan dari yang tertinggi
            $topPenyakitId = array_key_first($penyakitList); // Ambil kunci pertama
            $topPersentase = $penyakitList[$topPenyakitId]; // Ambil persentasenya

            if ($topPersentase > 0) {
                if (!isset($penyakitCounts[$topPenyakitId])) {
                    $penyakitCounts[$topPenyakitId] = 0;
                }

                $penyakitCounts[$topPenyakitId]++;
            }
        }
    }

    // Urutkan dari yang paling banyak
    arsort($penyakitCounts); // Urutkan dari yang paling sering jadi top diagnosis

    $labels = Penyakit::whereIn('id', array_keys($penyakitCounts))
        ->pluck('nama', 'id')
        ->toArray();

    $data = [];
    $labelsFormatted = [];

    foreach ($penyakitCounts as $penyakitId => $count) {
        $data[] = $count;
        $labelsFormatted[] = $labels[$penyakitId] ?? 'Tidak Diketahui';
    }

    $labels = $labelsFormatted;


    return view('admin.home', compact('labels', 'data', 'totalPenyakit', 'totalGejala', 'totalAturan', 'totalDiagnosa'));
}

}
