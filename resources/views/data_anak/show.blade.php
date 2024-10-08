@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body table table-responsive">
                    <a href="{{ route('Data_Anak.index') }}" class="btn btn-warning btn-sm mb-2"><i class="fas fa-arrow-left"> Kembali</i></a>
                    <a href="{{ url('export', $DataAnak->id) }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-download"> Export</i></a>
                    <table class="table table-hover " id="example1">
                        <tbody>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>:</td>
                                <td>{{ $DataAnak->nama }}</td>
                            </tr>
                            <tr>
                                <th>NIK</th>
                                <td>:</td>
                                <td>{{ $DataAnak->NIK }}</td>
                            </tr>
                            <tr>
                                <th>No.KK</th>
                                <td>:</td>
                                <td>{{ $DataAnak->no_kk }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>:</td>
                                <td>{{ $DataAnak->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>Tempat Tanggal Lahir</th>
                                <td>:</td>
                                <td>{{ $DataAnak->tempat_lahir . ', ' .  Carbon\Carbon::parse($DataAnak->tanggal_lahir)->isoFormat('D MMMM Y'); }}</td>
                            </tr>
                            <tr>
                                <th>Umur </th>
                                <td>:</td>
                                <td>{{ $DataAnak->umur }} Tahun</td>
                            </tr>
                            <tr>
                                <th>Status Anak</th>
                                <td>:</td>
                                <td>{{ $DataAnak->status_anak }}</td>
                            </tr>
                            <tr>
                                <th>Hubungan Dalam Keluarga</th>
                                <td>:</td>
                                <td>{{ $DataAnak->hubungan_dalam_keluarga }}</td>
                            </tr>
                            <tr>
                                <th>Asal Desa</th>
                                <td>:</td>
                                <td>{{ $DataAnak->asal_desa }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Masuk</th>
                                <td>:</td>
                                <td>{{ $DataAnak->tahun_masuk }}</td>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <td>:</td>
                                <td>{{ $DataAnak->kelas }}</td>
                            </tr>
                            <tr>
                                <th>Sekolah</th>
                                <td>:</td>
                                <td>{{ $DataAnak->sekolah }}</td>
                            </tr>
                            <tr>
                                <th>Perkiraan Tahun Keluar Panti</th>
                                <td>:</td>
                                <td>{{ $DataAnak->tahun_keluar_panti }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

