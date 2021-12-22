@extends('layouts.layout')

@section('title')
Pitscout
@endsection

@section('content')
<div class = "container">
    <h1 class="mt-5">Pit Scouting</h1>
    
<form>
    
    @csrf


<div class="form-group">
<label for="matchNumber">Match Number</label>
    <input type="number" class="form-control" id="matchNumber">
</div>


<div class="form-group">
    <p>Do they fit under the trench?</p>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="fitundertrench" id="yes1" value="yes1">
      <label class="form-check-label" for="yes1">Yes</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="fitundertrench" id="no1" value="no1">
      <label class="form-check-label" for="no1">No</label>
    </div>
</div>

<div class="form-group">
    <p>What type of Chasis does the Robot have</p>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="chasis" id="mechanum" value="mechanum">
      <label class="form-check-label" for="mechanum">Mechanum</label>
      </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="chasis" id="swerve" value="swerve">
      <label class="form-check-label" for="swerve">Swerve</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="chasis" id="westCoast" value="westCoast">
      <label class="form-check-label" for="westCoast">West Coast</label>
    </div>
    <div class="form-check" >
     <input class="form-check-input" id="other" data-target="#other2" data-toggle="collapse" type="radio" name="chasis" value="other">
     <label class="form-check-label" for="other">Other</label>
    </div>
    <div id="other2" class="collapse"> 
        <input type="text" class="form-control">
    </div>
</div>

<h2>Drive motors</h2>
<div class= "form-row ">
<div class="form-group col-md-6">
<label for="numberOfMotors">Number of motors</label>
    <input type="number" class="form-control" id="numberOfMotors">
</div>
<div class="form-group col-md-6">
<label for="whatTypeOfMotors">What type of motors</label>
    <input type="text" class="form-control" id="numberOfPowerCellsBottom">
</div>
</div>

<h2>Wheels</h2>

   <div class = "form-row">
   <div class = "form-group col-md">
<label class = "col-form-label-sm" for="wheelType">Wheel type</label>
    <input type="text" class="form-control" id="wheelType">
 </div>
  <div class = "form-group col-md">
  <label class = "col-form-label-sm" for="whichGoalCanTheyScoreIn">Shooting:Inner, Outer, Low </label>
    <input type="text" class="form-control" id="whichGoalCanTheyScoreIn">
</div>
<div class = "form-group col-md">
<label class = "col-form-label-sm" for="whereCanTheyScoreFrom">Location of scoring</label>
    <input type="text" class="form-control" id="whereCanTheyScoreFrom">
</div>
<div class = "form-group col-md">
<label class = "col-form-label-sm" for="numberOfWheels">Number of Wheels</label>
    <input type="text" class="form-control" id="numberOfWheels">
</div>
</div>

<div class = "form-row" >

<div class = "form-group col-md">
<label for="whatStageDidTheyGetTo">What Stage did they get to</label>
      <div class="form-check">
  <input class="form-check-input" type="radio" name="whatStageDidTheyGetTo" id="stage1" value="stage1">
  <label class="form-check-label" for="stage1">Stage 1</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="whatStageDidTheyGetTo" id="stage2" value="stage2">
  <label class="form-check-label" for="stage2">Stage 2</label>
  </div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="whatStageDidTheyGetTo" id="stage3" value="stage3">
  <label class="form-check-label" for="stage3">Stage 3</label>
  </div>
</div>


<div class = "form-group col-md">
<label for="canItClimb"> Can it climb?</label>
    <div class="form-check">
  <input class="form-check-input" type="radio" name="canItClimb" id="yes3" value="yes3">
  <label class="form-check-label" for="canItClimb">Yes</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="canItClimb" id="no3" value="no3">
  <label class="form-check-label" for="canItClimb">No</label>
  </div>
</div>


<div class = "form-group col-md">

<div class = "form-check">
<label for="areThereTwoSpeedsForTheRobot">Are there two speeds for the robot?</label>
    <div class="form-check">
  <input class="form-check-input" type="radio" name="areThereTwoSpeedsForTheRobot" id="yes2" value="yes2">
  <label class="form-check-label" for="yes2">Yes</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="areThereTwoSpeedsForTheRobot" id="no2" value="no2">
  <label class="form-check-label" for="no2">No</label>
  </div>
</div>

</div>

<div class = "form-group col-md">

<div class = "form-check">
<label for="yes4"> Can it move on the bar?</label>
    <div class="form-check">
  <input class="form-check-input" type="radio" name="canItMoveOnTheBar" id="yes4" value="yes4">
  <label class="form-check-label" for="yes4">Yes</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="canItMoveOnTheBar" id="no4" value="no4">
  <label class="form-check-label" for="no4">No</label>
  </div>
</div>

</div>

</div>


<div class="form-group">
<label for="whereCanTheyClimb"> Where can they climb?</label>
    <input type="text" class="form-control" id="whereCanTheyClimb">
</div>

<div class="form-group">

<label for="otherInformation">Other Information</label>
    <textarea class="form-control" id="otherInformation" rows="9"></textarea>
</div>



  <button class="btn btn-primary" type="submit">Submit</button>
  
</form>
</div>

@endsection

