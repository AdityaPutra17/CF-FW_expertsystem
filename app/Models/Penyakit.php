<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Penyakit extends Model
{
    //
    protected $table = 'penyakits';
    protected $fillable = ['kode', 'nama', 'deskripsi', 'solusi'];

    public function gejala()
    {
        return $this->belongsToMany(Gejala::class, 'aturan', 'penyakit_id', 'gejala_id');
    }

    public function aturan()
    {
        return $this->hasMany(Aturan::class);
    }

    public function diagnosa()
    {
        return $this->hasMany(Diagnosis::class);
    }
}
