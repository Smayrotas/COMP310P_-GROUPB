<?php
//Makes sure to destroy the session when the user presses the Logout button
session_start();
session_regenerate_id(TRUE);
session_destroy();
header("location: index.html");
?>