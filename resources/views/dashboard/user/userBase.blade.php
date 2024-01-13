
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- FaviconsC:apogee1\resources\assets -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet"><!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <!--link rel="stylesheet" href="{{ asset('css/app.css') }}"-->

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <!-- =======================================================
  * Template Name: MyResume
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
  <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex flex-column justify-content-center">

    <nav id="navbar" class="navbar nav-menu">
      <ul>
        <li><a href="{{ route('user.home') }}" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
        <li><a href="{{ route('user.docs', ['doc'=>10]) }}" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Gestion de papier</span></a></li>
        <li><a href="https://wa.me/212693823094?text=Bonjour, je voudrais solliciter de l'aide avec..." class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contacter l'admin</span></a></li>
        <li><a href="{{ route('user.logout') }}" class="nav-link scrollto" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="bx bx-user"></i> <span>Deconnexion</span></a></li>
        <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
      </ul>
    </nav><!-- .nav-menu -->

  </header><!-- End Header -->

  <!-- ======= Main Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
      {{-- @auth --}}
      <main>
      @yield('mainContent')
      </main>
      {{-- @endauth --}}
  </section>
  <!-- End Main -->
  
  

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>apogee</h3>
      <p>ceci est l'interface de l'etudiant.</p>
      <div class="copyright">
        &copy; Copyright <strong><span>Apogee</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: [license-url] -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/ -->
        Designed by <a href="https://wa.me/212693823094?text=Bonjour, comment je peux vous offrir un terrain?...Où?">Boris-Samne</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/typed.js/typed.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <!--Laravel-mix-->
  <script src="{{ asset('js/app.js') }}"></script>
  
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  
  <!-- Table Css-->
  <script>
    $(document).ready(function () {
       $('#tableId').DataTable();
    });
 </script>

</body>

</html>