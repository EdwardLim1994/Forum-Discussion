<div class="modal fade" id="loginRegisterModal" tabindex="-1" role="dialog" aria-labelledby="loginRegisterModal"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs row" id="myTab" role="tablist">
                    <li class="nav-item col-6 text-center">
                        <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab"
                            aria-controls="login" aria-selected="true">
                            <h5>Login</h5>
                        </a>
                    </li>
                    <li class="nav-item col-6 text-center">
                        <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab"
                            aria-controls="register" aria-selected="false">
                            <h5>Register</h5>
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">

                        <!-- Login Form -->
                        <form class="needs-validation" novalidate>
                            <div class="modal-body">
                                <div class="form-row">
                                    <label for="loginUsername" id="loginUsernameLabel">Your
                                        name</label>
                                    <input type="text" id="loginUsername" name="loginUsername" pattern="^[a-zA-Z].*"
                                        class="form-control my-2" required>
                                    <div id="loginUsernameValidate" class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="loginPassword" id="loginPasswordLabel">Your
                                        password</label>
                                    <input type="password" id="loginPassword" name="loginPassword"
                                        pattern="^(?=.*\d)(?=.*[a-zA-Z]).{6,}$" class="form-control my-2" required>
                                    <div id="loginPasswordValidate" class="invalid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="login">Login</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">

                        <!-- Registration Form -->
                        <form class="needs-validation" novalidate>

                            <div class="modal-body pb-4">
                                <div class="form-row">
                                    <label for="registerUsername" id="registerUsernameLabel">Your name</label>
                                    <input type="text" id="registerUsername" name="registerUsername"
                                        pattern="^[a-zA-Z].*" class="form-control " required>
                                    <div id="registerUsernameValidate" class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="registerEmail" id="registerEmailLabel">Your name</label>
                                    <input type="email" id="registerUsername" name="registerEmail" pattern="^[a-zA-Z].*"
                                        class="form-control " required>
                                    <div id="registerEmailValidate" class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-row">
                                    <label for="registerPassword">Your password</label>
                                    <input type="password" id="registerPassword" name="registerPassword"
                                        pattern="^(?=.*\d)(?=.*[a-zA-Z]).{6,}$" class="form-control " autocomplete="on"
                                        required>
                                    <div id="registerPasswordValidate" class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="form-row">
                                    <label for="passwordConfirm" id="passwordConfirmLabel">Confirm
                                        password</label>
                                    <input type="password" id="passwordConfirm" class="form-control" autocomplete="on"
                                        required>
                                    <div id="PasswordConfirmValidate" class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button name="register" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>