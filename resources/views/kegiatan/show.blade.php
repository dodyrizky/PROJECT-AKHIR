@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body table table-responsive">
                    <a href="{{ route('Data_Kegiatan.index') }}" class="btn btn-warning btn-sm mb-2"><i class="fas fa-arrow-left"> Kembali</i></a>
                    <table class="table table-hover " id="example1">
                        <tbody>
                            <tr>
                                <th>Judul Kegiatan</th>
                                <td>:</td>
                                <td>{{ $dataKegiatan->JudulKegiatan }}</td>
                            </tr>
                            <tr>
                                <th>Slug</th>
                                <td>:</td>
                                <td>{{ $dataKegiatan->Slug }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>:</td>
                                <td>{!! $dataKegiatan->Deskripsi !!}</td>
                            </tr>
                            <tr>
                                <th>Foto</th>
                                <td>:</td>
                                <td>
                                    <img src="{{ asset('file/foto_kegiatan/'. $dataKegiatan->Foto) }}" alt="" width="25%">
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>:</td>
                                <td>{{ Carbon\Carbon::parse($dataKegiatan->tanggal)->isoFormat('dddd'.', ' .'D MMMM Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

