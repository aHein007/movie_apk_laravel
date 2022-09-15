@extends('admin.LoginPage.mylayouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <a href="{{ route('admin#categoryPage') }}"><i class="fa-solid fa-arrow-left fs-5 mt-3 bg-white"></i></a>
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" >
           {{ Session::get("success") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <div class="row mt-4">
          <div class="col-10 offset-3 mt-5">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header p-2">

                  <legend class="text-center">Update Category </legend>
                </div>
                <div class="card-body">
                  <div class="tab-content">

                    <div class="active tab-pane" id="activity">
                      <form class="form-horizontal" action="{{ route('admin#categoryUpdate',$data->category_id) }}" method="POST">
                        @csrf

                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Update Category</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control mt-2" id="inputEmail" placeholder="update new categories" name="category" value="{{ old('name',$data->movie_category) }}">
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Update Date</label>
                            <div class="col-sm-10">
                              <input type="date" class="form-control mt-2" id="inputaddress" placeholder="update create date" name="date" value="{{ old('date',$data->category_date) }}">
                            </div>
                          </div>


                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn bg-dark text-white">Update</button>
                          </div>
                        </div>
                      </form>


                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    </section>
    </div>
  </div>
@endsection

