<?php

namespace App\Http\Controllers;

use App\Models\DataOrangTua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataOrangTuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ambil semua data orang tua dari database
        $Data = DB::table('data_orang_tuas')
            ->join('data_anaks', 'data_orang_tuas.ID_Anak', '=', 'data_anaks.id')
            ->get();

        // tampilkan ke layar
        return view('data_orangtua.index', [
            'title' => 'Data Orang Tua',
            'data' => $Data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = DB::table('status')->get();
        $pekerjaan = DB::table('pekerjaan')->get();
        $dataAnak = DB::table('data_anaks')->get();

        return view('data_orangtua.create', [
            'title' => 'Form Tambah Data Orang Tua',
            'status' => $status,
            'pekerjaan' => $pekerjaan,
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
            'NamaAnak' => 'required|unique:data_orang_tuas,ID_Anak',
            'NamaAyahKandung' => 'required',
            'Status' => 'required',
            'Pekerjaan' => 'required'
        ], $message);

        // input data ke database
        $flight = new DataOrangTua();
        $flight->ID_Anak = $request->NamaAnak;
        $flight->NamaAyahKandung = $request->NamaAyahKandung;
        $flight->Status = $request->Status;
        $flight->Pekerjaan = $request->Pekerjaan;
        $flight->save();

        // kembali ke halaman beranda
        return redirect('Data_Orang_Tua')->with('notifikasi', 'Data berhasil ditambahkan');
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
        $status = DB::table('status')->get();
        $pekerjaan = DB::table('pekerjaan')->get();
        $dataOrangTua = DB::table('data_orang_tuas')
                        ->where('ID_Anak', $id)
                        ->first();

        return view('data_orangtua.edit', [
            'title' => 'Form Edit Data Orang Tua',
            'status' => $status,
            'pekerjaan' => $pekerjaan,
            'dataOrangTua' => $dataOrangTua
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // pesan error
        $message = [
            'required' => '*:attribute Wajib diisi'
        ];

        // validasi data inputan user
        $request->validate([
            'NamaAyahKandung' => 'required',
            'Status' => 'required',
            'Pekerjaan' => 'required'
        ], $message);

        // update data ke database
        DB::table('data_orang_tuas')
            ->where('ID_Anak', $id)
            ->update([
                'NamaAyahKandung' => $request->NamaAyahKandung,
                'Status' => $request->Status,
                'Pekerjaan' => $request->Pekerjaan
            ]);

        // kembali ke halaman beranda
        return redirect('Data_Orang_Tua')->with('notifikasi', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // hapus data dari database
        DB::table('data_orang_tuas')
        ->where('ID_Anak', $id)
        ->delete();

        return back()->with('notifikasi', 'Data Berhasil dihapus');
    }
}
