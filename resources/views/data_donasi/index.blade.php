@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                    <a href="{{ route('Data_Donasi.create') }}" class="btn btn-primary btn-sm ml-3" style="float: right;"><i class="fas fa-plus"> Tambah Data Donatur</i></a>
                    <a href="{{ url('exportAllDonasi') }}" class="btn btn-success btn-sm ml-3" style="float: right;"><i class="fas fa-download"> Export Semua</i></a>
                    <div class="rekap float-right">
                        <form action="{{ url('/rekap_donasi') }}" method="GET">
                            <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label for="bulan">Export berdasarkan Bulan</label>
                                        <select name="bulan" id="dropdown" required>
                                            <option value=""></option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto" style="margin-right: 20px; margin-top: 32px;">
                                    <button type="submit" class="btn btn-primary btn-sm mb-2"><i
                                            class="fas fa-search"></i></button>
                                    <a href="{{ route('pengeluaran.index') }}" type="submit"
                                        class="btn btn-secondary btn-sm mb-2"><i
                                            class="fas fa-trash-restore-alt"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body table table-responsive">
                    @if ($message = Session::get('Notifikasi'))
                    <div class="alert alert-success col-6">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $message }}
                    </div>
                    @endif
                    <table class="table table-bordered" id="example1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Donatur</th>
                                <th>Nominal Donasi</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donasi as $row)                                
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama_donatur }}</td>
                                    <td>Rp, {{ number_format($row->nominal_donasi) }}</td>
                                    <td>{{ Carbon\Carbon::parse($row->created_at)->isoFormat('dddd'.', ' .'D MMMM Y') }}</td>
                                    <td>
                                        {{-- <a href="{{ url('exportDonasi', $row->id) }}" class="btn btn-success btn-sm ml-3"><i class="fas fa-download"> Export PDF</i></a> --}}
                                        <a href="{{asset('file/bukti_transfer/'. $row->bukti_transfer)}}" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Lihat Bukti</a>
                                    </td>
                                </tr>
                            @endforeach
                            @if($saldo)
                            <tr class="text-bold alert-info">
                                <td colspan="2">Total Donasi</td>
                                <td>Rp, {{ number_format($totalDonasi) }}</td>
                            </tr>
                            <tr class="text-bold alert-danger">
                                <td colspan="2">Saldo</td>
                                <td>Rp, {{ number_format($saldo->saldo) }}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection