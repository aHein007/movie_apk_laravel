@extends("user.layouts.style")

@section('content')
    <!-- Page Content-->
    <div class="container px-4 px-lg-5" id="home">
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" id="code-lab-pizza" src="https://m.media-amazon.com/images/M/MV5BNWI5NWVkYTQtOGE3Yy00Y2Q0LTllNjktOWZlYzYwYjEzZjBhXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg" alt="..." /></div>
            <div class="col-lg-5">
                <h1 class="font-weight-light">Share for Free!</h1>
                <p>Welcome to my channel .Hi I am Aung .I was created this channel with Laravel template.Have fun & Enjoy our app.Expecially in your holiday </p>
                <a class="btn btn-primary" href="#movie">Watch <i class="fa-solid fa-video"></i></a>
            </div>
        </div>

        <!-- Content Row-->
        <div class="d-flex justify-content-around">
            <div class="col-3 me-5">
                <div class="">
                    <div class="py-5 text-center">
                        <form class="d-flex m-5">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-dark" type="submit">Search</button>
                        </form>

                        <div class="">
                            <div class="m-2 p-2">All</div>
                            <div class="m-2 p-2">Seafood</div>
                            <div class="m-2 p-2">Chicken</div>
                            <div class="m-2 p-2">Cheese</div>
                            <div class="m-2 p-2">BBQ</div>
                            <div class="m-2 p-2">Ocean</div>
                        </div>
                        <hr>
                        <div class="text-center m-4 p-2">
                            <h3 class="mb-3">Start Date - End Date</h3>

                            <form>
                                <input type="date" name="" id="" class="form-control"> -
                                <input type="date" name="" id="" class="form-control">
                            </form>
                        </div>
                        <hr>
                        <div class="text-center m-4 p-2">
                            <h3 class="mb-3">Min - Max Amount</h3>

                            <form>
                                <input type="number" name="" id="" class="form-control" placeholder="minimum price"> -
                                <input type="number" name="" id="" class="form-control" placeholder="maximun price">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">

                <div class="row gx-4 gx-lg-5" id="movie">
                    @foreach($movieData as $items )
                    <div class="col-md-4 mb-5 hover-overlay  table-hover">
                        <div class="card h-100">
                            <!-- Sale badge-->

                            <div class="badge bg-dark text-white position-absolute font-monospace" style="top: 0.5rem; right: 0.5rem">MYDB {{ $items->movie_rating  }}  <i class="fa-solid fa-star text-warning"></i></div>
                            <!-- Product image-->
                            <img class="card-img-top " src="{{ asset("/uploadImage/".$items->movie_image) }}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $items->movie_name }}</h5>
                                    <!-- Product price-->
                                    <span class="text-muted ">
                                    @if ($items->publish_status == 0)
                                    link is not
                                    @elseif ($items->publish_status == 1)
                                    Can  download
                                    @endif</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route("user#MovieController",$items->movie_id) }}">Go Detail</a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <div class="text-center d-flex justify-content-center align-items-center" id="contact">

        <div class="col-4 border shadow-sm ps-5 pt-5 pe-5 pb-2 mb-5">
            @if (Session::has("success"))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" >
                {{ Session::get("success") }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif


            <form action="{{ route('user#postMessage',auth()->user()->id) }}" class="my-4" method="post">
                <h3>Contact Us</h3>
                @csrf
                <input type="text" name="name" id="" class="form-control my-3" placeholder="Name">
                <input type="text" name="email" id="" class="form-control my-3" placeholder="Email">
                <textarea class="form-control my-3" id="exampleFormControlTextarea1" rows="3" placeholder="Message" name="message"></textarea>
                <button type="submit" class="btn btn-outline-dark">Send  <i class="fas fa-arrow-right"></i></button>
            </form>
        </div>
    </div>
@endsection
