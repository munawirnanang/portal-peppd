@extends('admin.layouts.app')

@section('title', 'Article')

@section('content')

@push('style')
    <style>
        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            opacity: 0;
            transition: 0.3s ease;
            background-color: black;
        }

        .article-list-content-card:hover .overlay {
            opacity: 0.7;
        }

        .icon {
            color: black;
            font-size: 100px;
            position: absolute;
            top: 50%;
            left: 25%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .icon-2 {
            color: black;
            font-size: 100px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .icon-3 {
            color: black;
            font-size: 100px;
            position: absolute;
            top: 50%;
            left: 75%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }
    </style>
@endpush

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="{{ url('article/create') }}" class="btn btn-outline-primary">Add</a>
            <h1 class="mr-2 float-left">Article</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Article</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" style="width: 90%;">

        <div class="d-flex justify-content-center my-4">
            <div class="input-group mb-2" style="width: 60%;">
                <input type="text" style="border-radius: 1rem;" class="form-control" id="article_search" placeholder="Cari Publikasi...">
            </div>
        </div>

        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link active" id="nav-publish-tab" data-toggle="tab" href="#nav-publish" role="tab" aria-controls="nav-publish" aria-selected="true">Publish</a>
            <a class="nav-link" id="nav-draft-tab" data-toggle="tab" href="#nav-draft" role="tab" aria-controls="nav-draft" aria-selected="false">draft</a>
            <!-- <a class="nav-link" id="nav-trash-tab" data-toggle="tab" href="#nav-trash" role="tab" aria-controls="nav-trash" aria-selected="false">trash</a> -->
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" style="padding: 10px;" id="nav-publish" role="tabpanel" aria-labelledby="nav-publish-tab">
            
            <div class="row article-list-row-publish">
                <!-- <div class="col-sm-12">
                    <h5 style="padding: 10px;"><b>2020</b></h5>
                </div> -->
                @foreach($list_articles as $list)

                @if($list->status == 'publish')
                <div class="card sm-12 article-list-content-card" id="article-content-{{ $list->id }}">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img src="{{ asset('images/summernote/'.$list->slug.'/'.$list->title_picture) }}" width="273" height="245" class="card-img" alt="{{ $list->title }}">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <p class="card-text">
                                    <i>{{ $list->created_at->diffForHumans() }}</i>
                                    <span class="badge badge-secondary float-right">{{ $list->category->name }}</span>
                                </p>
                                <h5 class="card-title"><b>{{ $list->title }}</b></h5>
                                <p class="card-text">{{ Str::limit($list->description, 110) }} <i><a target="_blank" rel="noopener" href="{{ url('publication/'.$list->slug) }}" title="{{ $list->title }}">selengkapnya</a></i></p>
                                  <button class="btn btn-outline-secondary changeStatusArticle" data-id="{{ $list->id }}" data-status="draft">draft</button>
                                  <a href="{{ url('article/'.$list->slug.'/edit') }}" class="btn btn-outline-warning">Edit</a>
                                  <form action="{{ url('article/'.$list->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="overlay">
                        <a href="#" class="icon" title="Read More">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="#" class="icon-2" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="#" class="icon-3" title="Delete">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div> --}}
                </div>
                @endif

                @endforeach
            </div>
          
          </div>
          <div class="tab-pane fade" style="padding: 10px;" id="nav-draft" role="tabpanel" aria-labelledby="nav-draft-tab">
          
            <div class="row article-list-row-draft">
                <!-- <div class="col-sm-12">
                    <h5 style="padding: 10px;"><b>2020</b></h5>
                </div> -->
                @foreach($list_articles as $list)

                @if($list->status == 'draft')
                <div class="card sm-12 article-list-content-card" id="article-content-{{ $list->id }}">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img src="{{ asset('images/summernote/'.$list->slug.'/'.$list->title_picture) }}" width="273" height="245" class="card-img" alt="{{ $list->title }}">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <p class="card-text">
                                    <i>{{ $list->created_at->diffForHumans() }}</i>
                                    <span class="badge badge-secondary float-right">{{ $list->category->name }}</span>
                                </p>
                                <h5 class="card-title"><b>{{ $list->title }}</b></h5>
                                <p class="card-text">{{ Str::limit($list->description, 110) }} <i><a target="_blank" rel="noopener" href="{{ url('publication/'.$list->slug) }}" title="{{ $list->title }}">selengkapnya</a></i></p>
                                  <button class="btn btn-outline-secondary changeStatusArticle" data-id="{{ $list->id }}" data-status="publish">publish</button>
                                  <a href="{{ url('article/'.$list->slug.'/edit') }}" class="btn btn-outline-warning">Edit</a>
                                  <form action="{{ url('article/'.$list->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="overlay">
                        <a href="#" class="icon" title="Read More">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="#" class="icon-2" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="#" class="icon-3" title="Delete">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div> --}}
                </div>
                @endif

                @endforeach
            </div>

          </div>
          <div class="tab-pane fade" style="padding: 10px;" id="nav-trash" role="tabpanel" aria-labelledby="nav-trash-tab">
          
            <div class="row article-list-row-trash">
                <!-- <div class="col-sm-12">
                    <h5 style="padding: 10px;"><b>2020</b></h5>
                </div> -->
                @foreach($list_articles as $list)

                @if($list->status == 'trash')
                <div class="card sm-12 article-list-content-card" id="article-content-{{ $list->id }}">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img src="{{ asset('images/summernote/'.$list->slug.'/'.$list->title_picture) }}" width="273" height="245" class="card-img" alt="{{ $list->title }}">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <p class="card-text">
                                    <i>{{ $list->created_at->diffForHumans() }}</i>
                                    <span class="badge badge-secondary float-right">{{ $list->category->name }}</span>
                                </p>
                                <h5 class="card-title"><b>{{ $list->title }}</b></h5>
                                <p class="card-text">{{ Str::limit($list->description, 110) }} <i><a target="_blank" rel="noopener" href="{{ url('publication/'.$list->slug) }}" title="{{ $list->title }}">selengkapnya</a></i></p>
                                  <button class="btn btn-outline-secondary changeStatusArticle" data-id="{{ $list->id }}" data-status="draft">draft</button>
                                  <a href="{{ url('article/'.$list->slug.'/edit') }}" class="btn btn-outline-warning">Edit</a>
                                  <form action="{{ url('article/'.$list->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="overlay">
                        <a href="#" class="icon" title="Read More">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="#" class="icon-2" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="#" class="icon-3" title="Delete">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div> --}}
                </div>
                @endif

                @endforeach
            </div>

          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection

@push('script')

<script>
  $(document).ready(function(){
    @if (session('status'))

      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      });

      Toast.fire({
        icon: 'success',
        title: '{{ session('status') }}'
      });

    @endif
  });
</script>

<script>
    $(document).ready(function(){
        $("#article_search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".article-list-content-card").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

<script>
  $(document).ready(function(){

    $(document).on('click', '.changeStatusArticle', function() {
      var dataId = $(this).attr("data-id");
      var dataStatus = $(this).attr("data-status");

      $.ajax({
          type: "POST",
          url: "{{ url('article/updateStatus') }}",
          data: { id: dataId, status: dataStatus },
          success: function(result) {
              // console.log(result);
              $('#article-content-'+dataId).remove();

              if(result[0].status == 'publish') {
                var status = 'draft';
              }else if(result[0].status == 'draft') {
                var status = 'publish';
              }
              
              var APP_URL = {!! json_encode(url('/')) !!};
              var listArticle = '';
                  listArticle += '<div class="card sm-12 article-list-content-card" id="article-content-'+result[0].id+'">';
                  listArticle += '<div class="row no-gutters">';

                  listArticle += '<div class="col-md-5">';
                  listArticle += '<img src="'+APP_URL+'/images/summernote/'+result[0].slug+'/'+result[0].title_picture+'" width="273" height="245" class="card-img" alt="'+result[0].title+'">';
                  listArticle += '</div>';

                  listArticle += '<div class="col-md-7">';
                  listArticle += '<div class="card-body">';
                  
                  listArticle += '<p class="card-text">';
                  listArticle += '<i>'+result[0].created_at+'</i>';
                  listArticle += '<span class="badge badge-secondary float-right">'+result[0].id_category+'</span>';
                  listArticle += '</p>';
                  listArticle += '<h5 class="card-title"><b>'+result[0].title+'</b></h5>';
                  listArticle += '<p class="card-text">'+result[0].description+'...<i><a target="_blank" rel="noopener" href="'+APP_URL+'/publication/'+result[0].slug+'" title="'+result[0].title+'">selengkapnya</a></i></p>';
                  listArticle += '<button class="btn btn-outline-secondary changeStatusArticle" data-id="'+result[0].id+'" data-status="'+status+'">'+status+'</button> ';
                  listArticle += '<a href="'+APP_URL+'/article/'+result[0].slug+'/edit" class="btn btn-outline-warning">Edit</a> ';
                  listArticle += '<form action="/article/'+result[0].id+'" method="post" class="d-inline">';
                  listArticle += '<input type="hidden" name="_method" value="delete">';
                  listArticle += '@csrf';
                  listArticle += '<button type="submit" class="btn btn-outline-danger" onclick="return confirm(`Are you sure you want to delete this item?`)">Delete</button> ';
                  listArticle += '</form>';

                  listArticle += '</div>';
                  listArticle += '</div>';
                  
                  listArticle += '</div>';
                  listArticle += '</div>';

              if(result[0].status == 'publish'){
                $('.article-list-row-publish').append(listArticle);
              }else if(result[0].status == 'draft'){
                $('.article-list-row-draft').append(listArticle);
              }
          },
          error: function(result) {
              console.log(result);
          }
      });

    });

  });
</script>

@endpush