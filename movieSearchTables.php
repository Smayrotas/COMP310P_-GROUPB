
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
        <form class="form-inline my-2 my-lg-0" method="post" action="controler.php">
            <input name="input1" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<script src="js/JavaScriptFunctions.js"></script>
<br/><br/><br/>
<?php


$numberOfRows=ceil(count($i)/12);
$numberOfBoxes=ceil(count($i)/4);

function rowCreator($numberOfRows, $numberOfBoxes, $i){

    for ($k=0;$k<=($numberOfRows-1);$k++) {
        echo "<section id=\"plans\">
            <div class=\"row\">";

        for ($j = 0; $j<=($numberOfBoxes-1); $j++) {
            echo " <div class=\"col-md-4 text-center\">
                        <div class=\"panel panel-danger panel-pricing\">
                            <ul class=\"list-group text-center\">";
            for ($z=0;$z<=2;$z++){

                echo  "<li class=\"list-group-item\"><i class=\"fa fa-check\">"; echo $i[$z+4*$j+12*$k];  echo "</i>";

            }
            echo"
                            </ul>
                            <div class=\"panel-footer\">
                               <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModalPopovers\">Launch demo modal</button>
                            </div>
                        </div>
                    </div>
                    
                    ";
        }

        echo "</div>
            </section>";
    }
}

rowCreator($numberOfRows,$numberOfBoxes,$i);


if(isset($_SESSION['login_user'])){
    $user=$_SESSION['login_user'];
    echo "<script>
document.getElementById('Login').innerHTML='Logout';

document.getElementById('Login').href='SessionDestroyed.php';
document.getElementById('Signup').innerHTML='Welcome ".$user."';
</script>";
}

?>
<!-- /Plans -->
</body>
</html>