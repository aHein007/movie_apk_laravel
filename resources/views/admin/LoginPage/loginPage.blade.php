@extends('admin.LoginPage.mylayouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-8 offset-3 mt-5">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <legend class="text-center">User Profile </legend>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    @if(Session::has("success"))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get("success") }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                    <div class="active tab-pane" id="activity">
                      <form class="form-horizontal" action="{{ route("admin#loginProcess",$userData->id)}}" method="POST">
                        @csrf
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="{{ old("name",$userData->name) }}">
                            @if ($errors->has('name'))
                                <small class="text-danger">{{ $errors->first('name') }}****</small>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="{{ old('email',$userData->email) }}">
                            @if ($errors->has('email'))
                                <small class="text-danger">{{ $errors->first('email') }}****</small>
                            @endif
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputaddress" placeholder="address" name="address" value="{{ old('address',$userData->address) }}">
                              @if ($errors->has("address"))
                                  <small class="text-danger">{{ $errors->first('address') }}****</small>
                              @endif
                            </div>
                          </div>


                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn bg-dark text-white">Submit</button>
                          </div>
                        </div>
                      </form>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <a href="{{ route("admin#passwordPage") }}">Change Password</a>
                        </div>
                      </div>

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

