<?php

namespace App\Http\Controllers;

use App\Models\DataAnak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class DataAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ambil semua data anak dari database
        $anak = DB::table('data_anaks')->get();

        // tampilkan ke layar
        return view('data_anak.index', [
            'title' => 'Data Anak',
            'anak' => $anak
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    
        $jenisKelamin = DB::table('jenis_kelamin')->get();
        $status_anak = DB::table('status_anak')->get();
        $hubungan_anak = DB::table('hubungan_dalam_keluarga')->get();
        return view('data_anak.create', [
            'title' => 'Form Tambah Data Anak',
            'jk' => $jenisKelamin,
            'status_anak' => $status_anak,
            'hubungan_anak' => $hubungan_anak
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // pesan error
        $message = [
            'required' => '*:attribute Tidak Boleh Kosong'
        ];

        // validasi data inputan user
        $validated = $request->validate([
            'nama' => 'required',
            'NIK' => 'required',
            'no_kk' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'umur' => 'required',
            'status_anak' => 'required',
            'hubungan_dalam_keluarga' => 'required',
            'asal_desa' => 'required',
            'tahun_masuk' => 'required',
            'kelas' => 'required',
            'sekolah' => 'required',
            'tahun_keluar_panti' => 'required'
        ], $message);

        // simpan data ke database
        $fliht = DataAnak::create($validated);
        return redirect('Data_Anak')->with('Notifikasi', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // ambil data yang bersangkutan dari Database
        $DataAnak = DataAnak::find($id);

        // tampilkan ke layar
        return view('data_anak.show', [
            'title' => 'Detail Data Anak / Home',
            'DataAnak' => $DataAnak
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // ambil data yang bersangkutan dari Database
        $data = DataAnak::find($id);

        // ambil data jenis kelamin dari database
        $JenisKelamin = DB::table('jenis_kelamin')->get();

        // ambil data status anak dari database
        $status_anak = DB::table('status_anak')->get();

        // ambil data hubungan anak dalam keluarga dari database
        $hubungan_anak = DB::table('hubungan_dalam_keluarga')->get();

        // tampilkan ke layar
        return view('data_anak.edit', [
            'title' => 'Form Edit Data Anak',
            'data' => $data,
            'jk' => $JenisKelamin,
            'status_anak' => $status_anak,
            'hubungan_anak' => $hubungan_anak
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // pesan error
        $message = [
            'required' => '*:attribute Tidak Boleh Kosong'
        ];

        // validasi data inputan user
        $validatedData = $request->validate([
            'nama' => 'required',
            'NIK' => 'required',
            'no_kk' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'umur' => 'required',
            'status_anak' => 'required',
            'hubungan_dalam_keluarga' => 'required',
            'asal_desa' => 'required',
            'tahun_masuk' => 'required',
            'kelas' => 'required',
            'sekolah' => 'required',
            'tahun_keluar_panti' => 'required'
        ], $message);

        // simpan data ke database
        // Temukan user berdasarkan ID
        $flight = DataAnak::find($id);

        // Update data dengan validated data
        $flight->update($validatedData);
        return redirect('Data_Anak')->with('Notifikasi', 'Data berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ambil data yang bersangkutan dari Database
        $data = DataAnak::find($id);

        // hapus data dari database
        $data->delete();

        return back()->with('Notifikasi', 'Data Berhasil dihapus');
    }

    public function export(string $id) {

        // Ambil data dari model atau query sesuai kebutuhan
        $data = DataAnak::where('id', $id)->first();

        // Muat view PDF dan passing data ke view
        $title = 'Export';
        $pdf = Pdf::loadView('data_anak.export', compact('data', 'title'));

        // Set orientasi ke landscape
        $pdf->setPaper('A4', 'landscape');

        // Download PDF
        return $pdf->download('Data-Anak.pdf');
    }

    public function exportAll() {
        // Ambil data dari model atau query sesuai kebutuhan
        $data = DataAnak::all();

        // Muat view PDF dan passing data ke view
        $title = 'Export';
        $pdf = Pdf::loadView('data_anak.exportAll', compact('data', 'title'));

        // Set orientasi ke landscape
        $pdf->setPaper('A4', 'landscape');

        // Download PDF
        return $pdf->download('Data-Anak.pdf');
    }
}
