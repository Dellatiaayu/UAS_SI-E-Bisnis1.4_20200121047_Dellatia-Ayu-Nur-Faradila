<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Absen;
use App\Models\Kontrak;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = ['nama_mahasiswa','no_tlp', 'alamat', 'email'];

    public function kontrakmatkul()
    {
        return $this->hasMany(Kontrak::class);
    }

    public function absen()
    {
        return $this->hasMany(Absen::class);
    }
}
