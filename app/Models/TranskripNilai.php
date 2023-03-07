<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranskripNilai extends Model
{
    use HasFactory;
    protected $table = 'transkrip_nilai';

    protected $guarded = ['id'];
}
