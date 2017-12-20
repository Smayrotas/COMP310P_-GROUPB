<?php
session_start();
$user=$_SESSION['login_user'];
if (isset($_GET['event'])){
    $eventid=$_GET['event'];
    $array=unserialize(urldecode($_GET['arr']));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <html>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">

    <link rel="icon" href="../../../../favicon.ico">


    <!-- Bootstrap core CSS -->

    <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Booking</title>
    <link href="../css/booking.css" rel="stylesheet">
    </html>



<body background="event_backpic.jpg">
<nav id="topNavBar" class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">EventFinder</a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a id="Home" class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a id="CreateEvent" class="nav-link" href="NotLoggedIn.php">Create Event<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a id="BookedEvents"class="nav-link" href="index.php">Booked Events<span class="sr-only">(current)</span></a>
        </li>
    </ul>
        <a id="Login" class="nav-link" href="signupboot.html" >Login </a>
        <a id="Signup" class="nav-link" href="signup.html">Sign-up  </a>
        <form class="form-inline my-2 my-lg-0" method="post" action="controler.php">
            <input name="input1" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>


<h1>Booking</h1>

<?php
include_once ("ticketBooking.php");
$connection= db_connect();

$availability=TicketsAvailable($connection,$eventid);

echo "<div class=\"container\"id=\"info\">
    <p>Last day of Purchase:".strval($availability[1])."</p><br>

</div>
<div class=\"container\"id=\"info2\">
    <p>Status:".strval($availability[0])." remaining</p>
</div>";
?>



<form class="container" id="container" action="ticketBooking.php" method="get">


    <div name ="ticketno"class="input-group"id="box2">
        <span class="input-group-addon" id="basic-addon3">Tickets</span>
        <select name="type" id="type">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
        </select>
    </div>
    <br></br>
    <input type="hidden" name="eventid" value="<?php echo strval($eventid);?>" />
    <div>
        <br><br><br><br><br>
        <button class="btn btn-outline-success my-2 my-sm-0"  onclick="return checkIfEmpty(document.getElementById('buy').value);" type="submit">Buy</button>
    </div>
</form>
</body>
<?php include_once ('phpScriptElements.php')?>
</html>
