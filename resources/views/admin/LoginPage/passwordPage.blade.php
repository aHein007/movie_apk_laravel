@extends('admin.LoginPage.mylayouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-10 offset-2 mt-5">
            <div class="col-md-9">
                <a href="{{ route('admin#LoginPage') }}"><i class="fa-solid fa-arrow-left mb-3 fs-5 text-black"></i></a>
              <div class="card">
                <div class="card-header p-2">
                  <legend class="text-center">Change Password!</legend>
                </div>
                <div class="card-body">
                    @if (Session::has("fail"))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get("fail") }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    @if(Session::has("success"))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get("success") }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <form class="form-horizontal" action="{{ route('admin#passwordProcess',auth()->user()->id) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                          <div class="col-sm-10 mt-3">
                            <input type="text" class="form-control" id="inputName" placeholder="Enter your Old password" name="oldPassword">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                          <div class="col-sm-10 mt-3">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Enter a new Password" name="newPassword">
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Comfirm Password</label>
                            <div class="col-sm-10 mt-3">
                              <input type="text" class="form-control" id="inputEmail" placeholder="Enter a Comfirom password" name="comfirmPassword">
                            </div>
                          </div>

                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn bg-dark text-white">Comfirm</button>
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

