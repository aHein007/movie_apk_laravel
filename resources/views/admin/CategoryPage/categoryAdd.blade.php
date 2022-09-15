@extends('admin.LoginPage.mylayouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <a href="{{ route('admin#categoryPage') }}"><i class="fa-solid fa-arrow-left fs-5 mt-3 bg-white"></i></a>
        <div class="row mt-4">
          <div class="col-8 offset-3 mt-5">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">

                  <legend class="text-center">Add Category </legend>
                </div>
                <div class="card-body">
                  <div class="tab-content">

                    <div class="active tab-pane" id="activity">
                      <form class="form-horizontal" action="{{ route('admin#categoryAddProcess') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Add</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="add new categories" name="category">
                            @if ($errors->has('category'))
                                <small class="text-danger">{{ $errors->first('category') }}****</small>
                            @endif
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                              <input type="date" class="form-control" id="inputaddress" placeholder="add create date" name="date">
                              @if ($errors->has('date'))
                                  <small class="text-danger">{{ $errors->first('date') }}****</small>
                              @endif
                            </div>
                          </div>


                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn bg-dark text-white">Add</button>
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

