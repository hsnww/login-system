<!DOCTYPE html>
<html lang="zxx">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{$webTitle}}</title>
    <!-- plugin css for this page -->
    <link
      rel="stylesheet"
      href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}"
    />
    <link rel="stylesheet" href="{{asset('assets/vendors/aos/dist/aos.css/aos.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css')}}" />
    <link
      rel="stylesheet"
      href="{{asset('assets/vendors/owl.carousel/dist/assets/owl.carousel.min.css')}}"
    />
    <link
      rel="stylesheet"
      href="{{asset('assets/vendors/owl.carousel/dist/assets/owl.theme.default.min.css')}}"
    />
    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- endinject -->
  </head>

  <body style="background-color:#e9e9e9">
    <div class="container-scroller">
      <div class="main-panel">
        <header id="header">
          <div class="container">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar navbar-expand-lg navbar-light">
              <div class="d-flex justify-content-between align-items-center navbar-top">
                <ul class="navbar-left">
                  <li>{{now()->format('Y-M-d')}}</li>
{{--                  <li>30°C,London</li>--}}

                </ul>

                <div>
{{--                    <h1 class="display-2">{{$webTitle}}</h1>--}}
                  <a class="navbar-brand" href="/">
                      <img src="{{asset('img/logo.png')}}" alt="" width="200"/></a>
                    </a>
                </div>
                  <div class="d-flex">
                      <ul class="navbar-right">
                          <!-- Authentication Links -->
                          @guest
                              <li> <i class="fa fa-unlock-alt"></i>
                                  <a href="{{ route('login') }}">{{ __('Login') }}</a>
                              </li>
                              @if (Route::has('register'))
                                  <li><i class="fa fa-key"></i>
                                      <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                  </li>
                              @endif
                          @else
                              <i class="fa fa-user-circle"></i>
                              <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      {{ Auth::user()->name }}
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                      <a class="nav-link" href="{{route('dashboard')}}" > <i class="fa fa-cogs ml-1 mr-2"></i>Dashboard</a>

                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out ml-1 mr-2"></i>
                                          {{ __('Logout') }}
                                      </a>
                                      <div class="dropdown-divider"></div>

                                      <a class="dropdown-item" href="#"><i class="fa fa-user-circle ml-1 mr-2"></i>My profile</a>
                                  </div>
                              </li>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          @endguest
                      </ul>
                  </div>
                  </div>

              <div class="navbar-bottom-menu">
                <button
                  class="navbar-toggler"
                  type="button"
                  data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div
                  class="navbar-collapse justify-content-center collapse"
                  id="navbarSupportedContent"
                >
                  <ul
                    class="navbar-nav d-lg-flex justify-content-between align-items-center"
                  >
                    <li>
                      <button class="navbar-close">
                        <i class="mdi mdi-close"></i>
                      </button>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link active" href="default.blade.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/world.html">World</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/author.html">Magazine</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/business.html">Business</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/sports.html">Sports</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/art.html">Art</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/politics.html">Politics</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/real-estate.html">Real estate</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/travel.html">Travel</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#"><i class="mdi mdi-magnify"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>

            <!-- partial -->
          </div>
        </header>
        <div class="container">
            @yield('banner')

@yield('content')
        </div>
        <!-- main-panel ends -->
        <!-- container-scroller ends -->

        <!-- partial:partials/_footer.html -->
        <footer class="bg-secondary text-light">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
{{--                <div class="border-top"></div>--}}
              </div>
              <div class="col-sm-3 col-lg-3">
                <ul class="footer-vertical-nav">
                  <li class="menu-title"><a href="pages/news-post.html"  class="text-light">News</a></li>
                  <li><a href="default.blade.php" class="text-light">Home</a></li>
                  <li><a href="pages/world.html" class="text-light">World</a></li>
                  <li><a href="pages/author.html" class="text-light">Magazine</a></li>
                  <li><a href="pages/business.html" class="text-light">Business</a></li>
                  <li><a href="pages/politics.html" class="text-light">Politics</a></li>
                </ul>
              </div>
              <div class="col-sm-3 col-lg-3">
                <ul class="footer-vertical-nav">
                  <li class="menu-title"><a href="pages/world.html" class="text-light">World</a></li>
                  <li><a href="pages/sports.html" class="text-light">Sports</a></li>
                  <li><a href="pages/art.html" class="text-light">Art</a></li>
                  <li><a href="#" class="text-light">Magazine</a></li>
                  <li><a href="pages/real-estate.html" class="text-light">Real estate</a></li>
                  <li><a href="pages/travel.html" class="text-light">Travel</a></li>
                  <li><a href="pages/author.html" class="text-light">Author</a></li>
                </ul>
              </div>
              <div class="col-sm-3 col-lg-3">
                <ul class="footer-vertical-nav">
                  <li class="menu-title"><a href="#" class="text-light">Features</a></li>
                  <li><a href="#" class="text-light">Photography</a></li>
                  <li><a href="#" class="text-light">Video</a></li>
                  <li><a href="pages/news-post.html" class="text-light">Newsletters</a></li>
                  <li><a href="#" class="text-light">Live Events</a></li>
                  <li><a href="#" class="text-light">Stores</a></li>
                  <li><a href="#" class="text-light">Jobs</a></li>
                </ul>
              </div>
              <div class="col-sm-3 col-lg-3">
                <ul class="footer-vertical-nav">
                  <li class="menu-title"><a href="#" class="text-light">More</a></li>
                  <li><a href="#" class="text-light">RSS</a></li>
                  <li><a href="#" class="text-light">FAQ</a></li>
                  <li><a href="#" class="text-light">User Agreement</a></li>
                  <li><a href="#" class="text-light">Privacy</a></li>
                  <li><a href="pages/aboutus.html" class="text-light">About us</a></li>
                  <li><a href="pages/contactus.html" class="text-light">Contact</a></li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="d-flex justify-content-between">
                    <a href="/"><img src="{{asset('img/footer-logo.png')}}" class="footer-logo" alt="" /></a>

                  <div class="d-flex justify-content-end footer-social">
                    <h5 class="m-0 font-weight-600 mr-3 d-none d-lg-flex" class="text-light">Follow on</h5>
                    <ul class="social-media">
                      <li>
                        <a href="#">
                          <i class="mdi mdi-instagram"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-facebook"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-youtube"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-linkedin"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div
                  class="d-lg-flex justify-content-between align-items-center border-top mt-5 footer-bottom"
                >
                  <ul class="footer-horizontal-menu">
                    <li><a href="#" class="text-light">Terms of Use.</a></li>
                    <li><a href="#" class="text-light">Privacy Policy.</a></li>
                      <li><a href="#" class="text-light">Sitemap</a></li>
                      <li>Webmaster : <a href="#" class="text-light">{{$mainEmail->email}}</a></li>
                  </ul>
                  <p class="font-weight-medium">
                    © 2020 <a href="https://www.bootstrapdash.com/" target="_blank" class="text-light">@ BootstrapDash</a>, Inc.All Rights Reserved.

                  </p>

                </div>
              </div>
            </div>
          </div>
        </footer>

        <!-- partial -->
      </div>
    </div>
    <!-- inject:js -->
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{asset('assets/vendors/owl.carousel/dist/owl.carousel.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{asset('assets/js/demo.js')}}"></script>
    <!-- End custom js for this page-->
  </body>
</html>
