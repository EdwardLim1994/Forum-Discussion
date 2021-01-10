$(document).ready(function () {
  'use strict';

  var year = new Date().getFullYear();
  $('#latestYear').text(year);
  $("#passwordConfirm").on("keyup", function () {
    var password = $("#registerPassword").val();
    var confirmPassword = $("#passwordConfirm").val();

    if (password != confirmPassword) {
      $("#passwordConfirm").removeClass("valid").addClass("invalid");
    } else {
      $("#passwordConfirm").removeClass("invalid").addClass("valid");
    }
  });
  $("#registerPassword").on("focusout", function () {

    if ($("#registerPassword").val() != "") {
      var password = $("#registerPassword").val();
      var confirmPassword = $("#passwordConfirm").val();
      if (password != confirmPassword) {
        $("#passwordConfirm").removeClass("valid").addClass("invalid");
      } else {
        $("#passwordConfirm").removeClass("invalid").addClass("valid");
      }
    }
    if ($("#passwordConfirm").val() == "") {
      $("#passwordConfirmLabel").removeClass("active");
      $("#passwordConfirm").removeClass("invalid").removeClass("valid");
    }
  });

  $("#passwordConfirm").on("keyup", function () {

    if ($("#passwordConfirm").val() == "") {
      $("#passwordConfirm").removeClass("invalid").removeClass("valid");
    }
  });

  var usernameFlag;
  $("#registerUsername").on("focusout", function () {
    var username = $("#registerUsername").val();

    $.ajax({
      type: "GET",
      url: "./includes/functions/getUsername.php",
      dataType: "json",
      success: function (data) {

        if (data[0] == false) {
          usernameFlag = true;
        } else {
          $.each(data, function (index, item) {
            if (username == item) {
              $("#registerUsernameLabel").attr("data-error", "Username has already been used");
              $("#registerUsername").removeClass("valid").addClass("invalid");
              usernameFlag = false;
              return false;

            } else {
              $("#registerUsernameLabel").attr("data-error", "Username usually don't start from digit");
              usernameFlag = true;
              return;
            }
          });
        }
      },
      error: function () {
        console.log("register ajax failed");
      }
    });

    $("#registerForm").submit(function () {
      var password = $("#registerPassword").val();
      var confirmPassword = $("#passwordConfirm").val();

      if (password != confirmPassword) {
        return false;
      } else {
        return usernameFlag;
      }
    });
  });

  var loginPasswordFlag;
  $("#loginPassword").on("focusout", function(){
    var password = $("#loginPassword").val();

    if (password == "") {
      $("#loginPassword").removeClass("invalid").removeClass("valid");
      loginPasswordFlag = false;
    }

    if(/^(?=.*\d)(?=.*[a-zA-Z]).{6,}$/.test(password) == true){
      $("#loginPasswordLabel").attr("data-error", "Password contains more than 6 characters with digits and alphabert");
      $("#loginPassword").removeClass("invalid").addClass("valid");
      loginPasswordFlag = true;
    }else{
      $("#loginPasswordLabel").attr("data-error", "Password contains more than 6 characters with digits and alphabert");
      $("#loginPassword").removeClass("valid").addClass("invalid");
      loginPasswordFlag = false;
    }
  });

  var loginUsernameFlag;

  $("#loginUsername").on("focusout", function () {
    var username = $("#loginUsername").val();

    $.ajax({
      type: "GET",
      url: "./includes/functions/verifyUser.php",
      dataType: "JSON",

      success: function (data) {
        if (data[0] == false) {

          $("#loginUsernameLabel").attr("data-error", "Currently there is no registered user in database");
          $("#loginUsername").removeClass("valid").addClass("invalid");
          loginUsernameFlag = false;

          $("#loginPassword").on("keyup focusout", function(){
            if ($("#loginPassword").val() == "") {
              $("#loginPasswordLabel").attr("data-error", "Password contains more than 6 characters with digits and alphabert");
              $("#loginPassword").removeClass("invalid").removeClass("valid");

            } else{
              $("#loginPasswordLabel").attr("data-error", "Cannot check password as there is no registered user in database");
              $("#loginPassword").removeClass("valid").addClass("invalid");
            }
          });


        } else {
          $.each(data, function (index, item) {

            console.log(item['username']);
            if (username == item['username']) {

              $("#loginUsernameLabel").attr("data-error", "Username usually don't start from digit");
              $("#loginUsername").removeClass("invalid").addClass("valid");
              loginUsernameFlag = true;
              return false;

            } else {

              $("#loginUsernameLabel").attr("data-error", "Username is either wrong or doesn't exist");
              $("#loginUsername").removeClass("valid").addClass("invalid");
              loginUsernameFlag = false;

              return;
            }
          });
        }
      },
      error: function () {
        console.log("login ajax failed");
      }
    });

    $("#loginForm").submit(function () {
      console.log(loginUsernameFlag);
      console.log(loginPasswordFlag);
      if(loginUsernameFlag == true && loginPasswordFlag == true){
        return true;
      }else{
        return false;
      }
    });
  });

});