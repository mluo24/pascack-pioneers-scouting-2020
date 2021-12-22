@extends('layouts.layout')

@section('title')
Teams
@endsection

@section('content')

<div class="container">
	<h1 class="text-center mt-5">Team List</h1>

	<!--competition banner-->
	@if(session()->has('event'))
	<div class="alert alert-info" role="alert">
		Competition: {{ DB::table('events')->find(session('event'))->name }}
	</div>
	@endif

	<table id="data" class="table table-striped table-bordered" style="width:100%">
    <thead>
    	<tr>
    		<th>Team</th>
    		<th># of Entries</th>
    	</tr>
    </thead>
	<tbody>
	@foreach($teams as $team)
		<tr>
			<td><a href="{{ route('singleteamview', $team->teamid) }}">{{ $team->teamid }}</a></td>
			<td>{{ App\PitDataEntry::where('teamid', $team->teamid)->count() }}</td>
		</tr>
	@endforeach
	</tbody>
	</table>
</div>

@endsection

@section('custom_scripts')
<script>
    $(document).ready(function() {
	    $('#data').DataTable({
	    	keys: true,
	    	dom: 'Bfrtip',
		    buttons: [
		        'copy', 'csv', 'excel', 'pdf'
		    ],
		    // order: []
		});
	});
</script>
@endsection
