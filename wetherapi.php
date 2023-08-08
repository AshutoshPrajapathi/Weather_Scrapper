<?php
$weather="";
$error = "";

if($_GET['city']){
$urlcontent =  file_get_contents("http://api.weatherstack.com/current?access_key=f8c433c849faeeb7615c1b58ff018cd8&query=".$_GET['city']."");
$weatherArray = json_decode($urlcontent,true);
if(array_key_exists('success',$weatherArray)){
    $error = "Couldn't find City";
    }else{
    
    $weather =  "The temperature of ".urlencode($_GET['city'])." is ".$weatherArray['current']['temperature']."&degC ".$weatherArray['current']['weather_descriptions'][0];
    $weather .="<br>Wind speed: ".$weatherArray['current']['wind_speed']."km/h";
    $weather .=" and Humidity: ".$weatherArray['current']['humidity']."%";
    }
}else{
    $error = "Something went wrong";
}



?>




<!doctype html>
<html lang="en">
  <head>
    <title>Weather Scrapper</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <style>
    html {
    background: url('weatherbackground.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
body{
    background: none;
}
.container{
    text-align: center;
    margin-top: 250px;
    width: 550px;
}
#submit{
    margin-top: 50px;
}
#city1{
    margin-top: 15px;
    padding: 10px;

}
#weather{
    margin-top: 20px;
}


  </style>
  </head>
  <body>
    <div class="container">
        <h1>What's the Weather?</h1>
    
<form method="GET">
  <div class="form-group">
    <label for="city">Enter the name of your city </label>
    <input type="text" name ="city" class="form-control" id="city1" placeholder="E.g Bangalore">
  </div>
  <div class="form-group">
  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
  </div>
  <div id="weather">
    <?php 
    if($weather){
        echo '<div class="alert alert-success" role="alert">
        ' . $weather .'
      </div>';
     }else{
        echo '<div class="alert alert-danger" role="alert">
        ' . $error.'
      </div>';
     }
    ?>
  </div>
  

  
</form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>