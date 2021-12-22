@extends('layouts.layout')

@section('title')
Viewing Team {{ $team }}
@endsection

@section('content')

<div class="container">
    
<h1 class="text-center mt-5">Team: {{ $team }}</h1>

<!--competition banner-->
@if(session()->has('event'))
<div class="alert alert-info" role="alert">
	Competition: {{ DB::table('events')->find(session('event'))->name }}
</div>
@endif

<h2>Submitted Super Scout Data ({{ count($pitscoutdata) }} @if(count($pitscoutdata) == 1) entry @else entries @endif)</h2>
@if(count($pitscoutdata) > 0)
@foreach($pitscoutdata as $entry)
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
		  <div class="card-header">
		    Submitted by <strong>@if($entry->user != null) {{ $entry->user->name }} @else nobody @endif</strong> at <strong>{{ $entry->created_at }}</strong>
		  </div>
		  <ul class="list-group list-group-flush">
		    <li class="list-group-item">Chassis Drive: <strong>{{ $entry->chassis_drive }}</strong></li>
            <li class="list-group-item">Two Speeds?: <strong>{{ App\PitDataEntry::returnYesNo($entry->two_speeds) }}</strong></li>
            <li class="list-group-item">Weight: <strong>{{ $entry->weight }}</strong></li>
            <li class="list-group-item">Number of Motors: <strong>{{ $entry->num_motors }}</strong></li>
            <li class="list-group-item">Type of Motors: <strong>{{ $entry->type_motors }}</strong></li>
            <li class="list-group-item">Number of Wheels: <strong>{{ $entry->num_wheels }}</strong></li>
            <li class="list-group-item">Type of Wheels: <strong>{{ $entry->type_wheels }}</strong></li>
            <li class="list-group-item">Fits under Trench?: <strong>{{ App\PitDataEntry::returnYesNo($entry->fit_trench) }}</strong></li>
            <li class="list-group-item">Wheel of Fortune?: <strong>{{ App\PitDataEntry::returnYesNo($entry->wheel) }}</strong></li>
            <li class="list-group-item">Shooting? <strong>{{ $entry->what_goal }}</strong></li>
            <li class="list-group-item">Can Climb?: <strong>{{ App\PitDataEntry::returnYesNo($entry->can_climb) }}</strong></li>
            <li class="list-group-item">Can Move on Bar?: <strong>{{ App\PitDataEntry::returnYesNo($entry->move_bar) }}</strong></li>
            <li class="list-group-item">Other Info?: <br> <strong>@if($entry->other != "") {{ $entry->other }} @else None @endif</strong></li>
		  </ul>
		</div>
	</div>
</div>
@endforeach

@else

<p>No entries found for {{ $team }}</p>

@endif

@endsection