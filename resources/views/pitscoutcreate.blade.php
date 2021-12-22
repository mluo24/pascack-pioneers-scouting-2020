@extends('layouts.layout')


@section('title')
Pitscout
@endsection


@section('content')
<div class = "container">
    <h1 class="mt-5">Pit Scouting</h1>
<?php
// function console_log($output, $with_script_tags = true) {
//     $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
// ');';
//     if ($with_script_tags) {
//         $js_code = '<script>' . $js_code . '</script>';
//     }
//     echo $js_code;
// }

// if (!empty($_GET)) {
//     console_log($_GET);
// }
?>
  
@if(session()->has('event'))
  
  <div class="alert alert-info" role="alert">
    Competition: {{ DB::table('events')->find(session('event'))->name }}
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
  
<form id="pitscout" action="{{ route('pitscout.store') }}" method="POST">
    
    @csrf
    
    <input type="hidden" name="uid" value="{{ Auth::user()->id }}">
    <input type="hidden" name="event" value="{{ session('event') }}">
    
    <div class="form-group">
        <label for="teamid">Team Number</label>
        <input type="number" id="teamid" name="teamid" class="form-control" value="{{ old('teamid') }}" required>
    </div>
    
    <h2>Drive</h2>
    
    <div class="form-row">
        <div class="form-group col-md">
            <p>What type of chassis?</p>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="chassis_drive" id="mechanum" value="mechanum" @if(old('chassis_drive') == "mechanum") checked @endif>
              <label class="form-check-label" for="mechanum">Mechanum</label>
              </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="chassis_drive" id="swerve" value="swerve" @if(old('chassis_drive') == "swerve") checked @endif>
              <label class="form-check-label" for="swerve">Swerve</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="chassis_drive" id="westCoast" value="west coast" @if(old('chassis_drive') == "west coast") checked @endif>
              <label class="form-check-label" for="westCoast">West Coast</label>
            </div>
            <div class="form-check">
             <input class="form-check-input" id="other" type="radio" name="chassis_drive" value="@if(old('chassis_drive') != 'mechanum' && old('chassis_drive') != 'swerve' && old('chassis_drive') != 'west coast' && old('chassis_drive') != ''){{old('chassis_drive')}}@endif" @if(old('chassis_drive') != 'mechanum' && old('chassis_drive') != 'swerve' && old('chassis_drive') != 'west coast' && old('chassis_drive') != '') checked @endif>
             <label class="form-check-label" for="other">Other</label>
            </div>
            <div id="other2"> 
                <input type="text" id="othertext" class="form-control" value="@if(old('chassis_drive') != 'mechanum' && old('chassis_drive') != 'swerve' && old('chassis_drive') != 'west coast' && old('chassis_drive') != ''){{old('chassis_drive')}}@endif">
            </div>
        </div>
        
        <div class="form-group col-md">

            <p>Are there two speeds?</p>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="two_speeds" id="yes2" value="1" @if(old('two_speeds') == 1) checked @endif>
              <label class="form-check-label" for="yes2">Yes</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="two_speeds" id="no2" value="0"  @if(old('two_speeds') == 0) checked @endif>
              <label class="form-check-label" for="no2">No</label>
            </div>
            
        </div>
        
    </div>
    
    <div class="form-row">
        
        <div class="form-group col-md">
            <label for="weight">Weight</label>
            <input type="number" id="weight" name="weight" class="form-control" value="{{ old('weight') }}">
        </div>
        
        <div class="form-group col-md">
            <label for="numberOfMotors">Number of motors</label>
            <input type="number" class="form-control" id="numberOfMotors" name="num_motors" value="{{ old('num_motors') }}">
        </div>
        <div class="form-group col-md">
            <label for="whatTypeOfMotors">What type of motors</label>
            <input type="text" class="form-control" id="whatTypeOfMotors" name="type_motors" value="{{ old('type_motors') }}">
        </div>
        <div class = "form-group col-md">
            <label for="numberOfWheels">Number of Wheels</label>
            <input type="number" class="form-control" id="numberOfWheels" name="num_wheels" value="{{ old('num_wheels') }}">
        </div>
        <div class = "form-group col-md">
            <label for="wheelType">Wheel type</label>
            <input type="text" class="form-control" id="wheelType" name="type_wheels" value="{{ old('type_wheels') }}">
        </div>
        
    </div>
    
    <h2>Gameplay</h2>
    
    <div class="form-row">
        
        <div class="form-group col-md">
            <p>Do they fit under the trench?</p>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="fit_trench" id="yes1" value="1" @if(old('fit_trench') == 1) checked @endif>
              <label class="form-check-label" for="yes1">Yes</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="fit_trench" id="no1" value="0" @if(old('fit_trench') == 0) checked @endif>
              <label class="form-check-label" for="no1">No</label>
            </div>
        </div>
        
        <div class="form-group col-md">
            <p>Wheel of Fortune?</p>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="wheel" id="wheel1" value="1" @if(old('wheel') == 1) checked @endif>
              <label class="form-check-label" for="wheel1">Yes</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="wheel" id="wheel2" value="0" @if(old('wheel') == 0) checked @endif>
              <label class="form-check-label" for="wheel2">No</label>
            </div>
        </div>
        
        <div class = "form-group col-md">
            <p>Shooting</p>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="what_goal" id="high" value="high" @if(old('what_goal') == "high") checked @endif>
              <label class="form-check-label" for="high">High</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="what_goal" id="low" value="low" @if(old('what_goal') == "low") checked @endif>
              <label class="form-check-label" for="low">Low</label>
            </div>
        </div>
        
        <div class = "form-group col-md">
            <p>Can it climb?</p>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="can_climb" id="yes3" value="1" @if(old('can_climb') == 1) checked @endif>
              <label class="form-check-label" for="yes3">Yes</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="can_climb" id="no3" value="0" @if(old('can_climb') == 0) checked @endif>
              <label class="form-check-label" for="no3">No</label>
            </div>
        </div>
        
        <div class = "form-group col-md">
            <p> Can it move on the bar?</p>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="move_bar" id="yes4" value="1" @if(old('move_bar') == 1) checked @endif>
              <label class="form-check-label" for="yes4">Yes</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="move_bar" id="no4" value="0" @if(old('move_bar') == 0) checked @endif>
              <label class="form-check-label" for="no4">No</label>
            </div>
        </div>
        
    </div>

    <div class="form-group">
        <label for="otherInformation">Other Information</label>
        <textarea class="form-control" id="otherInformation" name="other" rows="9">{{ old('other') }}</textarea>
    </div>

    <button class="btn btn-primary" type="submit">Submit</button>
  
</form>

@else
Please submit the form at <a href="{{ route('home') }}">the homepage</a> to submit form.


@endif

</div>

@endsection

@section('custom_scripts')

<script>
    
    $(document).ready(function(){
        
        $('#othertext').hide();
        
        if ($('#other').is(":checked")) {
            $('#othertext').show('fast');
        }
        
        $('#othertext').on('input propertychange paste', function() {
            
            $('#other').val($(this).val());
            // do your stuff
        });
        
        $('input:radio[name=chassis_drive]').change(function() {
            if ($('#other').is(":checked")) {
                $('#othertext').show('fast');
                $('#othertext').attr('required','true');
            }
            else {
                $('#othertext').hide('fast');
                $('#othertext').removeAttr('required');
            }
        });
        
        $('#pitscout').areYouSure();
        
    });
    
</script>

@endsection


