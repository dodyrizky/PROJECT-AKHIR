<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Setting';
        $setting = Setting::first();
        return view('setting.index', compact('setting', 'title'));
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
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $setting = Setting::findorfail($id);
        $logo = $setting->logo;
        $update = [
            'nama_instansi' => $request->nama_instansi,
            'alamat' => $request->alamat,
            'logo' => $logo,
            'tentang_kami' => $request->tentang_kami,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'nomor_rekening' => $request->nomor_rekening,
            'nama_rekening' => $request->nama_rekening,
            'bank' => $request->bank,
            'maps' => $request->maps,
        ];
        if ($request->logo != ""){
            $request->logo->move(public_path('file/LOGO/'),$logo);
        }
        $setting->update($update);
        return redirect()->back()->with('Sukses', 'Berhasil Edit Konfigurasi Website');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
