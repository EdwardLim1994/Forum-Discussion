$(document).ready(function () {

    //Trigger password visible button event to show or hide password input
    $('#loginPasswordVisible').click(function () {
        toggleVisiblePassword("#loginPasswordVisible", "#loginPassword");
    });
    $("#registerPasswordVisible").click(function () {
        toggleVisiblePassword("#registerPasswordVisible", "#registerPassword");
    });
    $("#registerConfirmPasswordVisible").click(function () {
        toggleVisiblePassword("#registerConfirmPasswordVisible", "#passwordConfirm");
    });

    //Syntax Validation Logic for User Registration
    //Validate Username
    var usernameRegisterCorrect = false;
    var usernameRegisterEmpty = true;

    //Trigger current register username input event
    $("#registerUsername").on("input focusout", function () {

        //If current register username input is empty, set invalid message and flag
        if ($("#registerUsername").val()) {

            //Set flag to emphasize that current register username input is not empty
            usernameRegisterEmpty = false;

            //If current match password input is NOT following the pattern, set invalid message and flag
            if (/(?!^\d+$)^.+$/.test($("#registerUsername").val())) {

                //Trigger Ajax function to check whether current register username input exists inside the database or not
                $.ajax({
                    method: "POST",
                    url: "./includes/functions/account/checkUsername.php",
                    data: {
                        username_ajax: $("#registerUsername").val()
                    },
                    success: function (result) {

                        //If current register username input DOES NOT exists inside database, set valid message and flag, otherwise set invalid message and flag
                        if (result) {
                            validInput("#registerUsername", "#registerUsernameValidate");
                            usernameRegisterCorrect = true;
                        } else {
                            notValidInput("#registerUsername", "#registerUsernameValidate",
                                "Username has already been used");
                            usernameRegisterCorrect = false;
                        }
                    }
                });
            } else {
                notValidInput("#registerUsername", "#registerUsernameValidate",
                    "Username should not contain digit only");
                usernameRegisterCorrect = false;
            }
        } else {
            notValidInput("#registerUsername", "#registerUsernameValidate", "Cannot leave blank!");
            usernameRegisterCorrect = false;
            usernameRegisterEmpty = true;
        }
    });

    //Validate Email
    var emailRegisterCorrect = false;
    var emailRegisterEmpty = true;

    //Trigger current register email input event
    $("#registerEmail").on("input focusout", function () {

        //If current register email input is empty, set invalid message and empty flag
        if ($("#registerEmail").val()) {

            //Set flag to emphasize that current register email input is not empty
            emailRegisterEmpty = false;

            //If current register email input is following the pattern, set valid message and flag, otherwise set invalid message and flag
            if (/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($("#registerEmail").val())) {
                validInput("#registerEmail", "#registerEmailValidate");
                emailRegisterCorrect = true;

                //Trigger Ajax function to check whether current register username input exists inside the database or not
                $.ajax({
                    method: "POST",
                    url: "./includes/functions/account/checkEmail.php",
                    data: {
                        email_ajax: $("#registerEmail").val()
                    },
                    success: function (result) {

                        //If current register username input DOES NOT exists inside database, set valid message and flag, otherwise set invalid message and flag
                        if (result) {
                            validInput("#registerEmail", "#registerEmailValidate");
                            emailRegisterCorrect = true;
                        } else {
                            notValidInput("#registerEmail", "#registerEmailValidate",
                                "Email has already been used");
                            usernameRegisterCorrect = false;
                        }
                    }
                });
            } else {
                notValidInput("#registerEmail", "#registerEmailValidate", "Email format is not correct");
                emailRegisterCorrect = false;
            }
        } else {
            notValidInput("#registerEmail", "#registerEmailValidate", "Cannot leave blank!");
            emailRegisterCorrect = false;
            emailRegisterEmpty = true;
        }
    });

    //Validate Password
    var passwordRegisterCorrect = false;
    var passwordRegisterEmpty = true;

    //Trigger current register password input event
    $("#registerPassword").on("input focusout", function () {

        //If current register password input is empty, set invalid message and empty flag
        if ($("#registerPassword").val()) {

            //Set flag to emphasize that current register password input is not empty
            passwordRegisterEmpty = false;

            //If current register password input is following the pattern, set valid message and flag, otherwise set invalid message and flag
            if (/^(?=.*\d)(?=.*[a-zA-Z]).{6,}$/.test($("#registerPassword").val())) {
                validInput("#registerPassword", "#registerPasswordValidate");
                passwordRegisterCorrect = true;
            } else {
                notValidInput("#registerPassword", "#registerPasswordValidate",
                    "Password should contains at least 6 characters with digits and alphabert");
                passwordRegisterCorrect = false;
            }
        } else {
            notValidInput("#registerPassword", "#registerPasswordValidate", "Cannot leave blank!");
            passwordRegisterCorrect = false;
            passwordRegisterEmpty = true;
        }
    });

    //Confirm Password
    var passwordMatch = false;
    var passwordMatchEmpty = true;

    //Trigger current match password input event
    $("#passwordConfirm").on("input focusout", function () {

        //If current match password input is empty, set invalid message and empty flag
        if ($("#passwordConfirm").val()) {

            //Set flag to emphasize that current match password input is not empty
            passwordMatchEmpty = false;

            //If current match password input is NOT following the pattern, set invalid message and flag
            if (/^(?=.*\d)(?=.*[a-zA-Z]).{6,}$/.test($("#passwordConfirm").val())) {

                //If current match password input is not equal to current register password input, set valid message and flag, otherwise set invalid message and flag
                if ($("#registerPassword").val() === $("#passwordConfirm").val()) {
                    validInput("#passwordConfirm", "#passwordConfirmValidate");
                    passwordMatch = true;
                } else {
                    notValidInput("#passwordConfirm", "#passwordConfirmValidate", "Password is not matched");
                    passwordMatch = false;
                }
            } else {
                notValidInput("#passwordConfirm", "#passwordConfirmValidate", "Password should contains at least 6 characters with digits and alphabert");
                passwordMatch = false;
            }
        } else {
            notValidInput("#passwordConfirm", "#passwordConfirmValidate", "Cannot leave blank!");
            passwordMatch = false;
            passwordMatchEmpty = true;
        }
    });

    //Trigger register form submit event
    $("#registerForm").submit(function (event) {

        //If all input is valid, allow successful submit, otherwise don't allow submit
        if (usernameRegisterCorrect && emailRegisterCorrect && passwordRegisterCorrect && passwordMatch) {
            return true;

        //If all input is empty, don't allow submit, and set invalid notification
        } else if (usernameRegisterEmpty && emailRegisterEmpty && passwordRegisterEmpty && passwordMatchEmpty) {
            notValidInput("#registerUsername", "#registerUsernameValidate", "Cannot leave blank!");
            notValidInput("#registerEmail", "#registerEmailValidate", "Cannot leave blank!");
            notValidInput("#registerPassword", "#registerPasswordValidate", "Cannot leave blank!");
            notValidInput("#passwordConfirm", "#passwordConfirmValidate", "Cannot leave blank!");
            event.preventDefault();
            event.stopPropagation();
            return false;
        } else {
            event.preventDefault();
            event.stopPropagation();
            return false;
        }
    });


    //Syntax Validation Logic for User Login
    //Validate Username
    var usernameLoginCorrect = false;
    var usernameLoginEmpty = true;

    //Trigger current login username input event
    $("#loginUsername").on("input focusout", function () {

        //If current login username input is empty, set invalid message and empty flag
        if ($("#loginUsername").val()) {

            //Set flag to emphasize that current login username input is not empty
            usernameLoginEmpty = false;

            //If current login username input is NOT following the pattern, set invalid message and flag
            if (/^[a-zA-Z].*/.test($("#loginUsername").val()) || /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($("#loginUsername").val())) {
                validInput("#loginUsername", "#loginUsernameValidate");
                usernameLoginCorrect = true;
            } else {
                notValidInput("#loginUsername", "#loginUsernameValidate",
                    "Username should not contain digit only");
                usernameLoginCorrect = false;
            }
        } else {
            notValidInput("#loginUsername", "#loginUsernameValidate", "Cannot leave blank!");
            usernameLoginCorrect = false;
        }
    });

    //Validate Password
    var passwordLoginCorrect = false;
    var passwordLoginEmpty = true;

    //Trigger current login password input event
    $("#loginPassword").on("input focusout", function () {

        //If current login password input is empty, set invalid message and empty flag
        if ($("#loginPassword").val()) {

            //Set flag to emphasize that current login password input is not empty
            passwordLoginEmpty = false;

            //If current login password input is following the pattern, set valid message and flag, otherwise set invalid message and flag
            if (/^(?=.*\d)(?=.*[a-zA-Z]).{6,}$/.test($("#loginPassword").val())) {
                validInput("#loginPassword", "#loginPasswordValidate");
                passwordLoginCorrect = true;
            } else {
                notValidInput("#loginPassword", "#loginPasswordValidate",
                    "Password should contains at least 6 characters with digits and alphabert");
                passwordLoginCorrect = false;
            }
        } else {
            notValidInput("#loginPassword", "#loginPasswordValidate", "Cannot leave blank!");
            passwordLoginCorrect = false;
            passwordLoginEmpty = true;
        }
    });

    //Trigger login form submit event
    $("#loginForm").submit(function (event) {
        //If all input is valid, allow successful submit, otherwise don't allow submit
        if (usernameLoginCorrect && passwordLoginCorrect) {
            return true;

        //If all input is empty, don't allow submit, and set invalid notification
        } else if (usernameLoginEmpty && passwordLoginEmpty) {
            notValidInput("#loginUsername", "#loginUsernameValidate", "Cannot leave blank!");
            notValidInput("#loginPassword", "#loginPasswordValidate", "Cannot leave blank!");
            event.preventDefault();
            event.stopPropagation();
            return false;
        } else {
            event.preventDefault();
            event.stopPropagation();
            return false;
        }
    });


    //Toggle Visible Password Functions
    function toggleVisiblePassword(toggleID, inputID) {
        if ($(inputID).attr("type") === "password") {
            $(inputID).attr("type", "text");
            $(toggleID + " .fas").removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            $(inputID).attr("type", "password");
            $(toggleID + " .fas").removeClass("fa-eye-slash").addClass("fa-eye");
        }
    }

    //Not Valid Input function
    function notValidInput(inputID, validateID, text) {
        $(inputID).removeClass("is-valid").addClass("is-invalid");
        $(validateID).removeClass("valid-feedback").addClass("invalid-feedback").empty().html(text);
    }

    //Valid Input function
    function validInput(inputID, validateID) {
        $(inputID).removeClass("is-invalid").addClass("is-valid");
        $(validateID).removeClass("invalid-feedback").addClass("valid-feedback").empty().html("Looks good!");
    }
});