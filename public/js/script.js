$(function() {

    // Enable on all forms
    $('form').areYouSure();

});

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function plus(countName){
  var count = countName.value;
  if (count < 12)
    count++;
  countName.value = count;
}

function minus(countName){
  var count = countName.value;
  if (count > 0)
    count--;
  countName.value = count;
}

function plusC(countName){
  var count = countName.value;
  if (count < 8)
    count++;
  countName.value = count;
}

        var notification;
        var container = document.querySelector('#notification-container');
        var visible = false;
        var queue = [];
        
        function createNotification() {
            notification = document.createElement('div');
            var btn = document.createElement('button');
            var title = document.createElement('div');
            var msg = document.createElement('div');
            btn.className = 'notification-close';
            title.className = 'notification-title';
            msg.className = 'notification-message';
            btn.addEventListener('click', hideNotification, false);
            notification.addEventListener('animationend', hideNotification, false);
            notification.addEventListener('webkitAnimationEnd', hideNotification, false);
            notification.appendChild(btn);
            notification.appendChild(title);
            notification.appendChild(msg);
        }
        
        function updateNotification(type, title, message) {
            notification.className = 'notification notification-' + type;
            notification.querySelector('.notification-title').innerHTML = title;
            notification.querySelector('.notification-message').innerHTML = message;
        }
        
        function showNotification(type, title, message) {
            if (visible) {
                queue.push([type, title, message]);
                return;
            }
            if (!notification) {
                createNotification();
            }
            updateNotification(type, title, message);
            container.appendChild(notification);
            visible = true;
        }
        
        function hideNotification() {
            if (visible) {
                visible = false;
                container.removeChild(notification);
                if (queue.length) {
                    showNotification.apply(null, queue.shift());
                }
            }
        }
        
        document.querySelector('#notif').addEventListener('click', showNotification.bind(null, 'info', "<b><i class='fas fa-keyboard' style='font-size: 50px;'></i></b><br>Keyboard Shortcuts Toggled", ""), false);
        
        document.querySelector('#rc').addEventListener('click', showNotification.bind(null, 'info', "<b><i class='fas fa-rocket' style='font-size: 50px;'></i></b><br>Rocket Cargo Modified", ""), false);
        document.querySelector('#rp').addEventListener('click', showNotification.bind(null, 'info', "<b><i class='fas fa-rocket' style='font-size: 50px;'></i></b><br>Rocket Panels Modified", ""), false);
        document.querySelector('#cc').addEventListener('click', showNotification.bind(null, 'info', "<b><i class='fas fa-ship' style='font-size: 50px;'></i></b><br>Cargo Ship Cargo Modified", ""), false);
        document.querySelector('#cp').addEventListener('click', showNotification.bind(null, 'info', "<b><i class='fas fa-ship' style='font-size: 50px;'></i></b><br>Cargo Ship Panels Modified", ""), false);

        var shortcuts = false;
        var sandstorm = true;
        
        function jump(h){
            var url = location.href;               //Save down the URL without hash.
            location.href = "#"+h;                 //Go to the target element.
            history.replaceState(null,null,url);   //Don't like hashes. Changing it back.
        }
        
        var ar=new Array(33,34,35,36,37,38,39,40);

        $(document).keydown(function(e) {
             var key = e.which;
              //console.log(key);
              //if(key==35 || key == 36 || key == 37 || key == 39)
              if($.inArray(key,ar) > -1) {
                  e.preventDefault();
                  return false;
              }
              return true;
        });
        
        document.onkeyup = function(e) {
          if(e.ctrlKey && e.which == 32) {
            if(shortcuts) {
              $("#notif").click();
              document.getElementById("gameCard").style.background = "#fff";
              document.getElementById("sandstormCard").style.background = "#fff";
            } else {
              $("#notif").click();
              document.getElementById("sandstormCard").style.background = "#ffcc00";
            }
            shortcuts = !shortcuts;
          }
            
          if(shortcuts && !e.ctrlKey) {
            if(e.which == 32) {
                sandstorm = !sandstorm;
                if(sandstorm) {
                  jump("sandstorm");
                  document.getElementById("gameCard").style.background = "#fff";
                  document.getElementById("sandstormCard").style.background = "#ffcc00";
                } else {
                  jump("game");
                  document.getElementById("sandstormCard").style.background = "#fff";
                  document.getElementById("gameCard").style.background = "#ffcc00";
                }
            } else {
                if(sandstorm) {
                    if(e.shiftKey) {
                        if(e.which == 68 || e.which == 39) {
                            plusC(cargoShipCargo1); //D
                            $("#cc").click();
                        } else if(e.which == 65 || e.which == 37) {
                            minus(cargoShipCargo1); //A
                            $("#cc").click();
                        } else if(e.which == 87 || e.which == 38) {
                            plus(rocketCargo1); //W
                            $("#rc").click();
                        } else if(e.which == 83 || e.which == 40) {
                            minus(rocketCargo1); //S
                            $("#rc").click();
                        }
                    } else {
                        if(e.which == 68 || e.which == 39) {
                            plusC(cargoShipPanels1); //D
                            $("#cp").click();
                        } else if(e.which == 65 || e.which == 37) {
                            minus(cargoShipPanels1); //A
                            $("#cp").click();
                        } else if(e.which == 87 || e.which == 38) {
                            plus(rocketPanels1); //W
                            $("#rp").click();
                        } else if(e.which == 83 || e.which == 40) {
                            minus(rocketPanels1); //S
                            $("#rp").click();
                        }
                    }
                } else {
                    if(e.shiftKey) {
                        if(e.which == 68 || e.which == 39) {
                            plusC(cargoShipCargo2); //D
                            $("#cc").click();
                        } else if(e.which == 65 || e.which == 37) {
                            minus(cargoShipCargo2); //A
                            $("#cc").click();
                        } else if(e.which == 87 || e.which == 38) {
                            plus(rocketCargo2); //W
                            $("#rc").click();
                        } else if(e.which == 83 || e.which == 40) {
                            minus(rocketCargo2); //S
                            $("#rc").click();
                        }
                    } else {
                        if(e.which == 68 || e.which == 39) {
                            plusC(cargoShipPanels2); //D
                            $("#cp").click();
                        } else if(e.which == 65 || e.which == 37) {
                            minus(cargoShipPanels2); //A
                            $("#cp").click();
                        } else if(e.which == 87 || e.which == 38) {
                            plus(rocketPanels2); //W
                            $("#rp").click();
                        } else if(e.which == 83 || e.which == 40) {
                            minus(rocketPanels2); //S
                            $("#rp").click();
                        }
                    }
                }
            }
          }
        };    