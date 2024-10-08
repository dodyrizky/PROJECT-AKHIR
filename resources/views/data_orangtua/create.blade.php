@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('Data_Orang_Tua.store') }}" method="POST">
                    
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
                        <label for="NamaAyahKandung">Nama Ayah Kandung</label>
                        <input type="text" name="NamaAyahKandung" id="NamaAyahKandung" autofocus class="form-control" value="{{ old('NamaAyahKandung') }}">
                        @error('NamaAyahKandung')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="Status">Status</label>
                        <select name="Status" id="dropdown" class="form-control">
                            <option value=""></option>
                            @foreach ($status as $row)
                                <option value="{{$row->status}}">{{$row->status}}</option>
                            @endforeach
                        </select>
                        @error('Status')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 
                    
                    <div class="form-group mb-2">
                        <label for="pekerjaan">Pekerjaan</label>
                        <select name="Pekerjaan" id="dropdown2" class="form-control">
                            <option value=""></option>
                            @foreach ($pekerjaan as $row)
                                <option value="{{$row->pekerjaan}}">{{$row->pekerjaan}}</option>
                            @endforeach
                        </select>
                        @error('Pekerjaan')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark"><i class="fas fa-save"> </i> Simpan</button>
                    <a href="{{ route('Data_Orang_Tua.index') }}" class="btn btn-danger" onclick="return confirm('Batal input data?')"><i class="fas fa-ban"></i> Batal</a>
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