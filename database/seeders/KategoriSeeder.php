<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new Kategori();
        $user->ket_kategori = 'Kebersihan';
        $user->save();

        $user = new Kategori();
        $user->ket_kategori = 'Fasilitas Umum';
        $user->save();

        $user = new Kategori();
        $user->ket_kategori = 'Keamanan';
        $user->save();

        $user = new Kategori();
        $user->ket_kategori = 'lainnya';
        $user->save();
    }
}
