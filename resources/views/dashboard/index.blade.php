@extends('layouts.template')
@section('content')
    <?php
    $konf = DB::table('setting')->first();
    ?>
    <?php
    $title = 'Home';
    ?>
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        @if (Auth::user()->role == 'Admin')
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Total Anak</h3>
                            <h3 class="text-center">{{$totalAnak}}</h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <a href="{{route('Data_Anak.index')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Saldo<sup style="font-size: 20px"></sup></h3>
                            <h3 class="text-center">Rp, {{ number_format($saldo->saldo)}}</h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-address-card"></i>
                        </div>
                        <a href="" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                {{--
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>Tidak Hadir<sup style="font-size: 20px"></sup></h3>
                            <h3 class="text-center">{{$totalSiswa}}</h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-child"></i>
                        </div>
                        <a href="" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div> --}}
               
            </div>
        @endif
    </div>
@endsection
