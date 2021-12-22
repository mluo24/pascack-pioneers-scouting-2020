@extends('layouts.layout')

@section('title')
Scout
@endsection

@section('custom_css')

<link rel="stylesheet" href="{{ asset('public/css/something.css') }}">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<script src="https://kit.fontawesome.com/b461bfffe3.js" crossorigin="anonymous"></script>

@endsection

@section('content')

<?php
/*  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 *  TOGGLE SCOUTING PRACTICE MODE
 *  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 */

$practiceMode = false;

?>


<div class="container-fluid" id="fullScreen" style="background-color: #fff; overflow: scroll">
    
    <script>
/* Get the element you want displayed in fullscreen mode (a video in this example): */
var ful = document.getElementById("fullScreen");

/* When the openFullscreen() function is executed, open the video in fullscreen.
Note that we must include prefixes for different browsers, as they don't support the requestFullscreen method yet */
function openFullscreen() {
  if (ful.requestFullscreen) {
    ful.requestFullscreen();
  } else if (ful.mozRequestFullScreen) { /* Firefox */
    ful.mozRequestFullScreen();
  } else if (ful.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
    ful.webkitRequestFullscreen();
  } else if (ful.msRequestFullscreen) { /* IE/Edge */
    ful.msRequestFullscreen();
  }
  document.getElementById("fulText").innerHTML = '<i class="fas fa-compress" onclick="closeFullscreen()"></i>';
}

function closeFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.mozCancelFullScreen) { /* Firefox */
    document.mozCancelFullScreen();
  } else if (document.webkitExitFullscreen) { /* Chrome, Safari and Opera */
    document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) { /* IE/Edge */
    document.msExitFullscreen();
  }
  document.getElementById("fulText").innerHTML = '<i class="fas fa-expand" onclick="openFullscreen()"></i>';
}
</script>
    
<!--<h1 class="mt-5 text-center"></h1>-->



<!-- START LARRY EDIT -->
<div class="row justify-content-end mt-5" style="padding: 20px">
    <div class="col-lg-3" id="shortcutS">
        </br><h3 id="fulText"><i class="fas fa-expand" onclick="openFullscreen()" id="fulIcon"></i></h3>
        <h3 class="d-none">Score: <span style="border: solid 1px black; max-width: fit-content; padding: 5px;" id="tScore">00</span></h3>
    </div>
    <div class="col-lg-6">
        <h1 class="text-center">Scouting Form</h1>
        <p class="text-center">Competition: {{ DB::table('events')->find(session('event'))->name }}</p>
    </div>
    <div class="col-lg-3">
        </br><a onclick="if(confirm('Are you sure you would like to stop scanning for connection changes?')){clearInterval(refreshId);document.getElementById('load').style.display='none';document.getElementById('onText').innerHTML = '<span style=\'color: #ffcc00\'>Unknown</span>';return false;}" style="cursor: pointer; float: right;" id="shortcutZ"><h3 class="scouting-header" style="color: green;" id="on"><span class="load-8" id="load" style="display: none;"><div class="line" id="line" style="color: green;"><i class="fa fa-circle Blink"></i></div></span> <span id="onText">Online</span></h3></a>
    </div>
</div>
<!-- END LARRY EDIT -->

<?php
# To toggle practice mode, please change the variable in the "TOGGLE SCOUTING PRACTICE MODE" section at the top of the document. Thank you!
if($practiceMode) echo '<video width="100%" height="300" style="border: 2px dashed #000;padding:5px;margin-bottom:30px;" onclick="this.play();">
  <source src="http://scoutingdev.team1676.com/public/img/video.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>';
?>



<div class="row">
  <div class="col">
  @if(session()->get('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}  
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      @endif
    </div>
</div>

{{-- <div id="ajaxsuccess" class="row d-none">
  <div class="col">
     <div class="alert alert-success alert-dismissible fade" role="alert">
            <span id="successmessage"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
  </div>
</div> --}}

    <!--<ul class="nav nav-pills mb-3 container" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link @if(session('inputtype') == "field" && !$errors->any()) active @endif" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><b>1.</b> Interactive Field</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><b>2.</b> Review & Finalize</a>
      </li>
      <li class="nav-item">
        <a class="nav-link @if(session('inputtype') == "manual" || $errors->any()) active @endif" id="pills-form-tab" data-toggle="pill" href="#pills-form" role="tab" aria-controls="pills-form" aria-selected="false"><b>3.</b> Submit Manual Form️️</a>
      </li>
    </ul>-->

      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane @if(session('inputtype') == "field" && !$errors->any()) show active @endif" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="container">
          <div class="row" style="padding-left: 10px;">
              <div class="col-8">
              <input min="0" type="number" id="matchnum" placeholder="Match Number" name="fname" style="display: inline-block;">
              <div id="teamnumberdiv" style="display: inline-block; width:40%;">
              <input min="0" type="number" id="teamnum" placeholder="(Enter Match Number)" name="lname" disabled>
              </div>
              </div>
              <div class="col-4">
                  <!-- LARRY FLAG -->
      <ul id="modeselect" class="nav nav-pills mb-3" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#auton" role="tab" aria-controls="auton" aria-selected="true" id="autotab">Autonomous</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#teleop" role="tab" aria-controls="teleop" aria-selected="false" id="teletab">Tele-Op</a>
                  </li>
              </ul>
      </div>
              </div>
          </div>
          <div class="tab-content" id="auton-tele">
              <div class="tab-pane fade show active" id="auton" role="tabpanel" aria-labelledby="auton">
                   <div class="row">
                       <div class="col-9">
                            <!--Autonomous Field Form-->
                            <!--<div id="popup25">-->
                            <!--    <div class="form-check">-->
                            <!--      <input class="form-check-input" type="radio" name="bluestart" id="blueclose" value="option1">-->
                            <!--      <label class="form-check-label" for="blueclose">-->
                            <!--        Closest-->
                            <!--      </label>-->
                            <!--    </div>-->
                            <!--    <div class="breaker"></div>-->
                            <!--    <div class="form-check" id="bm">-->
                            <!--      <input class="form-check-input" type="radio" name="bluestart" id="bluemiddle" value="option1">-->
                            <!--      <label class="form-check-label" for="bluemiddle">-->
                            <!--        Middle-->
                            <!--      </label>-->
                            <!--    </div> -->
                            <!--    <div class="breaker"></div>-->
                            <!--    <div class="form-check" id="bf">-->
                            <!--      <input class="form-check-input" type="radio" name="bluestart" id="bluefar" value="option1">-->
                            <!--      <label class="form-check-label" for="bluefar">-->
                            <!--        Farthest-->
                            <!--      </label>-->
                            <!--    </div>  -->
                            <!--</div>-->
                            
                            <!--<div id="popup27">-->
                            <!--    <div class="form-check">-->
                            <!--      <input class="form-check-input" type="radio" name="redstart" id="redclose" value="option1">-->
                            <!--      <label class="form-check-label" for="redclose">-->
                            <!--        Closest-->
                            <!--      </label>-->
                            <!--    </div>-->
                            <!--    <div class="breaker"></div>-->
                            <!--    <div class="form-check">-->
                            <!--      <input class="form-check-input" type="radio" name="redstart" id="redmiddle" value="option1">-->
                            <!--      <label class="form-check-label" for="redmiddle">-->
                            <!--        Middle-->
                            <!--      </label>-->
                            <!--    </div> -->
                            <!--    <div class="breaker"></div>-->
                            <!--    <div class="form-check">-->
                            <!--      <input class="form-check-input" type="radio" name="redstart" id="redfar" value="option1">-->
                            <!--      <label class="form-check-label" for="redfar">-->
                            <!--        Farthest-->
                            <!--      </label>-->
                            <!--    </div>  -->
                            <!--</div>-->
                            
                            <div class="popup" id="popup26">
                                <div class="input-group">
                                    <input type="text" style="max-width:45%;" class="form-control mb-2 mr-sm-2 popupinput" id="autobluetop" placeholder="Top">
                                <div class="input-group-append" id="button-addon4">
                                    <button type="button" class="btn btn-dark nums" onclick="decrValue('autobluetop', 'atop')">-</button>
                                    <button type="button" class="btn btn-dark nums" onclick="incrValue('autobluetop', 'atop')">+</button>
                                </div>
                            </div>
                                    
                            <div class="input-group">
                                <input type="text" style="max-width:45%;" class="form-control mb-2 mr-sm-2 popupinput" id="autobluebottom" placeholder="Bot">
                                    <div class="input-group-append" id="button-addon4">
                                        <button type="button" class="btn btn-dark nums" onclick="decrValue('autobluebottom', 'abottom')">-</button>
                                        <button type="button" class="btn btn-dark nums" onclick="incrValue('autobluebottom', 'abottom')">+</button>
                                    </div>
                            </div>
                                    
                            <div class="input-group">
                                <input type="text" style="max-width:45%;" class="form-control mb-2 mr-sm-2 popupinput" id="autoblueinner" placeholder="Inn">
                                    <div class="input-group-append" id="button-addon4">
                                        <button type="button" class="btn btn-dark nums" onclick="decrValue('autoblueinner', 'ainner')">-</button>
                                        <button type="button" class="btn btn-dark nums" onclick="incrValue('autoblueinner', 'ainner')">+</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="popup" id="popup2">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="redpickup" id="redpickuptrue" value="option1">
                                  <label class="form-check-label" for="redpickuptrue">CAN&nbsp;Pick&nbsp;Up</label>
                                </div>
                                
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="redpickup" id="redpickupfalse" value="option1">
                                  <label class="form-check-label" for="redpickupfalse">CAN'T&nbsp;Pick&nbsp;Up</label>
                                </div>
                            </div>
                            
                            <div class="popup" id="popup3">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="bluepickup" id="bluepickuptrue" value="option1">
                                  <label class="form-check-label" for="bluepickuptrue">CAN&nbsp;Pick&nbsp;Up</label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="bluepickup" id="bluepickupfalse" value="option1">
                                  <label class="form-check-label" for="bluepickupfalse">CAN'T&nbsp;Pick&nbsp;Up</label>
                                </div>
                            </div>
                            
                            <div class="popup" id="popup4">
                                <div class="input-group">
                                    <input style="max-width:45%;" type="text" class="form-control mb-2 mr-sm-2 popupinput" id="autoredtop" placeholder="Top">
                                    <div class="input-group-append" id="button-addon4">
                                        <button type="button" class="btn btn-dark nums" onclick="decrValue('autoredtop', 'atop')">-</button>
                                        <button type="button" class="btn btn-dark nums" onclick="incrValue('autoredtop', 'atop')">+</button>
                                   </div>
                                </div>
                                    
                                <div class="input-group">
                                    <input style="max-width:45%;" type="text" class="form-control mb-2 mr-sm-2 popupinput" id="autoredbottom" placeholder="Bot">
                                    <div class="input-group-append" id="button-addon4">
                                        <button type="button" class="btn btn-dark nums" onclick="decrValue('autoredbottom', 'abottom')">-</button>
                                        <button type="button" class="btn btn-dark nums" onclick="incrValue('autoredbottom', 'abottom')">+</button>
                                    </div>
                                </div>
                                    
                                <div class="input-group">
                                      <input style="max-width:45%;" type="text" class="form-control mb-2 mr-sm-2 popupinput" id="autoredinner" placeholder="Inn">
                                      <div class="input-group-append" id="button-addon4">
                                        <button type="button" class="btn btn-dark nums" onclick="decrValue('autoredinner', 'ainner')">-</button>
                                        <button type="button" class="btn btn-dark nums" onclick="incrValue('autoredinner', 'ainner')">+</button>
                                      </div>
                                </div>
                            </div>
                            
                            <!--<div class="popup" id="popup5">-->
                            <!--    <div class="form-check">-->
                            <!--      <input class="form-check-input" type="radio" name="stage2" id="bstage2false" value="option1">-->
                            <!--      <label class="form-check-label" for="bstage2false">-->
                            <!--        DIDN'T Spin-->
                            <!--      </label>-->
                            <!--    </div>-->
                            <!--    <div class="form-check">-->
                            <!--      <input class="form-check-input" type="radio" name="stage2" id="bstage2true" value="option1">-->
                            <!--      <label class="form-check-label" for="bstage2true">-->
                            <!--        SPUN + Stage 2-->
                            <!--      </label>-->
                            <!--    </div>-->
                            <!--    <div class="form-check">-->
                            <!--      <input class="form-check-input" type="radio" name="stage2" id="bstage2true2" value="option1">-->
                            <!--      <label class="form-check-label" for="bstage2true2">-->
                            <!--        SPUN + Stage 3-->
                            <!--      </label>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="popup" id="popup6">-->
                            <!--    <div class="form-check">-->
                            <!--      <input class="form-check-input" type="radio" name="rstage2" id="rstage2false" value="option1">-->
                            <!--      <label class="form-check-label" for="rstage2false">-->
                            <!--        DIDN'T Spin-->
                            <!--      </label>-->
                            <!--    </div>-->
                            <!--    <div class="form-check">-->
                            <!--      <input class="form-check-input" type="radio" name="rstage2" id="rstage2true" value="option1">-->
                            <!--      <label class="form-check-label" for="rstage2true">-->
                            <!--        SPUN + Stage 2-->
                            <!--      </label>-->
                            <!--    </div>-->
                            <!--    <div class="form-check">-->
                            <!--      <input class="form-check-input" type="radio" name="rstage2" id="rstage2true2" value="option1">-->
                            <!--      <label class="form-check-label" for="rstage2true2">-->
                            <!--        SPUN + Stage 3-->
                            <!--      </label>-->
                            <!--    </div>-->
                            <!--</div>-->
                            
                            
                            <canvas id="canvas" width="1000" height="500"></canvas>
                            
                            <!--<div class="tooltip">Hover over me-->
                            <!--  <span class="tooltiptext">Tooltip text</span>-->
                            <!--</div>-->
                            
                            <!--End of Autonomous Field Form-->
                        </div>
                    </div>
              </div>

              <div class="tab-pane fade" id="teleop" role="tabpanel" aria-labelledby="teleop">
                  <div class="row">
                      <div class="col-9">
                          <!--Tele-Op Field Form-->
                              
                              <div class="popup" id="popup9">
                                 <div class="input-group">
                                     <input type="text" style="max-width:45%;" class="form-control mb-2 mr-sm-2 popupinput" id="telebluetop" placeholder="Top">
                                    <div class="input-group-append" id="button-addon4">
                                      <button type="button" class="btn btn-dark nums" onclick="decrValue('telebluetop', 'top')">-</button>
                                      <button type="button" class="btn btn-dark nums" onclick="incrValue('telebluetop', 'top')">+</button>
                                    </div>
                                  </div>
                                  
                                  <div class="input-group">
                                    <input type="text" style="max-width:45%;" class="form-control mb-2 mr-sm-2 popupinput" id="telebluebottom" placeholder="Bot">
                                    <div class="input-group-append" id="button-addon4">
                                      <button type="button" class="btn btn-dark nums" onclick="decrValue('telebluebottom', 'bottom')">-</button>
                                      <button type="button" class="btn btn-dark nums" onclick="incrValue('telebluebottom', 'bottom')">+</button>
                                    </div>
                                  </div>
                                  
                                  <div class="input-group">
                                    <input type="text" style="max-width:45%;" class="form-control mb-2 mr-sm-2 popupinput" id="teleblueinner" placeholder="Inn">
                                    <div class="input-group-append" id="button-addon4">
                                      <button type="button" class="btn btn-dark nums" onclick="decrValue('teleblueinner', 'inner')">-</button>
                                      <button type="button" class="btn btn-dark nums" onclick="incrValue('teleblueinner', 'inner')">+</button>
                                    </div>
                                  </div>
                                  
                                  <div class="input-group">
                                    <input type="text" style="max-width:45%;" class="form-control mb-2 mr-sm-2 popupinput" id="telebluemissed" placeholder="Miss">
                                    <div class="input-group-append" id="button-addon4">
                                      <button type="button" class="btn btn-dark nums" onclick="decrValue('telebluemissed', 'missed')">-</button>
                                      <button type="button" class="btn btn-dark nums" onclick="incrValue('telebluemissed', 'missed')">+</button>
                                    </div>
                                  </div>
                          </div>
                          
                          <!--<div class="popup" id="popup10">-->
                          <!--    <div class="form-check">-->
                          <!--      <input class="form-check-input" type="radio" name="redpickup" id="redpickuptrue" value="option1">-->
                          <!--      <label class="form-check-label" for="redpickuptrue">-->
                          <!--        CAN Pick Up-->
                          <!--      </label>-->
                          <!--    </div>-->
                          <!--    <div class="form-check">-->
                          <!--      <input class="form-check-input" type="radio" name="redpickup" id="redpickupfalse" value="option1">-->
                          <!--      <label class="form-check-label" for="redpickupfalse">-->
                          <!--        CAN'T Pick Up-->
                          <!--      </label>-->
                          <!--    </div>-->
                          <!--</div>-->
                          <!--<div class="popup" id="popup11">-->
                          <!--    <div class="form-check">-->
                          <!--      <input class="form-check-input" type="radio" name="bluepickup" id="bluepickuptrue" value="option1">-->
                          <!--      <label class="form-check-label" for="bluepickuptrue">-->
                          <!--        CAN Pick Up-->
                          <!--      </label>-->
                          <!--    </div>-->
                          <!--    <div class="form-check">-->
                          <!--      <input class="form-check-input" type="radio" name="bluepickup" id="bluepickupfalse" value="option1">-->
                          <!--      <label class="form-check-label" for="bluepickupfalse">-->
                          <!--        CAN'T Pick Up-->
                          <!--      </label>-->
                          <!--    </div>-->
                          <!--</div>-->
                          
                          <div class="popup" id="popup12">
                              <div class="input-group">
                                  <input style="max-width:45%;" type="text" class="form-control mb-2 mr-sm-2 popupinput" id="teleredtop" placeholder="Top">
                                  <div class="input-group-append" id="button-addon4">
                                      <button type="button" class="btn btn-dark nums" onclick="decrValue('teleredtop', 'top')">-</button>
                                      <button type="button" class="btn btn-dark nums" onclick="incrValue('teleredtop', 'top')">+</button>
                                  </div>
                              </div>
                                  
                              <div class="input-group">
                                  <input style="max-width:45%;" type="text" class="form-control mb-2 mr-sm-2 popupinput" id="teleredbottom" placeholder="Bot">
                                  <div class="input-group-append" id="button-addon4">
                                      <button type="button" class="btn btn-dark nums" onclick="decrValue('teleredbottom', 'bottom')">-</button>
                                      <button type="button" class="btn btn-dark nums" onclick="incrValue('teleredbottom', 'bottom')">+</button>
                                  </div>
                              </div>
                                  
                              <div class="input-group">
                                  <input style="max-width:45%;" type="text" class="form-control mb-2 mr-sm-2 popupinput" id="teleredinner" placeholder="Inn">
                                  <div class="input-group-append" id="button-addon4">
                                      <button type="button" class="btn btn-dark nums" onclick="decrValue('teleredinner', 'inner')">-</button>
                                      <button type="button" class="btn btn-dark nums" onclick="incrValue('teleredinner', 'inner')">+</button>
                                  </div>
                              </div>
                                  
                              <div class="input-group">
                                  <input style="max-width:45%;" type="text" class="form-control mb-2 mr-sm-2 popupinput" id="teleredmissed" placeholder="Miss">
                                  <div class="input-group-append" id="button-addon4">
                                      <button type="button" class="btn btn-dark nums" onclick="decrValue('teleredmissed', 'missed')">-</button>
                                      <button type="button" class="btn btn-dark nums" onclick="incrValue('teleredmissed', 'missed')">+</button>
                                  </div>
                              </div>
                          </div>
                          
                          <div class="popup" id="popup13">
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="stage2" id="bstage2false" value="option1">
                                  <label class="form-check-label" for="bstage2false">DIDN'T Spin</label>
                              </div>
                              
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="stage2" id="bstage2true" value="option1">
                                  <label class="form-check-label" for="bstage2true">SPUN + Stage 2</label>
                              </div>
                              
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="stage2" id="bstage3true" value="option1">
                                <label class="form-check-label" for="bstage3true">SPUN + Stage 3</label>
                              </div>
                          </div>
                          
                          <div class="popup" id="popup14">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="rstage2" id="rstage2false" value="option1">
                                <label class="form-check-label" for="rstage2false">DIDN'T Spin</label>
                              </div>
                              
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="rstage2" id="rstage2true" value="option1">
                                <label class="form-check-label" for="rstage2true">SPUN + Stage 2</label>
                              </div>
                              
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="rstage2" id="rstage3true" value="option1">
                                <label class="form-check-label" for="rstage3true">SPUN + Stage 3</label>
                              </div>
                          </div>
                          
                          <div class="popup" id="popup15">
                              <div class="form-group form-check">
                                  <input type="checkbox" class="form-check-input" id="bluedefended">
                                  <label class="form-check-label" for="bluedefended">DefendED</label>
                              </div>
                                
                              <div class="form-group form-check">
                                  <input type="checkbox" class="form-check-input" id="bluedefending">
                                  <label class="form-check-label" for="bluedefending">DefendING</label>
                              </div>
                              
                              <div class="form-group form-check">
                                  <input type="checkbox" class="form-check-input" id="blueclimb">
                                  <label class="form-check-label" for="blueclimb">Climbed AND Stayed</label>
                              </div>
                                
                              <div class="form-group form-check">
                                  <input type="checkbox" class="form-check-input" id="bluepark">
                                  <label class="form-check-label" for="bluepark">Parked in Zone</label>
                              </div>
                                
                              <div class="form-group form-check">
                                  <input type="checkbox" class="form-check-input" id="bluehang">
                                  <label class="form-check-label" for="bluehang">Level w/ Robots</label>
                              </div>
                          </div>
                          
                          <div class="popup" id="popup16">
                              <div class="form-group form-check">
                                  <input type="checkbox" class="form-check-input" id="reddefended">
                                  <label class="form-check-label" for="reddefended">DefendED</label>
                              </div>
                                
                              <div class="form-group form-check">
                                  <input type="checkbox" class="form-check-input" id="reddefending">
                                  <label class="form-check-label" for="reddefending">DefendING</label>
                              </div>
                             
                              <div class="form-group form-check">
                                  <input type="checkbox" class="form-check-input" id="redclimb">
                                  <label class="form-check-label" for="redclimb">Climbed AND Stayed</label>
                              </div>
                                
                              <div class="form-group form-check">
                                  <input type="checkbox" class="form-check-input" id="redpark">
                                  <label class="form-check-label" for="redpark">Parked in Zone</label>
                              </div>
                                
                              <div class="form-group form-check">
                                  <input type="checkbox" class="form-check-input" id="redhang">
                                  <label class="form-check-label" for="redhang">Level w/ Robots</label>
                              </div>
                          </div>
                              
                          <canvas id="field" width="1000" height="500"></canvas>
                              
                          <!--End of Tele-Op Field Form-->
                      
                      </div>
                  </div>
              </div>
          </div>
            <!-- <div class="tab-pane show" id="autoalt" role="tabpanel" aria-labelledby="autoalt">abc</div>
            <div class="tab-pane show" id="teleopalt" role="tabpanel" aria-labelledby="telealt">xyz</div> -->
          <div class="container" style="margin-top: 20px;">
          <div class="row" style="padding-left: 10px;">
              <div class="col-3">
              <span id="switchview">Flip Field</span>
                                <label class="switch">
                      <input type="checkbox" id="perspective" onclick="checkFunction()" @if(session('orientation') == "redleft") checked @endif>
                      <span class="slider round"></span>
                  </label>
              </div>
            <div id="recent" class="col-6">Recent: </div>
            <div class="col-3">
                <!-- LARRY FLAG -->
                <button id="pretourney" type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
        <i class="fas fa-user-cog"></i>
      </button>
              </div>
          </div>
          </div>
              <ul class="nav nav-pills mb-3 container" id="pills-tab" role="tablist" style="margin-top: 25px; margin-bottom: 40px !important;">
      <li class="nav-item" style="display:none">
        <a class="nav-link @if(session('inputtype') == "field" && !$errors->any()) active @endif" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><b>1.</b> Interactive Field</a>
      </li>
      <li class="nav-item"  style="display:none">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><b>2.</b> Review & Finalize</a>
      </li>
      <li class="nav-item" style="width: 100%">
        <a onclick="window.scrollTo(0,0);" class="nav-link @if(session('inputtype') == "manual" || $errors->any()) active @endif" id="pills-form-tab" data-toggle="pill" href="#pills-form" role="tab" aria-controls="pills-form" aria-selected="false" style="left: -75px; width: 150px;  margin-left: 50%; position: absolute; color: #000; background: #ffcc00; text-align: center; font-size: 18pt"><b>Continue</b>️️</a>
      </li>
    </ul>
      </div>

        <div class="tab-pane @if(session('inputtype') == "manual" || $errors->any()) show active @endif" id="pills-form" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="container">
                <form method="POST" action="{{ route('scout.store') }}" id="scoutform">
                     @csrf
                    <input type="hidden" name="uid" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="event" value="{{ session('event') }}">
                    <div class="alert alert-warning mt-4" role="alert">
                      Only data in the form below will be submitted. If you got to this page by mistake, you may go <a href="#" onclick="document.getElementById('pills-home-tab').click();">back to the field view</a>.
                    </div>
                    <div class="alert alert-info" role="alert" id="competitionalert">
                        Competition: {{ DB::table('events')->find(session('event'))->name }}<br>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                          Correct the errors below (do it in this form and do not refresh the page):
                          <ul class="m-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                    @endif

                    <h2><b>PRE-MATCH</b></h2>
                    <div class="form-row">
                      <div class="form-group col-md">
                          <label for="match">Match Number</label>
                          <input type="number" id="match" name="match" class="form-control" value="{{ old('match') }}" required>
                      </div>
                      <div class="form-group col-md">
                           <label for="teamid">Team Number</label>
                          <input type="number" id="teamid" name="teamid" class="form-control" value="{{ old('teamid') }}" required>
                      </div>
                      <div class="form-group col-md">
                          <label for="alliance">Alliance</label>
                            <select class="form-control" id="alliance" name="alliance" onchange="changeFieldAlliance()">
                              <option value="1" @if(session('alliance') == 'red' && !old('alliance')) selected @elseif(old('alliance') == 1) selected @endif>Red</option>
                              <option value="2" @if(session('alliance') == 'blue' && !old('alliance')) selected @elseif(old('alliance') == 2) selected @endif>Blue</option>
                            </select>
                      </div>
                </div>
                
                <h2 id="formsection1"><b>AUTONOMOUS</b></h2>
                    
                    <fieldset class="form-group">
                        <div class="row">
                          <legend class="col-form-label col-sm-2 pt-0"><b>Starting Location (Relative to Self)</b></legend>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline ">
                                  <input class="form-check-input" type="radio" name="startl" id="closestart" value="1" checked @if(old('startl') == 1) checked @endif>
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
                                      <input class="form-check-input checked" type="radio" name="intline" id="noinit" value="0" @if(old('intline') == 0) checked @endif>
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
                                    <div class="input-group" id="abotform">
                                    <input value="0" name="abot" class="form-control" minimum="0" type="number" id="abottom" value="{{ old('abot') }}" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary numVals" onclick="decrValue('abottom', '')" type="button">-</button>
                                            <button class="btn btn-outline-secondary numVals" onclick="incrValue('abottom', '')" type="button">+</button>
                                        </div>
                                    </div>
                            </div>
                               
                            <div class="form-group col-md">
                            <label class = "" id="topportnum" for="atop">Top Port - Number of Power Cells</label>
                                        <div class="input-group" id="atopform">
                                        <input value="0" name="atop" class="form-control" minimum="0" type="number" id="atop" value="{{ old('atop') }}" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary numVals" onclick="decrValue('atop', '')" type="button">-</button>
                                                <button class="btn btn-outline-secondary numVals" onclick="incrValue('atop', '')" type="button">+</button>
                                            </div>
                                        </div>
                            </div>
                            
                            <div class="form-group col-md">
                                <label class = "" id="innerportnum" for="ainner">Inner Port - Number of Power Cells</label>
                                        <div class="input-group" id="ainnform">
                                        <input value="0" name="ainn" class="form-control" min="0" type="number" id="ainner" value="{{ old('ainn') }}" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary numVals" onclick="decrValue('ainner', '')" type="button">-</button>
                                                <button class="btn btn-outline-secondary numVals" onclick="incrValue('ainner', '')" type="button">+</button>
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
                                <label class = "small" id="bottomportnum" for="abottom">Lower Port - Number of Power Cells</label>
                                    <div class="input-group" id="abotform">
                                        <input value="0" name="tbot" class="form-control" minimum="0" type="number" id="bottom" value="{{ old('tbot') }}" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary numVals" onclick="decrValue('bottom')" type="button">-</button>
                                            <button class="btn btn-outline-secondary numVals" onclick="incrValue('bottom')" type="button">+</button>
                                        </div>
                                    </div>
                            </div>
                          
                            <div class="form-group col-md">
                                <label class = "small" id="topportnum" for="atop">Top Port - Number of Power Cells</label>
                                    <div class="input-group" id="atopform">
                                        <input value="0" name="ttop" class="form-control" minimum="0" type="number" id="top" value="{{ old('ttop') }}" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary numVals" onclick="decrValue('top')" type="button">-</button>
                                            <button class="btn btn-outline-secondary numVals" onclick="incrValue('top')" type="button">+</button>
                                        </div>
                                    </div>
                            </div>
                           
                            <div class="form-group col-md">
                                <label class = "small" id="innerportnum" for="ainner">Inner Port - Number of Power Cells</label>
                                <div class="input-group" id="ainnform">
                                    <input value="0" name="tinn" class="form-control" min="0" type="number" id="inner" value="{{ old('tinn') }}" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary numVals" onclick="decrValue('inner')" type="button">-</button>
                                        <button class="btn btn-outline-secondary numVals" onclick="incrValue('inner')" type="button">+</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group col-md">
                                <label class = "small" id="innerportnum" for="ainner">Missed&nbsp;-&nbsp;Number of Power Cells</label>
                                <div class="input-group" id="ainnform">
                                    <input value="0" name="miss" class="form-control" min="0" type="number" id="missed" value="{{ old('miss') }}" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary numVals" onclick="decrValue('missed')" type="button">-</button>
                                        <button class="btn btn-outline-secondary numVals" onclick="incrValue('missed')" type="button">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                          
                        <h3>Wheel of Fortune</h3>
                      
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
                       
                    <h2>ENDGAME</h2>
                       
                       <div class="form-group row"> 
                            <label id="finalalliancescore" class="col-sm-2 col-form-label" for="finalscore">Final Alliance Score</label>
                            <div class="col-md-10">
                                <input name="ascore" class="form-control" min="0" type="number" id="finalscore" value="{{ old('ascore') }}" required>
                            </div>
                        </div>
                        
                        <input type="hidden" name="justin" value="{{ $justin }}">
                        <button type="button" class="btn btn-secondary" onclick="document.getElementById('pills-home-tab').click();">Back</button>
                        <button type="submit" class="btn btn-primary" id="submit" style="left: -75px; width: 150px;  margin-left: 50%; position: absolute; color: #000; background: #ffcc00; text-align: center; font-size: 18pt"><b>Submit</b></button>

                </form>
        </div>
    </div>

  
  <div class="tab-pane" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
      <div id="reviewdiv"><h1 id="reviewtitle">Review</h1></div>
      <div class="row">
          <input min="0" type="number" id="ascore" placeholder="Alliance Score" name="ascore">
      </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Pre-Tournament</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="changesettings">

      <div class="modal-body">
            
            @csrf
            
            <div class="form-group mx-auto" style="width: 50%">
            <select class="custom-select d-block w-100" name="eventsetting" id="eventsetting" required>
              @php
                $events = DB::table('events')->get();
              @endphp
              @foreach($events as $event)
                <option value="{{$event->id}}" @if(session('event') == $event->id) selected @endif>{{ $event->name }}</option>
              @endforeach
            </select>
            </div>

        <div class="form-group mx-auto" style="width: 50%">
            <select class="custom-select d-block w-100" id="alliancesetting" name="alliancesetting" required>
              <option value="red" @if(session('alliance') == "red") selected @endif>Red</option>
              <option value="blue" @if(session('alliance') == "blue") selected @endif>Blue</option>
            </select>
          </div>

          <div class="form-group mx-auto" style="width: 50%">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inputtype" id="fieldoption" value="field" @if(session('inputtype') == "field") checked @endif>
              <label class="form-check-label" for="fieldoption">Field</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inputtype" id="manualformoption" value="manual" @if(session('inputtype') == "manual") checked @endif>
              <label class="form-check-label" for="manualformoption">Manual Form</label>
            </div>
          </div>

          <div class="form-group mx-auto" style="width: 50%">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="orientation" id="redright" value="redright" @if(session('orientation') == "redright") checked @endif>
              <label class="form-check-label" for="redright">Red Right</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="orientation" id="redleft" value="redleft" @if(session('orientation') == "redleft") checked @endif>
              <label class="form-check-label" for="redleft">Red Left</label>
            </div>
          </div>        
        {{-- <div class="col-md-5 mb-3" style="margin-top:5%;margin-left:28.5%;">
            <select class="custom-select d-block w-100" id="country" required>
              <option value="">Choose event...</option>
              <option value="1">Mount Olive</option>
              <option value="2">Hudson Valley Regional</option>
              <option value="3">Montgomery</option>
              <option value="4">FMA Regional Championship</option>
              <option value="5">World Championship</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid event.
            </div>
          </div>
        <div class="col-md-5 mb-3" style="margin-top:5%;margin-left:28.5%;">
            <select class="custom-select d-block w-100" id="country" required>
              <option value="">Choose alliance...</option>
              <option>Red</option>
              <option>Blue</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid alliance.
            </div>
          </div>
          <label style="margin-right:3%;margin-left:17.5%;margin-top:5%;" class="radio-inline">
                  <input type="radio" name="radio" checked>Closest
                  <span class="checkmark"></span>
                </label>
                <label style="margin-right:3%;" class="radio-inline">
                  <input type="radio" name="radio">Middle
                  <span class="checkmark"></span>
                </label>
                <label class="radio-inline">
                  <input type="radio" name="radio">Farthest
                  <span class="checkmark"></span>
                </label> --}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="background-color:black;" data-dismiss="modal">Exit</button>
        <button type="button" class="btn btn-primary" id="ajaxSubmit">Confirm</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<!-- Practice Mode Modal -->
<!-- NOTE: To toggle practice mode, please change the variable in the "TOGGLE SCOUTING PRACTICE MODE" section at the top of the document. Thank you! -->
<div class="modal fade" id="mod" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modLabel">Scouting Practice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="openFullscreen()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>You may use the video in the page or on the screen to practice scouting. The video will not be in the scouting form during competitions.</p>
      <p>You will be put in full screen mode for the demo. You are not required to go full screen during actual scouting.</p>
      </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-primary" style="background-color: #ffcc00; color: #000;" data-dismiss="modal" onclick="openFullscreen()">Larry said "Pickles"!</button>
      </div>
      
    </div>
  </div>
</div>

<!-- START LARRY EDIT -->
<style>
    .Blink {
        animation: blinker 1.5s cubic-bezier(.5, 0, 1, 1) infinite alternate;  
    }
    @keyframes blinker {  
      from { opacity: 1; }
      to { opacity: 0; }
    }
    .red {
        color: red !important;
    }
    .line-a {
        color: red !important;
    }
    .scouting-header {
        text-align: left;
    }
    
    @media only screen and (max-width: 600px) {
        #shortcutS {
            display: none !important;
        }
        #shortcutZ {
            float: none !important;
        }
        #on {
            text-align: center !important;
        }
    }
</style>

</div>
</div>

@endsection

@section('custom_scripts')

<script>

var refreshId = setInterval(sendHeartBeat, 1000);

var on = true;

function sendHeartBeat(params) {
    document.getElementById("load").style.display = "inline-block";
    
    if(navigator.onLine != on) {
        
      if(!on) {
          document.getElementById("onText").innerHTML = "Online";
      } else {
        document.getElementById("onText").innerHTML = "Offline";
        alert("It looks like you are offline! Ask someone for help before submitting the form. Thanks!");
      }
      
      var element = document.getElementById("on");

      if (element.classList) { 
        element.classList.toggle("red");
      } else {
        var classes = element.className.split(" ");
        var i = classes.indexOf("red");
    
        if (i >= 0) 
          classes.splice(i, 1);
        else 
          classes.push("red");
          element.className = classes.join(" "); 
      }
      
      element = document.getElementById("line");

      if (element.classList) { 
        element.classList.toggle("line-a");
      } else {
        var classes = element.className.split(" ");
        var i = classes.indexOf("line-a");
    
        if (i >= 0) 
          classes.splice(i, 1);
        else 
          classes.push("line-a");
          element.className = classes.join(" "); 
      }
      
      on = !on;
    }
}
// END LARRY EDIT

    $(document).ready( function() {

      $("#matchnum").keyup(function( event ) {
    		$.post( "{{ route('scout.teamlist') }}", $( "#scoutform" ).serialize(), function( data ) {
    		  $( "#teamnumberdiv" ).html( data );
  		  	$("#teamid").val($("#teamnum").val());
    		  $("#teamnum").bind("keyup change", function() {
					    console.log($(this).val() + " hello");
					    $("#teamid").val($(this).val());
					});
		    });
    	});

       $('#ajaxSubmit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
             $.ajax({
                url: "{{ route('settings.session') }}",
                method: 'post',
                data: {
                   event: $('#eventsetting').val(),
                   alliance: $('#alliancesetting').val(),
                   inputtype: $('input[type=radio][name=inputtype]:checked').val(),
                   orientation: $('input[type=radio][name=orientation]:checked').val(),
                },
                success: function(result){
                  // checkboxes gotta work
                  // change the message
                  $('#staticBackdrop').modal('hide');
                  $('#competitionalert').html("Competition: " + result.event);
                  // $('#successmessage').html(result.success);
                  // $('#ajaxsuccess').removeClass('d-none');
                  // $('#ajaxsuccess .alert').addClass('show');
                  // $('#ajaxsuccess .alert').show();
                   console.log(result.success);
                }});
        });

    });

    $('#scoutform').areYouSure();
</script>

<?php 
# To toggle practice mode, please change the variable in the "TOGGLE SCOUTING PRACTICE MODE" section at the top of the document. Thank you!
if($practiceMode) echo '<script>
$("#mod").modal();
</script>'; 
?>

<script src="{{ asset('public/js/scoutingfield.js') }}"></script>

@endsection