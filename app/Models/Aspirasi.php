<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $table = 'aspirasi';

    protected $fillable = ['status', 'id_inputAspirasi', 'feedback'];

    public function inputAspirasi()
    {
        return $this->belongsTo(InputAspirasi::class, 'id_inputAspirasi', 'id_pelaporan');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis'); 
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori'); 
    }
}
