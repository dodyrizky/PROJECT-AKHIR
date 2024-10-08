<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donasi = Donasi::all();
        $totalDonasi = Donasi::all()->sum('nominal_donasi');
        $saldo = Donasi::select('saldo')->orderBy('created_at', 'desc')->first();

        return view('data_donasi/index', [
            'title' => 'Data Donatur',
            'donasi' => $donasi,
            'saldo' => $saldo,
            'totalDonasi' => $totalDonasi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_donasi/create', [
            'title' => 'Form Tambah Data Donatur'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // pesan error
        $pesanError = [
            'required' => '*:attribute Wajib diisi'
        ];

        // validasi data inputan user
        $request->validate([
            'nama_donatur' => 'required',
            'nominal_donasi' => 'required',
            'bukti_transfer' => 'required: jpg, jpeg, png, pdf'
            
        ], $pesanError);

        $nominal_donasi = str_replace(['Rp', ',','.',' '], '', $request->nominal_donasi);

        $saldo = Donasi::select('saldo')->orderBy('created_at', 'desc')->first();
        if( $saldo == null ) {
           
        // upload bukti transfer
        $namaFileOriginal = $request->file('bukti_transfer');
        $namaFile = 'bukti_transfer'.date('Ymdhis').'.'.$namaFileOriginal->getClientOriginalExtension();
        $namaFileOriginal->move('file/bukti_transfer/',$namaFile);

        // insert data ke database
        $flight = new Donasi();
        $flight->nama_donatur = $request->nama_donatur;
        $flight->nominal_donasi = $nominal_donasi;
        $flight->bukti_transfer = $namaFile;
        $result = $nominal_donasi;
        $flight->saldo =$result;
        $flight->tanggal_donasi = Carbon::now()->toDateString();
        $flight->save();
        } else {
            $nominal_donasi = str_replace(['Rp', ',','.',' '], '', $request->nominal_donasi);

            $saldo = Donasi::select('saldo')->orderBy('created_at', 'desc')->first();
            // upload bukti transfer
            $namaFileOriginal = $request->file('bukti_transfer');
            $namaFile = 'bukti_transfer'.date('Ymdhis').'.'.$namaFileOriginal->getClientOriginalExtension();
            $namaFileOriginal->move('file/bukti_transfer/',$namaFile);

            // insert data ke database
            $flight = new Donasi();
            $flight->nama_donatur = $request->nama_donatur;
            $flight->nominal_donasi = $nominal_donasi;
            $flight->tanggal_donasi = Carbon::now()->toDateString();
            $flight->bukti_transfer = $namaFile;
            $result = $nominal_donasi + $saldo->saldo;
            $flight->saldo =$result;
            $flight->save();
        }

        // kembali ke halaman depan
        return redirect('Data_Donasi')->with('Notifikasi', 'Data berhasil ditambahkan');


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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Donasi::find($id);

        // ambil bukti transfer
        $namaFile = $data->bukti_transfer;

        // hapus foto lama
        File::delete('file/bukti_transfer/'.$namaFile);

        // hapus file di database
        $data->delete();

        return back()->with('Notifikasi', 'Data berhasil dihapus');
    }

    public function export(string $id) {

        // Ambil data dari model atau query sesuai kebutuhan
        $data = Donasi::where('id', $id)->first();

        // Muat view PDF dan passing data ke view
        $title = 'Export Data Donasi';
        $pdf = Pdf::loadView('data_donasi.export', compact('data', 'title'));

        // Set orientasi ke landscape
        $pdf->setPaper('A4', 'landscape');

        // Download PDF
        return $pdf->download('Data-Donasi.pdf');
    }

    public function exportAll() {
        // Ambil data dari model atau query sesuai kebutuhan
        $data = Donasi::all();

        // Muat view PDF dan passing data ke view
        $title = 'Export Semua Data Donasi';
        $pdf = Pdf::loadView('data_donasi.exportAll', compact('data', 'title'));

        // Set orientasi ke landscape
        $pdf->setPaper('A4', 'landscape');

        // Download PDF
        return $pdf->download('Data-Donasi.pdf');
    }

    // rekap doansi berdasarkan tanggal
    public function rekap(Request $request) {
        $bulan = $request->bulan;
        $donasi = Donasi::whereMonth('tanggal_donasi', $bulan)->whereYear('tanggal_donasi', date('Y'))->get();
        $totalDonasi = Donasi::whereMonth('tanggal_donasi', $bulan)->whereYear('tanggal_donasi', date('Y'))->sum('nominal_donasi');

        // Muat view PDF dan passing data ke view
        $title = 'Export Data Donasi';
        $pdf = Pdf::loadView('data_donasi.rekap', compact('title','donasi', 'totalDonasi'));

        // Set orientasi ke landscape
        $pdf->setPaper('A4', 'landscape');

        // Download PDF
        return $pdf->download('Rekap-Data-Donasi.pdf');
    }
}
