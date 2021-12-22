
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--DataTables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/kt-2.5.1/datatables.min.css"/>

    <link rel="stylesheet" href="{{ asset('public/css/pitscouting.css') }}">
    @yield('custom_css')
        
            
    <title> @yield('title') | Pascack Pioneers Scouting </title>
    
  </head>
  
  <body class="d-flex flex-column h-100">
  
@section('navbar')   
<header>
<nav id="mainnav" class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" >
  <a href = "{{ route('welcome') }}" class = "navbar-brand">
  <img id = "logo" src="{{asset('public/img/pioneers-logo.png')}}" alt="logo">
  <b id = "title">Scouting</b> 
  </a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <ul class="navbar-nav ml-auto">
      @if(session()->exists('event'))
        @can('create', App\DataEntry::class)
        {{ menu('scouter', 'layouts.mainnav') }}
        @endcan
        @can('viewAny', App\DataEntry::class)
        {{ menu('viewer', 'layouts.mainnav') }}
        @endcan
        @can('viewAny', App\PitDataEntry::class)
        {{ menu('superscouter', 'layouts.mainnav') }}
        @endcan
      @endif
      <!--user dropdown here-->
    
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
          </a>
    
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('users.show', ['user' => Auth::user()]) }}">Profile</a>
              @can('browse_admin')
              <a class="dropdown-item" href="{{ route('settings') }}">Settings</a>
              <a class="dropdown-item" href="{{ route('voyager.dashboard') }}">Admin</a>
              @endcan
              
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
      </li>
    </ul>
      
  </div>
  
</nav>
</header>
@show

<main role="main" class="flex-shrink-0 mb-5">
@yield('content')
</main>

@section('footer')
<footer id="footer" class="footer mt-auto py-3 bg-dark" style= "color: #575d66;">
      <div class="container">
        <div class="row" style="width: 100%;">
            
          <div class="col-md inline">
            <h3 class = "text-white"><b>Contact Information</b></h3>
          </div>
          <div class="col-md text-md-left">
            <p class = "text-white"><b>Email:</b></p>
            <p class = "text-white">admin@team1676.com</p>
          </div>
          <div class="col-md text-md-left">
            <p class = "text-white"><b>Address:</b></p>
              <p class = "text-white">
              225 West Grand Avenue <br>
            Montvale, NJ 07645</p>
          </div>
          <div class="col-md text-md-left">
            <p class = "text-white"><b>Telephone:</b></p>
    
            <p class = "text-white">(937) 314-1676</p>
          </div>
          <div class="col-md text-md-left">
              <p><a  class = "text-white" href="https://team1676.com">Pascack Pi-oneers Main Site</a></p>
          </div>
        </div>
      </div>
    </footer>
@show

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/kt-2.5.1/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.AreYouSure/1.9.0/jquery.are-you-sure.min.js"></script>
    <script src="{{asset('public/js/script.js')}}"></script>
    
    @yield('custom_scripts')

  </body>
</html>