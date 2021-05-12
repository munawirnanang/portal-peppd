{{-- author  : Muhamad Munawir Amin
Email        : muhamadmunawiramin@gmail.com
Last Update  : 5 Mei 2021 --}}

@extends('pages.layouts.app')

@section('title', 'Publication')

@section('content')
    <div class="container-md" style="margin-top: 8rem">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-10">
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
                        id="publication_search"
                      />
                      <div class="input-group-append">
                        <button
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

              @foreach($articles as $article)
              <div class="publication-list-content-card card mb-3">
                <div class="row no-gutters">
                  <div class="col-md-5">
                    <img
                      class="w-100 img-publication"
                      src="{{ asset('images/summernote/'.$article->slug.'/'.$article->title_picture) }}"
                      alt="Knowledge Sharing"
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
                        {!! Str::limit($article->text, 170) !!}
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
        </div>
      </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function(){
            $("#publication_search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                // $(".publication-list-row").filter(function() {
                $(".publication-list-content-card").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endpush