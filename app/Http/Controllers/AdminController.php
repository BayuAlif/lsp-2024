<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InputAspirasi;
use App\Models\Kategori;
use App\Models\Aspirasi;

class AdminController extends Controller
{
    public function showAdmin()
    {
        $data = InputAspirasi::with(['siswa', 'aspirasi', 'kategori'])->get();

        return view('admin.admin', compact('data'));
    }

    public function showEdit($id)
    {

        $data = InputAspirasi::with(['siswa', 'aspirasi', 'kategori'])->findOrFail($id);
        $categories = Kategori::all();

        return view('admin.edit', compact('data', 'categories'));
    }

    public function update(Request $request, $id)
    {
       
        $request->validate([
            'status' => 'required|in:menunggu,proses,berhasil,ditolak', 
        ]);


        $aspirasi = Aspirasi::find($id);

     
        if (!$aspirasi) {
            return redirect()->back()->with('error', 'Aspirasi not found.');
        }


        $aspirasi->status = $request->status;
        $aspirasi->save();

        return redirect('admin')->with('success', 'Status aspirasi berhasil diperbarui.');
    }

   
}
