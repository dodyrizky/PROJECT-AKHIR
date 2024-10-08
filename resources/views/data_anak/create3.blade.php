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
                        <label for="NamaLengkap">Nama Lengkap Anak</label>
                        <input type="text" name="NamaLengkap" id="NamaLengkap" autofocus class="form-control" value="{{ old('NamaLengkap') }}">
                        @error('NamaLengkap')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="NamaPanggilan">Nama Panggilan Anak</label>
                        <input type="text" name="NamaPanggilan" id="NamaPanggilan" autofocus class="form-control" value="{{ old('NamaPanggilan') }}">
                        @error('NamaPanggilan')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="TempatLahir">Tempat Lahir</label>
                        <input type="text" name="TempatLahir" class="form-control" value="{{ old('TempatLahir') }}">
                        @error('TempatLahir')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="TanggalLahir">Tanggal Lahir</label>
                        <input type="date" name="TanggalLahir" class="form-control" value="{{ old('TanggalLahir') }}">
                        @error('TanggalLahir')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-2">
                        <label for="">Jenis Kelamin</label>
                        <select name="JenisKelamin" id="dropdown">
                            <option value=""></option>
                            @foreach ( $jk as $row )
                            <option value="{{$row->JenisKelamin}}">{{$row->JenisKelamin}}</option>
                            @endforeach
                        </select>
                        @error('JenisKelamin')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="">Anak Ke</label>
                        <input type="number" name="AnakKe" class="form-control" value="{{ old('AnakKe') }}">
                        @error('AnakKe')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="Alamat">Alamat</label>
                        <textarea name="Alamat" id="" cols="30" rows="10" class="form-control">{{old('Alamat')}}</textarea>
                        @error('Alamat')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="">Tinggal Bersama</label>
                        <input type="text" name="TinggalBersama" class="form-control" value="{{ old('TinggalBersama') }}" placeholder="contoh : Orang Tua">
                        @error('TinggalBersama')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="">Foto 2x3 <abbr title="" style="color: black">*</abbr> </label>
                        <input id="inputImg" type="file" accept="image/*" name="foto" class="form-control">
                        <img class="d-none w-25 h-25 my-2" id="previewImg" src="#" alt="Preview image">
                        @error('foto')
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

{{-- script preview gambar --}}
@section('script')
<script>
    document.getElementById('inputImg').addEventListener('change', function() {
        // Get the file input value and create a URL for the selected image
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImg').setAttribute('src', e.target.result);
                document.getElementById('previewImg').classList.add("d-block");
            };
            reader.readAsDataURL(input.files[0]);
        }
    });
</script>
@endsection
@endsection