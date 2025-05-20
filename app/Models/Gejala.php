<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    //
    protected $table = 'gejalas';
    protected $fillable = ['kode', 'nama'];

    public function penyakit()
    {
        return $this->belongsToMany(Penyakit::class, 'aturan', 'gejala_id', 'penyakit_id');
    }


}
