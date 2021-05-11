<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @yield('title')
        </title>

        <!-- Bootstrap CSS -->
        <link
            rel="stylesheet"
            href="assets/bootstrap-4.6.0-dist/css/bootstrap.min.css"
        />

        <!-- Font Awesome -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        />

        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap"
            rel="stylesheet"
        />

        <!-- style -->
        <style>
            @media (max-width: 575px) {
                .card-activity {
                height: 8rem;
                }

                .text-activity {
                font-size: 0.6rem;
                }

                .img-publication {
                height: 10rem;
                }

                .title-publication {
                font-size: 0.7rem;
                }

                .text-publication {
                font-size: 0.5rem;
                }

                .img-guide {
                height: 12rem;
                width: 8.5rem;
                }

                .text-footer {
                font-size: 0.5rem;
                }

                .col-footer-2 {
                padding-left: 12%;
                }
            }
            @media (min-width: 576px) {
                .card-activity {
                height: 13rem;
                }

                .text-activity {
                font-size: 0.9rem;
                }

                .img-guide {
                height: 19rem;
                width: 14rem;
                }

                .text-footer {
                font-size: 0.5rem;
                }

                .col-footer-2 {
                padding-left: 8%;
                }
            }
            @media (min-width: 768px) {
                .card-activity {
                height: 9rem;
                }

                .text-activity {
                font-size: 0.7rem;
                }

                .img-publication {
                height: 9rem;
                }

                .title-publication {
                font-size: 0.75rem;
                }

                .text-publication {
                font-size: 0.6rem;
                }

                .img-guide {
                height: 13rem;
                width: 9rem;
                }

                .text-footer {
                font-size: 0.6rem;
                }

                .row-footer-menu {
                float: left;
                }

                .row-footer-social-media {
                float: left;
                }

                .col-footer-2 {
                padding-left: 6%;
                }
            }
            @media (min-width: 992px) {
                .navbar {
                font-size: 0.7rem;
                }

                .card-activity {
                height: 7rem;
                }

                .text-activity {
                font-size: 0.49rem;
                }

                .img-publication {
                height: 10rem;
                }

                .title-publication {
                font-size: 0.8rem;
                }

                .text-publication {
                font-size: 0.6rem;
                }

                .img-guide {
                height: 11rem;
                width: 7.5rem;
                }

                .text-footer {
                font-size: 0.55rem;
                }

                .row-footer-menu {
                float: right;
                }

                .row-footer-social-media {
                float: right;
                }
            }
            @media (min-width: 1200px) {
                .navbar {
                font-size: 0.9rem;
                }

                .card-activity {
                height: 10rem;
                }
                .text-activity {
                font-size: 0.7rem;
                }

                .img-publication {
                height: 11.5rem;
                }

                .title-publication {
                font-size: 1rem;
                }

                .text-publication {
                font-size: 0.8rem;
                }

                .img-guide {
                height: 14.5rem;
                width: 11rem;
                }

                .text-footer {
                font-size: 0.7rem;
                }

                .row-footer-menu {
                float: right;
                }

                .row-footer-social-media {
                float: right;
                }
            }

            section {
                margin-top: 1rem;
            }

            .navbar {
                font-family: "Open Sans", sans-serif;
                font-weight: 900;
                line-height: 18px;
                color: #0d4a82;
            }

            .card {
                font-family: Arial, Helvetica, sans-serif;
                font-weight: 400;
                font-size: 12px;
                color: #0d4a82;
            }

            .card-activity {
                border: none;
                background: white;
                color: black;
                padding: 10px;
                font-size: 16px;
                border: black solid 1px;
                border-radius: 5px;
                position: relative;
                box-sizing: border-box;
                transition: all 500ms ease;
            }

            /* Ghost Button */
            .card-activity:hover {
                color: white;
                border: white solid 1px;
                background: #1f3984;
            }

            .img-application {
                position: relative;
            }

            .img-application a {
                position: absolute;
                top: 0;
                bottom: 0;
                right: 0;
                left: 0;
                background-color: rgba(0, 0, 0, 0.3);
                opacity: 0;
                transition: opacity 0.3s;
            }

            .img-application a:hover {
                opacity: 1;
            }

            .img-guide-box {
                position: relative;
            }

            .img-guide-box a {
                position: absolute;
                top: 0;
                bottom: 0;
                right: 0;
                left: 0;
                background-color: rgba(0, 0, 0, 0.3);
                opacity: 0;
                transition: opacity 0.3s;
            }

            .img-guide-box a:hover {
                opacity: 1;
            }

            footer {
                font-family: Arial, Helvetica, sans-serif;
                font-weight: 400;
                font-size: 12px;
                color: #0d4a82;
            }
        </style>
        <!-- End Style -->

    </head>

    <body style="background-color: #efefef">
    <div class="fixed-top">
      <div class="" style="background-color: #1f3984; color: white">
        <div class="container">
          <marquee
            >KEMENTERIAN PERENCANAAN PEMBANGUNAN NASIONAL (BADAN PERENCANAAN
            PEMBANGUNAN NASIONAL) REPUBLIK INDONESIA</marquee
          >
        </div>
      </div>
      <nav
        class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-4 bg-white rounded"
      >
        <div class="container-fluid" style="width: 70%">
          <a class="navbar-brand" href="#"
            ><img
              src="{{ asset('images/img/logo_bappenas.png') }}"
              alt="LOGO-BAPPENAS"
              class="img-responsive"
              height="35"
          /></a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="collapse navbar-collapse justify-content-end"
            id="navbarNavAltMarkup"
          >
            <div class="navbar-nav">
              <a href="{{ url('/') }}" {!! request()->is('/') ? 'class="nav-link active"' : 'class="nav-link"' !!}
                >Beranda</a
              >
              <a href="{{ url('guide') }}" {!! request()->is('guide') ? 'class="nav-link active"' : 'class="nav-link"' !!}>Pedoman</a>
              <a href="{{ url('publication') }}" {!! request()->is('publication') ? 'class="nav-link active"' : 'class="nav-link"' !!}>Publikasi</a>
              <a class="nav-link" href="#">Kegiatan</a>
              <a class="nav-link" href="#">Aplikasi Kami</a>
              <a class="nav-link" href="#">Hubungi Kami</a>
            </div>
          </div>
        </div>
      </nav>
    </div>

    @yield('content')

    <!-- Footer -->
    <footer
      class="text-light text-lg-start my-4"
      style="background-color: #1f3984"
    >
      <!-- Grid container -->
      <div class="container-fluid p-4 text-footer" style="width: 70%">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-md-12 col-lg-5">
            <h6 class="text-uppercase">
              DIREKTORAT PEPPD KEMENTERIAN PPN/BAPPENAS
            </h6>
            <p>
              Gedung Bappenas Lantai 9 Jl. H.R. Rasuna Said Kuningan, Setiabudi
              Jakarta Selatan 12950
              <br />
              <b>Email 1 : </b>dit.peppd@bappenas.go.id
              <br />
              <b>Email 2 : </b>ppd@bappenas.go.id
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-12 col-lg-7 col-footer-2">
            <!-- <div class="row row-footer-menu">
              <ul class="list-unstyled list-inline my-2">
                <li class="list-inline-item">
                  <a href="#!" class="text-light text-right">BERANDA</a>
                </li>
                <li class="list-inline-item">
                  <a href="#!" class="text-light">PEDOMAN</a>
                </li>
                <li class="list-inline-item">
                  <a href="#!" class="text-light">PUBLIKASI</a>
                </li>
                <li class="list-inline-item">
                  <a href="#!" class="text-light">KEGIATAN</a>
                </li>
                <li class="list-inline-item">
                  <a href="#!" class="text-light">APLIKASI KAMI</a>
                </li>
                <li class="list-inline-item">
                  <a href="#!" class="text-light">HUBUNGI KAMI</a>
                </li>
              </ul>
            </div> -->
            <div class="row row-footer-social-media">
              <ul class="list-unstyled list-inline my-2 text-left">
                <li class="list-inline-item">
                  <a href="#!" class="text-light">BAPPENAS RI</a>
                </li>
                <li class="list-inline-item">
                  <a href="#!" class="text-light">
                    <i class="fa fa-youtube" aria-hidden="true"></i>
                    YOUTUBE
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#!" class="text-light">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                    INSTAGRAM
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        PEPPD © 2020 Copyright
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>

    <script>
      $(window).resize(function () {
        if ($(window).width() >= 992) {
          $(".dekstop-screen-lg-8").addClass("col-lg-8");
          $(".dekstop-screen-lg-4").addClass("col-lg-4");
        } else {
          $(".dekstop-screen-lg-8").removeClass("col-lg-8");
          $(".dekstop-screen-lg-4").removeClass("col-lg-4");
        }
      });
    </script>
    </body>
</html>
