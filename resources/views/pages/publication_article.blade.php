{{-- author  : Muhamad Munawir Amin
Email        : muhamadmunawiramin@gmail.com
Last Update  : 5 Mei 2021 --}}

@extends('pages.layouts.app')

@section('title', 'Article')

@section('content')
    <div class="container-md" style="margin-top: 8rem">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-9">
          <!-- Section Article -->
          <div class="col-md-12">
            <section class="article">
              <hr />
              <div class="card">
                <div class="card-body">
                  <div class="text-justify" style="font-size: 16px">
                    <div class="row">
                      <div class="col-sm-12 col-md-6 col-lg-6 text-left">
                        <p class="card-text">
                          <small class="text-muted"
                            >{{ $article->created_at->diffForHumans() }}</small
                          >
                          <span class="badge badge-secondary float-right"
                            >{{ $article->category->name }}</span
                          >
                        </p>
                        <h3>
                          {{ $article->title }}
                        </h3>
                        <p>
                          <a href="">
                            <span class="badge badge-secondary my-1 mt-xl-3 mr-3" style="float: left; background-color: #1877F2">
                              <i class="fa fa-facebook-official" aria-hidden="true"></i>
                              Share on Facebook
                            </span>
                          </a>
                          <a href="">
                            <span class="badge badge-secondary my-1 mt-xl-3" style="float: left; background-color: #1B95E0;">
                              <i class="fa fa-twitter" aria-hidden="true"></i>
                              Share on Twitter
                            </span>
                          </a>
                      </p>
                      </div>
                      <div class="col-sm-12 col-md-6 col-lg-6">
                        <img
                          class="img-thumbnail"
                          src="{{ asset('images/summernote/'.$article->slug.'/'.$article->title_picture) }}"
                          alt="{{ $article->title }}"
                          height="300"
                          width="300"
                        />
                      </div>
                    </div>
                    <hr />
                    <div class="col-lg-12">
                      <p>{!! $article->text !!}</p>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
          <!-- End Section Article -->
        </div>
      </div>
    </div>
@endsection