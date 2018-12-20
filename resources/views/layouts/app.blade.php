<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@hasSection('pageTitle') @yield('pageTitle') |@endif {{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">

  <!-- Scripts -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

  <!-- fav icons -->
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
  <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png" />
</head>

<body class="with-footer">
  <header>
    <div class="header">
      <div class="col-sm-auto">
        <a href="/">
          <!-- Hackspace logo SVG -->
          <svg version="1.1" x="0px" y="0px" width="75" height="75" viewBox="0 0 220 220" enable-background="new 0 0 223.489 220.489" id="logo">
            <path id="logo-path"
            d="m 187.42396,32.576354 c -42.87821,-42.874396 -112.393767,-42.874396 -155.264347,0 -42.879484,42.878211 -42.879484,112.391236 0,155.266896 42.87058,42.87567 112.389957,42.87567 155.264347,0 42.87567,-42.87566 42.87567,-112.388685 0,-155.266896 z m -34.95429,114.891786 -25.04366,-25.03984 7.87686,-7.87687 -4.16546,-4.1642 -21.17074,21.17201 4.16037,4.16801 8.15287,-8.15668 25.05002,25.04113 -37.53878,37.53878 -25.046204,-25.04239 4.272304,-4.26849 -29.852708,-29.85653 -4.277392,4.27358 -25.039847,-25.04366 37.540057,-37.540065 25.041119,25.041119 -8.157951,8.155416 5.127019,5.12575 21.177093,-21.17329 -5.12448,-5.125747 -7.881947,7.880677 -25.042386,-25.043663 37.266593,-37.260239 25.0373,25.041119 -4.26721,4.273576 29.85144,29.853979 4.27485,-4.273576 25.04111,25.044944 z" />
          </svg>
        </a>
      </div>
      <div class="col-sm container-fluid">
        <div class="row">
          <div class="col-sm-12 col-md-8 header-center">
@hasSection('pageTitle')
            <h1 class="tiny-header"><a href="/">Nottingham Hackspace Trustees</a></h1>
            <h2 class="big-header">@yield('pageTitle')</h2>
@else
            <h1><a href="/">Nottingham Hackspace Trustees</a></h1>
@endif
          </div>
          <br>
        </div>
      </div>
    </div>


  </header>


  <!-- main body -->
  <div class="content">
@include('partials.flash')
    <div class="row">
      <div class="col-sm-12">
@yield('content')
      </div>
    </div>
  </div>

  <!-- footer -->
  <footer id="myFooter">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 myCols">
          <h5>Trustees 1.0.0</h5>
          <ul>
            <li><a href="#">Get Source</a></li>
            <li><a href="#">Credits</a></li>
            <li><a href="#">Nottinghack Website</a></li>
            <li>© 2017 Nottinghack</li>
          </ul>
        </div>
        <div class="col-sm-3 myCols">
          <h5>About us</h5>
          <ul>
            <li><a href="#">Company Information</a></li>
            <li><a href="#">Contact us</a></li>
            <li><a href="#">Reviews</a></li>
          </ul>
        </div>
        <div class="col-sm-3 myCols">
          <h5>Address</h5>
          <ul>
            <li>Unit F6 Bizspace</li>
            <li>Roden House</li>
            <li>Business Centre</li>
            <li>Nottingham</li>
            <li>NG3 1JH</li>
          </ul>
        </div>
        <div class="col-sm-3 myCols">
          <h5>Legal</h5>
          <ul>
            <li>Nottingham Hackspace Ltd</li>
            <li>No. 07766826</li>
            <li>Reg. in England & Wales</li>
          </ul>
        </div>
      </div>
    </div>
    <hr>
    <div class="social-networks">
      <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
      <a href="#" class="facebook"><i class="fa fa-facebook-official"></i></a>
      <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
      <a href="#" class="flickr"><i class="fa fa-flickr"></i></a>
      <a href="#" class="youtube"><i class="fa fa-youtube"></i></a>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="{{ mix('/js/manifest.js') }}"></script>
  <script src="{{ mix('js/vendor.js') }}"></script>
  <script src="{{ mix('js/app.js') }}"></script>

  @stack('scripts')
</body>
</html>
