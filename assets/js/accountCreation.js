$(document).ready(function () {
  $("#signinSubmit").click(function () {
    let email = $("#emailS").val();
    let Username = $("#usernameS").val();
    let Password = $("#passwordS").val();
    let ConfirmPass = $("#cpassword").val();
    let email_err = document.getElementById("EmailError");
    let user_err = document.getElementById("UsernameError");
    let pass_err = document.getElementById("PasswordError");
    let cpass_err = document.getElementById("ConfirmPassError");
    if (email == "") {
      email_err.innerHTML = "*Please Enter Email Address.";
    } else if (Username == "") {
      email_err.innerHTML = "";
      user_err.innerHTML = "*Please Enter Username.";
    } else if (Password == "") {
      user_err.innerHTML = "";
      pass_err.innerHTML = "*Please Enter Password.";
    } else if (ConfirmPass == "") {
      pass_err.innerHTML = "";
      cpass_err.innerHTML = "*Please Confirm the Password.";
    } else {
      cpass_err.innerHTML = "";
      $.ajax({
        type: "POST",
        url: "code.php",
        data: {
          check: "check",
          Username: Username,
          email: email,
        },
        success: function (response) {
          if (response == "success") {
            $.ajax({
              type: "POST",
              url: "code.php",
              data: {
                submit: "submit",
                Password: Password,
                ConfirmPass: ConfirmPass,
                Username: Username,
                email: email,
              },
              success: function (response) {
                if (response == "success") {
                  swal({
                    title: "Hurray!",
                    text: "Your account has been created successfully! Please wait for your account activation.",
                    icon: "success",
                    buttons: true,
                    // value:true
                  }).then((value) => {
                    window.location = "index.php";
                  });
                }
              },
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
