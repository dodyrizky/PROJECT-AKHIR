@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('Data_Donasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group mb-2">
                        <label for="">Nama Donatur</label>
                        <input type="text" name="nama_donatur" class="form-control" value="{{ old('nama_donatur') }}">
                        @error('nama_donatur')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> 
                    <div class="form-group mb-2">
                        <label for="">Nominal Donasi</label>
                        <input type="text" id="dengan-rupiah" class="form-control" name="nominal_donasi" value="{{ old('nominal_donasi') }}">
                        @error('nominal_donasi')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="">Bukti Transfer <abbr title="" style="color: black">*</abbr> </label>
                        <input id="inputImg" type="file" name="bukti_transfer" class="form-control">
                        <img class="d-none w-25 h-25 my-2" id="previewImg" src="#" alt="Preview image">
                        <small>Bukti berupa file Jpg/Jpeg/Png</small><br>
                        @error('bukti_transfer')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark"><i class="fas fa-save"> </i> Save</button>
                    <a href="{{ route('Data_Donasi.index') }}" class="btn btn-danger" onclick="return confirm('Batal input data?')"><i class="fas fa-ban"></i> Batal</a>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection

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

{{-- format rupiah --}}
<script>
     /* Dengan Rupiah */
    var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
@endsection