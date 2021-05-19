{{-- author  : Muhamad Munawir Amin
Email        : muhamadmunawiramin@gmail.com
Last Update  : 5 Mei 2021 --}}

@extends('pages.layouts.app')

@section('title', 'Home')

@section('content')
  <div class="dekstop">
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
            <a href="{{ url('publication') }}" style="color: black;">
              Berita
              <i class="fa fa-angle-double-right" aria-hidden="true"></i>
              </a>
              <hr />
              @foreach($articles as $article)
              <div class="card mb-3">
                <div class="row no-gutters">
                  <div class="col-md-5">
                    <img
                      class="w-100 img-publication"
                      src="{{ asset('images/summernote/'.$article->slug.'/'.$article->title_picture) }}"
                      alt="{{ $article->title }}"
                    />
                  </div>
                  <div class="col-md-7">
                    <div class="card-body">
                      <p class="card-text">
                        <small class="text-muted"
                          >{{ $article->created_at->diffForHumans() }}</small
                        >
                        <span class="badge badge-secondary float-right"
                          >{{ $article->category->name }}</span
                        >
                      </p>
                      <h5 class="card-title title-publication">
                        <b
                          >{{ $article->title }}</b
                        >
                      </h5>
                      <p class="card-text text-publication">
                        {!! Str::limit($article->text, 130) !!}
                        <i><a target="_blank" rel="noopener" href="{{ url('publication/'.$article->slug) }}" title="{{ $article->title }}">selengkapnya</a></i>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </section>
          </div>
          <!-- End Section Publication -->

          <!-- Section Guide -->
          <div class="col-md-12 order-5">
            <section class="guide">
              <a href="{{ url('guide') }}" style="color: black;">
                Publikasi
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
              </a>
              <hr />
              <div class="row">
                @foreach($list_guides as $list)
                <div class="my-2 mx-2">
                  <div class="img-guide-box">
                    <img
                      src="{{ asset('file_guide/'.Str::slug($list->name, '-').'/'.$list->title_picture) }}"
                      class="img-thumbnail img-guide"
                      alt="{{ $list->name }}"
                    />
                    <a href="" class="d-flex justify-content-center">
                      <img
                        src="{{ asset('images/img/see_more.png') }}"
                        alt="Download {{ $list->name }}"
                        class="align-self-center"
                        height="70"
                        width="70"
                      />
                    </a>
                  </div>
                </div>
                @endforeach
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
                      <div class="box-img-activity col d-flex justify-content-center">
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
                      <div class="box-img-activity col d-flex justify-content-center">
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
                      <div class="box-img-activity col d-flex justify-content-center">
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
                      <div class="box-img-activity col d-flex justify-content-center">
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
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSfcACkyqgiSTD7QrSYHBXxg47xwenTZfi7ofACM598Kjg8Jzw/viewform?usp=pp_url" target="_blank">
                  <img
                    src="{{ asset('images/img/Contact-Centre-01.png') }}"
                    class="card-img-top"
                    alt="Aplikasi Penilaian PPD"
                  />
                  <div class="card-body">
                    <p class="card-text text-center">HUBUNGI KAMI</p>
                  </div>
                </a>
              </div>
            </section>
          </div>
          <!-- End Section Contact Us -->
        </div>
      </div>
    </div>
  </div>

  <div class="mobile">
    <div class="container-fluid" style="width: 90%; margin-top: 7rem">
      <div class="row">
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
            <a href="{{ url('publication') }}" style="color: black;">
              Publikasi
              <i class="fa fa-angle-double-right" aria-hidden="true"></i>
            </a>
            <hr />
            @foreach($articles as $article)
            <div class="card mb-3">
              <div class="row no-gutters">
                <div class="col-md-5">
                  <img
                    class="w-100 img-publication"
                    src="{{ asset('images/summernote/'.$article->slug.'/'.$article->title_picture) }}"
                    alt="{{ $article->title }}"
                  />
                </div>
                <div class="col-md-7">
                  <div class="card-body">
                    <p class="card-text">
                      <small class="text-muted"
                        >{{ $article->created_at->diffForHumans() }}</small
                      >
                      <span class="badge badge-secondary float-right"
                        >{{ $article->category->name }}</span
                      >
                    </p>
                    <h5 class="card-title title-publication">
                      <b
                        >{{ $article->title }}</b
                      >
                    </h5>
                    <p class="card-text text-publication">
                      {!! Str::limit($article->text, 130) !!}
                      <i><a target="_blank" rel="noopener" href="{{ url('publication/'.$article->slug) }}" title="{{ $article->title }}">selengkapnya</a></i>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </section>
        </div>
        <!-- End Section Publication -->

        <!-- Section Guide -->
        <div class="col-md-12 order-5">
          <section class="guide">
            <a href="{{ url('guide') }}" style="color: black">
              Pedoman
              <i class="fa fa-angle-double-right" aria-hidden="true"></i>
            </a>
            <hr />
            <div class="row">
              @foreach($list_guides as $list)
              <div class="my-2 mx-2">
                <div class="img-guide-box">
                  <img
                    src="{{ asset('file_guide/'.Str::slug($list->name, '-').'/'.$list->title_picture) }}"
                    class="img-thumbnail img-guide"
                    alt="{{ $list->name }}"
                  />
                  <a href="" class="d-flex justify-content-center">
                    <img
                      src="{{ asset('images/img/see_more.png') }}"
                      alt="Download {{ $list->name }}"
                      class="align-self-center"
                      height="70"
                      width="70"
                    />
                  </a>
                </div>
              </div>
              @endforeach
            </div>
          </section>
        </div>
        <!-- End Section Guide -->
        <!-- Section Activity -->
        <div class="col-md-12 order-2">
          <section class="activity">
            Kegiatan
            <hr />
            <div class="row">
              <div class="col-6 col-md-3 col-lg-6 my-2 rounded-3">
                <div class="card card-activity">
                  <div class="card-body">
                    <div class="box-img-activity col d-flex justify-content-center">
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
                    <div class="box-img-activity col d-flex justify-content-center">
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
                    <div class="box-img-activity col d-flex justify-content-center">
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
                    <div class="box-img-activity col d-flex justify-content-center">
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
                  <p class="card-text text-center">LOGIN SISTEM PENILAIAN PPD</p>
                </div>
                <a href="https://peppd.bappenas.go.id/ppd2021/" target="_blank" class="d-flex justify-content-center">
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
                  src="{{ asset('images/img/pemantauan.png') }}"
                  class="card-img-top"
                  alt="Aplikasi Penilaian PPD"
                />
                <div class="card-body">
                  <p class="card-text text-center">LOGIN SISTEM PEMANTAUAN</p>
                </div>
                <a href="https://peppd.bappenas.go.id/pemantauan/" target="_blank" class="d-flex justify-content-center">
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
              <a href="https://docs.google.com/forms/d/e/1FAIpQLSfcACkyqgiSTD7QrSYHBXxg47xwenTZfi7ofACM598Kjg8Jzw/viewform?usp=pp_url" target="_blank">
                <img
                  src="{{ asset('images/img/Contact-Centre-02.png') }}"
                  class="card-img-top"
                  alt="Aplikasi Penilaian PPD"
                />
                <div class="card-body">
                  <p class="card-text text-center">HUBUNGI KAMI</p>
                </div>
              </a>
            </div>
          </section>
        </div>
        <!-- End Section Contact Us -->
      </div>
    </div>
  </div>
@endsection