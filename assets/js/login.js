$(document).ready(function () {
  $("#emailL").blur(function () {
    let email = $(this).val();
    if (email == "") {
      $("#EmailErrorL").text("* Please Enter Your Email Address or Username");
    } else {
      $("#EmailErrorL").text("");
    }
  });

  // password Validation
  $("#passwordL").change(function () {
    let Password = $(this).val();
    if (Password == "") {
      $("#PasswordErrorL").text("* Password can not be Empty");
    } else {
      $("#PasswordErrorL").text("");
    }
  });

  $("#loginSubmit").click(function () {
    let email = $("#emailL").val();
    let Password = $("#passwordL").val();
    let email_err = document.getElementById("EmailErrorL");
    let pass_err = document.getElementById("PasswordErrorL");

    if (email == "") {
      email_err.innerHTML = "*Please Enter Your Email Address or Username.";
    } else if (Password == "") {
      email_err.innerHTML = "";
      pass_err.innerHTML = "*Please Enter Password.";
    } else {
      pass_err.innerHTML = "";
      $.ajax({
        type: "POST",
        url: "login.php",
        data: {
          login: "login",
          email: email,
          Password: Password,
        },
        success: function (response) {
          if (response == "success") {
            window.location = "user/notepage.php";
          } else {
            swal({
              title: "Ooops!",
              text: response,
              icon: "error",
              buttons: true,
            });
          }
        },
      });
    }
  });
});
