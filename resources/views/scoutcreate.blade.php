@extends('layouts.layout')

@section('title')
Scout
@endsection

@section('content')

<div class="container">
    

<h1 class="mt-5 text-center">Scouting Manual Form</h1>

@if(session()->has('event'))

<div class="alert alert-info" role="alert">
    Competition: {{ DB::table('events')->find(session('event'))->name }}<br>
    @if($justin)
    JUSTIN FORM
    @endif
</div>

@if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    @if(session()->get('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}  
        </div>
    @endif

    <!--HIDDEN FORM SESSION VALUES-->
    <!--insert them here-->
    

    <h2>PRE-MATCH</h2>
    
    <form method="POST" action="{{ route('scout.store') }}" id="scoutform">
        
        @csrf
    
    <input type="hidden" name="uid" value="{{ Auth::user()->id }}">
    <input type="hidden" name="event" value="{{ session('event') }}">
    
    <div class="form-row">
      <div class="form-group col-md">
          <label for="match">Match Number</label>
          <input type="number" id="match" name="match" class="form-control" value="{{ old('match') }}" required>
      </div>
      <div class="form-group col-md">
           <label for="teamnum">Team Number</label>
           <div id="team-number">
               Please enter a match number.
           </div>
          @php 
            // <input type="number" id="teamid" name="teamid" class="form-control" value="{{ old('teamid') }}" required>
          @endphp
          <!-- turn this to select-->
      </div>
      <div class="form-group col-md">
          
          <label for="alliance">Alliance</label>
            <select class="form-control" id="alliance" name="alliance">
              <option value="1" @if(session('alliance') == 'red' && !old('alliance')) selected @elseif(old('alliance') == 1) selected @endif>Red</option>
              <option value="2" @if(session('alliance') == 'blue' && !old('alliance')) selected @elseif(old('alliance') == 2) selected @endif>Blue</option>
            </select>
    
      </div> 
    </div>

    <h2>AUTONOMOUS</h2>
    
    <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0"><b>Starting Location (Relative to Goal)</b></legend>
      
        <!--<label id="formsubsection1"><b>Starting Location (Relative to Goal)</b></label>-->
        <div class="col-sm-10">
            <div class="form-check form-check-inline ">
              <input class="form-check-input" type="radio" name="startl" id="closestart" value="1" @if(old('startl') == 1) checked @endif>
              <label class="form-check-label" for="closestart">Closest</label>
            </div>
            <div class="form-check form-check-inline ">
              <input class="form-check-input" type="radio" name="startl" id="middlestart" value="2" @if(old('startl') == 2) checked @endif>
              <label class="form-check-label" for="middlestart">Middle</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="startl" id="farstart" value="3" @if(old('startl') == 3) checked @endif>
              <label class="form-check-label" for="farstart">Farthest</label>
            </div>
        </div>
        </div>
    </fieldset>
        
        
    <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0"><b>Initiation Line</b></legend>
      <div class="col-sm-10">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="intline" id="noinit" value="0" @if(old('intline') == 0) checked @endif>
          <label class="form-check-label" for="noinit">DIDN'T&nbsp;Leave&nbsp;Initiation&nbsp;Line</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="intline" id="leftinit" value="1" @if(old('intline') == 1) checked @endif>
          <label class="form-check-label" for="leftinit">Left&nbsp;Initiation&nbsp;Line</label>
        </div>
        </div>
    </div>
    </fieldset>

       <div class ="form-row">
           
            <div class="form-group col-md">
            <label class = "" id="bottomportnum" for="abottom">Bottom Port - Number of Power Cells</label>
                    <div class="input-group">
                    <input value="0" name="abot" class="form-control" minimum="0" type="number" id="abottom" value="{{ old('abot') }}" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" onclick="decrValue('abottom')" type="button">-</button>
                        <button class="btn btn-outline-secondary" onclick="incrValue('abottom')" type="button">+</button>
                      </div>
                    </div>
            </div>
               
            <div class="form-group col-md">
            <label class = "" id="topportnum" for="atop">Top Port - Number of Power Cells</label>
                        <div class="input-group">
                        <input value="0" name="atop" class="form-control" minimum="0" type="number" id="atop" value="{{ old('atop') }}" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" onclick="decrValue('atop')" type="button">-</button>
                            <button class="btn btn-outline-secondary" onclick="incrValue('atop')" type="button">+</button>
                          </div>
                        </div>
            </div>
            
            <div class="form-group col-md">
                <label class = "" id="innerportnum" for="ainner">Inner Port - Number of Power Cells</label>
                        <div class="input-group">
                        <input value="0" name="ainn" class="form-control" min="0" type="number" id="ainner" value="{{ old('ainn') }}" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" onclick="decrValue('ainner')" type="button">-</button>
                            <button class="btn btn-outline-secondary" onclick="incrValue('ainner')" type="button">+</button>
                          </div>
                        </div>
            </div>
            
        </div>
            
        <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-sm-2 pt-0"><b>Ability to Pickup in Autonomous</b></legend>
        
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="apick" id="nopickup" value="0" @if(old('apick') == 0) checked @endif>
                      <label class="form-check-label" for="nopickup">No</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="apick" id="canpickup" value="1" @if(old('apick') == 1) checked @endif>
                      <label class="form-check-label" for="canpickup">Yes</label>
                    </div>
                </div>
                
            </div>
        </fieldset>
        
        <h2 id="formsection1">TELE-OP</h2>
        <h3>Power Cells Variables</h3>

        <div class="form-row">

            <div class="form-group col-md">
                <label class = "small" id="bottomportnum" for="tbot">Lower Port - Number of Power Cells</label>
                    <div class="input-group">
                        <input value="0" name="tbot" class="form-control" minimum="0" type="number" id="tbot" value="{{ old('tbot') }}" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" onclick="decrValue('tbot')" type="button">-</button>
                            <button class="btn btn-outline-secondary" onclick="incrValue('tbot')" type="button">+</button>
                        </div>
                    </div>
            </div>
          
            <div class="form-group col-md">
                <label class = "small" id="topportnum" for="ttop">Top Port - Number of Power Cells</label>
                    <div class="input-group">
                        <input value="0" name="ttop" class="form-control" minimum="0" type="number" id="ttop" value="{{ old('ttop') }}" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" onclick="decrValue('ttop')" type="button">-</button>
                            <button class="btn btn-outline-secondary" onclick="incrValue('ttop')" type="button">+</button>
                        </div>
                    </div>
            </div>
           
            <div class="form-group col-md">
                <label class = "small" id="innerportnum" for="tinn">Inner Port - Number of Power Cells</label>
                <div class="input-group">
                    <input value="0" name="tinn" class="form-control" min="0" type="number" id="tinn" value="{{ old('tinn') }}" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" onclick="decrValue('tinn')" type="button">-</button>
                        <button class="btn btn-outline-secondary" onclick="incrValue('tinn')" type="button">+</button>
                    </div>
                </div>
            </div>
            
            <div class="form-group col-md">
                <label class = "small" id="innerportnum" for="miss">Missed&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;Number of Power Cells</label>
                <div class="input-group">
                    <input value="0" name="miss" class="form-control" min="0" type="number" id="miss" value="{{ old('miss') }}" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" onclick="decrValue('miss')" type="button">-</button>
                        <button class="btn btn-outline-secondary" onclick="incrValue('miss')" type="button">+</button>
                    </div>
                </div>
            </div>
            
        </div>
          
        <h3>"Wheel of Fortune"</h3>
      
        <fieldset class="form-group">
            <div class="row">
                
                <legend class="col-form-label col-sm-2 pt-0"><b>Control Panel - Stage 2</b></legend> 
                
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="woj1" id="spin2" value="0" @if(old('woj1') == 0) checked @endif>
                      <label class="form-check-label" for="spin2">Did&nbsp;NOT&nbsp;spin</label>
                    </div>
                    
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="woj1" id="nospin2" value="1" @if(old('woj1') == 1) checked @endif>
                      <label class="form-check-label" for="nospin2">DID&nbsp;spin&nbsp;-&nbsp;Moved&nbsp;to&nbsp;Stage&nbsp;2</label>
                    </div>
                </div>
                
            </div>
        </fieldset>
        
        
        <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-sm-2 pt-0"><b>Control Panel - Stage 3</b></legend> 
                <div class="col-sm-10">
                    <div class="form-check form-check form-check-inline ">
                      <input class="form-check-input" type="radio" name="woj2" id="spin3" value="0" @if(old('woj2') == 0) checked @endif>
                      <label class="form-check-label" for="spin3">Did&nbsp;NOT&nbsp;spin</label>
                    </div>
                    <div class="form-check form-check form-check-inline col-s-1">
                      <input class="form-check-input" type="radio" name="woj2" id="nospin3" value="1" @if(old('woj2') == 1) checked @endif>
                      <label class="form-check-label" for="nospin3">DID&nbsp;spin&nbsp;-&nbsp;Moved&nbsp;to&nbsp;Stage&nbsp;3</label>
                    </div>
                </div>
            </div>
        </fieldset>
        
    <h3>Defense</h3>
        
    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0"><b>DefendED</b></legend> 
            
            <div class="col-sm-10">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="defed" id="nodefended" value="0" @if(old('defed') == 0) checked @endif>
              <label id="nodef" class="form-check-label" for="nodefended">NOT&nbsp;defended</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="defed" id="defended" value="1" @if(old('defed') == 1) checked @endif>
              <label id="def" class="form-check-label" for="defended">Defended</label>
            </div>
            </div>
        </div>
     </fieldset>
       
    <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0"><b>DefendING</b></legend> 
        
            <div class="col-sm-10">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="defing" id="nodefending" value="0" @if(old('defing') == 0) checked @endif>
                  <label id="nodef2" class="form-check-label" for="nodefending">NOT&nbsp;defending</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="defing" id="defending" value="1" @if(old('defing') == 1) checked @endif>
                  <label id="def1" class="form-check-label" for="defending">Defending</label>
                </div>
            </div>
        </div>
    </fieldset>
        
    <h3>Climbing</h3>
        
    <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0"><b>Hanging Switch</b></legend> 
        
            <div class="col-sm-10">
                <div class="form-check form-check-inline col-s-1">
                  <input class="form-check-input" type="radio" name="hang" id="noclimb" value="0" @if(old('hang') == 0) checked @endif>
                  <label class="form-check-label" for="noclimb">Did&nbsp;NOT&nbsp;Climb&nbsp;or&nbsp;Fell</label>
                </div>
                <div class="form-check form-check-inline col-s-1">
                  <input class="form-check-input" type="radio" name="hang" id="yesclimb" value="1" @if(old('hang') == 1) checked @endif>
                  <label class="form-check-label" for="yesclimb">DID&nbsp;Climb&nbsp;and&nbsp;Stayed</label>
                </div>
            </div>
        </div>
    </fieldset>
        
    <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0"><b>Parking</b></legend> 
          <div class="col-sm-10">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="park" id="nopark" value="0" @if(old('park') == 0) checked @endif>
                <label class="form-check-label" for="nopark">DIDN'T&nbsp;Park&nbsp;in&nbsp;Rendezvous&nbsp;Zone</label>
              </div>
               <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="park" id="yespark" value="1" @if(old('park') == 1) checked @endif>
                <label class="form-check-label" for="yespark">Parked&nbsp;in&nbsp;Rendezvous&nbsp;Zone</label>
              </div>
          </div>
        </div>
    </fieldset>
        
       
       <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-sm-2 pt-0"><b>Hanging Switch Status</b></legend> 
            <div class="col-sm-10">
               <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="lvl" id="noswitch" value="0" @if(old('lvl') == 0) checked @endif>
                  <label class="form-check-label" for="noswitch">Unlevel&nbsp;Switch&nbsp;or&nbsp;No&nbsp;Robots</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="lvl" id="levelswitch" value="1" @if(old('lvl') == 1) checked @endif>
                  <label class="form-check-label" for="levelswitch">Level&nbsp;Switch&nbsp;with&nbsp;Robots</label>
                </div>
            </div>
         </div>
     </fieldset>
     
     <!--<fieldset class="form-group">-->
     <!--   <div class="row">-->
     <!--     <legend class="col-form-label col-sm-2 pt-0"><b>Hanging Switch Reposition</b></legend> -->
          
     <!--     <div class="col-sm-10">-->
     <!--           <div class="form-check form-check-inline">-->
     <!--             <input class="form-check-input" type="radio" name="bar" id="norepos" value="0" @if(old('bar') == 0) checked @endif>-->
     <!--             <label class="form-check-label" for="norepos">CAN'T&nbsp;Reposition&nbsp;on&nbsp;the&nbsp;Switch</label>-->
     <!--           </div>-->
     <!--           <div class="form-check form-check-inline ">-->
     <!--             <input class="form-check-input" type="radio" name="bar" id="yesrepos" value="1" @if(old('bar') == 1) checked @endif>-->
     <!--             <label class="form-check-label" for="yesrepos">CAN&nbsp;Reposition&nbsp;on&nbsp;the&nbsp;Switch</label>-->
     <!--           </div>-->
     <!--       </div>-->
     <!--   </div>-->
     <!--  </fieldset>-->
       
    <h2>ENDGAME</h2>
       
       <div class="form-group row"> 
            <label id="finalalliancescore" class="col-sm-2 col-form-label" for="finalscore">Final Alliance Score</label>
            <div class="col-md-10">
                <input value="0" name="ascore" class="form-control" min="0" type="number" id="finalscore" value="{{ old('ascore') }}" required>
            </div>
        </div>
        
        <input type="hidden" name="justin" value="{{ $justin }}">
        
        <button type="submit" class="btn btn-primary" id="submit">Submit Data</button>
    </form>

@else

Please submit the form at <a href="{{ route('home') }}">the homepage</a> to submit form.

@endif

</div>

    
@endsection

@section('custom_scripts')
<script>
    function incrValue(idname) {
        var value = parseInt(document.getElementById(idname).value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById(idname).value = value;
    }
    function decrValue(idname) {
        var value = parseInt(document.getElementById(idname).value, 10);
        value = isNaN(value) ? 0 : value;
        value--;
        if(value<0){
            value=0;
        }
        document.getElementById(idname).value = value;
    }
    
    
    $(document).ready(function(){
            $("#match").keyup(function( event ) {
        		$.post( "{{ route('scout.teamlist') }}", $( "#scoutform" ).serialize(), function( data ) {
        		  $( "#team-number" ).html( data );
        		});
        	});
    });
    
    $('#scoutform').areYouSure();
    
</script>
@endsection