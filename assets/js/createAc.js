$(document).ready(function () {
  $("#emailS").blur(function () {
    let email = $(this).val();

    if (email == "") {
      $("#EmailError").text("* Please Enter Your Email");
      $("#signinSubmit").attr("disabled", true);
      // $(this).attr('required', true);
      EmailError = 1;
    } else {
      let match = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

      if (!match.test(email)) {
        $("#EmailError").text("* Invalid Email Format");
        $("#signinSubmit").attr("disabled", true);
        EmailError = 1;
      } else {
        $("#EmailError").text("");
        $("#signinSubmit").attr("disabled", false);
        EmailError = 0;
      }
    }
  });

  // ************************************* Validating Username and Password *******************************

  // username Validation
  $("#usernameS").change(function () {
    let Username = $(this).val();

    if (!Username == "") {
      let regex = /^[A-Za-z]{1}[A-Za-z0-9]{5,31}$/;
      if (!regex.test(Username)) {
        $("#UsernameError").text(
          "* Please Enter Valid Username containing letters and numbers of minimum 6 characters"
        );
        $("#signinSubmit").attr("disabled", true);
        UsernameError = 1;
      } else {
        $("#UsernameError").text("");
        $("#signinSubmit").attr("disabled", false);
        UsernameError = 0;
      }
    } else {
      $("#UsernameError").text("* Username can not be Empty");
      $("#signinSubmit").attr("disabled", true);
      UsernameError = 1;
    }
  });

  // password Validation
  $("#passwordS").change(function () {
    let Password = $(this).val();

    if (!Password == "") {
      let regex =
        /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/m;
      if (!regex.test(Password)) {
        $("#PasswordError").text(
          "* Password must contain Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character"
        );
        $("#signinSubmit").attr("disabled", true);
        PasswordError = 1;
      } else {
        $("#PasswordError").text("");
        $("#signinSubmit").attr("disabled", false);
        PasswordError = 0;
      }
    } else {
      $("#PasswordError").text("* Password can not be Empty");
      $("#signinSubmit").attr("disabled", true);
      PasswordError = 1;
    }
  });

  // Confirm Password
  $("#cpassword").change(function () {
    let ConfirmPassword = $(this).val();
    let Password = $("#passwordS").val();

    if (!ConfirmPassword == "") {
      if (Password == ConfirmPassword) {
        $("#ConfirmPassError").text("");
        $("#signinSubmit").attr("disabled", false);
        ConfirmPass = 0;
      } else {
        $("#ConfirmPassError").text("* Please Enter The Same As Password");
        $("#signinSubmit").attr("disabled", true);
        ConfirmPass = 1;
      }
    } else {
      $("#ConfirmPassError").text("* Please Confirm Password");
      $("#signinSubmit").attr("disabled", true);
      ConfirmPass = 1;
    }
  });
});
