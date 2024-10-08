@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Sekolah / Home</h3>
                    <a href="{{ route('Data_Sekolah.create') }}" class="btn btn-primary btn-sm" style="float: right;"><i class="fas fa-plus">Tambah Data</i></a>
                </div>
                <div class="card-body table table-responsive">
                    @if ($message = Session::get('notifikasi'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $message }}
                    </div>
                    @endif
                    <table class="table table-bordered table-hover" id="example1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Anak</th>
                                <th>Nama Sekolah</th>
                                <th>Alamat Sekolah</th>
                                <th>Nomor Tlp Sekolah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataSekolah as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->NamaSekolah }}</td>
                                <td>{{ $row->AlamatSekolah }}</td>
                                <td>{{ $row->NomorHp }}</td>
                                <td>
                                    <a href="{{ route('Data_Sekolah.edit', $row->id) }}" class="btn btn-warning btn-xs" style="display: inline-block"><i class="fas fa-edit"> Ubah</i></a>
                                    <form action="{{ route('Data_Sekolah.destroy', $row->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs btn-flat show_confirm"><i class="fas fa-trash"> Hapus</i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection