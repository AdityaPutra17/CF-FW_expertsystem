<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gejala;

class GejalaSeeder extends Seeder
{
    public function run()
    {
        Gejala::create(['kode' => 'G1', 'nama' => 'Kecemasan berlebihan dalam melakukan atau menghadapi sesuatu']); 
        Gejala::create(['kode' => 'G2', 'nama' => 'Kesulitan mengelola stres']); 
        Gejala::create(['kode' => 'G3', 'nama' => 'Menghabiskan waktu lebih banyak untuk bermain game daripada berinteraksi dengan orang lain']);
        Gejala::create(['kode' => 'G4', 'nama' => 'Panik secara berkepanjangan atau sering pada situasi tertentu']); 
        Gejala::create(['kode' => 'G5', 'nama' => 'Perasaan sedih yang berlarut-larut']); 
        Gejala::create(['kode' => 'G6', 'nama' => 'Menarik diri dari kegiatan sosial atau profesional']); 
        Gejala::create(['kode' => 'G7', 'nama' => 'Kesulitan tidur atau tidur berlebihan']); 
        Gejala::create(['kode' => 'G8', 'nama' => 'Hubungan interpersonal yang sangat fluktuatif dan tidak stabil']); 
        Gejala::create(['kode' => 'G9', 'nama' => 'Perilaku impulsif dan tidak stabil']); 
        Gejala::create(['kode' => 'G10', 'nama' => 'Ketakutan berlebihan terhadap penolakan atau ditinggalkan']); 
        Gejala::create(['kode' => 'G11', 'nama' => 'Ketegangan otot atau rasa tidak nyaman pada tubuh']); 
        Gejala::create(['kode' => 'G12', 'nama' => 'Kehilangan minat atau motivasi']);
        Gejala::create(['kode' => 'G13', 'nama' => 'Perubahan suasana hati yang ekstrem']);
        Gejala::create(['kode' => 'G14', 'nama' => 'Kelelahan fisik atau mental']);
        Gejala::create(['kode' => 'G15', 'nama' => 'Kesulitan mengontrol waktu bermain game']);
        Gejala::create(['kode' => 'G16', 'nama' => 'Mengabaikan tanggung jawab sosial atau pekerjaan']);
        Gejala::create(['kode' => 'G17', 'nama' => 'Khawatir tentang kejadian yang belum terjadi']);
        Gejala::create(['kode' => 'G18', 'nama' => 'Merasa terjebak atau tidak memiliki tujuan hidup']);
        Gejala::create(['kode' => 'G19', 'nama' => 'Rasa malas yang berlebihan']);
        Gejala::create(['kode' => 'G20', 'nama' => 'Perasaan lelah atau kosong meskipun tidak ada alasan fisik yang jelas']);
        Gejala::create(['kode' => 'G21', 'nama' => 'Kesulitan untuk memulai atau menyelesaikan tugas']);
        Gejala::create(['kode' => 'G22', 'nama' => 'Penurunan motivasi dan kinerja']);
        Gejala::create(['kode' => 'G23', 'nama' => 'Perasaan frustrasi atau kesal terhadap pekerjaan']);
        Gejala::create(['kode' => 'G24', 'nama' => 'Kehilangan minat dalam kegiatan sehari-hari']);
        Gejala::create(['kode' => 'G25', 'nama' => 'Perasaan tidak berharga atau bersalah']);
        Gejala::create(['kode' => 'G26', 'nama' => 'Perasaan superioritas dan keinginan untuk dihormati']);
        Gejala::create(['kode' => 'G27', 'nama' => 'Kurangnya empati terhadap orang lain']);
        Gejala::create(['kode' => 'G28', 'nama' => 'Kecenderungan untuk memanipulasi orang lain untuk keuntungan pribadi']);
    }
}
