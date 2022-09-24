@extends("user.layouts.style")
@section("content")
<div class="row mt-5 d-flex justify-content-center">

    <div class="col-4 ">
        <img src="{{ asset("/uploadImage/".$dataMovie->movie_image) }}" class="img-thumbnail" width="100%">            <br>
        <button class="btn btn-primary float-end mt-2 col-12"><i class="fas fa-play"></i>  Play</button>
        <a href="index.html">
            <button class="btn bg-dark text-white" style="margin-top: 20px;">
                <a href="{{ route("user#userPage") }}" class=" text-decoration-none text-white"><i class="fas fa-backspace"></i> Back</a>
            </button>


        </a>
    </div>
    <div class="col-lg-6 ">
        <div class="info-container container-lg ">
            <h3>Name</h3>
            <p>{{ $dataMovie->movie_name }}</p>

            <h3>Movie Rating</h3>
            <p>{{ $dataMovie->movie_rating  }}.0 <i class="fa-solid fa-star text-warning"></i></p>

            <h3>Publish Status</h3>
            <p>@if ($dataMovie->publish_status == 1)
                Can download

                @else
                Can't download
            @endif</p>

            <h3>Description</h3>
        <p>{{ $dataMovie->description }}</p>

        <button class="btn bg-success text-white " style="margin-top: 20px;">
            <a href="" class=" text-decoration-none text-white"> Download  <i class="fa-solid fa-download"></i></a>
        </button>
        </div>






    </div>

</div>
@endsection

