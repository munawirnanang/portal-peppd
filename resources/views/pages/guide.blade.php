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
      </div>
    </div>
@endsection