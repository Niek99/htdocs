<?php
session_start();
if(isset($_SESSION['usr_id'])!="") {
    header("Location: index.php");
}

include_once 'dbconnect.php';

//check if form is submitted
if (isset($_POST['login'])) {

    $_SESSION['name'] = $_POST['email'];
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $result = mysqli_query($con, "SELECT * FROM users WHERE Naam = '".$email."' and Wachtwoord = '". $password ."'");
    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['usr_id'] = $row['Id'];
        $_SESSION['usr_name'] = $row['Naam'];
        header("Location: afterinloggen/home.php");
    } else {
        $errormsg = "Wacht of gebruikersnaam fout.";
        echo $errormsg;
    }
}
else{
    echo "Er is helaas iets fout gegaan probeer het later opnieuw";
}
?>