<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ILAE') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="icon" href="{{asset('img/logo.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

</head>
<body>
    {{-- <header  style="background-color: rgb(255, 255, 255)">
    
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="/indexadherent"> <img src="{{asset('img/logo.png')}}" style="width="30px" height="60px" " alt="logo"> </a>
                     
    
                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    {{-- <a class="nav-link" href="/indexadherent">Home</a>  
                                    <a  href="/indexadherent" class="nav-link"><i data-feather="pie-chart"></i> Home</a>
                                </li>
                                
                                
                                 
                                <li class="nav-item">
                                    <a class="nav-link" href="/Adherent/sharing">New Sharing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/Adherent/expertliste">Give Rates</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/chatroom"><svg class="bi bi-chat-fill" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 008 15z"/>
                                      </svg>  with Expert</a>
                                </li>
                                 
                                @guest 
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                                @else
                                <li class="nav-item dropdown">
                                 
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"    style="position:relative; padding-left:50px" >
                                    <img src="/uploads/avatars/{{ Auth::user()->avatar}}" alt="" style="width:32px;heith:32px; position:absolute; top:10px; left:10px;border-radius:50%">
                                        {{ Auth::user()->name }}  
                                    </a>
                                
                                       
                                
                                    <div class="dropdown  ">
                                        <a href="" class="dropdown-link" data-toggle="dropdown" data-display="static">
                                            <div class="avatar avatar-sm">@if (Auth::user()->avatar==null)<img
                                                        src="@if(Auth::user()->geder=='Male'){{asset('img/usermale.svg')}}@elseif (Auth::user()->gender=='Female')
                                                        {{asset('img/userfemale.svg')}}@endif" class="rounded-circle" alt="">@else<img
                                                        src="{{asset('uploads/avatars'.Auth::user()->avatar)}}" class="rounded-circle" alt=""> @endif</div>
                                        </a><!-- dropdown-link -->
                                        <div class="dropdown-menu dropdown-menu-right tx-13">
                                            <div class="avatar avatar-lg mg-b-15">@if (Auth::user()->avatar==null)
                                                <img src="@if(Auth::user()->gender=='Male'){{asset('img/usermale.svg')}}@elseif (Auth::user()->gender=='Female') {{asset('img/userfemale.svg')}}@endif" class="rounded-circle" alt="">@else
                                                        <img src="{{asset('uploads/avatars'.Auth::user()->avatar)}}" class="rounded-circle" alt=""> @endif
                                                    </div>
                                            <h6 class="tx-semibold mg-b-5">{{Auth::user()->name}}</h6>
                                            <p class="mg-b-25 tx-12 tx-color-03">{{Auth::user()->role}}</p>
                            
                                            <a href="/Adherent/profile" class="dropdown-item"> Edit Profile</a>
                                             
                                                
                            
                                            <a class="dropdown-item" onclick="document.getElementById('logout-form').submit();"
                                               style="cursor: pointer;">  Sign Out</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                            
                                            </form>
                                        </div><!-- dropdown-menu -->
                                    </div>
                                </li>
                                @endguest
                                     
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header> --}}


        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <footer class="footer-area">
        @yield('footer')
        <div>
            <p class="footer-text m-0 col-lg-8 col-md-12"> 
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |sponsored by ILAE-EMR <i class="ti-heart" aria-hidden="true"></i> <img src="{{asset('img/logo.png')}}" alt="" width="50">   
              </p>
            
        </div>
       
    </footer>
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- swiper js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <!-- contact js -->
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/contact.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    @yield('scripts')
 
</body>

</html>
