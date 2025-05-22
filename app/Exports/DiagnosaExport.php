<?php

namespace App\Exports;

use App\Models\Diagnosis;
use App\Models\Penyakit;
use App\Models\Gejala;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DiagnosaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $data = Diagnosis::all();

        return $data->map(function ($item) {
            $penyakitList = json_decode($item->penyakit_id, true);
            $penyakitText = '';

            if ($penyakitList) {
                foreach ($penyakitList as $id => $data) {
                    $penyakit = Penyakit::find($id);
                    if ($penyakit) {
                        $cf = is_array($data) ? ($data['cf'] ?? 'N/A') : 'N/A';
                        $percentage = is_array($data) ? ($data['percentage'] ?? 'N/A') : $data;
                        $penyakitText .= $penyakit->nama . " (CF: {$cf}%, Persentase: {$percentage}%)\n";
                    }
                }
            }

            $gejalaLog = json_decode($item->answer_log, true);
            $gejalaText = '';

            if ($gejalaLog) {
                foreach ($gejalaLog as $gejalaId => $jawaban) {
                    if ($jawaban) {
                        $gejala = Gejala::find($gejalaId);
                        if ($gejala) {
                            $gejalaText .= $gejala->kode . ","; // hanya kode gejala dan hanya yang jawab "Ya"
                        }
                    }
                }
            }

            return [
                'Nama' => $item->user_nama,
                'Hasil Diagnosa' => trim($penyakitText),
                'Detail Gejala' => trim($gejalaText),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Hasil Diagnosa',
            'Detail Gejala',
        ];
    }
}

