<?php
    session_start();
if (isset($_SESSION['login_user'])){

    $user=$_SESSION['login_user'];
}

//Do isset with $_POST
include_once ('SecurityAndValidation.php');
if (isset($_POST["textInput2"])){
    $movieSearch=Security($_POST["textInput2"]);
    MovieSearch($movieSearch);
}



function MovieSearch($movieSearch){
    $connection=mysqli_connect("127.0.0.1", "root", "root", "eventsys")
        or die(mysqli_error($connection));

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }else{
        $query="SELECT event_name , duration , event.description , venues.venue_name, event.event_id FROM event JOIN venues  ON venues.venue_id=event.venue_id WHERE event.event_name LIKE \"%".strval($movieSearch)."%\";";

        $db_answer=mysqli_query($connection,$query)
            or die(mysqli_error($connection));

       // $i=array_values(mysqli_fetch_assoc($db_answer));
        $i=array();
        while ($row=mysqli_fetch_assoc($db_answer)){
            $j=array_values($row);
            for($k=0;$k<count($j);$k++){
                array_push($i,$j[$k]);
            }
        }
        if (count($i)==0){
            $searchQuery=strval($movieSearch).', no events were found. Try again';
            return include_once ('inputButtonSearch.php');
        }else{
            $event_name=$i[0];
            $duration=$i[1];
            $description=$i[2];
            $venue_name=$i[3];
            $event_id=$i[4];
            $category=$i[5];
            $event_time=$i[6];
            //return include_once("movieSearchTables.php");

                return include_once ("Event_Manager2.php");

        }





    }
}
function Search($searchQuery){

    return  include("inputButtonSearch.php");
}

?>