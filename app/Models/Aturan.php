<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aturan extends Model
{
    use HasFactory;

    protected $table = 'aturans'; // Perbaiki dari $tabel ke $table
    protected $fillable = ['gejala_id', 'penyakit_id', 'cf'];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'penyakit_id');
    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'gejala_id');
    }

    public function nextGejala()
    {
        return $this->belongsTo(Gejala::class, 'next_first_gejala_id');
    }
}
