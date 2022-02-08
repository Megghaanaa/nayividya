<!-- 834157280742-or7n1luicd82u7g73s5od8go48p5n7hv.apps.googleusercontent.com -->
<!-- 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 -->

<?php

//index.php

//Include Configuration File
include('config.php');

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];


  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

//   if(!empty($data['family_name']))
//   {
//    $_SESSION['user_last_name'] = $data['family_name'];
//   }

//   if(!empty($data['email']))
//   {
//    $_SESSION['user_email_address'] = $data['email'];
//   }

//   if(!empty($data['gender']))
//   {
//    $_SESSION['user_gender'] = $data['gender'];
//   }

//   if(!empty($data['picture']))
//   {
//    $_SESSION['user_image'] = $data['picture'];
//   }
 }
}


if(!isset($_SESSION['access_token']))
{

    
    $login_button = '<a href="'.$google_client->createAuthUrl().'">
    <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form>
    <h2>Hello Mate!👋</h2>
    <h4>New To Vidyavaan?</h4>
    <h5><button>Sign up and discover great amount of new opportunities!🎈</button> </h5>

   

   
    <div class="social">
    <div class="go">
    
    <i class="fab fa-google"></i>  Google</div>
    
    
    </div>
</form></a>';
   
}

?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/508a917d63.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="loginpage.css">


 
 </head>
 <body>
  <div class="container">
   <br />
   <h2 align="center"></h2>
   <br />
   <div class="panel panel-default">
   <?php
   if($login_button == '')
   {
   

    echo '<h3>
    <button class="one">
    Welcome '.$_SESSION['user_first_name'].' To Vidyavaan! '.'
    </button>
    </h3>';
    
    echo '<h3><a href="home.html">
    <button class="two">
    CONTINUE
    </button>
    </h3></div>';
   
   }
   else
   {
    echo '<div align="center">'.$login_button . '</div>';
   }
   ?>
   </div>
  </div>
 </body>
</html>