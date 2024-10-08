<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{$title}}</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Lato:400,300,700,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('landing/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landing/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landing/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landing/vendor/venobox/venobox.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('landing/css/style.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

    </div>
  </header><!-- End #header -->

  <!-- ======= Hero Section ======= -->
  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
            <h1>Cara Melakukan Donasi</h1>
            <p class="mt-3 mb-3">Anda dapat melakukan donasi dengan beberapa cara </p>
            <table>
              <tr>
                <td>
                  <p class="font-weight-bold">1. Datang langsung ke alamat kami</p>
                  <p class="mb-5">{{ $data->alamat }}</p>
                </td>
              </tr>
              <tr>
                <td>
                  <p class="font-weight-bold">2. Transfer Bank</p>
                  <img src="{{asset('file/LOGO/Logo_bank.png')}}" alt="" width="25%">
                  <p class="font-weight-bold mt-2">Nomor Rekening : {{$data->nomor_rekening}}</p>
                  <p class="mt-2 mb-3">a/n : {{$data->nama_rekening}}</p>
                  <p>Untuk donasi transfer Bank harap melakukan konfirmasi via Whatsapp dengan mengirimkan bukti transfer ke nomor berikut {{ $data->no_hp }} atau klik tombol chat whatsapp dibawah</p>
                  <div class="icon-box">
                    <a href="https://wa.me/{{$data->no_hp}}?text=Halo%20Saya%20sudah%20mengirimkan%20donasi%20">
                      <img src="{{asset('file/LOGO/wa.png')}}" alt="" width="10%" class="mt-3">
                    </a>
                  </div>
                </td>
              </tr>
            </table>
        </div>
      </div>
    </section><!-- End About Us Section -->

    
  
  

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('landing/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('landing/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('landing/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{ asset('landing/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset('landing/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('landing/vendor/venobox/venobox.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('landing/js/main.js')}}"></script>

</body>

</html>