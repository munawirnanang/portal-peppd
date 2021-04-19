@extends('admin.layouts.app')

@section('title', 'Detail User')

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
              <li class="breadcrumb-item active">Detail User</li>
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
                <table id="datatables-users-show" class="table table-bordered table-striped bg-white">
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
                              <a href="{{ url('user/'.$list->id) }}" class="btn @if (Request::segment(2) == $list->id) btn-secondary @else btn-outline-secondary @endif btn-sm">Detail</a>
                              <a href="{{ url('user/'.$list->id.'/edit') }}" class="btn btn-outline-warning btn-sm">Edit</a>
                              <form action="{{ $list->id }}" method="post" class="d-inline">
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

            <!-- Profile-image -->
            <div id="card-profile">
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <a href="{{ url('user') }}" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </a>
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center">{{ $user->name }}</h3>

                  <p class="text-muted text-center">{{ $user->email }}</p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Email Verified</b> <a class="float-right">{{ $user->email_verified_at }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Created At</b> <a class="float-right">{{ $user->created_at }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Updated At</b> <a class="float-right">{{ $user->updated_at }}</a>
                    </li>
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
            <!-- End profile-image -->

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

    $(window).scroll(function() {
      var scrolled = $(window).scrollTop();
      var widthcontainer = $('.content').width();
      
      if (scrolled > 150) {
        $("#card-profile").addClass("position-fixed");
        $("#card-profile").css({'top' : '0', 'width' : (32 * widthcontainer) / 100, 'margin-top' : '1%'});
      }else{
        $("#card-profile").removeClass("position-fixed");
        $("#card-profile").css({'top' : '', 'width' : '', 'margin-top' : ''});
      }
    });

  });
</script>

<script>
  $(document).ready(function(){
    $("#datatables-users-show").DataTable({
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