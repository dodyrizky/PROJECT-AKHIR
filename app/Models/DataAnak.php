<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAnak extends Model
{
    use HasFactory;
    protected $table = 'data_anaks';

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
