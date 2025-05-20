<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $fillable = ['user_nama', 'answer_log', 'penyakit_id'];
    protected $casts = [
        'answer_log' => 'array',
        'penyakit_id' => 'array', // Ubah agar bisa menyimpan banyak penyakit
    ];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }
}
