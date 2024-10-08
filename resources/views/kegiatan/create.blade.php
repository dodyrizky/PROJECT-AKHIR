@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('Data_Kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                    
                    @csrf
                    @method('POST')

                    <div class="form-group mb-2">
                        <label for="JudulKegiatan">Judul Kegiatan</label>
                        <input type="text" name="JudulKegiatan" id="JudulKegiatan" autofocus class="form-control" value="{{ old('JudulKegiatan') }}">
                        @error('JudulKegiatan')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="Slug">Slug</label>
                        <input type="text" name="Slug" id="Slug" autofocus class="form-control" value="{{ old('Slug') }}">
                        @error('Slug')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="Deskripsi">Deskripsi</label>
                        <textarea name="Deskripsi" id="editor" cols="30" rows="10" class="form-control">{{old('Deskripsi')}}</textarea>
                        @error('Deskripsi')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 

                    <div class="form-group mb-2">
                        <label for="">Foto Kegiatan <abbr title="" style="color: black">*</abbr> </label>
                        <input id="inputImg" type="file" accept="image/*" name="Foto" class="form-control">
                        <small>Format : jpg,jpeg,png</small>
                        <img class="d-none w-25 h-25 my-2" id="previewImg" src="#" alt="Preview image">
                        @error('Foto')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="editor" cols="30" rows="10" class="form-control">{{old('tanggal')}}</textarea>
                        @error('tanggal')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 
                    
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark"><i class="fas fa-save"> </i> Simpan</button>
                    <a href="{{ route('Data_Kegiatan.index') }}" class="btn btn-danger" onclick="return confirm('Batal input data?')"><i class="fas fa-ban"></i> Batal</a>
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
<script>
    CKEDITOR.replace( 'editor', {
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection
@endsection

