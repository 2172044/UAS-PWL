<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_matkul';
    protected $fillable = [
        'nama_matkul',
        'sks',
        'status',
        'semester',
        'program_studi_kode_jurusan',
    ];
    // public function mkTawars()
    // {
    //     return $this->hasMany(MkTawar::class, 'matkul_kode_matkul');
    // }
}
