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
                    <button type="button" class="btn btn-info ml-3 mt-3 btn-sm">
                      Page Hint <span class="badge badge-light">{{count($page_hint)}}</span>
                      <span class="sr-only">people see this article</span>
                    </button>
                    <hr />
                    <h5 class="ml-3 mb-4">Artikel Terkait</h5>
                    <ul style="font-size: 14px;">
                      <li><a href="#">Manajemen Data SPBE Menentukan Kualitas Data Indonesia</a></li>
                      <li><a href="#">Bappenas Wujudkan Transformasi Digital Melalui Satu Data Indonesia untuk PEN</a></li>
                      <li><a href="#">Program Beasiswa SPIRIT 2013 Banyak Peminatnya</a></li>
                      <li><a href="#">Kunjungan Kerja Menteri PPN/Kepala Bappenas Ke Mako Armada Timur TNI AL dan PT. PAL di Surabaya, serta Divisi Munisi - PT.PINDAD Malang</a></li>
                    </ul>
                    <hr />
                    <h5 class="mx-3 mb-4">Komentar</h5>
                    <div class="card mx-3" style="background-color: #F0F0E1;">
                      <div class="card-body">
                        <h6 class="card-title">Tinggalkan Komentar</h6>
                        <hr />
                        <form id="form-comment">
                          <div class="row">
                            {!! csrf_field() !!}
                            <input type="hidden" id="id_article" name="id_article" value="{{ $article->id }}">
                            <div class="col-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Anda">
                              </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                <label for="comment">Komentar</label>
                                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                              </div>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-outline-secondary btn-sm float-right btn-comment-submit">Kirim</button>
                        </form>
                      </div>
                    </div>
                    <hr />
                    <div class="box-comment">
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

@push('script')
  <script>
    $(document).ready(function() {

      list_comment();

      function list_comment() {
        var id_article = {{ $article->id }};
        $.ajax({
          type: "POST",
          url: "{{ url('comment/index') }}",
          data: {
            "_token": "{{ csrf_token() }}", 
            id_article: id_article,
          },
          success: function(result) {
            console.log(result);
            $(".card-box-comment").remove();
            var boxComment = '';
            $.each(result, function(key, value) {
              boxComment += '<div class="card card-box-comment my-2">';
              boxComment += '<div class="card-body">';
              boxComment += '<p class="card-text">';
              boxComment += '<small class="text-muted">'+value.name+'</small>';
              boxComment += '<small class="text-muted float-right">'+value.created_at+'</small>';
              boxComment += '</p>';
              boxComment += '<p class="card-text">'+value.comment+'</p>';
              boxComment += '</div>';
              boxComment += '</div>';
            });
            $('.box-comment').append(boxComment);
          },
          error: function(result) {
            console.log(result);
          }
        });
      }


      $('#form-comment').submit(function(e) {
        $('.btn-comment-submit').append( ' <i class="fa fa-spinner fa-spin icon-comment-loading"></i>' );
        e.preventDefault();
        var formData = $(this).serialize(); 
        $.ajax({
            type: "POST",
            url: "{{ url('comment/store') }}",
            data: formData,
            success: function(result) {
              console.log(result);
              $('#form-comment').trigger("reset");
              $(".icon-comment-loading").remove();

              list_comment();
            },
            error: function(result) {
              console.log(result);
            }
        });
      });
    });
  </script>
@endpush