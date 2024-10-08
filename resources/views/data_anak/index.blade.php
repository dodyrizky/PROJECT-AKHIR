@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Anak / Home</h3>
                    <a href="{{ route('Data_Anak.create') }}" class="btn btn-primary btn-sm ml-3" style="float: right;"><i class="fas fa-plus-circle"> Tambah Data</i></a>
                    <a href="{{ url('exportAll') }}" class="btn btn-success btn-sm ml-3" style="float: right;"><i class="fas fa-download"> Export Semua</i></a>
                </div>
                <div class="card-body table table-responsive">
                    @if ($message = Session::get('Notifikasi'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $message }}
                    </div>
                    @endif
                    <table class="table table-bordered table-hover" id="example1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anak as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>
                                    <a href="{{ url('export', $row->id) }}" class="btn btn-primary btn-xs btn-sm ml-3"><i class="fas fa-plus-download"> Export As PDF</i></a>
                                    <a href="{{ route('Data_Anak.show', $row->id) }}" class="btn btn-success btn-xs" style="display: inline-block"><i class="fas fa-list"> Detail</i></a>
                                    <a href="{{ route('Data_Anak.edit', $row->id) }}" class="btn btn-warning btn-xs" style="display: inline-block"><i class="fas fa-edit"> Ubah</i></a>
                                    <form action="{{ route('Data_Anak.destroy', $row->id) }}" method="POST" style="display: inline-block">
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