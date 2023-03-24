<?php
include "config.php";
include "connection.php";

session_start();

if (isset($_SESSION['username'])) {
    echo "success";
} else {
    
if (isset($_POST['login'])) {

    $Email = $_POST['email'];
    $Email_error = null;

    $Password  = $_POST['Password'];
    $hashPassword = md5($Password);

    $UsernameError =  $PasswordError  = $ConfirmPassError = false;

    $query1 = "SELECT * from `login` WHERE `email` = '{$Email}'";
    $result1 = mysqli_query($conn, $query1) or die("Query Fail.");

    $query2 = "SELECT * from `login` WHERE `username` = '{$Email}'";
    $result2 = mysqli_query($conn, $query2) or die("Query Fail.");

    $query3 = "SELECT * from `login` WHERE `password` = '{$hashPassword}'";
    $result3 = mysqli_query($conn, $query3) or die("Query Fail.");

    if(mysqli_num_rows($result1) > 0) {
        $row = mysqli_fetch_assoc($result1);
        $Username = $row['username'];
    }

    else if(mysqli_num_rows($result2) > 0) {
        $Username = $Email;
    }

    if(mysqli_num_rows($result1) == 0 && mysqli_num_rows($result2) == 0 && mysqli_num_rows($result3) == 0){
        echo "Invalid Credentials.";
    }
    else if(mysqli_num_rows($result1) > 0 || mysqli_num_rows($result2) > 0){
        if(mysqli_num_rows($result3) > 0){
            $_SESSION['username'] = $Username;
            echo "success";
        }
        else{
            echo "Password doesn't match.";
        }
    }
    else{
        echo "Email or Username doesn't match.";
    }
}

}

?>