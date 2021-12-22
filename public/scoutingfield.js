$("#ascore").bind("keyup paste", function() {
    $("#finalscore").val($(this).val());
});

$("#matchnum").bind("keyup paste", function() {
    $("#match").val($(this).val());
});

$("#teamnum").bind("keyup paste", function() {
    $("#teamid").val($(this).val());
});

$("#autobluebottom").bind("keyup paste", function() {
    $("#abottom").val($(this).val());
});

$("#autoredbottom").bind("keyup paste", function() {
    $("#abottom").val($(this).val());
});

$("#autobluetop").bind("keyup paste", function() {
    $("#atop").val($(this).val());
});

$("#autoredtop").bind("keyup paste", function() {
    $("#atop").val($(this).val());
});

$("#autoblueinner").bind("keyup paste", function() {
    $("#ainner").val($(this).val());
});

$("#autoredinner").bind("keyup paste", function() {
    $("#ainner").val($(this).val());
});

$("#telebluebottom").bind("keyup paste", function() {
    $("#bottom").val($(this).val());
});

$("#teleredbottom").bind("keyup paste", function() {
    $("#bottom").val($(this).val());
});

$("#telebluetop").bind("keyup paste", function() {
    $("#top").val($(this).val());
});

$("#teleredtop").bind("keyup paste", function() {
    $("#top").val($(this).val());
});

$("#teleblueinner").bind("keyup paste", function() {
    $("#inner").val($(this).val());
});

$("#teleredinner").bind("keyup paste", function() {
    $("#inner").val($(this).val());
});

$("#telebluemissed").bind("keyup paste", function() {
    $("#missed").val($(this).val());
});

$("#teleredmissed").bind("keyup paste", function() {
    $("#missed").val($(this).val());
});

$('#redpickuptrue').bind("input", function() {
   document.getElementById('canpickup').checked = document.getElementById('redpickuptrue').checked;
});

$('#redpickupfalse').bind("input", function() {
   document.getElementById('nopickup').checked = document.getElementById('redpickupfalse').checked;
});

$('#blueclose').bind("input", function() {
   document.getElementById('closestart').checked = document.getElementById('blueclose').checked;
});

$('#bluemiddle').bind("input", function() {
   document.getElementById('middlestart').checked = document.getElementById('bluemiddle').checked;
});

$('#bluefar').bind("input", function() {
   document.getElementById('farstart').checked = document.getElementById('bluefar').checked;
});

$('#redclose').bind("input", function() {
   document.getElementById('closestart').checked = document.getElementById('redclose').checked;
});

$('#redmiddle').bind("input", function() {
   document.getElementById('middlestart').checked = document.getElementById('redmiddle').checked;
});

$('#redfar').bind("input", function() {
   document.getElementById('farstart').checked = document.getElementById('redfar').checked;
});

$('#bstage2false').bind("input", function() {
   document.getElementById('spin2').checked = document.getElementById('bstage2false').checked;
});

$('#bstage2false').bind("input", function() {
   document.getElementById('spin3').checked = document.getElementById('bstage2false').checked;
});

$('#rstage2false').bind("input", function() {
   document.getElementById('spin2').checked = document.getElementById('rstage2false').checked;
});

$('#rstage2false').bind("input", function() {
   document.getElementById('spin3').checked = document.getElementById('rstage2false').checked;
});

$('#bstage2true').bind("input", function() {
   document.getElementById('nospin2').checked = document.getElementById('bstage2true').checked;
});

$('#rstage2true').bind("input", function() {
   document.getElementById('nospin2').checked = document.getElementById('rstage2true').checked;
});

$('#bstage3true').bind("input", function() {
   document.getElementById('nospin3').checked = document.getElementById('bstage3true').checked;
});

$('#rstage3true').bind("input", function() {
   document.getElementById('nospin3').checked = document.getElementById('rstage3true').checked;
});

$('#bluedefended').bind("input", function() {
   document.getElementById('defended').checked = document.getElementById('bluedefended').checked;
});

$('#reddefended').bind("input", function() {
   document.getElementById('defended').checked = document.getElementById('reddefended').checked;
});

$('#bluedefending').bind("input", function() {
   document.getElementById('defending').checked = document.getElementById('bluedefending').checked;
});

$('#reddefending').bind("input", function() {
   document.getElementById('defending').checked = document.getElementById('reddefending').checked;
});

$('#blueclimb').bind("input", function() {
   document.getElementById('yesclimb').checked = document.getElementById('blueclimb').checked;
});

$('#redclimb').bind("input", function() {
   document.getElementById('yesclimb').checked = document.getElementById('redclimb').checked;
});

$('#bluepark').bind("input", function() {
   document.getElementById('yespark').checked = document.getElementById('bluepark').checked;
});

$('#redpark').bind("input", function() {
   document.getElementById('yespark').checked = document.getElementById('redpark').checked;
});

$('#bluehang').bind("input", function() {
   document.getElementById('levelswitch').checked = document.getElementById('bluehang').checked;
});

$('#redhang').bind("input", function() {
   document.getElementById('levelswitch').checked = document.getElementById('redhang').checked;
});

$('#bluerepos').bind("input", function() {
   document.getElementById('yesrepos').checked = document.getElementById('bluerepos').checked;
});

$('#redrepos').bind("input", function() {
   document.getElementById('yesrepos').checked = document.getElementById('redrepos').checked;
});

function Blues(ctx) {
    ctx.lineWidth = 3;
    ctx.strokeStyle = "#007BFF";
    ctx.strokeRect(112, 110, 85, 85);
    this.clicked=function(x, y){
    //   alert("You clicked on blue shooting." + x + ", " + y);
    // document.getElementById("popup1").style.visibility = "visible";
    $("#popup26").toggle(document.getElementById('reviewdiv').innerHTML += '<br>You entered that this blue alliance team shot a total of ' + (parseInt($("#autobluetop").val()) + parseInt($("#autobluebottom").val()) + parseInt($("#autoblueinner").val())) + ' power cells in autonomous.');
    document.getElementById('recent').innerHTML = 'Recent: Blue Shooting';
}  
};
                            
function Redp(ctx) {
    ctx.strokeStyle = "red";
    ctx.strokeRect(112, 278, 85, 85);
    this.clicked=function(x, y){
    //   alert("You clicked on red pickup." + x + ", " + y);
    // document.getElementById("popup2").style.visibility = "visible";
    $("#popup2").toggle();
    document.getElementById('recent').innerHTML = 'Recent: Red Pickup';
    document.getElementById('reviewdiv').innerHTML += '<br>You entered that this red alliance team picked up power cells.';
}
};
                            
function Bluep(ctx) {
    ctx.strokeStyle = "#007bff";
    ctx.strokeRect(802, 115, 85, 85);
    this.clicked=function(x, y){
    //   alert("You clicked on blue pickup." + x + ", " + y);
    // document.getElementById("popup3").style.visibility = "visible";
    $("#popup3").toggle();
    document.getElementById('recent').innerHTML = 'Recent: Blue Pickup';
    document.getElementById('reviewdiv').innerHTML += '<br>You entered that this blue alliance team picked up power cells.';
}
};
                            
function Reds(ctx) {
    ctx.strokeStyle = "red";
    ctx.strokeRect(802, 285, 85, 85);
    this.clicked=function(x, y){
    //   alert("You clicked on red shooting." + x + ", " + y);
    // document.getElementById("popup4").style.visibility = "visible";
    $("#popup4").toggle();
    document.getElementById('recent').innerHTML = 'Recent: Red Shooting';
    document.getElementById('reviewdiv').innerHTML += '<br>You entered that this red alliance team shot a total of ' + (parseInt($("#autoredtop").val()) + parseInt($("#autoredbottom").val()) + parseInt($("#autoredinner").val()) + parseInt($("#teleredtop").val()) + parseInt($("#teleredbottom").val()) + parseInt($("#teleredinner").val()) + parseInt($("#teleredmissed").val())) + ' power cells in autonomous.';
}
};
                            
// function Bcp(ctx) {
    //     ctx.strokeStyle = "#007bff";
    //     ctx.strokeRect(520, 25, 60,70);
    //     this.clicked=function(x, y){
    //     //   alert("You clicked on blue control panel." + x + ", " + y);
    //     // document.getElementById("popup5").style.visibility = "visible";
    //     $("#popup5").toggle();
    //     document.getElementById('recent').innerHTML = 'Blue Control Panel';
    //     document.getElementById('reviewdiv').innerHTML += '<br>You entered that this blue alliance team spun the control panel _' + ' times and progressed to Stage _.';
//     }
// };
                            
// function Rcp(ctx) {
    //     ctx.strokeStyle = "red";
    //     ctx.strokeRect(418, 383, 60, 70);
    //     this.clicked=function(x, y){
    //     //   alert("You clicked on red control panel." + x + ", " + y);
    //     // document.getElementById("popup6").style.visibility = "visible";
    //     $("#popup6").toggle();
    //     document.getElementById('recent').innerHTML = 'Red Control Panel';
    //     document.getElementById('reviewdiv').innerHTML += '<br>You entered that this red alliance team spun the control panel _' + ' times and progressed to Stage _.';
//     }
// };
     
var prevState;
var filled;
     
function redStart(ctx) {
    ctx.strokeStyle = "#007bff";
    ctx.strokeRect(274, 25.5, 15, 425.5);
    this.clicked=function(x, y){
        //   alert("You clicked on blue starting point." + x + ", " + y);
        if(!filled) {
            prevState = document.getElementById("canvas").toDataURL();
            ctx.fillStyle = "#007bff";
            ctx.fillRect(274, 25.5, 15, 425.5);
            filled = true;
            document.getElementById("leftinit").checked = true;
        }
        
        else {
            var canvasPic = new Image();
            canvasPic.src = prevState;
            filled = false;
            document.getElementById("noinit").checked =  true;
            ctx.clearRect(0, 0, document.getElementById("canvas").width, document.getElementById("canvas").height);
            canvasPic.onload = function() {
                ctx.drawImage(canvasPic, 0, 0);
            }
        }
        
        document.getElementById('recent').innerHTML = 'Recent: Red Initiation Line';
        if(filled == true) {
            document.getElementById('reviewdiv').innerHTML += '<br>You entered that this blue alliance team left the initiation line.';
        }
    }
};

var prevState2;
var filled2;
                            
function blueStart(ctx) {
    ctx.strokeStyle = "red";
    ctx.strokeRect(710, 25.5, 15, 425.5);
    this.clicked=function(x, y){
    //   alert("You clicked on red starting point." + x + ", " + y);
    
    if(!filled2) {
            prevState2 = document.getElementById("canvas").toDataURL();
            ctx.fillStyle = "red";
            ctx.fillRect(710, 25.5, 15, 425.5);
            filled2 = true;
            document.getElementById("leftinit").checked = true;
        }
        
        else {
            var canvasPic = new Image();
            canvasPic.src = prevState2;
            filled2 = false;
            document.getElementById("noinit").checked = true;
            ctx.clearRect(0, 0, document.getElementById("canvas").width, document.getElementById("canvas").height);
            canvasPic.onload = function() {
                ctx.drawImage(canvasPic, 0, 0);
            }
        }
        
    document.getElementById('recent').innerHTML = 'Recent: Blue Initiation Line';
    if(filled2 == true) {
        document.getElementById('reviewdiv').innerHTML += '<br>You entered that this red alliance team left the initiation line.';
    }
  }
};
                            
function incrValue(idname, other) {
    var value = parseInt(document.getElementById(idname).value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById(idname).value = value;
    if (other != '') {
        $("#" + other).val( $("#" + idname).val());
        console.log(document.getElementById(other).value);
    }
}

function decrValue(idname, other) {
    value = parseInt(document.getElementById(idname).value, 10);
    value = isNaN(value) ? 0 : value;
    value--;
    if(value<0){
        value=0;
        // $(idname).val($(this).val());
    }
    document.getElementById(idname).value = value;
    if (other != '') {
        $("#" + other).val( $("#" + idname).val());
        console.log(document.getElementById(other).value);
    }
}


function blueShooting(ctx) {
    ctx.lineWidth = 3;
    ctx.strokeStyle = "#007BFF";
    ctx.strokeRect(112, 110, 85, 85);
    this.clicked=function(x, y){
    //   alert("You clicked on blue shooting." + x + ", " + y);
    // document.getElementById("popup9").style.visibility = "visible";
    $("#popup9").toggle();
    document.getElementById('recent').innerHTML = 'Recent: Blue Shooting';
    document.getElementById('reviewdiv').innerHTML += '<br>You entered that this blue alliance team shot a total of ' + (parseInt($("#telebluetop").val()) + parseInt($("#telebluebottom").val()) + parseInt($("#teleblueinner").val()) + parseInt($("#telebluemissed").val())) + ' power cells in teleop.';
    }  
}
                            
//     function redPickup(ctx) {
    //         ctx.strokeStyle = "red";
    //         ctx.strokeRect(112, 278, 85, 85);
    //         this.clicked=function(x, y){
    //         //   alert("You clicked on red pickup." + x + ", " + y);
    //         // document.getElementById("popup10").style.visibility = "visible";
    //         $("#popup10").toggle();
    //         document.getElementById('recent').innerHTML = 'Red Pickup';
    //         document.getElementById('reviewdiv').innerHTML += '<br>You entered that this red alliance team picked up a total of _' + ' power cells.';
    //         }
//     }
                            
// function bluePickup(ctx) {
    //     ctx.strokeStyle = "#007bff";
    //     ctx.strokeRect(802, 115, 85, 85);
    //     this.clicked=function(x, y){
    //     //   alert("You clicked on blue pickup." + x + ", " + y);
    //     // document.getElementById("popup11").style.visibility = "visible";
    //     $("#popup11").toggle();
    //     document.getElementById('recent').innerHTML = 'Blue Pickup';
    //     document.getElementById('reviewdiv').innerHTML += '<br>You entered that this blue alliance team picked up a total of _' + ' power cells.';
    //     }
// }
                            
function redShooting(ctx) {
    ctx.strokeStyle = "red";
    ctx.strokeRect(802, 285, 85, 85);
    this.clicked=function(x, y){
    //   alert("You clicked on red shooting." + x + ", " + y);
    // document.getElementById("popup12").style.visibility = "visible";
    $("#popup12").toggle();
    document.getElementById('recent').innerHTML = 'Recent: Red Shooting';
    document.getElementById('reviewdiv').innerHTML += '<br>You entered that this red alliance team shot a total of ' + (parseInt($("#teleredtop").val()) + parseInt($("#teleredbottom").val()) + parseInt($("#teleredinner").val()) + parseInt($("#teleredmissed").val())) + ' power cells in teleop.';
    }
}
                            
function blueControlPanel(ctx) {
    ctx.strokeStyle = "#007bff";
    ctx.strokeRect(520, 25, 60,70);
    this.clicked=function(x, y){
    //   alert("You clicked on blue control panel." + x + ", " + y);
    // document.getElementById("popup13").style.visibility = "visible";
    $("#popup13").toggle();
    document.getElementById('recent').innerHTML = 'Recent: Blue Control Panel';
    if(document.getElementById('bstage2true').checked) {
        document.getElementById('reviewdiv').innerHTML += '<br>You entered that this blue alliance team spun the control panel and progressed to Stage 2.';
    }
    if(document.getElementById('bstage3true').checked) {
        document.getElementById('reviewdiv').innerHTML += '<br>You entered that this blue alliance team spun the control panel and progressed to Stage 3.';
    }
}
}
                            
function redControlPanel(ctx) {
    ctx.strokeStyle = "red";
    ctx.strokeRect(418, 383, 60, 70);
    this.clicked=function(x, y){
    //   alert("You clicked on red control panel." + x + ", " + y);
    // document.getElementById("popup14").style.visibility = "visible";
    $("#popup14").toggle();
    document.getElementById('recent').innerHTML = 'Recent: Red Control Panel';
    if(document.getElementById('rstage2true').checked) {
        document.getElementById('reviewdiv').innerHTML += '<br>You entered that this red alliance team spun the control panel and progressed to Stage 2.';
    }
    if(document.getElementById('rstage3true').checked) {
        document.getElementById('reviewdiv').innerHTML += '<br>You entered that this red alliance team spun the control panel and progressed to Stage 3.';
    }
}
}
                            
function bSwitch(ctx) {
    ctx.strokeStyle = "#007bff";
    ctx.strokeRect(465, 170, 45, 45);
    this.clicked=function(x, y){
    //   alert("You clicked on blue switch." + x + ", " + y);
    // document.getElementById("popup15").style.visibility = "visible";
    $("#popup15").toggle();
    document.getElementById('recent').innerHTML = 'Recent: Blue Switch';
    if(document.getElementById('bluedefended').checked) {
        document.getElementById('reviewdiv').innerHTML += '<br>You entered that the blue alliance was defended against.';
    }
    if(document.getElementById('bluedefending').checked) {
        document.getElementById('reviewdiv').innerHTML += '<br>You entered that the blue alliance was defending against the other alliance.';
    }
    if(document.getElementById('blueclimb').checked) {
        document.getElementById('reviewdiv').innerHTML += '<br>You entered that the blue alliance climbed onto the switch and stayed in position.';
    }
    if(document.getElementById('bluepark').checked) {
        document.getElementById('reviewdiv').innerHTML += '<br>You entered that the blue alliance parked in the rendezvous zone.';
    }
    if(document.getElementById('bluehang').checked) {
        document.getElementById('reviewdiv').innerHTML += '<br>You entered that the blue alliance switch was level.';
    }
    if(document.getElementById('bluerepos').checked) {
        document.getElementById('reviewdiv').innerHTML += '<br>You entered that the blue alliance had the ability to the reposition on the switch.';
    }
}
}
                            
function rSwitch(ctx) {
    ctx.strokeStyle = "red";
    ctx.strokeRect(495, 260, 45, 45);
    this.clicked=function(x, y){
    //   alert("You clicked on red switch." + x + ", " + y);
    // document.getElementById("popup16").style.visibility = "visible";
    $("#popup16").toggle();
    document.getElementById('recent').innerHTML = 'Recent: Red Switch';
    if(document.getElementById('reddefended').checked) {
        document.getElementById('reviewdiv').innerHTML += '<br>You entered that the red alliance was defended against.';
    }
    if(document.getElementById('reddefending').checked) {
        document.getElementById('reviewdiv').innerHTML += '<br>You entered that the red alliance was defending against the other alliance.';
    }
    if(document.getElementById('redclimb').checked) {
        document.getElementById('reviewdiv').innerHTML += '<br>You entered that the red alliance climbed onto the switch and stayed in position.';
    }
    if(document.getElementById('redpark').checked) {
        document.getElementById('reviewdiv').innerHTML += '<br>You entered that the red alliance parked in the rendezvous zone.';
    }
    if(document.getElementById('redhang').checked) {
        document.getElementById('reviewdiv').innerHTML += '<br>You entered that the red alliance switch was level.';
    }
    if(document.getElementById('redrepos').checked) {
        document.getElementById('reviewdiv').innerHTML += '<br>You entered that the red alliance had the ability to the reposition on the switch.';
    }
}
}
                                    
function init() {
    
    $('.popup').toggle();
    
    var canvas1 = document.getElementById("canvas");
      var ctx = canvas1.getContext('2d');
      var bigBlue = new Blues(ctx);
      var bigRed = new Redp(ctx);
      var bigGreen = new Bluep(ctx);
      var bigYellow = new Reds(ctx);
    //   var bigWhite = new Bcp(ctx);
    //   var bigPurple = new Rcp(ctx);
      var bigBrown = new redStart(ctx);
      var bigViolet = new blueStart(ctx);
  function getCursorPosition1(canvas, event) {
    const rect = canvas1.getBoundingClientRect()
    const x = event.clientX - rect.left
    const y = event.clientY - rect.top
    return [x, y]
}
    canvas.addEventListener('mousedown', function(e) {
        var stuff = getCursorPosition1(canvas, e)
        if (120 < stuff[0] && stuff[0] < 120 + 85 && 100 < stuff[1] && stuff[1] < 100 + 85 )
            bigBlue.clicked(stuff[0], stuff[1])
        if (120 < stuff[0] && stuff[0] < 120 + 85 && 250 < stuff[1] && stuff[1] < 250 + 85 )
            bigRed.clicked(stuff[0], stuff[1])
        if (845 < stuff[0] && stuff[0] < 845 + 85 && 105 < stuff[1] && stuff[1] < 105 + 85 )
            bigGreen.clicked(stuff[0], stuff[1])
        if (845 < stuff[0] && stuff[0] < 845 + 85 && 255 < stuff[1] && stuff[1] < 255 + 85 )
            bigYellow.clicked(stuff[0], stuff[1])
        if (545 < stuff[0] && stuff[0] < 545 + 65 && 22 < stuff[1] && stuff[1] < 22 + 65 )
            bigWhite.clicked(stuff[0], stuff[1])
        if (440 < stuff[0] && stuff[0] < 440 + 65 && 342 < stuff[1] && stuff[1] < 342 + 65 )
            bigPurple.clicked(stuff[0], stuff[1])
        if (285 < stuff[0] && stuff[0] < 285 + 20 && 24 < stuff[1] && stuff[1] < 24 + 380 )
            bigBrown.clicked(stuff[0], stuff[1])
        if (745 < stuff[0] && stuff[0] < 745 + 20 && 24 < stuff[1] && stuff[1] < 24 + 380 )
            bigViolet.clicked(stuff[0], stuff[1])
        if (520 < stuff[0] && stuff[0] < 520 + 45 && 230 < stuff[1] && stuff[1] < 230 + 45 )
            bigLilac.clicked(stuff[0], stuff[1])
        if (490 < stuff[0] && stuff[0] < 490 + 45 && 150 < stuff[1] && stuff[1] < 150 + 45 )
            bigGold.clicked(stuff[0], stuff[1])
    })
    
            var canvas2 = document.getElementById("field");
            var ctx = canvas2.getContext('2d');
            var teleBigBlue = new blueShooting(ctx);
            // var teleBigRed = new redPickup(ctx);
            // var teleBigGreen = new bluePickup(ctx);
            var teleBigYellow = new redShooting(ctx);
            var teleBigWhite = new blueControlPanel(ctx);
            var teleBigPurple = new redControlPanel(ctx);
            var teleBigLilac = new rSwitch(ctx);
            var teleBigGold = new bSwitch(ctx);
            
            function getCursorPosition2(canvas, event) {
                const rect = canvas2.getBoundingClientRect()
                const x = event.clientX - rect.left
                const y = event.clientY - rect.top
                return [x, y]
            }
            
            canvas2.addEventListener('mousedown', function(e) {
                var stuff = getCursorPosition2(canvas, e)
                if (120 < stuff[0] && stuff[0] < 120 + 85 && 100 < stuff[1] && stuff[1] < 100 + 85 )
                    teleBigBlue.clicked(stuff[0], stuff[1])
                if (120 < stuff[0] && stuff[0] < 120 + 85 && 250 < stuff[1] && stuff[1] < 250 + 85 )
                    teleBigRed.clicked(stuff[0], stuff[1])
                if (845 < stuff[0] && stuff[0] < 845 + 85 && 105 < stuff[1] && stuff[1] < 105 + 85 )
                    teleBigGreen.clicked(stuff[0], stuff[1])
                if (845 < stuff[0] && stuff[0] < 845 + 85 && 255 < stuff[1] && stuff[1] < 255 + 85 )
                    teleBigYellow.clicked(stuff[0], stuff[1])
                if (545 < stuff[0] && stuff[0] < 545 + 65 && 22 < stuff[1] && stuff[1] < 22 + 65 )
                    teleBigWhite.clicked(stuff[0], stuff[1])
                if (440 < stuff[0] && stuff[0] < 440 + 65 && 342 < stuff[1] && stuff[1] < 342 + 65 )
                    teleBigPurple.clicked(stuff[0], stuff[1])
                if (285 < stuff[0] && stuff[0] < 285 + 20 && 24 < stuff[1] && stuff[1] < 24 + 380 )
                    teleBigBrown.clicked(stuff[0], stuff[1])
                if (745 < stuff[0] && stuff[0] < 745 + 20 && 24 < stuff[1] && stuff[1] < 24 + 380 )
                    teleBigViolet.clicked(stuff[0], stuff[1])
                if (520 < stuff[0] && stuff[0] < 520 + 45 && 230 < stuff[1] && stuff[1] < 230 + 45 )
                    teleBigLilac.clicked(stuff[0], stuff[1])
                if (490 < stuff[0] && stuff[0] < 490 + 45 && 150 < stuff[1] && stuff[1] < 150 + 45 )
                    teleBigGold.clicked(stuff[0], stuff[1])
            })
        }
            
$(document).ready(function() {
    init();   
});