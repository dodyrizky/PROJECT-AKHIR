@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('Data_Sekolah.store') }}" method="POST">
                    
                    @csrf
                    @method('POST')

                    <div class="form-group mb-2">
                        <label for="Nama_Anak">Nama Anak</label>
                        <select name="NamaAnak" id="dropdown3" class="form-control">
                            <option value=""></option>
                            @foreach ($dataAnak as $row)
                                <option value="{{$row->id}}">{{$row->NamaLengkap}}</option>
                            @endforeach
                        </select>
                        @error('NamaAnak')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="NamaSekolah">Nama Sekolah</label>
                        <input type="text" name="NamaSekolah" id="NamaSekolah" autofocus class="form-control" value="{{ old('NamaSekolah') }}">
                        @error('NamaSekolah')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="AlamatSekolah">Alamat Sekolah</label>
                        <textarea type="text" name="AlamatSekolah" id="AlamatSekolah" autofocus class="form-control">{{ old('AlamatSekolah') }}</textarea>
                        @error('AlamatSekolah')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="NomorHp">Nomor Telepon Sekolah</label>
                        <input type="tel" name="NomorHp" id="NomorHp" autofocus class="form-control" value="{{ old('NomorHp') }}">
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