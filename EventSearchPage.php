<!DOCTYPE html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">




    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>




    <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">




    <link href="css/eventspage.css" rel="stylesheet">
    <script src="js/eventspage.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Datepicker - Default functionality</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
    </head>





<body background="event_backpic.jpg">
<nav id="topNavBar" class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">EventFinder</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.html">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About us</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <a class="nav-link" href="signupboot.html" >Login </a>
        <a class="nav-link" href="signup.html">Sign-up  </a>
        <form class="form-inline my-2 my-lg-0" method="post" action="controler.php">
            <input name="input1" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<br>
<section>
    <h1> Find an Event </h1>


    <div class="container">
        <div class="row">
            <div class="column">

                <p>Google Map<p>

                <div id="map"></div>
                <br>

                <div class="input-group"id="box">
                    <select name="type" id="type" placeholder="Genre" aria-label="Genre">
                        <option value="Genre1">Genre1</option>
                        <option value="Genre2">Genre2</option>
                        <option value="Genre3">Genre3</option>
                    </select>
                </div>
                <div class="input-group"id="box">
                    <select name="type" id="type" placeholder=Venue"aria-label="Venue">
                        <option value="Venue1">Venue1</option>
                        <option value="Venue2">Venue2</option>
                        <option value="Venue2">Venue3</option>
                    </select>
                </div>

                <div class="input-group"id="box">
                    <select name="type" id="type" placeholder=Venue"aria-label="Price">
                        <option value="£0-£10">£0-£10</option>
                        <option value="£10-£25">£10-£25</option>
                        <option value="£25-£50">£25-£50</option>
                        <option value="£50+">£50+</option>
                    </select>
                </div>
                <div class="input-group">
                    <input type="text" id="datepicker" placeholder="Choose Date">
                </div>





            </div>
        </div>

        <section>
            <div class="column">
                <form class="form-inline my-2 my-lg-0" method="post" action="controler.php">
                    <input name="input1" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="searchbox">
                </form>
                <br>
                <table style="width:100%">
                    <tr>
                        <td>
                            <img src="../js/justin_pic.jpg" alt="justin" id="justin">

                        </td>
                        <td>SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT
                            TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXTSAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE
                            TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE
                            TEXT</td>
                    </tr>
                </table>
                <br>
                <table style="width:100%">
                    <tr>
                        <td>
                            <img src="../js/justin_pic.jpg" alt="justin" id="justin">

                        </td>
                        <td>SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT
                            TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXTSAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE
                            TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE
                            TEXT</td>
                    </tr>
                </table>
                <br>
                <table style="width:100%">
                    <tr>
                        <td>
                            <img src="../js/justin_pic.jpg" alt="justin" id="justin">

                        </td>
                        <td>SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT
                            TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXTSAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE
                            TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE
                            TEXT</td>
                    </tr>
                </table>
                <br>
                <table style="width:100%">
                    <tr>
                        <td>
                            <img src="../js/justin_pic.jpg" alt="justin" id="justin">

                        </td>
                        <td>SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT
                            TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXTSAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE
                            TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE TEXT SAMPLE
                            TEXT</td>
                    </tr>
                </table>


            </div>
        </section>
    </div>
    </div>
</section>
</body>
<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
</html>

