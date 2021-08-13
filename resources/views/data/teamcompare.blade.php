@extends('layouts.main')

<!-- Page title -->
@section('title', 'Teams | Team 1676 Scouting')

@section('content')
	    <div class="card">
	        <div class="card-body">
	            <h1>Team Comparison</h1>
	            <p>Viewing competition data from: {{ DB::table('competitions')->where('id', session("competition"))->first()->slug }}</p>
                <div class="row">
                    <div class="col-md-12">
    				</div>
				</div>
            </div>
        </div>
@endsection