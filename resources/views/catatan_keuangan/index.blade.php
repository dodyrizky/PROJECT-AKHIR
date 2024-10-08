@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body table table-responsive">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Donasi Masuk</button>
                            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-pengeluaran" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Pengeluaran</button>
                            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-laporan" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Laporan</button>
                            </div>
                        </nav>
                      <div class="tab-content" id="nav-tabContent">
                        {{-- data donasi --}}
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <table class="table-responsive table-hover">
                                <thead>
                                    <th>No</th>
                                    <th>Keterangan</th>
                                    <th>Nominal</th>
                                    <th>Tanggal</th>
                                </thead>
                                <tbody>
                                    @foreach ($dataDonasi as $row)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>Dana Masuk</td>
                                            <td>Rp, {{number_format($row->nominal_donasi)}}</td>
                                            <td>{{ Carbon\Carbon::parse($row->created_at)->isoFormat('dddd'.', ' .'D MMMM Y') }}</td>
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <td class="text-bold">Total Donasi Masuk</td>
                                            <td class="text-bold">:</td>
                                            <td class="text-bold">Rp, {{number_format($totalDonasi)}}</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- akhir data donasi --}}

                        {{-- data pengeluaran --}}
                        <div class="tab-pane fade" id="nav-pengeluaran" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <table class="table-responsive table-hover">
                                <thead>
                                    <th>No</th>
                                    <th>Keterangan</th>
                                    <th>Nominal</th>
                                    <th>Tanggal</th>
                                </thead>
                                <tbody>
                                    @foreach ($dataPengeluaran as $row)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>Dana Keluar</td>
                                            <td class="text-bold">Rp, {{number_format($row->nominal)}}</td>
                                            <td>{{ Carbon\Carbon::parse($row->tanggal_pengeluaran)->isoFormat('dddd'.', ' .'D MMMM Y') }}</td>
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <td class="text-bold">Total Pengeluaran</td>
                                            <td class="text-bold">:</td>
                                            <td class="text-bold">Rp, {{number_format($totalPengeluaran)}}</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- akhir data pengeluaran --}}

                        {{-- data laporan --}}
                        <div class="tab-pane fade" id="nav-laporan" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <table>
                                <tr>
                                    <td class="text-bold">Total Donasi Masuk</td>
                                    <td class="text-bold">:</td>
                                    <td class="text-bold">Rp, {{number_format($totalDonasi)}}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Total Pengeluaran</td>
                                    <td class="text-bold">:</td>
                                    <td class="text-bold">Rp, {{number_format($totalPengeluaran)}}</td>
                                </tr>
                            </table>
                        </div>
                        {{-- akhir data laporan --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

