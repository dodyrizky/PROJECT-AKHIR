<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\Pengeluaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatatanKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalDonasi = Donasi::all()->sum('nominal_donasi');
        $totalPengeluaran = Pengeluaran::all()->sum('nominal');
        $selisih = $totalDonasi - $totalPengeluaran;
        $dataDonasi = Donasi::all();
        $dataPengeluaran = Pengeluaran::all();
        $saldo = Donasi::select('saldo')->orderBy('created_at', 'desc')->first();
        return view('catatan_keuangan.index', [
            'title' => 'Catatan keuangan',
            'saldo' => $saldo,
            'dataDonasi' => $dataDonasi,
            'dataPengeluaran' => $dataPengeluaran,
            'totalDonasi' => $totalDonasi,
            'totalPengeluaran' => $totalPengeluaran,
            'selisih' => $selisih,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
}
