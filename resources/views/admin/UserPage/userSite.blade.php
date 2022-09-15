@extends("admin.LoginPage.mylayouts.app")

@section("content")
<div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if(Session::has("fail"))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert" >
            {{ Session::get("fail") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <form action="{{ route('admin#userSiteSearch') }}" method="get">
                <div class="card-header">
                    <h5 class="card-title">
                       <a href="{{ route('admin#adminSite') }}"> <span class="btn btn-outline-dark btn-sm">Admin</span></a>
                       <a href="{{ route("admin#userSite") }}"> <span class="btn btn-outline-dark btn-sm">User</span></a>
                    </h5>

                    <div class="card-tools">
                      <div class="input-group input-group-sm mt-2" style="width: 150px;">
                        <input type="text" name="searchData" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
              </form>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Address</th>
                      <th></th>
                    </tr>
                  </thead>
                  @if ($userData->count() ==0)
                    <th colspan="7" class="text-muted">There is no data(or)Not Result Found!</th>
                 @else
                 @foreach ($userData as $items)
                 <tbody>
                   <tr>
                     <td>{{ $items->id }}</td>
                     <td>{{ $items->name }}</td>
                     <td>{{ $items->email }}</td>
                     <td>{{ $items->phone }}</td>
                     <td>{{ $items->address }}</td>
                     <td>
                        <a href="{{ route('admin#userSiteDelete',$items->id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
                     </td>
                   </tr>

                 </tbody>
                 @endforeach
                 @endif


                </table>
              </div>
              <!-- /.card-body -->
            </div>
            {{ $userData->links() }}
            <div  class="float-end text-muted text-md">
                Total Count -  {{ $userData->count() }}
              </div>
            <!-- /.card -->
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
