<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mk_tawars extends Model
{
    use HasFactory;
    protected $fillable = [
        'jamMulai',
        'jamSelesai',
        'hari',
        'matkul_kode_matkul',
    ];
}
