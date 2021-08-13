<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-html5-1.5.4/b-print-1.5.4/r-2.2.2/datatables.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" type="text/css" />
    
    <link rel="icon" href="https://team1676.com/favicon.ico" type="image/x-icon" />
    
    <title>@yield('title', 'Team 1676 Scouting')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/select2-bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    
    @yield('custom_css')
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark" id="navbar">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}"><img class="navbar-image " src="/img/pioneers-logo.png"></a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <!--<li class="nav-item">-->
          <!--  <a class="nav-link" href="https://scouting.team1676.com/scout.html">Scout</a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a class="nav-link" href="https://scouting.team1676.com/superscout.html">Superscout</a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a class="nav-link" href="https://scouting.team1676.com/rawdata.html">Rawdata</a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a class="nav-link" href="https://scouting.team1676.com/teams.html">Teams</a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a class="nav-link" href="https://scouting.team1676.com/userdata.php">User</a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a class="nav-link" href="https://scouting.team1676.com/logout.php">Logout</a>-->
          <!--</li>-->
          <!-- other links-->
          @can('scout')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('scout') }}">Scout</a>
          </li>
          @endcan
          @can('view-data')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('rawdata') }}">Rawdata</a>
          </li>
          @endcan
          @can('view-all-data')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('teams') }}">Teams</a>
          </li>
          @endcan
          @can('view-all-data')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('matchpage') }}">Matches</a>
          </li>
          @endcan
          @can('update-settings')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users') }}">Users</a>
          </li>
          @endcan
          <!-- Authentication Links -->
          @guest
          {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li> --}}
          @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/user/{{ Auth::user()->id }}">Profile</a>
              @can('update-settings')
              <a class="dropdown-item" href="/settings">Settings</a>
              @endcan
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
          @endguest
        </ul>
      </div>
    </nav>
    <div class="container">
      <div id="content">
        @yield('content')
      </div>
    </div>
    
    <style>
        @media only screen and (max-width: 600px) {
          footer {
            padding: 5px 20px 5px 20px;
          }
        }
    </style>
    
    <footer id="footer" class="py-4 mt-5 bg-dark" style="padding-bottom: 0px !important; color: #575d66">
      <!--<div class="container">-->
        <div class="row">
          <div class="col-md-3" style="text-align: center; margin-top: 5px;">
            <h3><b>Contact Information</b></h3>
          </div>
          <div class="col-md-1 text-md-right" style="margin-top: 5px;">
            <p><b>Email:</b></p>
          </div>
          <div class="col-md-2" style="margin-top: 5px;">
            <p>admin@team1676.com</p>
          </div>
          <div class="col-md-1 text-md-right" style="margin-top: 5px;">
            <p><b>Address:</b></p>
          </div>
          <div class="col-md-2">
              <p>
              225 West Grand Avenue <br>
            Montvale, NJ 07645 <br></p>
          </div>
          <div class="col-md-1 text-md-right" style="margin-top: 5px;">
            <p><b>Telephone:</b></p>
          </div>
          <div class="col-md-2" style="margin-top: 5px;">
            <p>(937) 314-1676</p>
          </div>
        </div>
      <!--</div>-->
      {{-- <table style="padding-left: 50%; padding-right: 50%; width: 100%;">
        <tr>
          <td>
            <h3>Contact information:</h3>
          </td>
        </tr>
        <tr>
          <td>Email:</td>
          <td>Address:</td>
          <td>Telephone:</td>
        </tr>
        <tr>
          <td>admin@team1676.com</td>
          <td>Pascack Hills High School <br>
            225 West Grand Avenue <br>
            Montvale, NJ 07645 <br>
          </td>
          <td>
            937-314-1676
          </td>
        </tr>
      </table> --}}
    </footer>
    
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('custom_scripts')
  </body>
</html>