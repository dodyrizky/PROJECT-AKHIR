@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('Data_Sekolah.update', $dataSekolah->ID_Anak) }}" method="POST">
                    
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="NamaSekolah">Nama Sekolah</label>
                        <input type="text" name="NamaSekolah" id="NamaSekolah" autofocus class="form-control" value="{{ $dataSekolah->NamaSekolah }}">
                        @error('NamaSekolah')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="AlamatSekolah">Alamat Sekolah</label>
                        <textarea type="text" name="AlamatSekolah" id="AlamatSekolah" autofocus class="form-control">{{ $dataSekolah->AlamatSekolah }}</textarea>
                        @error('AlamatSekolah')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="NomorHp">Nomor Telepon Sekolah</label>
                        <input type="tel" name="NomorHp" id="NomorHp" autofocus class="form-control" value="{{ $dataSekolah->NomorHp }}">
                        @error('NomorHp')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 
                    
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark"><i class="fas fa-save"> </i> Simpan</button>
                    <a href="{{ route('Data_Sekolah.index') }}" class="btn btn-danger" onclick="return confirm('Batal input data?')"><i class="fas fa-ban"></i> Batal</a>
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