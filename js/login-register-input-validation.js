$(document).ready(function () {
    //Syntax Validation Logic for User Registration

    //Validate Username
    var usernameRegisterCorrect = false;
    $("#registerUsername").on("input focusout", function () {
        if ($("#registerUsername").val() != "") {
            if (/^[a-zA-Z].*/.test($("#registerUsername").val())) {
                validInput("#registerUsername", "#registerUsernameValidate");
                usernameRegisterCorrect = true;
            } else {
                notValidInput("#registerUsername", "#registerUsernameValidate",
                    "Username usually don't start from digit");
                usernameRegisterCorrect = false;
            }
        } else {
            notValidInput("#registerUsername", "#registerUsernameValidate", "Cannot leave blank!");
            usernameRegisterCorrect = false;
        }
    });

    //Validate Email
    var emailRegisterCorrect = false;
    $("#registerEmail").on("input focusout", function () {
        if ($("#registerEmail").val() != "") {
            if (/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($("#registerEmail").val())) {
                validInput("#registerEmail", "#registerEmailValidate");
                emailRegisterCorrect = true;
            } else {
                notValidInput("#registerEmail", "#registerEmailValidate", "Email format is not correct");
                emailRegisterCorrect = false;
            }
        } else {
            notValidInput("#registerEmail", "#registerEmailValidate", "Cannot leave blank!");
            emailRegisterCorrect = false;
        }
    });

    //Validate Password
    var passwordRegisterCorrect = false;
    $("#registerPassword").on("input focusout", function () {
        if ($("#registerPassword").val() != "") {
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
        }
    });

    //Confirm Password
    var passwordMatch = false;
    $("#passwordConfirm").on("input focusout", function () {
        if ($("#registerPassword").val() != "") {
            if (/^(?=.*\d)(?=.*[a-zA-Z]).{6,}$/.test($("#passwordConfirm").val())) {
                validInput("#passwordConfirm", "#passwordConfirmValidate");
                passwordMatch = true;
            } else {
                notValidInput("#passwordConfirm", "#passwordConfirmValidate", "Password is not matched");
                passwordMatch = false;
            }
        } else {
            notValidInput("#passwordConfirm", "#passwordConfirmValidate", "Cannot leave blank!");
            passwordMatch = false;
        }
    });

    $("#registerForm").submit(function (event) {
        //Final Validation
        if (usernameRegisterCorrect && emailRegisterCorrect && passwordRegisterCorrect && passwordMatch) {
            return true;
        } else {
            notValidInput("#registerUsername", "#registerUsernameValidate", "Cannot leave blank!");
            notValidInput("#registerEmail", "#registerEmailValidate", "Cannot leave blank!");
            notValidInput("#registerPassword", "#registerPasswordValidate", "Cannot leave blank!");
            notValidInput("#passwordConfirm", "#passwordConfirmValidate", "Cannot leave blank!");
            event.preventDefault();
            event.stopPropagation();
            return false;
        }
    });

    //Syntax Validation Logic for User Login

    //Validate Username
    var usernameLoginCorrect = false;
    $("#loginUsername").on("input focusout", function () {
        if ($("#loginUsername").val() != "") {
            if (/^[a-zA-Z].*/.test($("#loginUsername").val())) {
                validInput("#loginUsername", "#loginUsernameValidate");
                usernameLoginCorrect = true;
            } else {
                notValidInput("#loginUsername", "#loginUsernameValidate",
                    "Username usually don't start from digit");
                usernameLoginCorrect = false;
            }
        } else {
            notValidInput("#loginUsername", "#loginUsernameValidate", "Cannot leave blank!");
            usernameLoginCorrect = false;
        }
    });

    //Validate Password
    var passwordLoginCorrect = false;
    $("#loginPassword").on("input focusout", function () {
        if ($("#loginPassword").val() != "") {
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
        }
    });

    $("#loginForm").submit(function (event) {
        //Final Validation
        if (usernameLoginCorrect && passwordLoginCorrect) {
            return true;
        } else {
            notValidInput("#loginUsername", "#loginUsernameValidate", "Cannot leave blank!");
            notValidInput("#loginPassword", "#loginPasswordValidate", "Cannot leave blank!");
            event.preventDefault();
            event.stopPropagation();
            return false;
        }
    });

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