<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hotel {{ $data->nama }} - MyHotel</title>
    <link rel="icon" href="/img/icon.ico">

    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">                <!-- Font Awesome -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="/css/datepicker.css"/>
    <link rel="stylesheet" href="/css/tooplate-style.css">                                   <!-- Templatemo style -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

    <body>
        <div class="tm-main-content" id="top">
            <div class="tm-top-bar-bg"></div>
            @include('partials.nav')
            
            <div class="tm-section mb-5" id="tm-section-3">
                <div class="tm-bg-white ie-container-width-fix-2">
                    <div class="container ie-h-align-center-fix">
                        <div class="row">
                            <div class="col-xs-12 mt-3 ml-auto mr-auto ie-container-width-fix">
                                
                                <h1 class="text-center">{{ $data->nama }}</h1>
                                <h5 class="text-center">{{$data->bintang}} <i style="color:yellow;" class="fa fa-star" aria-hidden="true"></i> hotel</h5>
                                                               
                                
                            </div>      
                            
                            <div class="col-xs-12 mt-2 ml-auto mr-auto ie-container-width-fix">
                                <h6 class="text-justify" style="text-indent: 2em;">{{ $data->deskripsi }}</h6>
                            </div>      

                            <div class="col-xs-12 mt-2 mb-4 ml-auto mr-auto ie-container-width-fix">
                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($images as $image)
                                            @if ($loop->first)
                                                <div class="carousel-item active">
                                                    <img class="d-block w-100" src="{{$image}}" alt="Gambar">
                                                </div>
                                            @else
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" src="{{$image}}" alt="Gambar">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" onclick="$('#carouselExampleSlidesOnly').carousel('prev')">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" onclick="$('#carouselExampleSlidesOnly').carousel('next')">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                      </a>
                                </div>                               
                            </div>      
                            
                            {!! $data->gmaplink !!}

                            <div class="col-xs-12 mt-2 ml-auto mr-auto ie-container-width-fix">
                                <h1>Rooms :</h1>
                                <div class="container">
                                    @forelse ($rooms as $room)
                                        <div class="card w-75 mt-3 mb-3">
                                            <div class="card-body w-100">
                                            <h5 class="card-title">{{$room->nama}}</h5>
                                            <h6 class="card-text">
                                                <i class="fa fa-users" aria-hidden="true"></i> {{$room->tamu}} orang <br>
                                                <i class="fa fa-area-chart" aria-hidden="true"></i>   {{$room->luas}} <br>                                                                                         
                                            </h6>
                                            <h6 class="card-text">
                                                Fasilitas :
                                                    <ul>
                                                        @foreach ( json_decode($room->fasilitas) as $f)
                                                            <li>{{$f}}</li>
                                                        @endforeach
                                                    </ul>                                                                                      
                                            </h6>
                                            <h5 class="card-text text-end">
                                                <i class="fa fa-money" aria-hidden="true"></i> IDR {{ number_format($room->price) }} <span style="color:grey;">per kamar per malam</span> <br>
                                            </h5>
                                            </div>
                                        </div>
                                    @empty
                                        <h5>Data Kamar tidak ditemukan !</h5>
                                    @endforelse
                                </div>
                            </div> 

                            <div class="col-xs-12 mt-2 ml-auto mr-auto ie-container-width-fix">
                                <h1>Reviews :</h1>
                                <h5 class="text-left">{{$myHotelRating[0]->rating}} <i style="color:yellow;" class="fa fa-star" aria-hidden="true"></i> dari {{ $myHotelRating[0]->banyak }} review di MyHotel</h5>
                                
                                <div class="container mt-2 mb-4">
                                    @forelse ($reviews as $review)
                                        <div class="card w-75 mt-3 mb-3">
                                            <div class="card-body w-100">
                                            <h5 class="card-title">{{$review->name}}</h5>
                                            <h5 class="card-title"><i style="color:yellow;" class="fa fa-star" aria-hidden="true"></i> {{$review->rate}}</h5>
                                            
                                            <h6 class="card-text">
                                                {{$review->text}}                                                                                     
                                            </h6>

                                            </div>
                                        </div>
                                    @empty
                                        <h5>Belum ada review !</h5>    
                                    @endforelse
                                </div>
                                
                                @if( auth()->check() )
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title mb-3">Tambah Review Baru</h3>
                                            <form action="{{ route('hotel.addreview', $data) }}" method="POST" autocomplete="off">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <label for="email">Email address</label>
                                                    <input type="email" class="form-control" id="email" value="{{ auth()->user()->email }}" disabled>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="review">Review</label>
                                                    <textarea class="form-control" id="review" name="review" rows="3"></textarea>
                                                </div>
                                                <div class="form-group mb-3">   
                                                    <label for="rate" class="form-label">Rate</label>
                                                    <input type="range" class="form-range" id="rate" name="rate" min="1" max="5" step="1" value="1">
                                                </div>
                                                <div class="form-group mb-3">   
                                                    <input type="submit" class="form-control btn btn-success text-white" value="Tambah Data">
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title mb-3">Tambah Review Baru</h3>
                                            <h6 style='margin-left:2em;'>Untuk menambah review, silahkan <a href="{{route('login')}}">Login</a> terlebih dahulu</h6>
                                        </div>
                                    </div>
                                @endif

                            </div> 
                            


                        </div>      
                    </div>
                </div>                  
            </div>
            
            <footer class="tm-bg-dark-blue">
                <div class="container">
                    <div class="row">
                        <p class="col-sm-12 text-center tm-font-light tm-color-white p-4 tm-margin-b-0">
                        Copyright &copy; <span class="tm-current-year">2021</span> Kelompok PPW Ilmu Komputer 2020</p>        
                    </div>
                </div>                
            </footer>
        </div>
        
        <!-- load JS files -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script src="/js/popper.min.js"></script>                    <!-- https://popper.js.org/ -->   
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="/js/datepicker.min.js"></script>                <!-- https://github.com/qodesmith/datepicker -->
        <script src="/js/jquery.singlePageNav.min.js"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
        <script src="/slick/slick.min.js"></script>                  <!-- http://kenwheeler.github.io/slick/ -->
        <script>

       
            $(document).ready(function(){                

                // Close navbar after clicked
                $('.nav-link').click(function(){
                    $('#mainNav').removeClass('show');
                });

                // Update the current year in copyright
                $('.tm-current-year').text(new Date().getFullYear());                           
            });

        </script>             

</body>
</html>

