@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('Data_Anak.store') }}" method="POST" enctype="multipart/form-data">
                    
                    @csrf
                    @method('POST')

                    <div class="form-group mb-2">
                        <label for="nama">Nama Lengkap Anak</label>
                        <input type="text" name="nama" id="nama" autofocus class="form-control" value="{{ old('nama') }}">
                        @error('nama')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="NIK">NIK</label>
                        <input type="text" name="NIK" id="NIK" autofocus class="form-control" value="{{ old('NIK') }}">
                        @error('NIK')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="no_kk">No KK</label>
                        <input type="text" name="no_kk" id="no_kk" autofocus class="form-control" value="{{ old('no_kk') }}">
                        @error('no_kk')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="dropdown">
                            <option value=""></option>
                            @foreach ( $jk as $row )
                            <option value="{{$row->JenisKelamin}}">{{$row->JenisKelamin}}</option>
                            @endforeach
                        </select>
                        @error('jenis_kelamin')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}">
                        @error('tempat_lahir')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}">
                        @error('tanggal_lahir')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="">Umur</label>
                        <input type="number" name="umur" class="form-control" value="{{ old('umur') }}">
                        @error('umur')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="">Status Anak</label>
                        <select name="status_anak" id="dropdown2">
                            <option value=""></option>
                            @foreach ($status_anak as $row)
                                <option value="{{$row->status_anak}}">{{$row->status_anak}}</option>
                            @endforeach
                        </select>
                        @error('status_anak')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="">Hubungan Dalam Keluarga</label>
                        <select name="hubungan_dalam_keluarga" id="dropdown3">
                            <option value=""></option>
                            @foreach ($hubungan_anak as $row)
                                <option value="{{$row->hubungan_anak}}">{{$row->hubungan_anak}}</option>
                            @endforeach
                        </select>
                        @error('hubungan_dalam_keluarga')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="">Asal Desa</label>
                        <input type="text" name="asal_desa" class="form-control" value="{{ old('asal_desa') }}">
                        @error('asal_desa')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="">Tahun Masuk</label>
                        <input type="text" name="tahun_masuk" class="form-control" value="{{ old('tahun_masuk') }}">
                        @error('tahun_masuk')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="">Kelas</label>
                        <input type="text" name="kelas" class="form-control" value="{{ old('kelas') }}">
                        @error('kelas')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="">Sekolah</label>
                        <input type="text" name="sekolah" class="form-control" value="{{ old('sekolah') }}">
                        @error('sekolah')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="">Tahun Keluar Panti (Perkiraan)</label>
                        <input type="text" name="tahun_keluar_panti" class="form-control" value="{{ old('tahun_keluar_panti') }}">
                        @error('tahun_keluar_panti')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>                    
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark"><i class="fas fa-save"> </i> Simpan</button>
                    <a href="{{ route('Data_Anak.index') }}" class="btn btn-danger" onclick="return confirm('Batal input data?')"><i class="fas fa-ban"></i> Batal</a>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection