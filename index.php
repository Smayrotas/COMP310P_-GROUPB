<?php
session_start();
if (isset($_GET['ticket_no'])){
    header('Refresh: 3 ;index.php');
}
$user=$_SESSION['login_user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="css/MainCSSStylesheet.css">
    <title>Event Finder</title>
</head>

<body name="body1" id="Body">

<nav id="topNavBar" class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">EventFinder</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a id="Home" class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a id="CreateEvent" class="nav-link" href="index.php">Create Event<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a id="BookedEvents"class="nav-link" href="index.php">Booked Events<span class="sr-only">(current)</span></a>
        </li>
    </ul>

        <a id="Login" class="nav-link" href="signupboot.html" >Login </a>
        <a id="Signup" class="nav-link" href="signup.html">Sign-up  </a>
        <form id="input2Form" class="form-inline my-2 my-lg-0" method="post" action="controler.php">
            <input id="input2" name="textInput2" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button id="button2" class="btn btn-outline-success my-2 my-sm-0"   type="submit">Search</button>
        </form>
    </div>
</nav>
<?php
if (isset($_GET['ticket_no'])){
    $ticketsBought=$_GET['ticket_no'];
    echo "<div class=\"container\">
        <h1 class=\"display-3\" style=\"color: lawngreen\"><strong>You have booked ".$ticketsBought." tickets. You you will be redirected to the home page soon</strong></h1>
    </div>";

}else if (isset($_GET['event_name'])){
    $event_name=$_GET['event_name'];
    echo "<div class=\"container\">
        <h1 class=\"display-3\" style=\"color: lawngreen\"><strong>You have created ".$event_name."</strong></h1>
    </div>";
}
?>

<script type="text/javascript" src="/js/jquery-3.2.1%20(1).js"></script>
<script type="text/javascript" src="js/JavaScriptFunctions.js"></script>

<?php include_once ('phpScriptElements.php')?>
</body>
</html>
