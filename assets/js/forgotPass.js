$(document).ready(function () {
  $("#emailF").blur(function () {
    let email = $(this).val();
    if (email == "") {
      $("#EmailErrorF").text("*Please Enter Your Email");
    } else {
      $("#EmailErrorF").text("");
    }
  });

  // username Validation
  $("#UsernameF").change(function () {
    let Username = $(this).val();
    if (Username == "") {
      $("#UsernameErrorF").text("*Username Can not Empty");
    } else {
      $("#UsernameErrorF").text("");
    }
  });

  $("#NewPassword").blur(function () {
    let pass = $(this).val();
    if (!pass == "") {
      let regex =
        /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/m;
      if (!regex.test(pass)) {
        $("#PasswordErrorR").text(
          "Password must contain Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character"
        );
        $("#resetSubmit").attr("disabled", true);
      } else {
        $("#PasswordErrorR").text("");
        $("#resetSubmit").attr("disabled", false);
      }
    } else {
      $("#PasswordErrorR").text("Password Can not Empty");
      $("#resetSubmit").attr("disabled", true);
    }
  });

  $("#ConfirmPassword").change(function () {
    let cpass = $(this).val();
    let pass = $("#NewPassword").val();
    if (!cpass == "") {
      if (pass == cpass) {
        $("#ConfirmPassErrorR").text("");
        $("#resetSubmit").attr("disabled", false);
      } else {
        $("#ConfirmPassErrorR").text("*Please Enter the Same Password");
        $("#resetSubmit").attr("disabled", true);
      }
    } else {
      $("#ConfirmPassErrorR").text("*Please Confirm the Password");
      $("#resetSubmit").attr("disabled", true);
    }
  });

  $("#forgotSubmit").click(function () {
    let email = $("#emailF").val();
    let Username = $("#UsernameF").val();
    let email_err = document.getElementById("EmailErrorF");
    let user_err = document.getElementById("UsernameErrorF");

    if (email == "") {
      email_err.innerHTML = "*Please Enter Email Address.";
    } else if (Username == "") {
      email_err.innerHTML = "";
      user_err.innerHTML = "*Please Enter Username.";
    } else {
      user_err.innerHTML = "";
      $.ajax({
        type: "POST",
        url: "code.php",
        data: {
          forgot: "forgot",
          email: email,
          Username: Username,
        },
        success: function (response) {
          if (response == "success") {
            $("#resetPass").modal("show");
            $("#resetSubmit").click(function () {
              let NewPassword = $("#NewPassword").val();
              let ConfirmPassword = $("#ConfirmPassword").val();
              let pass_err = document.getElementById("PasswordErrorR");
              let cpass_err = document.getElementById("ConfirmPassErrorR");

              if (NewPassword == "") {
                pass_err.innerHTML = "*Please Enter New Password.";
              } else if (ConfirmPassword == "") {
                pass_err.innerHTML = "";
                cpass_err.innerHTML = "*Please Confirm the New Password.";
              } else {
                cpass_err.innerHTML = "";
                $.ajax({
                  type: "POST",
                  url: "code.php",
                  data: {
                    NewPassword: NewPassword,
                    ConfirmPassword: ConfirmPassword,
                    Username: Username,
                  },
                  success: function (response) {
                    if (response == "success") {
                      swal({
                        title: "Hurray!",
                        text: "Your Password has been changed successfully.",
                        icon: "success",
                      });
                    } else {
                      swal({
                        title: "Ooops!",
                        text: response,
                        icon: "error",
                      });
                    }
                    $("#resetSubmitPass").modal("hide");
                  },
                });
              }
            });
          } else {
            swal({
              title: "Ooops!",
              text: response,
              icon: "error",
              buttons: true,
              // value:true
            });
          }
        },
      });
    }
  });
});
