<?php

include '../connection.php';

session_start();

$username = $_SESSION['username'];
$Email = "";
$query = "SELECT * FROM `login` WHERE username = '$username'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $Email = $row['email'];
}

if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $text = $_POST['text'];

    try {
        mysqli_query($conn, "INSERT INTO `notes`(`username`, `email`, `title`, `text`) VALUES('$username', '$Email', '$title', '$text')");
        mysqli_commit($conn);
        echo "success";
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }
}

if (isset($_POST['delete'])) {
    $index = $_POST['index'];

    try {
        mysqli_query($conn, "DELETE FROM `notes` WHERE `No` = '$index'");
        mysqli_commit($conn);
        echo "success";
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }
}

?>