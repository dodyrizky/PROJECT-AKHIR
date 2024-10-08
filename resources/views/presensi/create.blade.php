@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                  @if ($message = Session::get('sukses'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      {{ $message }}
                  </div>
                  @endif
                  @if ($message = Session::get('gagal'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $message }}
                    </div>
                    @endif
                    <form action="{{ route('presensi.store') }}" method="POST" id="form">
                    
                    @csrf
                    @method('POST')

                    <div class="form-group mb-2">
                        <label for="id_siswa">ID Siswa</label>
                        <input type="text" name="id_siswa" id="id_siswa" autofocus class="form-control" value="{{ old('id_siswa') }}">
                        @error('id_siswa')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>                     
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark btn-sm mr-2"><i class="fas fa-save"> </i> Simpan</button>
                    <a href="{{ route('presensi.index') }}" class="btn btn-danger btn-sm" onclick="return confirm('Batal input data?')"><i class="fas fa-ban"></i> Batal</a>
                    </form>
                </div>
                <video id="preview" width="30%" style="border: 1px solid black"></video>
            </div>
        </div>
    </div>
@endsection

{{-- scanner --}}
@section('script')
<script type="text/javascript">
  let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
  scanner.addListener('scan', function (content) {
    console.log(content);
  });
  Instascan.Camera.getCameras().then(function (cameras) {
    if (cameras.length > 0) {
      scanner.start(cameras[0]);
    } else {
      console.error('No cameras found.');
    }
  }).catch(function (e) {
    console.error(e);
  });
  scanner.addListener('scan', function(c){
    document.getElementById('id_siswa').value = c;
    document.getElementById('form').submit();
  });
  </script>
@endsection