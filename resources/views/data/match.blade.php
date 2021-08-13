@extends('layouts.main')

<!-- Page title -->
@section('title', 'View Matches | Team 1676 Scouting')

@section('content')
	<!--<div class="container">-->
	    <div class="card">
	        <div class="card-body">
	            <h1>Matches</h1>

	             <p>Viewing competition data from: {{ DB::table('competitions')->where('id', session("competition"))->first()->slug }}</p>

	            <table id="table_id" class="table">
                <thead>
                    <tr>
                        <th>Match</th>
                        <th>Team 1</th>
                        <th>Team 2</th>
                        <th>Team 3</th>
                        <th>Team 4</th>
                        <th>Team 5</th>
                        <th>Team 6</th>
                        <th>Red Score</th>
                        <th>Blue Score</th>
                    </tr>
                </thead>
                <tbody>
	            @foreach($data as $d)
                    @if( $d->competition_id == session("competition") )
	               <tr>
	                   <td>{{ $d->match_num }}</td>
	                   <td style="color:red">{{ $d->red1 }}</td>
	                   <td style="color:red">{{ $d->red2 }}</td>
	                   <td style="color:red">{{ $d->red3 }}</td>
	                   <td style="color:blue">{{ $d->blue1 }}</td>
	                   <td style="color:blue">{{ $d->blue2 }}</td>
	                   <td style="color:blue">{{ $d->blue3 }}</td>
	                   <td>123</td>
	                   <td>123</td>
	               </tr>
	               @endif
	               </tbody>
	            @endforeach
	            </table>
	        </div>
        </div>
    <!--</div>-->
<!-- /.container -->
@endsection
@section('custom_scripts')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-html5-1.5.4/b-print-1.5.4/r-2.2.2/datatables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="{{ asset('js/data.js') }}"></script>
@endsection