<!doctype html>

@section('title')
Welcome
@endsection

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
        <div id="alert" style="margin-top: 20px;" class="alert alert-danger">
        
        <p style="padding: 0; font-size: 16pt; text-align: center;">
                   <b> SUSPENSION OF 2020 SEASON</b><br>
<span style="font-size: 14pt;">All season play across all <i>FIRST</i> programs has been cancelled worldwide.
Team 1676 will no longer be competing in any official 2020 season events.
For more information and FAQs, please visit the <a href="https://www.firstinspires.org/covid-19" target="_blank"><i>FIRST</i> website</a>.</span></p>
        
    </div>
        <h2 style="text-align:center;color:black;">Login with Google</h2>
        
        
        
        <div class="mt-5">
            <a href="http://scoutingdev.team1676.com/redirect" class="btn btn-primary ">Login with Google</a>
            </div>
        
      <!--  <form action="?" method="POST">-->
      <!--    <meta name="google-signin-client_id" content="AIzaSyAF6bfHuLWOPvMdgbxK3VljLQNFMos_3SI">-->
      <!--  <meta name="google-signin-client_id" content="602921076190-pe6i4ktnon51hg2jmg0udclpolebao7b.apps.googleusercontent.com">-->
      <!--<script>-->
      <!--  function onSuccess(googleUser) {-->
      <!--    console.log('Logged in as: ' + googleUser.getBasicProfile().getName());-->
      <!--    window.location.href = "raspberries.html";-->
      <!--  }-->
      <!--  function onFailure(error) {-->
      <!--    console.log(error);-->
      <!--  }-->
      <!--  function renderButton() {-->
      <!--    gapi.signin2.render('my-signin2', {-->
      <!--      'scope': 'profile email',-->
      <!--      'width': 240,-->
      <!--      'height': 50,-->
      <!--      'longtitle': true,-->
      <!--      'theme': 'dark',-->
      <!--      'onsuccess': onSuccess,-->
      <!--      'onfailure': onFailure-->
      <!--    });-->
      <!--  }-->
      <!--</script>-->
    
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

// if(!isset($_SESSION["robot"])) {
   
//     echo "<script src='https://www.google.com/recaptcha/api.js' async defer></script>";
   
//     if (!empty($_POST)) {
//         $post_data = http_build_query(
//     array(
//         'secret' => '6Ld7M7MUAAAAAJgnUgiKd_Li8Snury-0RtdmFcPn',
//         'response' => $_POST['g-recaptcha-response'],
//         'remoteip' => $_SERVER['REMOTE_ADDR']
//     )
// );
// $opts = array('http' =>
//     array(
//         'method'  => 'POST',
//         'header'  => 'Content-type: application/x-www-form-urlencoded',
//         'content' => $post_data
//     )
// );
// $context  = stream_context_create($opts);
// $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
// $result = json_decode($response);
// if (!$result->success) {
//     throw new Exception('Gah! CAPTCHA verification failed.', 1);
// } else {
//     $_SESSION["robot"] = 1;
//     header("Refresh:0");
// }

//     } else {
       
//         echo '
//               <script type="text/javascript">
//       var onloadCallback = function() {
//         grecaptcha.render("example3", {
//           "sitekey" : "6Ld7M7MUAAAAADRhWYEq141iSneMPS_t8K4Q05E-",
//           "theme" : "dark"
//         });
//       };
//     </script>
   
//     <!-- POSTs back to the pages URL upon submit with a g-recaptcha-response POST parameter. -->
   
//     <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
//         async defer>
//     </script>';
//     }
// }

// END RECAPTCHA SCREENING
    ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
  </html>