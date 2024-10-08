<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\Pengeluaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pengeluaran::all();

        $totalPengeluaran = Pengeluaran::all()->sum('nominal');

        $saldo = Donasi::select('saldo')->orderBy('created_at', 'desc')->first();
        return view('data_pengeluaran.index', [
            'title' => 'Data Pengeluaran',
            'data' => $data,
            'saldo' => $saldo,
            'totalPengeluaran' => $totalPengeluaran,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_pengeluaran/create', [
            'title' => 'Form Tambah Data Pengeluaran'
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
            'tanggal' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required',
            'bukti_pembayaran' => 'required: jpg, jpeg, png, pdf'
        ], $pesanError);

        $nominal = str_replace(['Rp', ',','.',' '], '', $request->nominal);

        // upload bukti pembayaran
        $namaFileOriginal = $request->file('bukti_pembayaran');
        $namaFile = 'bukti_pembayaran'.date('Ymdhis').'.'.$namaFileOriginal->getClientOriginalExtension();
        $namaFileOriginal->move('file/bukti_pembayaran/',$namaFile);

        // insert data ke database
        $flight = new Pengeluaran();
        $flight->tanggal_pengeluaran = $request->tanggal;
        $flight->nominal = $nominal;
        $flight->keterangan = $request->keterangan;
        $flight->bukti_pembayaran = $namaFile;
        $flight->save();

        $saldo = Donasi::select('saldo','created_at')->orderBy('created_at', 'desc')->first();
        $pengeluaran = Pengeluaran::select('nominal')->orderBy('created_at', 'desc')->first();


        $result = $saldo->saldo - $pengeluaran->nominal;
        DB::table('donasis')
        ->where('created_at', $saldo->created_at)
        ->update(['saldo' => $result]);

        // kembali ke halaman depan
        return redirect('pengeluaran')->with('Notifikasi', 'Data berhasil ditambahkan');
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
        //
    }

    public function rekap(Request $request) {
        $bulan = $request->bulan;
        $pengeluaran = Pengeluaran::whereMonth('tanggal_pengeluaran', $bulan)->whereYear('tanggal_pengeluaran', date('Y'))->get();
        $totalPengeluaran = Pengeluaran::whereMonth('tanggal_pengeluaran', $bulan)->whereYear('tanggal_pengeluaran', date('Y'))->sum('nominal');

        // Muat view PDF dan passing data ke view
        $title = 'Export Data Pengeluaran';
        $pdf = Pdf::loadView('data_pengeluaran.export', compact('title','pengeluaran', 'bulan', 'totalPengeluaran'));

        // Set orientasi ke landscape
        $pdf->setPaper('A4', 'landscape');

        // Download PDF
        return $pdf->download('Rekap-Data-Pengeluaran.pdf');
    }
}
