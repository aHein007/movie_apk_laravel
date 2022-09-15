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

              <div class="card-header ">
                <h3 class="card-title mt-2 text-success text-bold">
                    <span>UserFeedBack</span>
                 <a href="{{ route('admin#csvDownload') }}"><button class="btn btn-sm btn-outline-success ml-3">Download Csv</button></a>
                </h3>
                <div class="float-end mb-2">
                    <form action="{{ route('admin#searchCustomer') }}" method="get">
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
                      <th>Name</th>
                      <th>Email</th>
                      <th>meassage</th>
                      <th>created_at</th>
                    </tr>
                  </thead>
                 @if (count($contactData) == 0)
                     <td colspan="7" class="text-muted">There is no data!(or)Not items found!</td>
                 @else
                 @foreach ($contactData as $category)
                 <tbody>
                   <tr>
                     <td>{{ $category->contact_id }}</td>
                     <td>{{ $category->user_name }}</td>
                     <td>{{ $category->user_email }}</td>
                     <td>{{ $category->message }}</td>
                     <td>{{ $category->created_at }}</td>

                   </tr>
                   </tbody>
                 @endforeach
                 @endif
                </table>
              </div>
              <!-- /.card-body -->

            </div>
            <div class="float-end text-muted fs-7">
                Total - {{ $contactData->count() }}
               </div>
            {{ $contactData->links() }}

            <!-- /.card -->
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
