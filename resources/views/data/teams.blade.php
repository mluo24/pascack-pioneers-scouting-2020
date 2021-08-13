@extends('layouts.main')

@section('custom_css')
<style>
    #top .form-group {
        margin-top: 0.1em;
        margin-bottom: 0.3em;
    }
</style>
@endsection

<!-- Page title -->
@section('title', 'Teams | Team 1676 Scouting')

@section('content')
	    <div class="card">
	        <div class="card-body">
	            <h1>Teams</h1>
	            <p>Viewing competition data from: {{ DB::table('competitions')->where('id', session("competition"))->first()->slug }}</p>
	            <form method="get" action="" id="top">
	                <div class="form-row">
                        <div class="col-md">
                            <div class="form-group">
                              <label for="inputEmail4">Red 1</label>
                              <select name="red1" class="form-control js-example-basic-single">
                                  <option value="">None</option>
                                  @foreach($data as $d)
                                    <option value="{{ $d->team_num }}">{{ $d->team_num }}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="col-md">
                          <div class="form-group">
                              <label for="inputEmail4">Blue 1</label>
                              <select name="blue1" class="form-control js-example-basic-single">
                                  <option value="">None</option>
                                  @foreach($data as $d)
                                    <option value="{{ $d->team_num }}">{{ $d->team_num }}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>
                    </div>
	                <div class="form-row">
                        <div class="col-md">
                            <div class="form-group">
                              <label for="inputEmail4">Red 2</label>
                              <select name="red2" class="form-control js-example-basic-single">
                                  <option value="">None</option>
                                  @foreach($data as $d)
                                    <option value="{{ $d->team_num }}">{{ $d->team_num }}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="col-md">
                          <div class="form-group">
                              <label for="inputEmail4">Blue 2</label>
                              <select name="blue2" class="form-control js-example-basic-single">
                                  <option value="">None</option>
                                  @foreach($data as $d)
                                    <option value="{{ $d->team_num }}">{{ $d->team_num }}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md">
                          <div class="form-group">
                              <label for="inputEmail4">Red 3</label>
                              <select name="red3" class="form-control js-example-basic-single">
                                  <option value="">None</option>
                                  @foreach($data as $d)
                                    <option value="{{ $d->team_num }}">{{ $d->team_num }}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="col-md">
                          <div class="form-group">
                              <label for="inputEmail4">Blue 3</label>
                              <select name="blue3" class="form-control js-example-basic-single">
                                  <option value="">None</option>
                                  @foreach($data as $d)
                                    <option value="{{ $d->team_num }}">{{ $d->team_num }}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>
                    </div>
	                <div class="form-row">
	                    <div class="col-md-12 text-right">
	                        <button type="submit" class="btn btn-primary">View</button>
	                    </div>
	                </div>
	            </form>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search for teams">
                        </div>
    	            <ul class="list-group" id="myUL">
    	                
    	            	@foreach($data as $d)
    	            	@if($d->competition_id == session('competition'))
    	            	
    				  		<li class="list-group-item"><a href="{{ route('team.show', $d->team_num) }}" target="_blank"> {{ $d->team_num }} </a></li>
    				  		
    				  	@endif
    				  	@endforeach
    				  	
    				</ul>
    				</div>
				</div>
            </div>
        </div>
@endsection
@section('custom_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            theme: 'bootstrap4',
        });
    });
    
    function myFunction() {
      // Declare variables
      var input, filter, ul, li, a, i, txtValue;
      input = document.getElementById('myInput');
      filter = input.value.toUpperCase();
      ul = document.getElementById("myUL");
      li = ul.getElementsByTagName('li');
    
      // Loop through all list items, and hide those who don't match the search query
      for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
        } else {
          li[i].style.display = "none";
        }
      }
    }
</script>
@endsection