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
    <div class="col-6">
       {{ $dataMovie->description }}



    </div>
</div>
@endsection

