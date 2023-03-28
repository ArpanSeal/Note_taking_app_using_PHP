<?php
include "config.php";
include "connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo SITENAME ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon-32x32.png" rel="icon">
    <link href="assets/img/apple-icon-180x180.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Open+Sans:wght@400;500&family=Roboto:wght@400;500&family=Shantell+Sans:ital@1&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <!-- <link href="assets/vendor/aos/aos.css" rel="stylesheet"> -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="ms-4 me-4 d-flex align-items-center justify-content-between">
            <a href="home.php" class="logo"><img src="assets/img/icon.png" alt="" class="img-fluid"> <?php echo SITENAME ?></a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#home">Home</a></li>
                    <li><a class="nav-link scrollto" href="#info">About</a></li>
                    <li class="mobli"><a class="nav-link getstarted scrollto loginb" href="#home">&nbsp Login &nbsp</a></li>
                    <li class="mobli"><a class="nav-link getstarted scrollto signinb" href="#home">Sign Up</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->

        </div>

    </header><!-- End Header -->

    <!-- ======= Home Section ======= -->
    <section id="home" class="d-flex align-items-center background blue">

        <div class="container-fluid" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 pb-3 pt-lg-0 order-1 order-lg-2 d-flex flex-column justify-content-center" style="z-index: 1;">
                    <h1>Your Notes. Organized. Effortless.</h1>
                    <h2>Take notes anywhere. Find information faster. Share ideas with anyone. Meeting notes, web pages, projects, to-do lists-with <?php echo SITENAME; ?> as your note taking app, nothing falls through the cracks.</h2>
                    <div class="homeBtn">
                        <div><a class="btn-get-started scrollto signinb" href="#home">Get Started</a></div>
                        <div id="btwdis"></div>
                        <div><a class="btn-get-started scrollto loginb" href="#home">&nbsp &nbsp &nbsp Login &nbsp &nbsp &nbsp</a></div>
                    </div>

                </div>
                <div class="spread"></div>
                <div class="col-xl-5 col-lg-6 order-2 order-lg-1 home-img" data-aos="zoom-in" data-aos-delay="150" style="z-index: 1;">
                    <img src="assets/img/header.gif" class="img-fluid" style="width: 30rem;" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- End Home -->

    <!-- Login Modal -->

    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Login to NotesApp</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="ms-4 me-4 mt-4">
                        <label for="exampleInputEmail1" class="form-label">Email address or Username</label>
                        <input type="email" class="form-control" id="emailL" aria-describedby="emailHelp" placeholder="Email or Username">
                        <span id="EmailErrorL" style="color: red;"><?php if (isset($_POST['submit'])) {
                                                                        echo $Email_error;
                                                                    } ?></span>
                    </div>
                    <div class="m-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="passwordL" class="form-control" placeholder="Password">
                        <span style="color: red;" id="PasswordErrorL"><?php if (isset($_POST['submit'])) {
                                                                            echo $UsernameError;
                                                                        } ?></span>
                    </div>
                </form>
                <div>
                    <a href="#home" class="ms-4 forgot-password-link">Forgot password?</a>
                </div>
                <div class="d-flex">
                    <button type="button" id="loginSubmit" class="btn btn-primary m-4">Login</button>
                    <button type="button" class="btn btn-secondary mt-4 mb-4" data-bs-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Sign-in Modal -->

    <div class="tab modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Sign-in to NotesApp</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="ms-4 me-4 mt-4">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="emailS" aria-describedby="emailHelp" placeholder="Email">
                        <span id="EmailError" style="color: red;"><?php if (isset($_POST['submit'])) {
                                                                        echo $Email_error;
                                                                    } ?></span>
                    </div>
                    <div class="ms-4 me-4 mt-4">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="usernameS" placeholder="Username">
                        <span style="color: red;" id="UsernameError"><?php if (isset($_POST['submit'])) {
                                                                            echo $UsernameError;
                                                                        } ?></span>
                    </div>
                    <div class="ms-4 me-4 mt-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="passwordS" class="form-control" placeholder="Password">
                        <span style="color: red;" id="PasswordError"><?php if (isset($_POST['submit'])) {
                                                                            echo $PasswordError;
                                                                        } ?></span>
                    </div>
                    <div class="m-4">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" id="cpassword" class="form-control" placeholder="Confirm Password">
                        <span style="color: red;" id="ConfirmPassError"><?php if (isset($_POST['submit'])) {
                                                                            echo $ConfirmPassError;
                                                                        } ?></span>
                    </div>
                    <div class="d-flex">
                        <button type="button" id="signinSubmit" class="btn btn-primary m-4">Sign Up</button>
                        <button type="button" class="btn btn-secondary mt-4 mb-4" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <!-- Forgot Password Modal -->

    <div class="modal fade" id="forgotPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Forgot Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="ms-4 me-4 mt-4">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="emailF" aria-describedby="emailHelp" placeholder="Email">
                        <span id="EmailErrorF" style="color: red;"><?php if (isset($_POST['submit'])) {
                                                                        echo $EmailF_error;
                                                                    } ?></span>
                    </div>
                    <div class="ms-4 me-4 mt-4">
                        <label for="exampleInput" class="form-label">Username</label>
                        <input type="text" class="form-control" id="UsernameF" placeholder="Username">
                        <span id="UsernameErrorF" style="color: red;"><?php if (isset($_POST['submit'])) {
                                                                            echo $UsernameF_error;
                                                                        } ?></span>
                    </div>
                </form>
                <div class="d-flex">
                    <button type="button" id="forgotSubmit" class="btn btn-primary m-4">Next</button>
                    <button type="button" class="btn btn-secondary m-4" data-bs-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    <!-- Reset Password Modal -->

    <div class="modal fade" id="resetPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Reset Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="ms-4 me-4 mt-4">
                        <label for="NewPassword">New Password</label>
                        <input type="text" id="NewPassword" class="form-control" placeholder="New Password">
                        <span style="color: red;" id="PasswordErrorR"><?php if (isset($_POST['submit'])) {
                                                                            echo $PasswordError;
                                                                        } ?></span>
                    </div>
                    <div class="ms-4 me-4 mt-4">
                        <label for="ConfirmPasswordR">Confirm Password</label>
                        <input type="text" id="ConfirmPassword" class="form-control" placeholder="Confirm Password">
                        <span style="color: red;" id="ConfirmPassErrorR"><?php if (isset($_POST['submit'])) {
                                                                                echo $ConfirmPassErrorF;
                                                                            } ?></span>
                    </div>
                </form>
                <div class="d-flex">
                    <button type="button" id="resetSubmit" class="btn btn-primary m-4">Next</button>
                    <button type="button" class="btn btn-secondary m-4" data-bs-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Starting of about -->
    <main id="main">
        <section id="info" class="Info">
            <div class="container">
                <div class="section-title">
                    <h2>About</h2>
                    <p></p>
                </div>
                <div class="row featurette d-flex justify-content-center align-items-center my-4">
                    <div class="col-md-7">
                        <h2 class="featurette-heading fw-normal lh-1">Benefits of Note-taking?</h2>
                        <p class="lead">Note-taking provides several benefits beyond that record of what was presented in a lecture or class activity. <b>Effective note-taking keeps you alert</b>. Notetaking keeps your body active and involved and helps you avoid feelings of drowsiness or distraction. Listening carefully and deciding what to include in notes <b>keeps your mind actively involved</b> with what you hear. As you take notes, you'll decide on and highlight the key ideas you hear, identifying the structure of a class presentation. You'll also be able to indicate the supporting points of a presentation, <b>making study and understanding easier</b> after class. Such organized notes also make it easier for you to link classroom learning to textbook readings.</p>
                    </div>
                    <div class="col-md-5">
                        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="./assets/img/about1.jpg" width="500" height="500" alt="">
                    </div>
                </div>
                <div class="row featurette d-flex justify-content-center align-items-center my-4">
                    <div class="col-md-7 order-md-2">
                        <h2 class="featurette-heading fw-normal lh-1">How We are Different from Other Applications</h2>
                        <p class="lead">The user will access the applications through the device of their choice, commonly via a laptop or tablet. Some note-taking applications are available cross-platform and on multiple devices while others may be limited to one platform or device. For example, Notability is only available within Apple products whereas OneNote markets their availability across all platforms and devices.</p>
                    </div>
                    <div class="col-md-5 order-md-1">
                        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="./assets/img/about2.jpg" width="500" height="500" alt="">
                    </div>
                </div>
                <div class="row featurette d-flex justify-content-center align-items-center my-4">
                    <div class="col-md-7">
                        <h2 class="featurette-heading fw-normal lh-1">Continue Your Journey with Us.<span class="text-muted">It'll
                                blow your mind.</span></h2>
                        <p class="lead">One of the advantages of using note-taking applications are their relatively low cost to use. Most apps are free or have a low subscription fee, which may offset the price of buying paper or notebooks for each course. To use the applications however, the user must already own a device such as a laptop or tablet, which can be costly to buy on its own. Most students like to keep digital copies of notes and tend to scan their notes. This leads to poor image quality and inefficiency in studying. Note-taking apps allow students to forego the middle step. For this reason, the Office of Disability Services prefers that students use note-taking apps instead of scanning their notes, as note-taking apps can provide notes that are more clear and easier to read.</p>
                    </div>
                    <div class="col-md-5">
                        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="./assets/img/about3.jpg" width="500" height="500" alt="">
                    </div>
                </div>
            </div>

        </section>
        <!-- End About Section -->

    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <footer id="footer" class="background blue">
        <div class="spread"></div>
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3><?php echo SITENAME ?></h3>
                        <p>
                            <strong>Phone:</strong> <?php echo MOBILENO ?><br>
                            <strong>Email:</strong> <?php echo EMAIL ?><br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#home">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#info">About us</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a class="signinb" style="cursor: pointer;">Create Account</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a class="loginb" style="cursor: pointer;">Login</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <div class="d-flex justify-content-center">
                            <img src="assets/img/icon.png" style="width: 100px; height: 100px;" alt="">
                        </div>
                        <h1 class="text-center mt-2 logo"><?php echo SITENAME ?></h1>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">

            <div class="copyright-wrap d-md-flex py-4">
                <div class="me-md-auto text-center text-md-start">
                    <div class="copyright">
                        &copy; Copyright <strong><span><?php echo SITENAME ?></span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">

                    </div>
                </div>
                <div class="social-links text-center text-md-right pt-3 pt-md-0">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>



    <!-- My Coding End Here -->

    <script>
        $(".loginb").click(function() {
            let log_check = `<?php
                    if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    } else {
                        echo "";
                    }
                    ?>`;
            if (log_check != "") {
                window.location = "user/notepage.php";
            } else {
                $("#login").modal('show');
            }
        });
        $(".signinb").click(function() {
            $("#signin").modal('show');
        });
        $(".forgot-password-link").click(function() {
            $("#forgotPass").modal('show');
        });
    </script>

    <script type="text/javascript">

    </script>


    <!-- Vendor JS Files -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/createAc.js"></script>
    <script src="assets/js/accountCreation.js"></script>
    <script src="assets/js/login.js"></script>
    <script src="assets/js/forgotPass.js"></script>
    <script src="assets/js/showHidePass.js"></script>
    <script>
        $(document).ready(function() {
            $('input[type=\'password\']').showHidePassword();
        });
    </script>

</body>

</html>