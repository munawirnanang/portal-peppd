@extends('admin.layouts.app')

@section('title', 'Guide')

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
            <a href="{{ url('guidelines/create') }}" class="btn @if (Request::segment(2) == 'create') btn-primary @else btn-outline-primary @endif">Add</a>
            <h1 class="mr-2 float-left">Guide</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Guide</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid" style="width: 100%; margin-right: 0px;">
            <div class="col-md-12">

                <div class="d-flex justify-content-center my-4">
                    <div class="input-group mb-2" style="width: 60%;">
                        <input type="text" style="border-radius: 1rem;" class="form-control" id="guide_search" placeholder="Cari Pedoman...">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">

                    <div class="row guide-list-row" style="width: 95%; float: right;">
                        <!-- <div class="col-sm-12">
                            <h5 style="padding: 10px;"><b>2020</b></h5>
                        </div> -->

                        @foreach($list_guides as $list)
                        <div class="col-md-6">
                            <div class="card sm-12 guide-list-content-card">
                                <!-- <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" style="height: 180px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1786379deb1%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1786379deb1%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1875%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true"> -->
                                <img class="card-img-top" src="{{ asset('file_guide/'.Str::slug($list->name, '-').'/'.$list->title_picture) }}" alt="{{ $list->title_picture }}" width="286" height="180" data-holder-rendered="true">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $list->name }}</h5>
                                    <p class="card-text">{{ $list->description }}</p>
                                    <a href="{{ url('guidelines/'.$list->id.'/edit') }}" class="btn btn-outline-warning">Edit</a>
                                    <form action="{{ url('guidelines/'.$list->id) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                </div>
                <div class="col-md-4">

                    <!-- Form Create Guide -->
                    <div id="form-create-guide">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><b>Create Guide</b></h3>
                                <a href="{{ url('guidelines') }}" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ url('guidelines') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="create_category">Category</label>
                                    <i class="fa fa-edit" data-toggle="modal" data-target="#crudCategoryModal" style="color: #007bff;"></i>
                                    <select class="form-control @error('id_category') is-invalid @enderror listCategory" id="create_category" name="id_category" value="{{ old('id_category') }}" required>
                                    </select>
                                    @error('id_category')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="create_name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="create_name" name="name" placeholder="Enter Name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="create_description">Description</label>
                                    <textarea class="form-control" id="create_description" name="description" rows="2">{{ old('description') }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="create_title_picture">Cover Picture</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" id="create_title_picture" name="title_picture" accept="image/*" value="{{ old('title_picture') }}">
                                                    <label class="custom-file-label" for="create_title_picture">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <img id="preview_create_title_picture" alt="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="create_file">File</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="create_file" name="file" value="{{ old('file') }}">
                                            <label class="custom-file-label" for="create_file">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><b>Add</b></button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Form Create Guide -->

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal -->
<div class="modal fade" id="crudCategoryModal" tabindex="-1" role="dialog" aria-labelledby="crudCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #007bff; color: white;">
        <h5 class="modal-title" id="crudCategoryModalLabel" style="text-align: center;">Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="tableCategory">
        
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
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
        $("#guide_search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".guide-list-content-card").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

<script>
    $(document).ready(function(){

        $(window).scroll(function() {
            var scrolled = $(window).scrollTop();
            var widthcontainer = $('.content').width();
            
            if (scrolled > 400) {
                $("#form-create-guide").addClass("position-fixed");
                $("#form-create-guide").css({'top' : '0', 'width' : (32 * widthcontainer) / 100, 'margin-top' : '1%'});
            }else{
                $("#form-create-guide").removeClass("position-fixed");
                $("#form-create-guide").css({'top' : '', 'width' : '', 'margin-top' : ''});
            }
        });

    });
</script>

<script>
    $(document).ready(function() {

        var numberRow = 0;

        $('#crudCategoryModal').ready(function() {

            $.get( "{{ url('category/index') }}", function(result) {
                var tableDisplay = '';
                    tableDisplay += '<button class="btn btn-xs btn-outline-primary float-right my-2 addRowCategory">Add</button>';
                    tableDisplay += '<table class="table table-striped table-bordered">';
                    tableDisplay += '<thead>';
                    tableDisplay += '<tr>';
                    tableDisplay += '<th scope="col">Category</th>';
                    tableDisplay += '<th scope="col">Action</th>';
                    tableDisplay += '</tr>';
                    tableDisplay += '</thead>';
                    tableDisplay += '<tbody>';
                $.each(result, function(key, value) {
                    tableDisplay += '<tr id="row-'+numberRow+'">';
                    tableDisplay += '<td>'+value.name+'</td>';
                    tableDisplay += '<td>';
                    tableDisplay += '<button class="btn btn-xs btn-outline-warning editCategory" data-row="'+numberRow+'" data-id="'+value.id+'" data-name="'+value.name+'">Edit</button> ';
                    tableDisplay += '<button class="btn btn-xs btn-outline-danger deleteCategory" data-row="'+numberRow+'" data-id="'+value.id+'">Delete</button>';
                    tableDisplay += '</td>';
                    tableDisplay += '</tr>';
                    numberRow++;
                });
                tableDisplay += '</tbody>';
                tableDisplay += '</table>';
                $('#tableCategory').append(tableDisplay);
            })
            .fail(function(result) {
                console.log(result);
            });
        });
        
        $(document).on('click', '.addRowCategory', function() {
            var rowCategory = '';
            rowCategory += '<tr id="row-'+numberRow+'">';
            rowCategory += '<td><input type="text" class="form-control" id="add_category_'+numberRow+'" data-row="'+numberRow+'" name="name" placeholder="Enter Category" required/></td>';
            rowCategory += '<td>';
            rowCategory += '<button class="btn btn-xs btn-outline-primary saveCategory" data-row="'+numberRow+'">Save</button> ';
            rowCategory += '<button class="btn btn-xs btn-outline-danger deleteRowCategory" data-row="'+numberRow+'">Delete</button>';
            rowCategory += '</td>';                    
            rowCategory += '</tr>';
            $('#tableCategory table tbody').prepend(rowCategory);
            // $('#add_category_'+numRow).focus();
            $('input[id^="add_category_"]').focus();
            numberRow++;
        }); 

        $(document.activeElement).keypress(function(e){
            var dataRow = $(document.activeElement).attr("data-row");
            if(e.which == 13) {
                $('.saveCategory[data-row="'+dataRow+'"]').click();
            }
        });

        $(document).on('click', '.saveCategory', function () {
            var dataRow = $(this).attr("data-row");
            var add_data_category = $('#add_category_'+dataRow).val();
            $.post( "{{ url('category/store') }}", { name: add_data_category }, function(result) {
                var rowCategory = '';
                    rowCategory += '<td>'+result.name+'</td>';
                    rowCategory += '<td>';
                    rowCategory += '<button class="btn btn-xs btn-outline-warning editCategory" data-row="'+dataRow+'" data-id="'+result.id+'" data-name="'+result.name+'">Edit</button> ';
                    rowCategory += '<button class="btn btn-xs btn-outline-danger deleteCategory" data-row="'+dataRow+'" data-id="'+result.id+'">Delete</button>';
                    rowCategory += '</td>';
                $('#row-'+dataRow).html(rowCategory);
                $('input[id^="add_category_"]').focus();
            })
            .fail(function(result) {
                $('#add_category_'+dataRow).focus();
                $('#add_category_'+dataRow).removeClass("is-invalid").addClass("is-invalid");
                $('#error_feedback_'+dataRow).remove();
                $('#add_category_'+dataRow).after('<div class="invalid-feedback" id="error_feedback_'+dataRow+'">'+result.responseJSON.errors.name+'</div>');
            });
        });

        $(document).on('click', '.editCategory', function () {
            var dataRow = $(this).attr("data-row");
            var dataId = $(this).attr("data-id");
            var dataName = $(this).attr("data-name");
            var rowCategory = '';
                rowCategory += '<td><input type="text" class="form-control" id="edit_category_'+dataRow+'" data-row="'+dataRow+'" name="name" placeholder="Enter Category" required/></td>';
                rowCategory += '<td>';
                rowCategory += '<button class="btn btn-xs btn-outline-primary updateCategory" data-row="'+dataRow+'" data-id="'+dataId+'">Update</button> ';
                rowCategory += '<button class="btn btn-xs btn-outline-danger backCategory" data-row="'+dataRow+'" data-id="'+dataId+'" data-name="'+dataName+'">Back</button>';
                rowCategory += '</td>';
            // alert(dataId);
            $('#row-'+dataRow).html(rowCategory); 
            $('#edit_category_'+dataRow).val(dataName); 
            $('#edit_category_'+dataRow).focus(); 

        });

        $(document.activeElement).keypress(function(e){
            var dataRow = $(document.activeElement).attr("data-row");
            if(e.which == 13) {
                $('.updateCategory[data-row="'+dataRow+'"]').click();
            }
        });

        $(document).on('click', '.updateCategory', function () {
            var dataRow = $(this).attr("data-row");
            var dataId = $(this).attr("data-id");
            var value_category = $('#edit_category_'+dataRow).val();
            $.ajax({
                type: "PUT",
                url: "{{ url('category/update') }}",
                data: { id: dataId, name: value_category },
                success: function(result) {
                    var rowCategory = '';
                        rowCategory += '<td>'+result.name+'</td>';
                        rowCategory += '<td>';
                        rowCategory += '<button class="btn btn-xs btn-outline-warning editCategory" data-row="'+dataRow+'" data-id="'+result.id+'" data-name="'+result.name+'">Edit</button> ';
                        rowCategory += '<button class="btn btn-xs btn-outline-danger deleteCategory" data-row="'+dataRow+'" data-id="'+result.id+'">Delete</button>';
                        rowCategory += '</td>';
                    $('#row-'+dataRow).html(rowCategory);
                    $('input[id^="add_category_"]').focus();
                    // console.log(result);
                },
                error: function(result) {
                    $('#edit_category_'+dataRow).focus();
                    $('#edit_category_'+dataRow).removeClass("is-invalid").addClass("is-invalid");
                    $('#error_feedback_'+dataRow).remove();
                    $('#edit_category_'+dataRow).after('<div class="invalid-feedback" id="error_feedback_'+dataRow+'">'+result.responseJSON.errors.name+'</div>');
                    // console.log(result);
                }
            });

        });

        $(document).on('click', '.backCategory', function () {
            var dataRow = $(this).attr("data-row");
            var dataId = $(this).attr("data-id");
            var dataName = $(this).attr("data-name");

            var rowCategory = '';
                rowCategory += '<td>'+dataName+'</td>';
                rowCategory += '<td>';
                rowCategory += '<button class="btn btn-xs btn-outline-warning editCategory" data-row="'+dataRow+'" data-id="'+dataId+'" data-name="'+dataName+'">Edit</button> ';
                rowCategory += '<button class="btn btn-xs btn-outline-danger deleteCategory" data-row="'+dataRow+'" data-id="'+dataId+'">Delete</button>';
                rowCategory += '</td>';
            $('#row-'+dataRow).html(rowCategory);
            $('input[id^="add_category_"]').focus();
        });

        $(document).on('click', '.deleteRowCategory', function () {
            var dataRow = $(this).attr("data-row");
            $('#row-'+dataRow).remove();
        });

        $(document).on('click', '.deleteCategory', function () {

            var confirmDelete = confirm("Are you sure you want to delete this record?");

            var dataId = $(this).attr("data-id");
            var dataRow = $(this).attr("data-row");
            
            if (confirmDelete == true) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('category/delete') }}",
                    data: { id: dataId },
                    success: function(result) {
                        // console.log('sukses');
                        $('#row-'+dataRow).remove();
                    },
                    error: function(result) {
                        console.log('gagal');
                    }
                });
            }

        });

    });
</script>

<script>
    $(document).ready(function () {
   
        listCategoryFunction();

        $('#crudCategoryModal').on('hidden.bs.modal', function () {
            listCategoryFunction();
        });
        
    });

    function listCategoryFunction(){
        $.ajax({
            type: "GET",
            url: "{{ url('category/index') }}",
            success: function(result) {
                var listCategory = '';
                    listCategory += '<option value="" selected disabled>Select a category</option>';
                $.each(result, function( key, index ) {
                    listCategory += '<option value="'+index.id+'">'+index.name+'</option>';
                });
                $('.listCategory').html(listCategory);
            },
            error: function(result) {
                console.log(result);
            }
        });
    }
</script>

<script type="text/javascript">   
    $(document).ready(function (e) {
        $('#create_title_picture').change(function(){

            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview_create_title_picture').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]); 

            $("#preview_create_title_picture").css({"max-height" : "200px", "margin-top" : "10px"});
            $("#preview_create_title_picture").addClass("img-thumbnail");
            $("#preview_create_title_picture").attr("alt", this.value.replace(/C:\\fakepath\\/i, ''));

        });
    });
</script>

@endpush