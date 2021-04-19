@extends('admin.layouts.app')

@section('title', 'Edit Article')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="{{ url('article/create') }}" class="btn @if (Request::segment(2) == 'create') btn-primary disabled @else btn-outline-primary @endif">Add</a>
            <h1 class="mr-2 float-left">Article</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('article') }}">Article</a></li>
              <li class="breadcrumb-item active">Edit Article</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" style="width: 85%;">
    
        <div class="card">
            <div class="card-header  text-center" style="background-color: #007bff; color: white;">
                <b>EDIT ARTICLE</b>
            </div>
            <form action="{{ url('article/'.$article->slug) }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="create_category">Category </label>
                                <i class="fa fa-edit" data-toggle="modal" data-target="#crudCategoryModal" style="color: #007bff;"></i>
                                <select class="form-control @error('category') is-invalid @enderror listCategory" id="create_category" name="id_category" required>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="create_title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="create_title" name="title" placeholder="Enter Title" value="{{ $article->title }}" required>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="create_description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="create_description" name="description" rows="3">{{ $article->description }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="create_title_picture">Title Picture</label>
                                <input type="file" class="form-control-file @error('title_picture') is-invalid @enderror" id="create_title_picture" name="title_picture" value="{{ $article->title_picture }}">
                                @error('title_picture')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @if($article->title_picture == NULL)
                                    <img id="preview_create_title_picture" alt="">
                                @else
                                <img id="preview_create_title_picture" src="{{ asset('images/summernote/'.$article->slug.'/'.$article->title_picture) }}" alt="{{ $article->title_picture }}" class="img-thumbnail" style="max-height: 200px; margin-top: 10px;">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="create_text">Text</label>
                        <textarea id="create_article_summernote" name="text">{{ $article->text }}</textarea>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
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
                    listCategory += '<option value="" disabled>Select a category</option>';
                $.each(result, function( key, index ) {
                    if(index.id == "{{ $article->id_category }}") {
                        listCategory += '<option value="'+index.id+'" selected>'+index.name+'</option>';
                    }else{
                        listCategory += '<option value="'+index.id+'">'+index.name+'</option>';
                    }
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

<script>
    $(document).ready(function() {
        $('#create_article_summernote').summernote({
            placeholder: 'Enter Text!',
            tabsize: 2,
            height: 500,
            prettifyHtml:false,
            imageTitle: {
              specificAltField: true,
            },
            toolbar:[
                // ['highlight', ['highlight']],
                // ['seo',['seo']],
                ['cleaner',['cleaner']], // The Button
                ['style',['style']],
                ['font',['bold','italic','underline','clear']],
                ['fontname',['fontname']],
                ['color',['color']],
                ['para', ['ul', 'ol', 'listStyles', 'paragraph']],
                ['height',['height']],
                ['table',['table']],
                // ['insert', ['link', 'picture', 'video', 'hr', 'jTable']],
                ['insert', ['link', 'picture', 'video', 'hr', 'gxcode']],
                ['view',['fullscreen','codeview']],
                ['help',['help']]
            ],
            seo:{
                el:'#create_article_summernote', // Element ID or Class used to Initialise Summernote.
                notTime:2400, // Time to display Notifications.
                keyEl:'#seoKeywords', // ID or Class of the Target Element to place Keywords.
                capEl:'#seoCaption', // ID or Class of the Target Element to place Caption.
                desEl:'#seoDescription', // ID or Class of the Target Element to place Description.
                triggerInput:true, // Set this to True if like me you use AJAX to update single fields
                action:'replace', // replace|append Replace or Append Content.
                successClass:'alert alert-success',
                errorClass:'alert alert-danger',
                autoClose:false, // Set to True to Auto Close Notifications
                icon:'<i class="note-icon">[Your Icon]</i> <span class="caret"></span>',
            },
            cleaner:{
                  action: 'both', 
                  newline: '<br>', 
                  icon: '<i class="note-icon">Text Cleaner</i>',
                  keepHtml: false,
                  keepOnlyTags: ['<p>', '<br>', '<ul>', '<li>', '<b>', '<strong>','<i>', '<a>'], 
                  keepClasses: false,
                  badTags: ['style', 'script', 'applet', 'embed', 'noframes', 'noscript', 'html'],
                  badAttributes: ['style', 'start'],
                  limitChars: false, 
                  limitDisplay: 'both',
                  limitStop: false
            },
            popover: {
                image: [
                    ['custom', ['imageAttributes', 'captionIt', 'imageShapes']],
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
                table: [
                    ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                    ['custom', ['tableHeaders', 'tableStyles']]
                ],
                /* table: [
                    ['merge', ['jMerge']],
                    ['style', ['jBackcolor', 'jBorderColor', 'jAlign', 'jAddDeleteRowCol']],
                    ['info', ['jTableInfo']],
                    ['delete', ['jWidthHeightReset', 'deleteTable']],
                ], */
            },
            jTable : {
                /**
                 * drag || dialog
                 */
                mergeMode: 'drag'
            },
            lang: 'en-US', // Change to your chosen language
            imageAttributes:{
                icon:'<i class="note-icon-pencil"/>',
                removeEmpty:false, // true = remove attributes | false = leave empty if present
                disableUpload: false // true = don't display Upload Options | Display Upload Options
            },
            captionIt:{
                figureClass:'{figure-class/es}',
                figcaptionClass:'{figcapture-class/es}',
                captionText:'{Default Caption Editable Placeholder Text if Title or Alt are empty}'
            }
        });
    });
</script>

@endpush