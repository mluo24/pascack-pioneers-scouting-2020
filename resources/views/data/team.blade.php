@extends('layouts.main')

@section('custom_css')
<style>
    #stats {
        border: 2px solid #b7b7b7;
        text-align: center;
    }
    #stats th, #stats td {
        border: none;
        border-left: 1px solid #b7b7b7;
    }
</style>
@endsection

<!-- Page title -->
@section('title', 'View Team | Team 1676 Scouting')

<!-- Insert main body content here -->
@section('content')
<div class="card">
            
	        <div class="card-body">
	            <h1 id="heading">Viewing Data from Team {{ $teamData->first()->team_num }}</h1>
	            <p>Viewing competition data from: {{ DB::table('competitions')->where('id', session("competition"))->first()->slug }}</p>
	            <div class="table-responsive">
	            <table class="table" id="stats">
                    <tr>
                        <th>Avg Rocket Panels (sandstorm)</th>
                        <th>Avg Rocket Cargo (sandstorm)</th>
                        <th>Avg Cargo Ship Panels (sandstorm)</th>
                        <th>Avg Cargo Ship Cargo (sandstorm)</th>
                        <th>Avg Rocket Panels (drive)</th>
                        <th>Avg Rocket Cargo (drive)</th>
                        <th>Avg Cargo Ship Panels (drive)</th>
                        <th>Avg Cargo Ship Cargo (drive)</th>
                    </tr>
                    @php
                        $totalRPS = 0;
                        $totalRCS = 0;
                        $totalCPS = 0;
                        $totalCCS = 0;
                        $totalRPD = 0;
                        $totalRCD = 0;
                        $totalCPD = 0;
                        $totalCCD = 0;
                        foreach ($teamData as $d) {
                            $totalRPS += $d->sand_rocket_hatches;
                            $totalRCS += $d->sand_rocket_balls;
                            $totalCPS += $d->sand_cargo_hatches;
                            $totalCCS += $d->sand_cargo_balls;
                            $totalRPD += $d->rocket_hatches;
                            $totalRCD += $d->rocket_balls;
                            $totalCPD += $d->cargo_hatches;
                            $totalCCD += $d->cargo_balls;
                        }
                    @endphp
                    <tr>
                        <td>{{ $totalRPS / $teamData->count() }}</td>
                        <td>{{ $totalRCS / $teamData->count() }}</td>
                        <td>{{ $totalCPS / $teamData->count() }}</td>
                        <td>{{ $totalCCS / $teamData->count() }}</td>
                        <td>{{ $totalRPD / $teamData->count() }}</td>
                        <td>{{ $totalRCD / $teamData->count() }}</td>
                        <td>{{ $totalCPD / $teamData->count() }}</td>
                        <td>{{ $totalCCD / $teamData->count() }}</td>
                    </tr>
                </table>
                </div>
                
	            <div class="table-responsive">
                    <table id="table_id" class="table">
                        <thead>
                            <tr>
                                <th>Match</th>
                                <th>Team</th>
                                <th>Alliance</th>
                                <th>Starting</th>
                                <th>Driving Type</th>
                                <th>Rocket Hatches</th>
                                <th>Rocket Balls</th>
                                <th>Cargo Hatches</th>
                                <th>Cargo Balls</th>
                                <th>End Position</th>
                                <th>Helps Others?</th>
                                <th>Red Score</th>
                                <th>Blue Score</th>
                                <th>End Status</th>
                                <th>User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teamData as $entry)
                            @if( $entry->competition_id == session("competition") )
                            <tr>
                                <td>{{ $entry->match_num }}</td>
                                <td>{{ $entry->team_num }}</td>
                                <td>{{ $entry->alliance }}</td>
                                <td>{{ $entry->starting_point }}</td>
                                <td>{{ $entry->driving_sandstorm_type }}</td>
                                <td>{{ $entry->sand_rocket_hatches }}-{{ $entry->rocket_hatches }}-{{ $entry->sand_rocket_hatches + $entry->rocket_hatches }}</td>
                                <td>{{ $entry->sand_rocket_balls }}-{{ $entry->rocket_balls }}-{{ $entry->sand_rocket_balls + $entry->rocket_balls }}</td>
                                <td>{{ $entry->sand_cargo_hatches }}-{{ $entry->cargo_hatches }}-{{ $entry->sand_rocket_balls + $entry->rocket_balls }}</td>
                                <td>{{ $entry->sand_cargo_balls }}-{{ $entry->cargo_balls }}-{{ $entry->sand_cargo_balls + $entry->cargo_balls }}</td>
                                <td>{{ $entry->end_position }}</td>
                                <td>{{ $entry->help }}</td>
                                <td>{{ $entry->red_score }}</td>
                                <td>{{ $entry->blue_score }}</td>
                                <td>{{ $entry->end_status }}</td>
                                <td>{{ App\User::find($entry->user_id)->last_name }}, {{ App\User::find($entry->user_id)->first_name }}</td>
                                <td><a class="btn btn-sm btn-primary" href="{{ route('rawdata.delete', $entry->id) }}"
                                 onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this data?')){document.getElementById('delete-form').submit();}">
                                  Delete
                              </a>
        
                              <form id="delete-form" action="{{ route('rawdata.delete', $entry->id) }}" method="POST" style="display: none;">
                                  @csrf
                                @method('delete')
                              </form></td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        
@endsection

<!-- Insert custom scripts here -->
@section('custom_scripts')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-html5-1.5.4/b-print-1.5.4/r-2.2.2/datatables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="{{ asset('js/data.js') }}"></script>
@endsection