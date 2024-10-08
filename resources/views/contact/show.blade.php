@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body table table-responsive">
                    <a href="{{ route('kontak.index') }}" class="btn btn-primary btn-xs mb-2"><i class="fas fa-arrow-left"> Kembali</i></a>
                    @if ($message = Session::get('sukses'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $message }}
                    </div>
                    @endif
                    <table class="table " id="example1">
                        <tbody>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td>{{ $data->name }}</td>
                            </tr>
                            <tr>
                                <th>Email / phone</th>
                                <td>:</td>
                                <td>{{ $data->email }}</td>
                            </tr>
                            <tr>
                                <th>Subjek</th>
                                <td>:</td>
                                <td>{{ $data->subject }}</td>
                            </tr>
                            <tr>
                                <th>Isi pesan</th>
                                <td>:</td>
                                <td>{{ $data->message }}</td>
                            </tr>
                            <tr>
                                <th>Dikirim Sejak</th>
                                <td>:</td>
                                <td>{{ Carbon\Carbon::parse($data->created_at)->isoFormat('D MMMM Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

