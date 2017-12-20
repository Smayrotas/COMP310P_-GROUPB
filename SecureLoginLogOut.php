<?php
include_once ('SecurityAndValidation.php');
//----Data fetching functions----//
function fetchSignUpData()
{
    $FirstName = Security($_POST['FirstName']);
    $LastName = Security($_POST['LastName']);
    if (isValidEmail($_POST['Email'])===true){
        $Email = $_POST['Email'];
    }else{
        include_once('ProblemWithDataPage.html');
    }
    $UserType = $_POST['UserType'];
    $Password = Security($_POST['Password']);
    $UserData = [$FirstName, $LastName, $UserType, $Email, $Password];
    return $UserData;
}


function fetchLoginData(){
    if (isValidEmail($_POST['EmailLogin'])===true){
        $LoginEmail=$_POST['EmailLogin'];
    }else{
        include_once('ProblemWithDataPage.html');
        exit;
    }
    $LoginPassword=$_POST['PasswordLogin'];
    $UserLoginData=[$LoginEmail,$LoginPassword];
    $UserLoginData=SpecialCharacterSanitationArray($UserLoginData);
    return $UserLoginData;
}
//$UserData is the signup data
//Escape " charracters from the login and signup

//----form identifier function---//
if (isset($_POST['FirstName'])){
    $UserData=fetchSignUpData();
    Signup($UserData);
}elseif (isset ($_POST['EmailLogin'])){
    $UserLoginData=fetchLoginData();
    Login($UserLoginData);

}


function db_connect(){
    $connection=mysqli_connect("127.0.0.1", "root", "root", "eventsys")
        or die (mysqli_error($connection));
    return $connection;
}

//Signup Section Below--------------------------------------------------------------------------------------------------
function CheckIfAnyDataExists($connection,$UserData){
//Only going to check everything that the user inputs excpect the first and the last name, as they might be the same in some cases. Therefore only check  Email.
    // only check index 4

    $CheckingQueryEmail='SELECT email  FROM users WHERE email=\''.strval($UserData[3]).'\';';

    $db_answer=mysqli_query($connection,$CheckingQueryEmail)
        or die (mysqli_error($connection));

    $ArrayAnswer=mysqli_fetch_array($db_answer);
    if (count($ArrayAnswer)==0){
        return false;
    }else{
        return true;
    }



}

function UserIdGenerator($connection){
    $exists=true;

    while($exists==true){
        $id=rand();


        $query='SELECT user_id 
                FROM customer_info 
                WHERE user_id='.strval($id).';';
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




function LoginUserDataIntodb($connection,$userData){
/*
 * Make sure you use encryption of data in this function to complete it, and
 * also add Username to the Database
 */
    $userId=strval(UserIdGenerator($connection));

    if (CheckIfAnyDataExists($connection,$userData)==false){

        $Customer_InfoDataQuery="INSERT INTO customer_info (user_id, first_name, last_name) 
                                VALUES (\"".$userId."\",\"".strval($userData[0])."\",\"".strval($userData[1])."\");";

        $db_answer=mysqli_query($connection,$Customer_InfoDataQuery)
        or die(mysqli_error($connection));

        $SensitiveDataIntoDb="INSERT INTO users (user_id, username, pass, user_type, email)
                              VALUES (\"".$userId."\",\"".$userId."\",\"".strval($userData[4])."\",\"".strval($userData[2])."\",\"".strval($userData[3])."\");";

        $db_answer2=mysqli_query($connection,$SensitiveDataIntoDb);
    }else{
        header('Refresh:3; index.html');
        echo "You have not signed up, the email already exists in the database";
    }

}


function Signup($data){
    $connection=db_connect();
    LoginUserDataIntodb($connection,$data);
    header("Refresh:3; index.html");
    echo "You have Singed up, and you will be redirected to the homepage";
}
///Add a section that notifies the user if their details have been added in the database

//Login Section below---------------------------------------------------------------------------------------------------

function ValidateLoginData($connection,$Data){
    //Index 0 is the email and index 1 is the password
    $RetreiveLoginDataQuery="SELECT email, pass 
                            FROM users WHERE email=\"".strval($Data[0])."\" 
                            AND pass=\"".strval($Data[1])."\";";
    $db_answer=mysqli_query($connection,$RetreiveLoginDataQuery)
    or die (mysqli_connect($connection));

    if (count(mysqli_fetch_array($db_answer))==0){
        return false;
    }else{
        return true;
    }

}

function fetchUserType($connection,$UserEmail){
    $query="SELECT user_type 
            FROM users 
            WHERE email=\"".strval($UserEmail)."\"  ;";
    $UserType=mysqli_query($connection,$query)
        or die(mysqli_error($connection));

    $UserType=array_values(mysqli_fetch_assoc($UserType));
    return $UserType[0];
}



function Login($Data){
    $connection=db_connect();
   if (ValidateLoginData($connection,$Data)==true) {
       session_start();
       $_SESSION["login_user"]=$Data[0];
       $_SESSION["UserType"]=fetchUserType($connection,$Data[0]);
       header("location: index.php");
       mysqli_close($connection);
   }else{
       header('Refresh 3; signupboot.html');
       echo "Not logged in";
       return false;
   }
    return true;
}



?>
