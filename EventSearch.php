<?php
include_once ('SecurityAndValidation.php');
if(isset($_GET['category'])){
    categoryDetection(Security($_GET['category']));
}elseif (isset($_GET['datefrom']) and isset($_GET['dateto'])){
    TimeframeSearch(isDateValid($_GET['datefrom']),isDateValid($_GET['dateto']));
}

function TimeframeSearch($from,$to){
        $results=array();
        $query="SELECT event_name , duration , event.description, venues.venue_name, event.event_id 
                FROM event 
                JOIN venues 
                ON venues.venue_id=event.venue_id 
                WHERE (event_time 
                BETWEEN \"".strval($from)." \" 
                AND \"".strval($to)."\"
                )";
        $connection=mysqli_connect("127.0.0.1", "root", "root", "eventsys")
        or die(mysqli_error($connection));
        $db_answer=mysqli_query($connection,$query)
        or die(mysqli_error($connection));
    $i=array();
    while ($row=mysqli_fetch_assoc($db_answer)){
        $j=array_values($row);
        for($k=0;$k<count($j);$k++){
            array_push($i,$j[$k]);
        }
    }
    if (count($i)==0){
        $searchQuery="events from".strval($from)."to".strval($to).", no events were found. Try again";
        return include_once ('inputButtonSearch.php');
    }else{
        $event_name=$i[0];
        $duration=$i[1];
        $description=$i[2];
        $venue_name=$i[3];
        $event_id=$i[4];
        //return include_once("movieSearchTables.php");

        return include_once ("Event_Manager2.php");

    }
}

function categoryDetection($category){
    $connection=mysqli_connect("127.0.0.1", "root", "root", "eventsys")
    or die(mysqli_error($connection));
   $query= "SELECT event_name , duration , event.description , venues.venue_name, event.event_id 
            FROM event 
            JOIN venues 
            ON venues.venue_id=event.venue_id
            WHERE category             
            LIKE \"%".strval($category)."%\"";
    $db_answer=mysqli_query($connection,$query)
    or die(mysqli_error($connection));
    $i=array();
    while ($row=mysqli_fetch_assoc($db_answer)){
        $j=array_values($row);
        for($k=0;$k<count($j);$k++){
            array_push($i,$j[$k]);
        }
    }
    if (count($i)==0){
        $searchQuery=strval($category).', no events were found. Try again';
        return include_once ('inputButtonSearch.php');
    }else{
        $event_name=$i[0];
        $duration=$i[1];
        $description=$i[2];
        $venue_name=$i[3];
        $event_id=$i[4];
        //return include_once("movieSearchTables.php");

        return include_once ("Event_Manager2.php");

    }
}


?>