<?php

include '../connection.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../home.php");
}
$username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NotesApp</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="../assets/img/favicon-32x32.png">
    <link href="../assets/img/apple-icon-180x180.png" rel="apple-touch-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Open+Sans:wght@400;500&family=Roboto:wght@400;500&family=Shantell+Sans:ital@1&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>
    <div class="background blue">
        <nav class="navbar navbar-expand-lg mb-5">
            <div class="container-fluid">
                <a class="navbar-brand me-4" href="../home.php"><img src="../assets/img/icon.png" alt="" class="img-fluid me-2" style="width: 3rem;">NotesApp</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="togglerIcon navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../home.php#info">About</a>
                        </li>
                        <li class="nav-item">
                            <input class="form-control ms-5" id="search" type="search" placeholder="Search" aria-label="Search">
                        </li>
                    </ul>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a type="button" class="btn btn-danger logout" href="../logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </nav>


        <div class="spread"></div>
        <div class="container my-4">
            <h1 style="color: white;">Welcome to NotesApp, <?php echo $username; ?></h1>
            <div class="card my-3">
                <div class="card-body" style="box-shadow: 0 20px 25px rgba(0, 0, 0, 0.50);">
                    <h5 class="card-title" id="txtHeading">Add Title (Character Limit: 15)</h5>
                    <textarea class="form-control" rows="1" id="addTitle" maxlength="15"></textarea>
                    <p id="charLimitTitle"></p>
                    <h5 class="card-title" id="txtHeading">Add a Note (Character Limit: 200)</h5>
                    <textarea class="form-control" rows="4" id="addTxt" maxlength="200"></textarea>
                    <p id="charLimit"></p>
                    <button class="btn btn-success" id="addBtn">Save</button>
                </div>
            </div>
        </div>
        <br>
        <div class="sep-dual sep-gray pt-5"></div>
    </div>


    <div class="container my-5 notes_col">
        <h1 class="my-4">Your Notes</h1>
        <div id="notes" class="row container-fluid justify-content-center align-items-center">
            <?php
            $query = "SELECT * from `notes` where `username` = '$username'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $title = $row['title'];
                    $text = $row['text'];
            ?>
                    <div class="card noteCard m-2" id="card-bg" style="background: url('../assets/img/note<?php echo $row['No'] % 5; ?>.png') no-repeat center center/cover;">
                        <div class="card-body" id="noteBody">
                            <br>
                            <h4 class="card-title" id="noteTitle"><?php echo $row['title']; ?></h4>
                            <p class="card-text"><?php echo $row['text']; ?> </p>
                            <a id="<?php echo $row['No']; ?>" class="closeBtn" onClick="deleteNote(<?php echo $row['No']; ?>)"></a>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <p class="d-flex justify-content-center align-items-center" style="font-weight: 400; font-size: 1rem; color: grey; font-family: 'Open Sans', sans-serif;">There is no note to display at this time</p>
            <?php
            }
            ?>
        </div>
    </div>


    <footer class="background blue">
        <div class="spread"></div>
        <div class="posi mx-auto p-3">
            <a class="footerIcon" href="home.php"><span class="text-xl me-3">NotesApp</span></a>
            <span class="left-border">Copyright &copy; 2023 NotesApp.com (by Arpan Seal)</span>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script>
        function deleteNote(index) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this note!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "code.php",
                            data: {
                                delete: "delete",
                                index: index
                            },
                            success: function(response) {
                                if (response == "success") {
                                    swal({
                                        title: "Hurray!",
                                        text: "Your Note has been deleted successfully.",
                                        icon: "success",
                                    }).then((value) => {
                                        location.reload();
                                    });
                                } else {
                                    swal("Your note is not deleted due to some internal issue!");
                                }
                            }
                        });
                    } else {
                        swal("Your note is safe!");
                    }
                })
        }
    </script>

    <script src="./js/app.js"></script>
</body>

</html>