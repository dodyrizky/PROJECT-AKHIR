<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'pengeluarans';

    protected $guarded = ['id', 'created_at', 'updated_at'];

}
