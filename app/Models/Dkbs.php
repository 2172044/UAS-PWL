<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dkbs extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'matkul_kode_matkul',
        'proyek_pendidikan',
    ];
}
