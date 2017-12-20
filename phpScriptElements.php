<?php
if(isset($_SESSION['login_user'])){
    echo "<script>
document.getElementById('Login').innerHTML='Logout';

document.getElementById('Login').href='SessionDestroyed.php';
document.getElementById('Signup').innerHTML='Welcome ".$user."'</script>";
    if($_SESSION['UserType']=='host' and isset($_SESSION['login_user'])==true) {
        echo "<script>document.getElementById('CreateEvent').href='CreateEvent.php'</script> ";
        echo "<script>document.getElementById('BookedEvents').href='NotLoggedIn.php?type=" . strval($_SESSION['UserType'])."'</script> ";
    }else if($_SESSION['UserType']=='customer' and isset($_SESSION['login_user'])==true){
        echo"<script>document.getElementById('BookedEvents').href='Event_Manager2.php?user=".strval($user)."&Ind=true'</script>";
        echo"<script>document.getElementById('CreateEvent').href='NotLoggedIn.php?type=" . strval($_SESSION['UserType'])."'</script> ";
    }else{
        echo"<script>document.getElementById('BookedEvents').href='NotLoggedIn.php?type=".strval($_SESSION['UserType'])."'</script>";
        echo"<script>document.getElementById('CreateEvent').href='NotLoggedIn.php?type=".strval($_SESSION['UserType'])."'</script>";
    }
    echo "<script>document.getElementById('Home').href='index.php'</script>";

}else{
    echo "<script>document.getElementById('Home').href='index.html'</script>";
}
?>