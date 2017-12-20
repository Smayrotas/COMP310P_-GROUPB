<?php
$connection=$connection=mysqli_connect("127.0.0.1", "root", "root", "eventsys")
or die(mysqli_error($connection));

if(isset($user)){
    $GLOBALS['user']=$user;
}

function findUserId($connection){
    $query="SELECT user_id FROM users WHERE email=\"".strval($_SESSION['login_user'])."\";";
    $db_answer=array_values(mysqli_fetch_assoc((mysqli_query($connection,$query))))
    or die(mysqli_error($connection));
    return $db_answer;

}

function findUserBookings($connection,$userid){
    $query="SELECT event.event_name, event.duration, event.description, event.venue_id, ticket_info.event_id FROM ticket_info JOIN event On ticket_info.event_id=event.event_id WHERE ticket_info.user_id=\"".strval($userid[0])."\"";
    $db_answer=(mysqli_query($connection,$query))
    or die(mysqli_error($connection));

    $i=array();
    while ($row=mysqli_fetch_assoc($db_answer)){
        $j=array_values($row);
        for($k=0;$k<count($j);$k++){
            array_push($i,$j[$k]);
        }
    }

    return $i;
}

//SearchFunction
function EventCreator($numberOfBoxes,$i){//from non-logged in search
    $count=0;
    for($j=0; $j<$numberOfBoxes;$j++){
        $i;
        $name=strval($i[0+$count]);
        $descri= strval($i[2+$count]);
        $dur=strval($i[1 +$count]);
        $f=array();
        $f=array_slice($i,($count),4);
            echo "
                                          <br>
                            <table style=\"width:100%\">
                                <tr>
                                    <td>
                                       
                    
                                    </td>
                                    <td style='background-color: #0077B5'>Event Name: <span>" . strval($i[$count]) . "</span>
                                        <br>
                                        <br>Description: <span>" . strval($i[2+$count]) . "</span>
                                        <br>Duration: <span>" . strval($i[1 +$count]) . "</span>
                                      
                                        ";
                                            if (isset($GLOBALS['user']) and !isset($GLOBALS['Ind'])) { echo"
                                       <button><a href='BookEventPage.php?event=" . strval($i[$count+4]) . "&arr=" . urlencode(serialize(array_slice($i,($count),4))) . "'>Book</a></button>";}
                                       echo "
                                    </td>
                                </tr>
                            </table>";

        $count+=5;
    }



}
?>