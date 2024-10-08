<?php

namespace App\Http\Controllers;

use App\Models\DataSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ambil semua data orang tua dari database
        $Data = DB::table('data_sekolahs')
            ->join('data_anaks', 'data_sekolahs.ID_Anak', '=', 'data_anaks.id')
            ->get();

        // tampilkan ke layar
        return view('data_sekolah.index', [
            'title' => 'Data Sekolah',
            'dataSekolah' => $Data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ambil data anak dari database
        $dataAnak = DB::table('data_anaks')->get();

        return view('data_sekolah.create', [
            'title' => 'Form Tambah Data Sekolah',
            'dataAnak' => $dataAnak
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // pesan error
        $message = [
            'required' => '*:attribute Wajib diisi',
            'unique' => '*:attribute Sudah Ada'
        ];

        // validasi data inputan user
        $request->validate([
            'NamaAnak' => 'required|unique:data_sekolahs,ID_Anak',
            'NamaSekolah' => 'required',
            'AlamatSekolah' => 'required',
            'NomorHp' => 'required'
        ], $message);

        // input data ke database
        $flight = new DataSekolah();
        $flight->ID_Anak = $request->NamaAnak;
        $flight->NamaSekolah = $request->NamaSekolah;
        $flight->AlamatSekolah = $request->AlamatSekolah;
        $flight->NomorHp = $request->NomorHp;
        $flight->save();

        // kembali ke halaman beranda
        return redirect('Data_Sekolah')->with('notifikasi', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // ambil data sekolah yg bersangkutan dari database
        $dataSekolah = DB::table('data_sekolahs')
                        ->where('ID_Anak', $id)
                        ->first();

        return view('data_sekolah.edit', [
            'title' => 'Form Ubah Data Sekolah',
            'dataSekolah' => $dataSekolah
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // pesan error
        $message = [
            'required' => '*:attribute Wajib diisi',
            'unique' => '*:attribute Sudah Ada'
        ];

        // validasi data inputan user
        $request->validate([
            'NamaSekolah' => 'required',
            'AlamatSekolah' => 'required',
            'NomorHp' => 'required'
        ], $message);

        // update data ke database
        DB::table('data_sekolahs')
            ->where('ID_Anak', $id)
            ->update([
                'NamaSekolah' => $request->NamaSekolah,
                'AlamatSekolah' => $request->AlamatSekolah,
                'NomorHp' => $request->NomorHp
            ]);

        // kembali ke halaman beranda
        return redirect('Data_Sekolah')->with('notifikasi', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
