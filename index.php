<?php
  error_reporting(E_ERROR | E_PARSE);
  $weather = "";
  $error = "";

    if(isset($_GET['city'])){
    $urlContent = file_get_contents('https://api.openweathermap.org/data/2.5/weather?q='.$_GET['city'].'&units=metric&appid=36b784afa56c747905fc4296f3d38f11');
    
    $forcastArray = json_decode($urlContent, true);



    if ($forcastArray['cod'] == 200) {
      $weather = 'The weather in '.$_GET["city"].' is '.$forcastArray['weather'][0]['description'];

      $weather = $weather.'. The temperature is '.$forcastArray['main']['temp'].' &#8451'.'. The speed of wind is '.$forcastArray['wind']['speed'].' m/sec';
    } else {
      $error = "The city name is incorrect, please try another name";
    }

   
  }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <title>Weather App</title>
  </head>
  <body>
    
    <div class="container" id="mainDiv">
      <h1>Weather In The City</h1>

      <form>
        <div class="form-group">
          <label for="city">Input a city name</label>
          <input class="form-control" id="city" name="city" aria-describedby="Forcast city" placeholder="Enter city name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>

    <div id="forecastDiv">
      
      
        <?php
        if ($weather) { 
           echo '<div class="alert alert-primary" role="alert">'.$weather.'.'.'</div>';
        } else if($error) {
          echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
        }
        
        ?>
     

    </div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    
  </body>
</html>