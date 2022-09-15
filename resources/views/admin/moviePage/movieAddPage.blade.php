@extends('admin.LoginPage.mylayouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <a href="{{ route('admin#moviePage') }}"><i class="fa-solid fa-arrow-left fs-5 mt-3 bg-white"></i></a>
        <div class="row mt-4">
          <div class="col-11 offset-2 ">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">

                  <legend class="text-center">Movie Add </legend>
                </div>
                <div class="card-body">
                  <div class="tab-content">

                    <div class="active tab-pane" id="activity">
                      <form class="form-horizontal" action="{{ route('admin#movieAddProcess') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Enter movie name" name="name">
                            {{-- @if ($errors->has('category'))
                                <small class="text-danger">{{ $errors->first('category') }}****</small>
                            @endif --}}
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                              <input type="file" class="form-control" id="inputaddress" placeholder="Enter movie Image" name="image">
                              {{-- @if ($errors->has('date'))
                                  <small class="text-danger">{{ $errors->first('date') }}****</small>
                              @endif --}}
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Rating</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputaddress" placeholder="Enter movie rating" name="rating">
                              {{-- @if ($errors->has('date'))
                                  <small class="text-danger">{{ $errors->first('date') }}****</small>
                              @endif --}}
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                              <select name="category" id="" class="form-control">
                                <option value="">Choose Category.....</option>
                                @foreach ($categoryData as $items)
                                <option value="{{ $items->category_id }}">{{ $items->movie_category }}</option>
                                @endforeach


                              </select>
                              {{-- @if ($errors->has("category"))
                                <small class="text-danger">{{$errors->first("category")}}***</small>
                              @endif --}}
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputByOne" class="col-sm-2 col-form-label">Publish</label>
                            <div class="col-sm-10  mt-2">
                                <input type="radio" name="publish" class="form-input-check" value="1">Free Download
                                <input type="radio" name="publish" class="form-inoput-check" value="0">Link is not working
                                <br>
                              {{-- @if ($errors->has("publish"))
                                <small class="text-danger">{{$errors->first("publish")}}***</small>
                              @endif --}}
                            </div>
                          </div>


                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                              <textarea type="text" class="form-control" id="inputaddress" placeholder="Enter movie Discription" name="description"></textarea>
                              {{-- @if ($errors->has('date'))
                                  <small class="text-danger">{{ $errors->first('date') }}****</small>
                              @endif --}}
                            </div>
                          </div>




                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn bg-dark text-white">Add Movie</button>
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

