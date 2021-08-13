@extends('layouts.main')

<!-- Page title -->
@section('title', 'Team 1676 Scouting')

<!-- Insert main body content here -->
@section('content')
    <br>
    <h1 class="text-center">Team 1676 Scouting</h1>
    <img src="http://image12.zibster.com/6572/20181002171506_266345.png" class="mx-auto d-block" style="max-width: 375px;">
    <p class="text-center">    
    	<a href="{{ url('/redirect') }}" class="btn btn-warning" style="font-size: 15pt;">Login With Google</a>
    </p>
@endsection

<!-- Insert custom scripts here -->
@section('custom_scripts')
@endsection
