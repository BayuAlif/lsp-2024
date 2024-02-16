<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputAspirasi extends Model
{
    protected $table = 'input_aspirasi';

       protected $primaryKey = 'id_pelaporan';

    protected $fillable = [
        'nis',
        'id_kategori',
        'lokasi',
        'foto',
        'ket',
    ];vbf
    

    public function aspirasi()
    {
        return $this->hasOne(Aspirasi::class, 'id_inputAspirasi', 'id_pelaporan');
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