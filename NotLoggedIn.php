<?php
session_start();
header('Refresh: 3; index.html');
if(isset($_GET['type'])) {
    $UserType = $_GET['type'];
    if ($UserType = 'host') {
        echo $_GET['type'] . "s cannot use this function, please login as a customer";
        flush();

    } else if ($UserType = 'customer') {
        echo $_GET['type'] . "s cannot use this function, please login as a host";
        flush();

    } else {
        echo $_GET['type'] . "s cannot use this function, please login as a host to create events, and a customer to book events";
        flush();

    }
}else{
    echo "Sign-up to use this function";
    flush();


}
;
session_destroy();

?>
