<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Beranda | {{$title}}</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('file/LOGO/'.$data->logo)}}" rel="icon">
  <link href="{{ asset('landing/img/apple-touch-icon.png') }} " rel="apple-touch-icon">

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

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#about">Beranda</a></li>
          <li><a href="#tentang">Tentang Kami</a></li>
          <li><a href="#donasi">Donasi</a></li>
          <li><a href="#kegiatan">Kegiatan</a></li>
          <li><a href="#contact">Hubungi Kami</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End #header -->

  <!-- ======= Hero Section ======= -->
  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
            <img src="{{asset('file/LOGO/'.$data->logo)}}" alt="" width="15%" class="mb-3">
            <h1>Situs Resmi</h1>
            <h2>{{$data->nama_instansi}}</h2>
        </div>
      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="tentang" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Tentang Kami</h2>
          <p>{{$data->tentang_kami}}</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box">
            <div class="icon"><i class="icofont-whatsapp"></i></div>
            <h4 class="title"><a href="https://wa.me/{{$data->no_hp}}?text=Halo%20Saya%20ingin%20tanya%20tentang%20Panti%20ini">Whatsapp</a></h4>
            <p class="description">{{ $data->no_hp}}</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box">
            <div class="icon"><i class="icofont-facebook"></i></div>
            <h4 class="title"><a href="">Facebook</a></h4>
            <p class="description">{{$data->facebook}}</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box">
            <div class="icon"><i class="icofont-email"></i></div>
            <h4 class="title"><a href="">Email</a></h4>
            <p class="description">{{$data->email}}</p>
          </div>
          
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Call To Action Section ======= -->
    <section class="call-to-action" id="donasi">
      <div class="container">

        <div class="text-center">
          <h3>Donasi</h3>
          <p>Berdonasi untuk anak-anak adalah cara terbaik untuk menanamkan kasih sayang dan masa depan yang lebih baik bagi generasi mendatang. Dengan setiap donasi, kita membantu membentuk masa depan anak-anak, memberi mereka alat untuk meraih impian dan menciptakan perubahan.</p>
          <a class="cta-btn" target="_blank" href="{{url('Donasi_Sekarang')}}">Donasi Sekarang</a>
          <!-- Button trigger modal -->

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Informasi Donasi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                 UNTUK BERDONASI BISA MELALUI REKENING DIBAWAH INI <br><br>
                  <strong>Nomor Rekening :</strong> {{$data->nomor_rekening}} <br>
                  <strong>Atas Nama :</strong> {{$data->nama_rekening}} <br>
                  <strong>Bank :</strong> {{$data->bank}}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>

      </div>
    </section><!-- End Call To Action Section -->

    <!-- ======= Our Portfolio Section ======= -->
    <section id="kegiatan" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Kegiatan</h2>
        </div>
        <div class="row portfolio-container">

            @foreach ( $kegiatan as $row)
                
                <div class="col-lg-4 col-md-6 filter-app">
                    <div class="portfolio-item">
                    <img src="{{asset('file/foto_kegiatan/'. $row->Foto)}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                      <a href="{{asset('file/foto_kegiatan/'. $row->Foto)}}" data-gall="portfolioGallery" class="venobox" title="{{$row->JudulKegiatan}}"><i class="icofont-plus"></i></a>
                    </div>
                  </div>
                  <h6><strong>{{ $row->JudulKegiatan }}</strong></h6>
                  <p>{!! $row->Deskripsi !!}</p>
                </div>
            
            @endforeach

        </div>

      </div>
    </section><!-- End Our Portfolio Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Hubungi Kami</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="contact-about">
              <h3>{{$title}}</h3>
              <p>{{$data->tentang_kami}}</p>
              <div class="social-links">
                  <a href="https://wa.me/{{$data->no_hp}}?text=Halo%20Saya%20ingin%20tanya%20tentang%20Panti%20ini" class="whatsapp"><i class="icofont-whatsapp"></i></a>
                <a href="https://www.instagram.com/{{$data->instagram}}" class="instagram"><i class="icofont-instagram"></i></a>
                <a href="https://www.youtube.com/{{$data->youtube}}" class="youtube"><i class="icofont-youtube"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info">
              <div>
                <i class="icofont-google-map"></i>
                <p>{{$data->alamat}}</p>
              </div>

              <div>
                <i class="icofont-envelope"></i>
                <p>{{$data->email}}</p>
              </div>

              <div>
                <i class="icofont-phone"></i>
                <p>{{$data->no_hp}}</p>
              </div>

            </div>
          </div>

          <div class="col-lg-5 col-md-12">
            <form action="{{url('hubungi_kami')}}" method="POST" role="form" class="php-email-form">
                @csrf
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                @if(session('notifikasi'))
                  <p class="alert alert-success">{{$message}}</p>
                @endif
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

    <!-- ======= Map Section ======= -->
    <section class="map">
      <iframe src="https://www.google.com/maps/{{$data->maps}}" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </section><!-- End Map Section -->

  </main><!-- End #main -->

  
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>{{$data->nama_instansi}}</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-one-page-bootstrap-template-amoeba/ -->
        Designed by <a href="">{{$data->nama_instansi}}</a>
      </div>
    </div>
  </footer><!-- End #footer -->

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