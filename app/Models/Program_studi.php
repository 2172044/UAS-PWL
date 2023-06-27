<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program_studi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
    ];
    protected $primaryKey = 'kode_jurusan';

}
