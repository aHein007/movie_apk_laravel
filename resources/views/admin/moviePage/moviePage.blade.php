@extends("admin.LoginPage.mylayouts.app")

@section("content")
<div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if(Session::has("success"))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" >
            {{ Session::get("success") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if (Session::has("fail"))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{ Session::get("fail") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="{{ route('admin#movieAddPage') }}"><h3 class="card-title"><button class="btn btn-outline-dark">Movie Add</button></h3></a>

                <div class="card-tools  mt-3">
                  <form action="{{ route('admin#movieSearch') }}" method="GET">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="searchData" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Movie Name</th>
                      <th>Image</th>
                        <th>Rating</th>
                        <th>Publish Status</th>


                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                   @if ($status == 0)
                        <td colspan="7" class="text-muted">There is no Data! (or) Not result found!</td>
                   @else
                   @foreach ( $movieData as $items)
                   <tr>
                       <td>{{ $items->movie_id }}</td>
                       <td>{{ $items->movie_name }}</td>
                       <td>
                         <img src="{{ asset('/uploadImage/'.$items->movie_image) }}" class="img-thumbnail" width="100px">
                       </td>
                       <td>{{ $items->movie_rating }}.0  <i class="fa-solid fa-star text-warning"></i></td>
                       <td>@if($items->publish_status == 1)
                           Free Download
                       @elseif ($items->publish_status == 0)
                       Link is not working
                       @endif</td>

                       <td>
                       <a href="{{ route('admin#movieDetail',$items->movie_id) }}"><button class="btn btn-sm btn-info text-white"><i class="fa fa-eye"></i></button></a>
                         <a href="{{ route('admin#movieUpdate',$items->movie_id) }}"><button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                         <a href="{{ route('admin#movieDelete',$items->movie_id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>

                       </td>
                     </tr>

                   @endforeach
                   @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="float-end text-muted">
              Total - {{ $movieData->total() }}
            </div>
            {{ $movieData->links() }}

          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
