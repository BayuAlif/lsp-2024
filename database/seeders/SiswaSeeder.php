<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new Siswa();
        $user->nis = '539211078';
        $user->nama = 'Bayu';
        $user->kelas = 'Tel 9';
        $user->save();

        $user = new Siswa();
        $user->nis = '539211079';
        $user->nama = 'Alif';
        $user->kelas ="Tel 10 ";
        $user->save();
    }
}
