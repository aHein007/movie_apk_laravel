@extends('admin.LoginPage.mylayouts.app')
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

              <div class="card-header ">
                <h3 class="card-title mt-2">
                 <a href="{{ route('admin#categoryAddPage') }}"><button class="btn btn-sm btn-outline-dark">Add Category</button></a>
                 <a href="{{ route('admin#downloadCsv') }}"><button class="btn btn-sm btn-outline-success">Download Csv</button></a>
                </h3>
                <div class="float-end mb-2">
                    <form action="{{ route('admin#searchCategory') }}" method="get">
                        <div class="card-tools mt-2">
                            <div class="input-group input-group-sm" style="width: 150px;">
                              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                              <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                  <i class="fas fa-search"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </form>
                </div>
                </div>

              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Category Name</th>
                      <th>Created Date</th>
                      <th></th>
                    </tr>
                  </thead>
                 @if ($status==0)
                     <td colspan="7" class="text-muted">There is no data!(or)Not items found!</td>
                 @else
                 @foreach ($dataCategorys as $category)
                 <tbody>
                   <tr>
                     <td>{{ $category->category_id }}</td>
                     <td>{{ $category->movie_category }}</td>
                     <td>{{ $category->category_date }}</td>
                     <td>
                       <a href="{{ route('admin#categoryUpdatePage',$category->category_id) }}"><button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                       <a href="{{ route('admin#deleteCategory',$category->category_id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
                     </td>
                   </tr>
                   </tbody>
                 @endforeach
                 @endif
                </table>
              </div>
              <!-- /.card-body -->

            </div>
            <div class="float-end text-muted fs-7">
                Total - {{ $dataCategorys->count() }}
               </div>
            {{ $dataCategorys->links() }}

            <!-- /.card -->
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
