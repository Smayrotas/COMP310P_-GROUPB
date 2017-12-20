<?php
session_start();
//make sure you dont input blanks

include_once ("SecurityAndValidation.php");
if(isset($_GET['date']) and isset($_GET['venue']) and isset($_GET['description']) and isset($_GET['description']) and isset($_GET['name']) and isset ($_GET['duration']) ){
    $date=Security($_GET['date']);
    $venue=Security($_GET['venue']);
    $description=Security($_GET['description']);
    $name=Security($_GET['name']);
    $duration=Security($_GET['duration']);
    $category=Security($_GET['category']);
    if(isIntValid((int)$_GET['ticket_no'])==true){
        $ticket_no=(int)$_GET['ticket_no'];
    }
    $end_date=Security($_GET['end_date']);
    $event_id=Security(CreateEventId($name));
    CreateEvent($date,$venue,$description,$name,$duration,$category,$event_id);
    SetTickets($ticket_no,$end_date,$event_id);
    header("location: index.php?event_name=".strval($name)."");
}else{
    header("Refresh:3 ;  CreateEvent.php");
    echo "Input all values;";
}
//------------------------------------------Bellow are the functions to create the events-----------------------------//
function CreateEventId($name){
    $letters=substr($name,0,3);
    $connection=mysqli_connect("127.0.0.1", "root", "root", "eventsys")
        or die(mysqli_error($connection));

    $exists=true;
    while($exists==true){
        $id=rand();
        $id=$letters.strval($id);

        $query="SELECT event_id FROM event WHERE event_id=\"".strval($id)."\";";
        $db_answer=mysqli_query($connection,$query)
        or die(mysqli_error($connection));

        if (mysqli_fetch_array($db_answer)==0){
            $exists=false;
            mysqli_close($connection);
            return $id;
        }else{
            continue;
        }
    }
}

function findHostIdAndVenueId($venue,$email){
    $connection=mysqli_connect("127.0.0.1", "root", "root", "eventsys")
    or die(mysqli_error($connection));

    $venueq="SELECT venue_id FROM venues WHERE venue_name=\"".strval($venue)."\";";
    $hostq="SELECT user_id FROM users WHERE email=\"".strval($email)."\";";
    $db_answerV=array_values(mysqli_fetch_assoc(mysqli_query($connection,$venueq)))
    or die(mysqli_error($connection));//catch null exception here
    $db_answerH=array_values(mysqli_fetch_assoc((mysqli_query($connection,$hostq))))
    or die(mysqli_error($connection));
    mysqli_close($connection);
    $db_answer=array();
    $db_answer=[$db_answerV,$db_answerH];
    return $db_answer;
}
function  CreateEvent($date,$venue,$description, $name, $duration,$category,$event_id){
    $an=findHostIdAndVenueId($venue,$_SESSION['login_user']);
    $host_id=$an[1];
    $venue_id=$an[0];
    $query="INSERT INTO event (host_id, venue_id, event_id, event_name, duration, description, event_time, category )  VALUES (\"".strval($host_id[0])."\",\"".strval($venue_id[0])."\",\"".strval($event_id)."\",\"".strval($name)."\",\"".strval($duration)."\",\"".strval($description)."\",\"".strval($date)."\",\"".strval($category)."\");";
    $connection=mysqli_connect("127.0.0.1", "root", "root", "eventsys")
    or die(mysqli_error($connection));
    $db_answer=mysqli_query($connection,$query)
    or die(mysqli_error($connection));
    mysqli_close($connection);
}

function SetTickets($ticket_no,$endDate,$event_id){
    $query="INSERT INTO Ticket_Sales (event_id, ticket_no, sales_endDate) VALUES (\"".strval($event_id)."\",\"".strval($ticket_no)."\",\"".strval($endDate)."\")";
    $connection=mysqli_connect("127.0.0.1", "root", "root", "eventsys")
    or die(mysqli_error($connection));
    $db_answer=mysqli_query($connection,$query)
    or die(mysqli_error($connection));
}
?>