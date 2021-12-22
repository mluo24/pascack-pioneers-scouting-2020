@extends('layouts.layout')

@section('title')
Match Schedule
@endsection

@section('content')

<div class="container">
	<h1 class="text-center mt-5">Match Schedule</h1>

	<!--competition banner-->
	@if(session()->has('event'))
	<div class="alert alert-info" role="alert">
		Competition: {{ DB::table('events')->find(session('event'))->name }}
	</div>
	@endif

	<table id="data" class="table table-striped table-bordered" style="width:100%">
    <thead>
    	<tr>
    		<th>Match Number</th>
    		<th>Red 1</th>
    		<th>Red 2</th>
    		<th>Red 3</th>
    		<th>Blue 1</th>
    		<th>Blue 2</th>
    		<th>Blue 3</th>
    	</tr>
    </thead>
	<tbody>
	@foreach($matches as $row)
		<tr>
			<td>{{ $row->match }}</td>
			<td>{{ $row->red1 }}</td>
			<td>{{ $row->red2 }}</td>
			<td>{{ $row->red3 }}</td>
			<td>{{ $row->blue1 }}</td>
			<td>{{ $row->blue2 }}</td>
			<td>{{ $row->blue3 }}</td>
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
