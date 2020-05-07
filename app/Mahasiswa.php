<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $fillable = [
        'nama', 'nim', 'prodi', 'alamat_tinggal', 'no_hp'
    ];
}
