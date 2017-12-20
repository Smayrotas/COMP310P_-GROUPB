<?php

if (isset($_GET['user'])){
    session_start();
    $user=$_SESSION['login_user'];
}
if(isset($_GET['Ind'])){
    $GLOBALS['Ind']=$_GET['Ind'];
}


?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <html lang="en">

    <link href="css/eventspage.css" rel="stylesheet">
    <script src="js/eventspage.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event Manager</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">


<body background="event_backpic.jpg">
<nav id="topNavBar" class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">EventFinder</a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a id="Home" class="nav-link" href="index.html">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a id="CreateEvent" class="nav-link" href="NotLoggedIn.php">Create Event<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a id="BookedEvents"class="nav-link" href="NotLoggedIn.php">Booked Events<span class="sr-only">(current)</span></a>
        </li>
    </ul>
        <a id="Login" class="nav-link" href="signupboot.html" >Login </a>
        <a id="Signup" class="nav-link" href="signup.html">Sign-up  </a>
        <form class="form-inline my-2 my-lg-0" method="post" action="controler.php">
            <input id="input2" name="textInput2" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<br>
<div>
    <h1> <?php if (isset($GLOBALS['Ind'])){
    echo " <div class=\"container\">
        <h1 class=\"display-3\" style=\"color: lawngreen\"><strong>You have Booked the events bellow</strong></h1>
    </div>";
        }else{
        echo "Find Events";
        }?></h1>


    <div class="container">
        <div class="row">
            <div class="column">

                <p>Google Map<p>

                <div id="map"></div>
                <br>
                <form action="EventSearch.php" method="get">

                <div class="input-group"id="box">
                    <input id="category" name="category" type="text" placeholder="Choose Category">
                    <button id="categoryButton" class="btn btn-outline-success my-2 my-sm-0"  " type="submit">Search Category</button>

                </div>
                </form>

                <form action="EventSearch.php" method="get">
                <div class="input-group">
                    <input name="datefrom" type="date" id="datepickerFrom" placeholder="Choose Date">
                </div>

                <div>
                    <input name="dateto" type="date" id="datepickerTo" placeholder="Choose Date">
                    <button id="buttonDatePicker" class="btn btn-outline-success my-2 my-sm-0"  " type="submit">Search TimeFrames</button>
                </div>


</form>

            </div>
        </div>
    </div>
</div>


<section>
    <div class="column">
        <form class="form-inline my-2 my-lg-0" method="post" action="controler.php">
            <input name="input2" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="searchbox">
        </form>
        <?php
        include ('IndividualsEvents.php');
        if(isset($user)){
            $i=findUserBookings($connection,findUserId($connection));
            $numberOfBoxes=ceil(count($i)/5);
            EventCreator($numberOfBoxes,$i);
        }else{
            $numberOfBoxes=ceil(count($i)/5);
            EventCreator($numberOfBoxes,$i);

        }

        if(isset($_SESSION['login_user'])){
            $user=$_SESSION['login_user'];
            echo "<script>
document.getElementById('Login').innerHTML='Logout';

document.getElementById('Login').href='SessionDestroyed.php';
document.getElementById('Signup').innerHTML='Welcome ".$user."';
</script>";
        }

        ?>

    </div>
</section>
</body>

<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
<script type="text/javascript" src="/js/jquery-3.2.1%20(1).js"></script>
<script type="text/javascript" src="js/CategoryAndTimeFrames.js"></script>
<?php include_once ('phpScriptElements.php')?>
?>
