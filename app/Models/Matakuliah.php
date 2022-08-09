<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Absen;

class Matakuliah extends Model
{
    use HasFactory;

    protected $fillable = ['nama_matakuliah', 'sks'];

    public function absen()
    {
        return $this->hasMany(Absen::class);
    }
    
}
