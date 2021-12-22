@extends('layouts.layout')

@section('title')
View Pitscouting Data
@endsection

@section('content')

<div class="container">
    
<h1 class="text-center mt-4">View PitScouting Data</h1>
    
@if(count($data) > 0)

<!--competition banner-->
@if(session()->has('event'))
<div class="alert alert-info" role="alert">
	Competition: {{ DB::table('events')->find(session('event'))->name }}
</div>
@endif

<table id="data" class="table table-striped table-bordered table-responsive" style="width:100%">
    <thead>
        <tr>
            <th>Team</th>
            <th>Chassis Drive</th>
            <th>Two Speeds?</th>
            <th>Weight</th>
            <th>Number of Motors</th>
            <th>Type of Motors</th>
            <th>Number of Wheels</th>
            <th>Type of Wheels</th>
            <th>Fits under Trench?</th>
            <th>Wheel of Fortune?</th>
            <th>Shooting?</th>
            <th>Can Climb?</th>
            <th>Can Move on Bar?</th>
            <th>Other Info?</th>
            <th>Submitted By</th>
            <th>Submitted At</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $entry)
    @if( $entry->event == session("event") )
    	<tr>
    		<td>{{ $entry->teamid }}</td>
    		<td>{{ $entry->chassis_drive }}</td>
    		<td>{{ App\PitDataEntry::returnYesNo($entry->two_speeds) }}</td>
    		<td>{{ $entry->weight }}</td>
    		<td>{{ $entry->num_motors }}</td>
    		<td>{{ $entry->type_motors }}</td>
    		<td>{{ $entry->num_wheels }}</td>
    		<td>{{ $entry->type_wheels }}</td>
    		<td>{{ App\PitDataEntry::returnYesNo($entry->fit_trench) }}</td>
    		<td>{{ App\PitDataEntry::returnYesNo($entry->wheel) }}</td>
    		<td>{{ $entry->what_goal }}</td>
    		<td>{{ App\PitDataEntry::returnYesNo($entry->can_climb) }}</td>
    		<td>{{ App\PitDataEntry::returnYesNo($entry->move_bar) }}</td>
    		<td>{{ $entry->other }}</td>
            <td>@if($entry->user != null) {{ $entry->user->name }} @endif</td>
    		<td>{{ $entry->created_at }}</td>
    	</tr>
    @endif
    @endforeach
    </tbody>

</table>

@else

<p>No pit scouting data found!</p>

@endif    

@endsection

@section("custom_scripts")
<script>
    $(document).ready(function() {
	    $('#data').DataTable({
            responsive: true,
	    	keys: true,
	    	dom: 'Bfrtip',
		    buttons: [
		        'copy', 'csv', 'excel', 'pdf', 'colvis'
		    ],
		    order: []
		});
	});
</script>
@endsection