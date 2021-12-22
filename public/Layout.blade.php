<!doctype html>
<html lang="en" class="h-100">
  <head>
   <style>
   
   .form {
    position:relative !important;
    left:1%;      
      
  }
  
  .active {
    color:yellow !important;    
    
    
}
  
  

  
   </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link rel="stylesheet" href="layout.css">
    <title>Scouting Website</title>
  </head>
  
  <body class="d-flex flex-column h-100">
      
      <header>
<nav id="testbar" class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Scouting Website</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Field</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Form</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
</header>

@yield('navbar')

<!--Form-->
<main role="main" class="flex-shrink-0 mt-5">
<div class="container">

<h1>Pit Scouting</h1>

<form>

<div class="form-group">
    <p>Did they fit under the trench?</p>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="fitundertrench" id="yes1" value="yes1">
      <label class="form-check-label" for="yes1">Yes</label>
    </div>
    <div class="form-check form-check-inline">
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
<br>

   <div class = "form-row">
   <div class = "form-group">
<label for="wheelType">Wheel type</label>
    <input type="text" class="form-control" id="wheelType">
 </div>
  <div class = "form-group">
  <label for="whichGoalCanTheyScoreIn">Which goal can they score in?</label>
    <input type="text" class="form-control" id="whichGoalCanTheyScoreIn">
</div>
<div class = "form-group">
<label for="whereCanTheyScoreFrom">Where can they score from?</label>
    <input type="text" class="form-control" id="whereCanTheyScoreFrom">
</div>
<div class = "form-group">
<label for="numberOfWheels">Number of Wheels</label>
    <input type="text" class="form-control" id="numberOfWheels">
</div>
</div>

<div class = "form-row" >

<div class = "form-group col-md-4">
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


<div class = "form-group col-md-5">
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

</div>


<div class = "form-row" >

<div class = "form-group col-md-5">

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

<div class = "form-group col-md-5">

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


<br>
  <br><button class="btn btn-primary" type="submit">Submit</button>
  
</form>
</div>
</main>

<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">BREAKING NEWS: Footers are fighting headers, and they are facing the possiblilty of De<b>feet</b></span>
  </div>
</footer>

<script>
    
    
</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>