<?php
session_start();
$user=$_SESSION['login_user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create an Event</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <html>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <html lang="en">

    <link href="css/eventspage.css" rel="stylesheet">
    <script src="js/eventspage.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event Manager</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </html>
<body background="event_backpic.jpg">
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
        <form class="form-inline my-2 my-lg-0" method="post" action="controler.php">
            <input name="input1" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

</nav>
<h1>Create an Event</h1>
<h2>Image</h2>
<form id="container" action="CreateEventControler.php" method="get" style="width:100%;">
    <div id="left">
        <img src="profile_pic.png" alt="Profile pic" id="profile">
        <br></br>

    </div>
    <div class="upload"id="upload_button">
<!--
        <button class="btn btn-lg btn-primary btn-block" type="upload">Upload image</button>
    </div>
    <p>Your submission will be considered by the administration team and you will receive a confirmation email in the next days.
    </p>
    -->
            <div name="name" class="input-group"id="box">
                <span class="input-group-addon" id="basic-addon3">Event Name</span>
                <input name="name" type="text" class="form-control"  aria-describedby="basic-addon3">
            </div>
            <br>
            <div name="venue" class="input-group"id="box">
                <span class="input-group-addon" id="basic-addon3">Date</span>
                <input name="date" type="date" class="form-control" aria-describedby="basic-addon3">
            </div>
            <br>
            <div  class="input-group"id="box">
                <span class="input-group-addon" id="basic-addon3">Venue</span>
                <select name="venue" >
                    <option value="KOKO">KOKO</option>
                </select>
            </div>
            <br>
            <div name="duration" class="input-group"id="box">
                <span class="input-group-addon" id="basic-addon3">Duration</span>
                <input name="duration" type="text" class="form-control"  aria-describedby="basic-addon3">
            </div>
            <br>
            <div name="category" class="input-group"id="box">
                <span class="input-group-addon" id="basic-addon3">Category</span>
                <input name="category" type="text" class="form-control"  aria-describedby="basic-addon3">
            </div>
            <div name="ticket_no" class="input-group"id="box">
                <span class="input-group-addon" id="basic-addon3">Ticket Nubmer</span>
                <input name="ticket_no" type="text" class="form-control"  aria-describedby="basic-addon3">
            </div>
            <br>
            <div name="venue" class="input-group"id="box">
                <span class="input-group-addon" id="basic-addon3">Sales End Date</span>
                <input name="end_date" type="date" class="form-control" aria-describedby="basic-addon3">
            </div>
            <input type="hidden" name="userEmail" value="<?php echo strval($user);?>" />
                <div class="input-group" id="description_box">
                    <span class="input-group-addon" id="basic-addon3">Description</span>
                    <textarea name="description" cols="40" rows="5" ></textarea>
                </div>


                    <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>

         </form>



<?php include_once ('phpScriptElements.php')?>

</body>
</html>