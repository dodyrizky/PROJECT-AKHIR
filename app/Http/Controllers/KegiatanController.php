<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ambil semua data kegiatan dari database
        $kegiatan = DB::table('kegiatans')->get();

        // tampilkan ke layar
        return view('kegiatan.index', [
            'title' => 'Data Kegiatan',
            'kegiatan' => $kegiatan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kegiatan.create', [
            'title' => 'Form Tambah Data Kegiatan'
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
            'mimes' => 'Format foto tidak didukung'
        ];

        // validasi data inputan user
        $request->validate([
            'JudulKegiatan' => 'required',
            'Slug' => 'required',
            'Deskripsi' => 'required',
            'Foto' => 'required|mimes:png,jpg,jpeg,JPG,JPEG,PNG',
            'tanggal' => 'required'
        ]);

        // upload foto
        $namaFileOriginal = $request->file('Foto');
        $namaFile = 'anak'.date('Ymdhis').'.'.$namaFileOriginal->getClientOriginalExtension();
        $namaFileOriginal->move('file/foto_kegiatan/',$namaFile);

        // insert data ke database
        DB::table('kegiatans')->insert([
            'JudulKegiatan' => $request->JudulKegiatan,
            'Slug' => $request->Slug,
            'Deskripsi' => $request->Deskripsi,
            'Foto' => $namaFile,
            'tanggal' => $request->tanggal
        ]);

        // kembali ke halaman beranda
        return redirect('Data_Kegiatan')->with('notifikasi', 'Kegiatan berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // ambil data yang bersangkutan dari database
        $dataKegiatan = Kegiatan::find($id);

        // tampilkan ke layar
        return view('kegiatan.show', [
            'title' => 'Detail Data Kegiatan',
            'dataKegiatan' => $dataKegiatan
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // ambil data yang bersangkutan dari database
        $dataKegiatan = Kegiatan::find($id);

        // tampilkan ke layar
        return view('kegiatan.edit', [
            'title' => 'Ubah Data Kegiatan',
            'dataKegiatan' => $dataKegiatan
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
            'mimes' => 'Format foto tidak didukung'
        ];

        // validasi data inputan user
        $request->validate([
            'JudulKegiatan' => 'required',
            'Slug' => 'required',
            'Deskripsi' => 'required',
            'Foto' => 'mimes:png,jpg,jpeg,JPG,JPEG,PNG',
            'tanggal' => 'required'
        ]);

        $update = Kegiatan::find($id);

        // Update foto jika admin mengganti foto
        if ($request->hasFile('Foto')) {
            
            // hapus foto lama
            File::delete('file/foto_kegiatan/'.$update->Foto);

            // upload foto baru
            $namaFileOriginal = $request->file('Foto');
            $namaFile = 'kegiatan'.date('Ymdhis').'.'.$namaFileOriginal->getClientOriginalExtension();
            $namaFileOriginal->move('file/foto_kegiatan/',$namaFile);

            $update->Foto = $namaFile;
        }

        $update->JudulKegiatan = $request->JudulKegiatan;
        $update->Slug = $request->Slug;
        $update->Deskripsi = $request->Deskripsi;
        $update->tanggal = $request->tanggal;
        $update->save();

        return redirect('Data_Kegiatan')->with('notifikasi', 'Kegiatan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ambil data yang bersangkutan dari Database
        $data = Kegiatan::find($id);
        $namaFoto = $data->Foto;

        // hapus foto lama
        File::delete('file/foto_kegiatan/'.$namaFoto);

        // hapus data dari database
        $data->delete();

        // kembali ke halaman beranda
        return back()->with('notifikasi', 'Data Berhasil dihapus');
    }
}
