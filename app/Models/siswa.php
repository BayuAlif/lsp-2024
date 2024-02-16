<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';

    protected $fillable = [
        'nis',
        'nis',
        'kelas'
    ];

    public function aspirasi()
    {
        return $this->hasMany(InputAspirasi::class, 'nis', 'nis');
    }
}
