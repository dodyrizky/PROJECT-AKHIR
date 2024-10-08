@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                    <a href="{{ route('presensi.create') }}" class="btn btn-success btn-sm d-inline" style="float: right;"><i class="fas fa-expand"> Presensi Pulang</i></a>
                    <a href="{{ route('presensi.create') }}" class="btn btn-primary btn-sm mr-3" style="float: right;"><i class="fas fa-expand"> Presensi Masuk</i></a>
                </div>
                <div class="card-body table table-responsive">
                    @if ($message = Session::get('sukses'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $message }}
                    </div>
                    @endif
                    <table class="table table-bordered table-hover" id="example1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Waktu Presensi</th>
                                <th>Status Keterlambatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $dataPresensi as $row )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama_siswa }}</td>
                                    <td>{{ $row->jam}}</td>
                                    <td>{{ floor(Carbon\Carbon::parse($row->jam)->diffInMinutes('06:45') / 60) }} Jam</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection