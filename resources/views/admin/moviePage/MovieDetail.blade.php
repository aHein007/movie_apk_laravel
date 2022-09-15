@extends("admin.LoginPage.mylayouts.app")

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-7 offset-3">
            <div class="ms-5 mt-1">
                <a href="{{ route('admin#moviePage') }}"><i class="fas fa-arrow-left mb-3 fs-5 text-black"></i></a>
            </div>
            <div class="card mt-1 ms-5">
                <div class="card-header text-center fs-3 bg-secondary text-white">
                    Movie Info
                </div>
                <div class="card-body">

                    <div class="fs-5 text-center">

                        <div class="">
                            <img src="{{ asset('/uploadImage/'.$movieData->movie_image) }}" class="img-thumbnail" width="250px">
                        </div>

                    </div>


                    <div class="fs-5  mt-3">
                        <label for="">Movie Name</label> : <span >{{ $movieData->movie_name }}</span>
                    </div>



                    <div class="fs-5 ">
                        <label for="">Movie Rating</label> : <span >{{ $movieData->movie_rating }}.0 <i class="fa-solid fa-star text-warning"></i></span>
                    </div>



                    <div class="fs-5 ">
                        <label for="">Publish</label> :
                        <span >
                          @if ($movieData->publish_status == 1)
                            Free Download
                          @else
                            Link is not working
                          @endif
                        </span>


                    </div>

                    <div class="fs-5 ">
                        <label for="">Description</label> : <span class=" fs-6">{{ $movieData->description }}</span>
                    </div>

                    <div class="fs-5 ">
                        <label for="">Created Date</label> : <span>{{ $movieData->created_at }}</span>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
@endsection
