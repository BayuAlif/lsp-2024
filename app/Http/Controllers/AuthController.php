<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\InputAspirasi;
use App\Models\Kategori;
use App\Models\Aspirasi;
use Carbon\Carbon;


class AuthController extends Controller
{
    public function showLogin()
    {
        return view('home.login');
    }

    public function home(Request $request)
    {
        $kategori = Kategori::all();

        // Ambil data pencarian jika ada
        $id_pelaporan = $request->input('id_pelaporan');

        // Inisialisasi variabel untuk data input aspirasi
        $inputAspirasi = null;

        // Jika ada pencarian berdasarkan ID pelaporan
        if ($id_pelaporan) {
            // Cari input aspirasi berdasarkan ID pelaporan
            $inputAspirasi = InputAspirasi::where('id_pelaporan', $id_pelaporan)->first();

            // Jika data input aspirasi tidak ditemukan, kirimkan pesan
            if (!$inputAspirasi) {
                return view('home.home', ['kategori' => $kategori, 'inputAspirasi' => $inputAspirasi, 'notFound' => true]);
            }

            // Redirect ke viewForm jika ID pelaporan ditemukan
            return redirect()->route('view.form', ['id' => $id_pelaporan]);
        }

        // Jika tidak ada pencarian, tampilkan halaman home dengan kategori
        return view('home.home', ['kategori' => $kategori, 'inputAspirasi' => $inputAspirasi]);
    }
    public function login(Request $request)
    {


        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (auth()->guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin')->with([
                'success' => 'Login Berhasil',
            ]);
        } else {
            return back()->with([
                'error' => 'Username atau password salah.',
            ]);
        }
    }






    public function sendForm(Request $request)
    {

        $validatedData = $request->validate([
            'nis' => 'required|exists:siswa,nis',
            'id_kategori' => 'required|exists:kategori,id',
            'lokasi' => 'required|string',
            'foto' => 'required|image|max:2048',
            'ket' => 'required|string',
        ]);


        $photopath = $request->file('foto')->store('public/img');
        $photoFileName = basename($photopath);


        $inputAspirasi = InputAspirasi::create([
            'nis' => $validatedData['nis'],
            'id_kategori' => $validatedData['id_kategori'],
            'lokasi' => $validatedData['lokasi'],
            'foto' => $photoFileName,
            'ket' => $validatedData['ket'],
        ]);

        $aspirasi = Aspirasi::create([
            'id_inputAspirasi' => $inputAspirasi->id_pelaporan,
        ]);

        session(['laporanId' => $inputAspirasi->id_pelaporan]);

        return redirect()->back()->with('success', 'Laporan berhasil terkirim');
    }


    public function gallery(Request $request)
    {
        // Ambil semua kategori
        $kategori = Kategori::all();

        // Ambil data dari request
        $id_kategori = $request->input('id_kategori');

        $tanggal = $request->input('tanggal');


        $query = InputAspirasi::with(['siswa', 'aspirasi', 'kategori']);


        if ($id_kategori) {
            $query->whereHas('kategori', function ($q) use ($id_kategori) {
                $q->where('id', $id_kategori);
            });
        }


        if ($tanggal) {
            $query->whereDate('created_at', $tanggal);
        }


        $data = $query->get();

        return view('home.gallery', compact('data', 'kategori'));
    }

    public function viewForm($id)
    {
        $inputAspirasi = InputAspirasi::findOrFail($id);

        return view('home.view', compact('inputAspirasi'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
    }
}
