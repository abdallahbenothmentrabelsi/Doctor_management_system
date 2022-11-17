<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="icon" href="{{asset('img/logo.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <!-- magnific popup CSS -->
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <!-- nice select CSS -->
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
   
 
  

 
 
 
 
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
   @yield('css')
   
    <title>
        @yield('title')
         </title>
         
</head>

<body>
    <!--::header part start::-->
    
    <header class="main_menu ">
    
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="/indexadherent"> <img src="{{asset('img/logo.png')}}" style="width="30px" height="60px" " alt="logo"> </a>
                     
    
                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    {{-- <a class="nav-link" href="/indexadherent">Home</a> --}}
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
                                      </svg>with Expert</a>
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
                                    <img src="/uploads/avatars/{{ Auth::user()->avatar}}" alt="" style="width:40px;heith:40px; position:absolute; top:25px; left:5px;border-radius:50%">
                                        {{ Auth::user()->name }}  
                                    </a>
                                
                                       
                                
                                    <div class="dropdown dropdown-profile">
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
                            
                                            <a href="/Adherent/profile" class="dropdown-item"> <svg class="bi bi-person-circle" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                                                <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                                              </svg> Edit Profile</a>
                                             
                                                
                                           
                                            <a class="dropdown-item" onclick="document.getElementById('logout-form').submit();"
                                               style="cursor: pointer;">  <svg class="bi bi-box-arrow-in-right" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8.146 11.354a.5.5 0 0 1 0-.708L10.793 8 8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
                                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 1 8z"/>
                                                <path fill-rule="evenodd" d="M13.5 14.5A1.5 1.5 0 0 0 15 13V3a1.5 1.5 0 0 0-1.5-1.5h-8A1.5 1.5 0 0 0 4 3v1.5a.5.5 0 0 0 1 0V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5h-8A.5.5 0 0 1 5 13v-1.5a.5.5 0 0 0-1 0V13a1.5 1.5 0 0 0 1.5 1.5h8z"/>
                                              </svg> Sign Out</a>
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
    </header>






    @yield('content')
   
   












    <footer class="footer-area">
        @yield('footer')
        <div>
            <p class="footer-text m-0 col-lg-8 col-md-12"> 
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |sponsored by ILAE-EMR <i class="ti-heart" aria-hidden="true"></i> <img src="{{asset('img/logo.png')}}" alt="" width="50">   
              </p>
            
        </div>
       
    </footer>
    <!-- footer part end-->

     <!-- jquery plugins here-->

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