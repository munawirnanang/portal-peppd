@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="{{ url('user/create') }}" class="btn btn-outline-primary">Add</a>
            <h1 class="mr-2 float-left">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('user') }}">User</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        {{-- <div class="row mb-2">
          <div class="col-12">
            <a href="{{ url('user/create') }}" class="btn btn-outline-primary float-right">Add</a>
          </div>
        </div> --}}

        <div class="row">
          <div class="col-md-8">
              <div class="mb-5">
                <table id="datatables-users-edit" class="table table-bordered table-striped bg-white">
                    <thead style="background-color: #007bff; color: white;">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_users as $list)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $list->name }}</td>
                            <td>{{ $list->email }}</td>
                            <td>
                              <a href="{{ url('user/'.$list->id) }}" class="btn btn-outline-secondary btn-sm" >Detail</a>
                              <a href="{{ url('user/'.$list->id.'/edit') }}" class="btn @if (Request::segment(2) == $list->id) btn-warning @else btn-outline-warning @endif btn-sm">Edit</a>
                              <form action="{{ url('user/'.$list->id) }}" method="post" class="d-inline">
                                  @method('delete')
                                  @csrf
                                  <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                              </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
          </div>

          <div class="col-md-4">
          
            <!-- Form Edit User -->
            <div id="form-edit-user">
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title" style="color: white;"><b>Edit User</b></h3>
                  <a href="{{ url('user') }}" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ url('user/'.$user->id) }}" method="post">
                  @method('patch')
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Name" value="{{ $user->name }}">
                      @error('name')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter email" value="{{ $user->email }}">
                      @error('email')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter Password">
                      @error('password')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="password_confirmation">Password Confirmation</label>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Enter Password Confirmation">
                    </div>
                    <div class="form-group">
                      <label for="user_picture">Picture</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="user_picture">
                          <label class="custom-file-label" for="user_picture">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-warning" style="color: white;"><b>Edit</b></button>
                  </div>
                </form>
              </div>
            </div>
            <!-- End Form Edit User -->

          </div>
        </div>
        <!-- /.row (main row) -->
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
        timer: 3000,
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


    $(window).scroll(function() {
      var scrolled = $(window).scrollTop();
      var widthcontainer = $('.content').width();
      
      if (scrolled > 150) {
        $("#form-edit-user").addClass("position-fixed");
        $("#form-edit-user").css({'top' : '0', 'width' : (32 * widthcontainer) / 100, 'margin-top' : '1%'});
      }else{
        $("#form-edit-user").removeClass("position-fixed");
        $("#form-edit-user").css({'top' : '', 'width' : '', 'margin-top' : ''});
      }
    });

  });
</script>

<script>
  $(document).ready(function(){
    $("#datatables-users-edit").DataTable({
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
      // "dom": '<"top"l>rt<"bottom"p><"clear">',
      stateSave: true,
      stateSaveCallback: function(settings,data) {
        localStorage.setItem( 'DataTables_' + settings.sInstance, JSON.stringify(data) )
      },
      stateLoadCallback: function(settings) {
        return JSON.parse( localStorage.getItem( 'DataTables_' + settings.sInstance ) )
      }
    });
  });
</script>

@endpush