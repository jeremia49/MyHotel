<div class="tm-top-bar" id="tm-top-bar">
    <!-- Top Navbar -->
    <div class="container">
        <div class="row">
            
            <nav class="navbar navbar-expand-lg narbar-light">
                <a class="navbar-brand mr-auto" href="{{route('index')}}">
                    <img src="/img/logo_utama.png" alt="Site logo" width="30%" height="auto">
                    MyHotel 
                </a>
                <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                        <a class="nav-link" href="/#top">Home <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/#tm-section-4">Fasilitas</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/#tm-section-6">Hubungi Kami</a>
                      </li>
                      @if( auth()->check() )
                        <li class="nav-item">
                            <div class="dropdown show">
                                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user"> </i> {{ auth()->user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{route('logout')}}" onclick="window.location.href='{{route('logout')}}'">Logout</a>
                                </div>
                            </div>
                        </li>
                      @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}" onclick="window.location.href='{{route('login')}}'" ><i class="fa fa-user"> </i> Login</a>
                        </li>
                      @endif                               
                    </ul>
                </div>                            
            </nav>            
        </div>
    </div>
</div>