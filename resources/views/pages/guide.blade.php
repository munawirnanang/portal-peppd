{{-- author  : Muhamad Munawir Amin
Email        : muhamadmunawiramin@gmail.com
Last Update  : 5 Mei 2021 --}}

@extends('pages.layouts.app')

@section('title', 'Guide')

@section('content')
    <div class="container-fluid" style="width: 90%; margin-top: 8rem">
      <div class="row">
        <div class="col-lg-12">
          <!-- Section Guide -->
          <div class="col-md-12">
            <section class="guide">
              <!-- Search Box -->
              <div class="d-flex justify-content-center">
                <div class="col-12 col-lg-8">
                  <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                    <div class="input-group">
                      <input
                        type="search"
                        placeholder='Cari "PPD" atau "Knowledge Sharing"'
                        aria-describedby="button-addon1"
                        class="form-control border-0"
                        style="border-radius: 27px"
                      />
                      <div class="input-group-append">
                        <button
                          id="button-addon1"
                          type="submit"
                          class="btn btn-link text-primary"
                        >
                          <i class="fa fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Search Box -->
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
                        alt="Pedoman Sistem PPD Pengguna Daerah Provinsi"
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
                        alt="Pedoman Sistem PPD Tim Penilai Teknis"
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
                        alt="Pedoman Sistem PPD Tim Penilai Teknis"
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
      </div>
    </div>
@endsection