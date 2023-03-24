<?php

include "connection.php";


if (isset($_POST['check'])) {
    $Username = $_POST['Username'];
    $email = $_POST["email"];

    $query1 = "SELECT * FROM `login` WHERE email = '$email'";
    $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));

    $query2 = "SELECT * FROM `login` WHERE username = '$Username'";
    $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));


    if (mysqli_num_rows($result1) == 0 && mysqli_num_rows($result2) == 0) {
        echo "success";
    } else if (mysqli_num_rows($result1) > 0 && mysqli_num_rows($result2) > 0) {

        echo "You have already been registered!";
    } else if (mysqli_num_rows($result1) > 0 && mysqli_num_rows($result2) > 0) {
        echo "Email address: " . $email . " and Username: " . $Username . " have already been taken! Please choose another.";
    } else if (mysqli_num_rows($result1) > 0) {
        echo "Email address: " . $email . " has already been taken! Please choose another.";
    } else if (mysqli_num_rows($result2) > 0) {
        echo "Username: " . $Username . " has already been taken! Please choose another.";
    }
}

if (isset($_POST['submit'])) {

    $Email = $_POST['email'];
    $Email_error = null;

    if (!empty($Email)) {
        if (!preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix', $Email)) {
            $Email_error = "* Invalid Email ID";
        } else {
            $Email = mysqli_real_escape_string($conn, $_POST['email']);
            $query2 = "SELECT * FROM login WHERE email = '" . $Email . "'";

            $result2 =  mysqli_query($conn, $query2);

            if (mysqli_num_rows($result2) > 0) {
                $Email_error = "* Email Already Exist";
            }
        }
    } else {
        $Email_error = "* Enter Your Email";
    }

    $Username = $_POST['Username'];
    $Password  = $_POST['Password'];
    $ConfirmPass = $_POST['ConfirmPass'];

    $UsernameError =  $PasswordError  = $ConfirmPassError = false;

    if (!empty($Username)) {
        if (!preg_match_all('/^[A-Za-z]{1}[A-Za-z0-9]{5,31}$/', $Username)) {

            $UsernameError = "* Please Enter Valid Username";
        } else {
            $UsernameError = false;

            $Username = mysqli_real_escape_string($conn, $_POST['Username']);
            $query3 = "SELECT * FROM `login` WHERE username = '" . $Username . "'";

            $result3 =  mysqli_query($conn, $query3);

            if (mysqli_num_rows($result3) > 0) {
                $UsernameError = "* Username Already Exist";
            }
        }
    } else {
        $UsernameError = "* Username cannot be Empty";
    }

    if (!empty($Password)) {
        if (!preg_match_all('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/m', $Password)) {
            $PasswordError  = "* Password must contain Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character";
        } else {
            $hashPass = md5($Password);
            $PasswordError = false;
        }
    } else {
        $PasswordError = "* Password cannot be empty";
    }

    if (!empty($ConfirmPass)) {

        if ($ConfirmPass != $Password) {
            $ConfirmPassError = "* Please Enter same Password";
        }
    } else {
        $ConfirmPassError = "Please Confirm Password";
    }

    if ($Email_error == null && $UsernameError == false && $PasswordError == false && $ConfirmPassError == false) {
        try {
            // mysql query for login table
            $login_query = "INSERT INTO `login`(email,  username, password) VALUES('$Email', '$Username', '$hashPass')";

            mysqli_query($conn, $login_query) or die(mysqli_error($conn));
            mysqli_commit($conn);
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
    echo "success";
}


if (isset($_POST['forgot'])) {

    $email = $_POST['email'];
    $Username = $_POST['Username'];

    $query1 = "SELECT * FROM `login` WHERE email = '$email'";
    $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));

    $query2 = "SELECT * FROM `login` WHERE username = '$Username'";
    $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));

    if (mysqli_num_rows($result1) > 0) {
        $row = mysqli_fetch_assoc($result1);
        $Username_check = $row['username'];
        if ($Username == $Username_check) {
            echo "success";
        } else {
            echo "Username is incorrect!";
        }
    } else if (mysqli_num_rows($result2) > 0) {
        $row = mysqli_fetch_assoc($result2);
        $email_check = $row['email'];
        if ($email == $email_check) {
            echo "success";
        } else {
            echo "Email Address is incorrect!";
        }
    } else {
        echo "Both Email Address and Username are incorrect!";
    }
}

if (isset($_POST['NewPassword'])) {
    $NewPassword = $_POST['NewPassword'];
    $ConfirmPassword = $_POST['ConfirmPassword'];
    $Username = $_POST['Username'];

    if ($NewPassword == $ConfirmPassword) {
        $Password = md5($NewPassword);
        $query = "UPDATE `login` SET `password` = '$Password' where username = '$Username'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if ($result) {
            echo "success";
        } else {
            echo "Internal Issue";
        }
    } else {
        echo "Confirm Password doesn't match!";
    }
}

?>
