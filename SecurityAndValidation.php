<?php
global $errmsg;





function Security($String){
    if (isset($String)){
        if (isEmpty($String)==false){
            $input=SpecialCharacterSanitation(strval($String));
        }else{
            header('Refresh: 3; index.php');
            echo "The String You Entered was Empty";
            exit;
        }
      return $String;
    }

}


function makeToString($var){
    return strval($var);
}
function isIntValid($var){
 return is_int($var);
}
function isDateValid($String){
    if (preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/",$String))
    {
        return $String;
    }else{
        header('Refresh: 3; Event_Manager2.php');
        echo"Date is not Valid please try again";
        exit;
    }
}
function isValidEmail($email){
    //Checks if adress is sanitised or validated. If it is not it returns false, otherwise it returns true
    if((!filter_var($email,FILTER_SANITIZE_EMAIL))===false){
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)===false){
                return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function isEmpty($var){
    if (strlen($var)!=0){
        return false;
    }else{
        return true;
    }
}
function  SpecialCharacterSanitationArray($Array){
    foreach ($Array as $i){
        $i=SpecialCharacterSanitation($i);
    }
    return $Array;
}
function SpecialCharacterSanitation($String){
    //removes special characters from the strings in an array and returns the array
        $String=trim($String);
        $String=stripslashes($String);
    return $String;
}


function passwordEcryption($Password){
//use password encryption/decryption over the requests (Over the internet)
}
?>