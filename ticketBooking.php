<?php

if(isset($_GET['type']) and isset($_GET['eventid'])){
    session_start();
    $useremaill=$_SESSION['login_user'];
//check if it exceedes the number of tickets
    $connection=db_connect();
    $noRequested=$_GET['type'];
    $eventid=$_GET['eventid'];
    $available=TicketsAvailable($connection,$eventid);
    $timeOftheEvent=date($available[1]);
    $currenttime=date("Y-m-d",time());

    if($noRequested>$available[0]){
        echo "Too many tickets requested";
        exit;
    }else if ($timeOftheEvent<$currenttime){
        //header("Refresh: 3; BookEventPage.php");
        echo "Too late";//check if the time works
        exit;
    }else{
        $userid=fetchUserId($connection,$useremaill);
        $refno=referenceNumberGenerator();
        ticketBookingDatabaseStorage($connection,$userid,$refno,$eventid,$noRequested);
        return true;
    }
}
function db_connect(){
    $connection=mysqli_connect("127.0.0.1", "root", "root", "eventsys")
    or die (mysqli_error($connection));
    return $connection;
}

function referenceNumberGenerator(){
    $exists=true;

    while($exists==true){
        $id=rand();
        $connection=db_connect();
        $query="SELECT reference_no FROM ticket_info WHERE user_id=\"".strval($id)."\";";
        $db_answer=mysqli_query($connection,$query)
        or die(mysqli_error($connection));

        if (mysqli_fetch_array($db_answer)==0){
            $exists=false;
        }else{
            continue;
        }
    }
    return $id;
}

function ticketBookingDatabaseStorage($connection,$userid,$reference_no,$eventid,$no_of_tickets){
    $query="INSERT INTO ticket_info (user_id, reference_no, event_id, number_purchased)  VALUES (\"".$userid."\",\"".$reference_no."\",\"".strval($eventid)."\",\"".strval($no_of_tickets)."\");";
    $db_answer=mysqli_query($connection,$query)
    or die(mysqli_error($connection));

    $query2="UPDATE Ticket_Sales SET ticket_no=ticket_no-".$no_of_tickets." WHERE event_id=\"".strval($eventid)."\";";
    $db_answer=mysqli_query($connection,$query2)
    or die(mysqli_error($connection));
    header("location: index.php?ticket_no=".strval($no_of_tickets)."");
}
function fetchUserId($connection,$Email){
    $query="SELECT user_id FROM users WHERE email=\"".strval($Email)."\";";
    $db_answer=mysqli_query($connection,$query)
    or die(mysqli_error($connection));
    $db_answer=mysqli_fetch_array($db_answer);
    return $db_answer[0];
}


//--------------------------------------------Bellow function to check availability--------------------------------------//

function TicketsAvailable($connection,$eventid){
    $query="SELECT ticket_no, sales_endDate FROM Ticket_Sales WHERE event_id=\"".strval($eventid)."\";";
    $db_answer=mysqli_query($connection,$query)
    or die(mysqli_error($connection));
    $db_answer=mysqli_fetch_assoc($db_answer);
    if (count($db_answer)!=0){
        $db_answer=array_values($db_answer);
    }
    return $db_answer;
}
?>