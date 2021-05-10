{{-- author  : Muhamad Munawir Amin
Email        : muhamadmunawiramin@gmail.com
Last Update  : 5 Mei 2021 --}}

@extends('pages.layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container-fluid" style="width: 90%; margin-top: 8rem">
      <div class="row">
        <div class="col-lg-8">
          <!-- Section Carousel-->
          <div class="col-md-12 order-1">
            <section class="carousel">
              <div
                id="carouselExampleIndicators"
                class="carousel slide img-thumbnail"
                data-ride="carousel"
                style="border-radius: 0"
              >
                <ol class="carousel-indicators">
                  <li
                    data-target="#carouselExampleIndicators"
                    data-slide-to="0"
                    class="active"
                  ></li>
                  <li
                    data-target="#carouselExampleIndicators"
                    data-slide-to="1"
                  ></li>
                  <li
                    data-target="#carouselExampleIndicators"
                    data-slide-to="2"
                  ></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img
                      class="d-block w-100"
                      src="{{ asset('images/img/carousel/carousel_1_1min.png') }}"
                      alt="First slide"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      class="d-block w-100"
                      src="{{ asset('images/img/carousel/carousel_2_1min.png') }}"
                      alt="Second slide"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      class="d-block w-100"
                      src="{{ asset('images/img/carousel/carousel_3_1min.png') }}"
                      alt="Third slide"
                    />
                  </div>
                </div>
                <a
                  class="carousel-control-prev"
                  href="#carouselExampleIndicators"
                  role="button"
                  data-slide="prev"
                >
                  <span
                    class="carousel-control-prev-icon"
                    aria-hidden="true"
                  ></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a
                  class="carousel-control-next"
                  href="#carouselExampleIndicators"
                  role="button"
                  data-slide="next"
                >
                  <span
                    class="carousel-control-next-icon"
                    aria-hidden="true"
                  ></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </section>
          </div>
          <!-- End Section Carousel -->

          <!-- Section Publication -->
          <div class="col-md-12 order-3">
            <section class="publication">
              <i class="fas fa-newspaper"></i>Publikasi
              <hr />
              <div class="card mb-3">
                <div class="row no-gutters">
                  <div class="col-md-5">
                    <img
                      class="w-100 img-publication"
                      src="{{ asset('images/img/knowledge_sharing_final_book.png') }}"
                      alt="Knowledge Sharing"
                    />
                  </div>
                  <div class="col-md-7">
                    <div class="card-body">
                      <p class="card-text">
                        <small class="text-muted"
                          >Last updated 3 mins ago</small
                        >
                        <span class="badge badge-secondary float-right"
                          >Berita</span
                        >
                      </p>
                      <h5 class="card-title title-publication">
                        <b
                          >Manajemen Data SPBE Menentukan Kualitas Data
                          Indonesia</b
                        >
                      </h5>
                      <p class="card-text text-publication">
                        Deputi Bidang Pemantauan, Evaluasi, dan Pengendalian
                        Pembangunan Kementerian PPN/Bappenas Taufik Hanafi
                        mengatakan, tata kelola at...<i
                          ><a href>selengkapnya</a></i
                        >
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card mb-3">
                <div class="row no-gutters">
                  <div class="col-md-5">
                    <img
                      class="w-100 img-publication"
                      src="{{ asset('images/img/knowledge_sharing_final_book.png') }}"
                      alt="Knowledge Sharing"
                      height="200"
                    />
                  </div>
                  <div class="col-md-7">
                    <div class="card-body">
                      <p class="card-text">
                        <small class="text-muted"
                          >Last updated 3 mins ago</small
                        >
                        <span class="badge badge-secondary float-right"
                          >Berita</span
                        >
                      </p>
                      <h5 class="card-title title-publication">
                        <b
                          >Manajemen Data SPBE Menentukan Kualitas Data
                          Indonesia</b
                        >
                      </h5>
                      <p class="card-text text-publication">
                        Deputi Bidang Pemantauan, Evaluasi, dan Pengendalian
                        Pembangunan Kementerian PPN/Bappenas Taufik Hanafi
                        mengatakan, tata kelola at...<i
                          ><a href>selengkapnya</a></i
                        >
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card mb-3">
                <div class="row no-gutters">
                  <div class="col-md-5">
                    <img
                      class="w-100 img-publication"
                      src="{{ asset('images/img/knowledge_sharing_final_book.png') }}"
                      alt="Knowledge Sharing"
                      height="200"
                    />
                  </div>
                  <div class="col-md-7">
                    <div class="card-body">
                      <p class="card-text">
                        <small class="text-muted"
                          >Last updated 3 mins ago</small
                        >
                        <span class="badge badge-secondary float-right"
                          >Berita</span
                        >
                      </p>
                      <h5 class="card-title title-publication">
                        <b
                          >Manajemen Data SPBE Menentukan Kualitas Data
                          Indonesia</b
                        >
                      </h5>
                      <p class="card-text text-publication">
                        Deputi Bidang Pemantauan, Evaluasi, dan Pengendalian
                        Pembangunan Kementerian PPN/Bappenas Taufik Hanafi
                        mengatakan, tata kelola at...<i
                          ><a href>selengkapnya</a></i
                        >
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
          <!-- End Section Publication -->

          <!-- Section Guide -->
          <div class="col-md-12 order-5">
            <section class="guide">
              Pedoman
              <hr />
              <div class="row">
                <div class="my-2 mx-2">
                  <div class="img-guide-box">
                    <img
                      src="{{ asset('images/img/pedoman_pelaksanaan_ppd_2021_2.png') }}"
                      class="img-thumbnail img-guide"
                      alt="Pedoman Pelaksanaan PPD 2021"
                    />
                    <a href="" class="d-flex justify-content-center">
                      <img
                        src="{{ asset('images/img/see_more.png') }}"
                        alt="Pedoman Pelaksanaan PPD 2021"
                        class="align-self-center"
                        height="70"
                        width="70"
                      />
                    </a>
                  </div>
                </div>
                <div class="my-2 mx-2">
                  <div class="img-guide-box">
                    <img
                      src="{{ asset('images/img/pedoman_sistem_ppd_pengguna_daerah_provinsi_2.png') }}"
                      class="img-thumbnail img-guide"
                      alt="Pedoman Sistem PPD Pengguna Daerah_Provinsi"
                    />
                    <a href="" class="d-flex justify-content-center">
                      <img
                        src="{{ asset('images/img/see_more.png') }}"
                        alt="Pedoman Pelaksanaan PPD 2021"
                        class="align-self-center"
                        height="70"
                        width="70"
                      />
                    </a>
                  </div>
                </div>
                <div class="my-2 mx-2">
                  <div class="img-guide-box">
                    <img
                      src="{{ asset('images/img/pedoman_sistem_ppd_tim_penilai_teknis_2.png') }}"
                      class="img-thumbnail img-guide"
                      alt="Pedoman Sistem PPD Tim Penilai Teknis"
                    />
                    <a href="" class="d-flex justify-content-center">
                      <img
                        src="{{ asset('images/img/see_more.png') }}"
                        alt="Pedoman Pelaksanaan PPD 2021"
                        class="align-self-center"
                        height="70"
                        width="70"
                      />
                    </a>
                  </div>
                </div>
                <div class="my-2 mx-2">
                  <div class="img-guide-box">
                    <img
                      src="{{ asset('images/img/pedoman_sistem_ppd_tim_penilai_teknis_2.png') }}"
                      class="img-thumbnail img-guide"
                      alt="Pedoman Sistem PPD Tim Penilai Teknis"
                    />
                    <a href="" class="d-flex justify-content-center">
                      <img
                        src="{{ asset('images/img/see_more.png') }}"
                        alt="Pedoman Pelaksanaan PPD 2021"
                        class="align-self-center"
                        height="70"
                        width="70"
                      />
                    </a>
                  </div>
                </div>
              </div>
            </section>
          </div>
          <!-- End Section Guide -->
        </div>
        <div class="col-lg-4">
          <!-- Section Activity -->
          <div class="col-md-12 order-2">
            <section class="activity">
              Kegiatan
              <hr />
              <div class="row">
                <div class="col-6 col-md-3 col-lg-6 my-2 rounded-3">
                  <div class="card card-activity">
                    <div class="card-body">
                      <div class="col d-flex justify-content-center">
                        <img
                          class="img-fluid mb-3 w-50"
                          src="{{ asset('images/img/logo-kegiatan/ppd-min.png') }}"
                          alt="card image"
                        />
                      </div>
                      <p class="card-text text-center text-activity">
                        PENGHARGAAN PEMBANGUNAN DAERAH
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-md-3 col-lg-6 my-2 rounded-3">
                  <div class="card card-activity">
                    <div class="card-body">
                      <div class="col d-flex justify-content-center">
                        <img
                          class="img-fluid mb-3 w-50"
                          src="{{ asset('images/img/logo-kegiatan/pemantauan-min.png') }}"
                          alt="card image"
                        />
                      </div>
                      <p class="card-text text-center text-activity">
                        PEMANTAUAN PEMBANGUNAN DAERAH
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-md-3 col-lg-6 my-2 rounded-3">
                  <div class="card card-activity">
                    <div class="card-body">
                      <div class="col d-flex justify-content-center">
                        <img
                          class="img-fluid mb-3 w-50"
                          src="{{ asset('images/img/logo-kegiatan/epd-min.png') }}"
                          alt="card image"
                        />
                      </div>
                      <p class="card-text text-center text-activity">
                        EVALUASI PEMBANGUNAN DAERAH
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-md-3 col-lg-6 my-2 rounded-3">
                  <div class="card card-activity">
                    <div class="card-body">
                      <div class="col d-flex justify-content-center">
                        <img
                          class="img-fluid mb-3 w-50"
                          src="{{ asset('images/img/logo-kegiatan/koordinasi_pembangunan-min.png') }}"
                          alt="card image"
                        />
                      </div>
                      <p class="card-text text-center text-activity">
                        KOORDINASI PEMBANGUNAN
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
          <!-- End Section Activity -->

          <!-- Section Application -->
          <div class="col-md-12 order-4">
            <section class="application">
              Aplikasi
              <hr />
              <div class="card card-application my-3">
                <div class="img-application">
                  <img
                    src="{{ asset('images/img/penilaian_ppd.png') }}"
                    class="card-img-top"
                    alt="Aplikasi Penilaian PPD"
                  />
                  <div class="card-body">
                    <p class="card-text text-center">LOGIN SISTEM PENILAIAN</p>
                  </div>
                  <a href="" class="d-flex justify-content-center">
                    <img
                      class="align-self-center"
                      src="{{ asset('images/img/External_link_font_awesome.png') }}"
                      alt="Login Sistem Penilaian"
                      height="100"
                      width="100"
                    />
                  </a>
                </div>
              </div>
              <div class="card card-application my-3">
                <div class="img-application">
                  <img
                    src="{{ asset('images/img/penilaian_ppd.png') }}"
                    class="card-img-top"
                    alt="Aplikasi Penilaian PPD"
                  />
                  <div class="card-body">
                    <p class="card-text text-center">LOGIN SISTEM PENILAIAN</p>
                  </div>
                  <a href="" class="d-flex justify-content-center">
                    <img
                      class="align-self-center"
                      src="{{ asset('images/img/External_link_font_awesome.png') }}"
                      alt="Login Sistem Penilaian"
                      height="100"
                      width="100"
                    />
                  </a>
                </div>
              </div>
            </section>
          </div>
          <!-- End Section Application -->

          <!-- Section Contact Us -->
          <div class="col-md-12 order-6">
            <section class="contact-us">
              Hubungi Kami
              <hr />
              <div class="card my-3">
                <img
                  src="{{ asset('images/img/Contact-Centre-01.png') }}"
                  class="card-img-top"
                  alt="Aplikasi Penilaian PPD"
                />
                <div class="card-body">
                  <p class="card-text text-center">HUBUNGI KAMI</p>
                </div>
              </div>
            </section>
          </div>
          <!-- End Section Contact Us -->
        </div>
      </div>
    </div>
@endsection