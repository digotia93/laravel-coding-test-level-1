<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="token" content="{{ csrf_token() }}" />
    <title>Question 2 User Interface</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('assets/dist/css/adminlte.min.css') }}">

    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('css/bootstrap.customize.css') !!}" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom1.css')}}">
     
    <!-- jQuery -->
    <script src="{{ url('assets/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>

<body>
    <div class="top-div">
        <div class="container p-0">
            <label class="py-3">SOCIAL NETWORK</label>
        </div>
    </div>
    <div class="container mt-50">
        <div class="row">
            <div class="col-md-9">
                <div id="movie-watched-section">
                    <h3 class="m-5">Watched Movies</h3>
                    <div class="watched-movies-slider mx-5">
                        @foreach ($watchedMovies as $watchedMovie)
                            <div class="mx-1 text-center">
                                <img src="{{ $watchedMovie->image }}" alt="">
                                <p class="mt-2">{{ $watchedMovie->name }}</p>
                            </div>
                        @endforeach
                    </div>    
                </div>
                <div id="movie-recommended-section">
                    <h3 class="m-5">Recommended Movies</h3>
                    <div class="recommended-movies-slider mx-5">
                        @foreach ($recommendedMovies as $recommendedMovie)
                        <div class="mx-1 text-center">
                            <img src="{{ $recommendedMovie->image }}" alt="">
                            <p class="mt-2">{{ $recommendedMovie->name }}</p>
                        </div>
                        @endforeach
                    </div>  
                </div>
            </div>
            <div class="col-md-3">
                <h3 class="my-5">Friends</h3>
                <div id="friends-section">
                    @forelse ($friends as $friend)
                        <div class="d-flex align-items-center mb-2">
                            <img src="https://w7.pngwing.com/pngs/1008/377/png-transparent-computer-icons-avatar-user-profile-avatar-heroes-black-hair-computer.png" class="w-25">
                            <span class="ml-2">{{ $friend }}</span>
                        </div>
                    @empty
                        <div class="d-flex align-items-center mb-2">
                            <span class="ml-2">No Friends Found</span>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">
    $(document).ready(function(){
        $('.watched-movies-slider').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: true,
            infinite: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3
                    }
                },
            ],
        });

        $('.recommended-movies-slider').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: true,
            infinite: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3
                    }
                },
            ],
        });
    });
</script>

</html>