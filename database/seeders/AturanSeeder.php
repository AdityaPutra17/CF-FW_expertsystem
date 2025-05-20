<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aturan;

class AturanSeeder extends Seeder
{
    public function run()
    {
        // Gaming Disorder (P1)
        Aturan::create(['gejala_id' => 15, 'penyakit_id' => 1, 'cf' => 0.8]);
        Aturan::create(['gejala_id' => 3,  'penyakit_id' => 1, 'cf' => 0.6]);
        Aturan::create(['gejala_id' => 16, 'penyakit_id' => 1, 'cf' => 0.4]);

        // Anxiety Disorder (P2)
        Aturan::create(['gejala_id' => 10, 'penyakit_id' => 2, 'cf' => 0.8]);
        Aturan::create(['gejala_id' => 17, 'penyakit_id' => 2, 'cf' => 0.8]);
        Aturan::create(['gejala_id' => 4,  'penyakit_id' => 2, 'cf' => 0.8]);
        Aturan::create(['gejala_id' => 1,  'penyakit_id' => 2, 'cf' => 0.6]);
        Aturan::create(['gejala_id' => 11, 'penyakit_id' => 2, 'cf' => 0.2]);

        // Demotivasi (P3)
        Aturan::create(['gejala_id' => 12, 'penyakit_id' => 3, 'cf' => 0.6]);
        Aturan::create(['gejala_id' => 19, 'penyakit_id' => 3, 'cf' => 0.4]);
        Aturan::create(['gejala_id' => 22, 'penyakit_id' => 3, 'cf' => 0.4]);
        Aturan::create(['gejala_id' => 24, 'penyakit_id' => 3, 'cf' => 0.4]);

        // Burnout (P4)
        Aturan::create(['gejala_id' => 6,  'penyakit_id' => 4, 'cf' => 0.8]);
        Aturan::create(['gejala_id' => 2,  'penyakit_id' => 4, 'cf' => 0.6]);
        Aturan::create(['gejala_id' => 5,  'penyakit_id' => 4, 'cf' => 0.6]);
        Aturan::create(['gejala_id' => 7,  'penyakit_id' => 4, 'cf' => 0.4]);
        Aturan::create(['gejala_id' => 11, 'penyakit_id' => 4, 'cf' => 0.4]);
        Aturan::create(['gejala_id' => 14, 'penyakit_id' => 4, 'cf' => 0.2]);

        // Depresi (P5)
        Aturan::create(['gejala_id' => 5,  'penyakit_id' => 5, 'cf' => 0.8]);
        Aturan::create(['gejala_id' => 24, 'penyakit_id' => 5, 'cf' => 0.6]);
        Aturan::create(['gejala_id' => 7,  'penyakit_id' => 5, 'cf' => 0.6]);
        Aturan::create(['gejala_id' => 6,  'penyakit_id' => 5, 'cf' => 0.6]);
        Aturan::create(['gejala_id' => 1,  'penyakit_id' => 5, 'cf' => 0.4]);
        Aturan::create(['gejala_id' => 18, 'penyakit_id' => 5, 'cf' => 0.4]);
        Aturan::create(['gejala_id' => 20, 'penyakit_id' => 5, 'cf' => 0.4]);

        // BPD (P6)
        Aturan::create(['gejala_id' => 10, 'penyakit_id' => 6, 'cf' => 0.8]);
        Aturan::create(['gejala_id' => 9,  'penyakit_id' => 6, 'cf' => 0.8]);
        Aturan::create(['gejala_id' => 8,  'penyakit_id' => 6, 'cf' => 0.6]);

        // NPD (P7)
        Aturan::create(['gejala_id' => 26, 'penyakit_id' => 7, 'cf' => 0.8]);
        Aturan::create(['gejala_id' => 27, 'penyakit_id' => 7, 'cf' => 0.8]);
        Aturan::create(['gejala_id' => 28, 'penyakit_id' => 7, 'cf' => 0.8]);


    }
}
