<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matakuliah;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = ['jadwal', 'matakuliah_id'];

    public function Matakuliah()
    {
        return $this->hasOne(Matakuliah::class);
    }
}
