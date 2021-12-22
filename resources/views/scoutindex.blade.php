@extends('layouts.layout')

@section('title')
View Scouting Data
@endsection

@section('content')
<div class="container">

<h1 class="mt-5 text-center">View Scouting Data</h1>


@if(count($data) > 0)
<!-- tab navigation -->

@can('viewAny', App\PitDataEntry::class)

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="regularview" data-toggle="tab" href="#regularviewpanel" role="tab" aria-controls="regularviewpanel" aria-selected="true">Regular View</a>
    <a class="nav-item nav-link" id="downloadview" data-toggle="tab" href="#downloadviewpanel" role="tab" aria-controls="downloadviewpanel" aria-selected="false">Download View</a>
    <a class="nav-item nav-link" id="justinview" data-toggle="tab" href="#justinviewpanel" role="tab" aria-controls="justinviewpanel" aria-selected="false">Justin View</a>
  </div>
</nav>

<div class="tab-content" id="tablepanels">
<div class="tab-pane show active py-4" id="regularviewpanel" role="tabpanel" aria-labelledby="regularview">
    
@endcan

@if(session()->has('event'))

    <div class="alert alert-info" role="alert">
    Competition: {{ DB::table('events')->find(session('event'))->name }}
    </div>


    <table id="scoutingdata" class="table table-striped table-bordered table-responsive" style="width:100%">
        <thead>
            <tr>
                <th>Match</th>
                <th>Team</th>
                <th>Alliance</th>
                <th>Start Location (rel to user)</th>
                <th>Left Intitiation Line?</th>
                <th>Auton Bottom Port Balls</th>
                <th>Auton Top Port Balls</th>
                <th>Auton Inner Port Balls</th>
                <th>Pick Up in Auton?</th>
                <th>TeleOp Bottom Port Balls</th>
                <th>TeleOp Top Port Balls</th>
                <th>TeleOp Inner Port Balls</th>
                <th>TeleOp Missed Balls</th>
                <th>Begin Stage 2 (via Control Panel)?</th>
                <th>Begin Stage 3 (via Control Panel)?</th>
                <th>Defended against?</th>
                <th>Defended another robot?</th>
                <th>Can Hang?</th>
                <th>Parked in Rendezvous?</th>
                <th>Is Level?</th>
                <th>Alliance Score</th>
                @can('viewAny', App\PitDataEntry::class)
                <th>Submitted By</th>
                @endcan
                <th>Submitted At</th>
            </tr>
        </thead>
        <tbody>

    	@foreach($data as $entry)
        @if( $entry->event == session("event") )
            <tr>
                <td>{{ $entry->match }}</td>
                <td>{{ $entry->teamid }}</td>
                <td>{{ $entry->attributedVals['alliance'] }}</td>
                <td>{{ $entry->attributedVals['startl'] }}</td>
                <td>{{ $entry->attributedVals['intline'] }}</td>
                <td>{{ $entry->abot }}</td>
                <td>{{ $entry->atop }}</td>
                <td>{{ $entry->ainn }}</td>
                <td>{{ $entry->attributedVals['apick'] }}</td>
                <td>{{ $entry->tbot }}</td>
                <td>{{ $entry->ttop }}</td>
                <td>{{ $entry->tinn }}</td>
                <td>{{ $entry->miss }}</td>
                <td>{{ $entry->attributedVals['woj1'] }}</td>
                <td>{{ $entry->attributedVals['woj2'] }}</td>
                <td>{{ $entry->attributedVals['defed'] }}</td>
                <td>{{ $entry->attributedVals['defing'] }}</td>
                <td>{{ $entry->attributedVals['hang'] }}</td>
                <td>{{ $entry->attributedVals['park'] }}</td>
                <td>{{ $entry->attributedVals['lvl'] }}</td>
                <td>{{ $entry->ascore }}</td>
                @can('viewAny', App\PitDataEntry::class)
                <td>{{ $entry->user->name }}</td>
                @endcan
                <td>{{ $entry->created_at }}</td>
            </tr>
        @endif
        @endforeach

        </tbody>
    </table>

@else

Please submit the form at <a href="{{ route('home') }}">the homepage</a> to view data.

@endif

@can('viewAny', App\PitDataEntry::class)

</div>

<div class="tab-pane py-4" id="downloadviewpanel" role="tabpanel" aria-labelledby="downloadview">

<table id="downloadviewtable" class="table table-striped table-bordered table-responsive" style="width:100%">
        <thead>
            <tr>
               @foreach($columns as $column)
               		@if ($column != "id" && $column != "created_at" && $column != "updated_at" && $column != "deleted_at" && $column != "justin")
               			<th>{{$column}}</th>
               		@endif
               @endforeach
               <th>tshots</th>
               <th>acc</th>
               <th>score</th>
               <th>tball</th>
            </tr>
        </thead>
        <tbody>

    	@foreach($data as $entry)
    	@if(1 <= $entry->event && $entry->event <= 5)
            <tr>
            	<td>{{ $entry->uid }}</td>
            	<td>{{ $entry->event }}</td>
                <td>{{ $entry->match }}</td>
                <td>{{ $entry->teamid }}</td>
                <td>{{ $entry->alliance }}</td>
                <td>{{ $entry->startl }}</td>
                <td>{{ $entry->intline }}</td>
                <td>{{ $entry->abot }}</td>
                <td>{{ $entry->atop }}</td>
                <td>{{ $entry->ainn }}</td>
                <td>{{ $entry->apick }}</td>
                <td>{{ $entry->tbot }}</td>
                <td>{{ $entry->ttop }}</td>
                <td>{{ $entry->tinn }}</td>
                <td>{{ $entry->miss }}</td>
                <td>{{ $entry->woj1 }}</td>
                <td>{{ $entry->woj2 }}</td>
                <td>{{ $entry->defed }}</td>
                <td>{{ $entry->defing }}</td>
                <td>{{ $entry->hang }}</td>
                <td>{{ $entry->park }}</td>
                <td>{{ $entry->lvl }}</td>
                <td>{{ $entry->ascore }}</td>
                <td>{{ $entry->getTshotsAttribute() }}</td>
                <td>{{ $entry->getAccAttribute() }}</td>
                <td>{{ $entry->getTballAttribute() }}</td>
                <td>{{ $entry->getCalculatedScoreAttribute() }}</td>
            </tr>
        @endif
        @endforeach

        </tbody>
    </table>

</div>

<div class="tab-pane py-4" id="justinviewpanel" role="tabpanel" aria-labelledby="justinview">

<table id="justinviewtable" class="table table-striped table-bordered table-responsive" style="width:100%">
        <thead>
            <tr>
               @foreach($columns as $column)
               		@if ($column != "id" && $column != "created_at" && $column != "updated_at" && $column != "deleted_at" && $column != "justin")
               			<th>{{$column}}</th>
               		@endif
               @endforeach
               <th>tshots</th>
               <th>acc</th>
               <th>score</th>
               <th>tball</th>
            </tr>
        </thead>
        <tbody>

    	@foreach($dataJustin as $entry)
    	@if(1 <= $entry->event && $entry->event <= 5)
            <tr>
            	<td>{{ $entry->uid }}</td>
            	<td>{{ $entry->event }}</td>
                <td>{{ $entry->match }}</td>
                <td>{{ $entry->teamid }}</td>
                <td>{{ $entry->alliance }}</td>
                <td>{{ $entry->startl }}</td>
                <td>{{ $entry->intline }}</td>
                <td>{{ $entry->abot }}</td>
                <td>{{ $entry->atop }}</td>
                <td>{{ $entry->ainn }}</td>
                <td>{{ $entry->apick }}</td>
                <td>{{ $entry->tbot }}</td>
                <td>{{ $entry->ttop }}</td>
                <td>{{ $entry->tinn }}</td>
                <td>{{ $entry->miss }}</td>
                <td>{{ $entry->woj1 }}</td>
                <td>{{ $entry->woj2 }}</td>
                <td>{{ $entry->defed }}</td>
                <td>{{ $entry->defing }}</td>
                <td>{{ $entry->hang }}</td>
                <td>{{ $entry->park }}</td>
                <td>{{ $entry->lvl }}</td>
                <td>{{ $entry->ascore }}</td>
                <td>{{ $entry->getTshotsAttribute() }}</td>
                <td>{{ $entry->getAccAttribute() }}</td>
                <td>{{ $entry->getTballAttribute() }}</td>
                <td>{{ $entry->getCalculatedScoreAttribute() }}</td>
            </tr>
        @endif
        @endforeach

        </tbody>
    </table>

</div>


</div>

@endcan

@else

<p>No data entries found!</p>

@endif

</div>
@endsection

@section('custom_scripts')
<script type="text/javascript">
	$(document).ready(function() {
	    $('#scoutingdata').DataTable({
	    	keys: true,
	    	dom: 'Bfrtip',
		    buttons: [
		        'copy', 'csv', 'excel', 'pdf', 'colvis'
		    ],
		    order: []
		});
		$('#downloadviewtable').DataTable({
	    	keys: true,
	    	dom: 'Bfrtip',
		    buttons: [
		        'copy', 'csv', 'excel', 'pdf', 'colvis'
		    ],
		    order: []
		});
		$('#justinviewtable').DataTable({
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