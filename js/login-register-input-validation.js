$(document).ready(function () {
    //Visible Password Field

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
    $("#registerUsername").on("input focusout", function () {
        if ($("#registerUsername").val() != "") {
            usernameRegisterEmpty = false;

            if (/^[a-zA-Z].*/.test($("#registerUsername").val())) {
                $.ajax({
                    method: "POST",
                    url: "./includes/functions/search/checkUsername.php",
                    data: {
                        username_ajax: $("#registerUsername").val()
                    },
                    success: function (result) {
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
                    "Username usually don't start from digit");
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
    $("#registerEmail").on("input focusout", function () {
        if ($("#registerEmail").val() != "") {

            emailRegisterEmpty = false;
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
            emailRegisterEmpty = true;
        }
    });

    //Validate Password
    var passwordRegisterCorrect = false;
    var passwordRegisterEmpty = true;
    $("#registerPassword").on("input focusout", function () {
        if ($("#registerPassword").val() != "") {

            passwordRegisterEmpty = false;
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
    $("#passwordConfirm").on("input focusout", function () {
        if ($("#passwordConfirm").val() != "") {
            passwordMatchEmpty = false;
            if (/^(?=.*\d)(?=.*[a-zA-Z]).{6,}$/.test($("#passwordConfirm").val())) {
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

    $("#registerForm").submit(function (event) {
        //Final Validation
        if (usernameRegisterCorrect && emailRegisterCorrect && passwordRegisterCorrect && passwordMatch) {
            return true;
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
    $("#loginUsername").on("input focusout", function () {
        if ($("#loginUsername").val() != "") {

            usernameLoginEmpty = false;
            if (/^[a-zA-Z].*/.test($("#loginUsername").val())) {

                $.ajax({
                    method: "POST",
                    url: "./includes/functions/search/checkUsername.php",
                    data: {
                        username_ajax: $("#loginUsername").val()
                    },
                    success: function (result) {

                        if (!result) {
                            validInput("#loginUsername", "#loginUsernameValidate");
                            usernameLoginCorrect = true;
                        } else {
                            notValidInput("#loginUsername", "#loginUsernameValidate",
                                "Username does not exist");
                            usernameLoginCorrect = false;
                        }
                    }
                });
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
    var passwordLoginEmpty = true;
    $("#loginPassword").on("input focusout", function () {
        if ($("#loginPassword").val() != "") {
            passwordLoginEmpty = false;
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

    $("#loginForm").submit(function (event) {
        //Final Validation
        if (usernameLoginCorrect && passwordLoginCorrect) {
            return true;
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
            $(toggleID + " .fas").removeClass("fa-eye-slash").addClass("fa-eye");

        } else {
            $(inputID).attr("type", "password");
            $(toggleID + " .fas").removeClass("fa-eye").addClass("fa-eye-slash");
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