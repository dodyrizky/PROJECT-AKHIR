@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    @if($setting)
                    <form class="row g-3" method="POST" action="{{ route('setting.update', $setting->id_setting) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Nama Aplikasi</label>
                            <input type="text" name="nama_instansi" class="form-control" value="{{ $setting->nama_instansi }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Tentang Kami</label>
                            <input type="text" name="tentang_kami" class="form-control" value="{{ $setting->tentang_kami }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="{{ $setting->alamat}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Facebook</label>
                            <input type="text" class="form-control" name="facebook" placeholder="Masukkan Channel Youtube disini" value="{{ $setting->facebook}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Instagram</label>
                            <input type="text" name="instagram" class="form-control" placeholder="Masukkan akun instagram disini..." value="{{ $setting->instagram }}">
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Masukkan akun instagram disini..." value="{{ $setting->email }}">
                        </div>   
                        <div class="col-md-6 mb-3">
                            <label for="">No. HP</label>
                            <input type="text" name="no_hp" class="form-control" placeholder="Masukkan No HP disini..." value="{{ $setting->no_hp }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Nomor Rekening</label>
                            <input type="text" name="nomor_rekening" class="form-control" placeholder="Masukkan Nomor Rekening disini..." value="{{ $setting->nomor_rekening }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Nama Rekening</label>
                            <input type="text" name="nama_rekening" class="form-control" placeholder="Masukkan Nama Pemilik Rekening disini..." value="{{ $setting->nama_rekening }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Bank</label>
                            <input type="text" name="bank" class="form-control" placeholder="Masukkan Nama Bank disini..." value="{{ $setting->bank }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Logo Aplikasi</label>
                            <input type="file" class="form-control" name="logo" placeholder="" accept="image/*" id="preview_gambar" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Preview Logo</label>
                            <img src="{{ asset('file/LOGO/'.$setting->logo) }}" alt="" style="width: 200px;" id="gambar_nodin">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="">URL Maps</label>
                            <textarea name="maps" class="form-control" rows="5">{{ $setting->maps }}</textarea>
                        </div> 
                        <div class="col-12 mb-3">
                            {!! $setting->maps !!}    
                        </div>
                    @else 
                    <p>Belum ada data</p>   
                    @endif
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-dark" style="float: right"> <i class="fas fa-save"> </i> Simpan</button>
                </form>
                </div>
            </div>
        </div>
    @endsection
