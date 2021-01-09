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
    if ($("#passwordConfirm").val() == ""){
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
        console.log("error");
      }
    });

    $("#registerForm").submit(function () {
      var password = $("#registerPassword").val();
      var confirmPassword = $("#passwordConfirm").val();
      
      if (password != confirmPassword) {
        return false;
      }
      else {
        return usernameFlag;
      }
    });
  });


  
});