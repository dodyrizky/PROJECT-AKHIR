<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Kegiatan;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::first();
        $kegiatan = Kegiatan::limit(6)->get();
        return view('welcome', [
            'title' => 'Panti Sosial Asuhan Anak Huke Ina',
            'data' => $data,
            'kegiatan' => $kegiatan
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
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $flight = Contact::insert([$validatedData]);

        return redirect('/')->with('notifikasi', 'pesan terkirim');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // $data = DB::table('contacts')
        // ->where('id', $id)
        // ->first();
        // return view('contact.show', [
        //     'title' => 'Detail Kontak Masuk',
        //     'data' => $data
        // ]);
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
        $data = DB::table('contacts')
                ->where('id', $id)
                ->delete();
        return back()->with('sukses', 'Data berhasil dihapus');
    }

    public function cara_donasi() {

        $data = Setting::first();
        return view('donasi', [
            'title' => 'Cara Melakukan Donasi',
            'data' => $data
        ]);
    }
}
