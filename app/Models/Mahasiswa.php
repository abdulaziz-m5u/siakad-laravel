<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';

    protected $guarded = ['id'];

    public function program_study()
    {
        return $this->belongsTo(ProgramStudy::class);
    }
}
