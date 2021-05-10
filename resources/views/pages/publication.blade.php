{{-- author  : Muhamad Munawir Amin
Email        : muhamadmunawiramin@gmail.com
Last Update  : 5 Mei 2021 --}}

@extends('pages.layouts.app')

@section('title', 'Publication')

@section('content')
    <div class="container-md" style="margin-top: 8rem">
      <div class="row">
        <div class="col-lg-12">
          <!-- Section Publication -->
          <div class="col-md-12">
            <section class="publication">
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
        </div>
      </div>
    </div>
@endsection