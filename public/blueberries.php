<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <link rel="stylesheet" href="something.css">
    <title>Scouting</title>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
  <body>

    <style>
        body{
            background-image: url('https://www.firstinspires.org/sites/default/files/uploads/resource_library/brand/first-rise/wallpaper/FIRST-RISE-wallpaper-night-city-programs-vert-desktop.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

    <div style="background:white;width:450px;height:550px;border-radius:25px;margin-left:22.5%;margin-top:8%;text-align:center;padding-top:1%;">
        <h1 style="font-size:49px;">Welcome to Scouting 2020!</h1>
        <h2 style="text-align:center;color:black;">Login with Google</h2>

        <form action="?" method="POST">
          <meta name="google-signin-client_id" content="AIzaSyAF6bfHuLWOPvMdgbxK3VljLQNFMos_3SI">
        <meta name="google-signin-client_id" content="602921076190-pe6i4ktnon51hg2jmg0udclpolebao7b.apps.googleusercontent.com">
      <script>
        function onSuccess(googleUser) {
          console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
          window.location.href = "raspberries.html";
        }
        function onFailure(error) {
          console.log(error);
        }
        function renderButton() {
          gapi.signin2.render('my-signin2', {
            'scope': 'profile email',
            'width': 240,
            'height': 50,
            'longtitle': true,
            'theme': 'dark',
            'onsuccess': onSuccess,
            'onfailure': onFailure
          });
        }
      </script>

      <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
          <!--<div style="margin-top:10%;margin-left:16%;" id="example3"></div>-->
          <div style="margin-top:15%;margin-left:22.5%;margin-bottom:5%;" id="my-signin2"></div>
          <br>
          <!--<a href="raspberries.html"><input style="width:150px;height:60px;font-size:22.5px;" type="button" class="btn btn-primary" value="Sign In"></a>-->
        </form>
        <div class="row">
            <img style="height:139px;width:139px;margin-left:9.5%;margin-top:5%;" src="https://team1676.com/archive/v6/css/img/about_1.png">
            <img style="height:87.6px;width:282px;margin-top:9%;" src="https://social.ford.com/content/ford-steam/programs/first-robotics/_jcr_content/heading-par/image.img.png/1505490844837.png">
        </div>
    </div>


    <?php

    // unneccessary capcha stuff
    // START RECAPTCHA SCREENING

    // deleted

// END RECAPTCHA SCREENING
    ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
  </html>
