<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;
use App\Models\Semester;


class Kontrak extends Model
{
    use HasFactory;

    protected $fillable = ['mahasiswa_id', 'semester_id'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class,);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
    
}
