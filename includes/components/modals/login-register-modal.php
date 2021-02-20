<div class="modal fade" id="loginRegisterModal" tabindex="-1" role="dialog" aria-labelledby="loginRegisterModal"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info">
        <div class="modal-content">
            <div class="modal-body">
                <ul class="nav nav-tabs row" id="myTab" role="tablist">
                    <!-- Login Tab -->
                    <li class="nav-item col-6 text-center">
                        <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab"
                            aria-controls="login" aria-selected="true">
                            <h5>Login</h5>
                        </a>
                    </li>

                    <!-- Register Tab -->
                    <li class="nav-item col-6 text-center">
                        <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab"
                            aria-controls="register" aria-selected="false">
                            <h5>Register</h5>
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <!-- Login Form -->
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <form class="was-validated" id="loginForm" method="POST"
                            action="./includes/functions/account/login.php" novalidate>
                            <div class="modal-body">

                                <!-- Login Username -->
                                <div class="form-row">
                                    <div class="col-12 mb-3 md-form">
                                        <label for="loginUsername" id="loginUsernameLabel">
                                            <i class="fas fa-user px-3"></i>Username or Email
                                        </label>
                                        <input type="text" id="loginUsername" name="loginUsername" class="form-control"
                                            required>
                                        <div id="loginUsernameValidate"></div>
                                    </div>
                                </div>

                                <!-- Login Password -->
                                <div class="form-row">
                                    <div class="col-12 mb-3 md-form">
                                        <div class="row">
                                            <div class="col-10">
                                                <label for="loginPassword" id="loginPasswordLabel">
                                                    <i class="fas fa-lock px-3"></i>Your password</label>
                                                <input type="password" id="loginPassword" name="loginPassword"
                                                    class="form-control" autocomplete="on" required>
                                                <div id="loginPasswordValidate"></div>
                                            </div>
                                            <div class="col-2">
                                                <a id="loginPasswordVisible">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Login button and close modal button -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info" name="login">Login</button>
                            </div>
                        </form>
                    </div>

                    <!-- Registration Form -->
                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <form class="was-validated" id="registerForm" method="POST" action="./includes/functions/account/register.php" novalidate>
                            <div class="modal-body pb-4">

                                <!-- Register Username -->
                                <div class="form-row">
                                    <div class="col-12 mb-3 md-form">
                                        <label for="registerUsername" id="registerUsernameLabel">
                                            <i class="fas fa-user px-3"></i>Your username
                                        </label>
                                        <input type="text" id="registerUsername" name="registerUsername"
                                            class="form-control">
                                        <div id="registerUsernameValidate"></div>
                                    </div>
                                </div>

                                <!-- Register Email -->
                                <div class="form-row">
                                    <div class="col-12 mb-3 md-form">
                                        <label for="registerEmail" id="registerEmailLabel">
                                            <i class="fas fa-envelope-open px-3"></i>Your Email
                                        </label>
                                        <input type="email" id="registerEmail" name="registerEmail"
                                            class="form-control">
                                        <div id="registerEmailValidate"></div>
                                    </div>
                                </div>

                                <!-- Register Password -->
                                <div class="form-row">
                                    <div class="col-12 mb-3 md-form">
                                        <div class="row">
                                            <div class="col-10">
                                                <label for="registerPassword">
                                                    <i class="fas fa-lock px-3"></i>Your password
                                                </label>
                                                <input type="password" id="registerPassword" name="registerPassword"
                                                    class="form-control" autocomplete="on">
                                                <div id="registerPasswordValidate"></div>
                                            </div>
                                            <div class="col-2">
                                                <a id="registerPasswordVisible">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-row">
                                    <div class="col-12 mb-3 md-form">
                                        <div class="row">
                                            <div class="col-10">
                                                <label for="passwordConfirm" id="passwordConfirmLabel">
                                                    <i class="fas fa-key px-3"></i>Confirm password</label>
                                                <input type="password" id="passwordConfirm" class="form-control"
                                                    autocomplete="on">
                                                <div id="passwordConfirmValidate"></div>
                                            </div>
                                            <div class="col-2">
                                                <a id="registerConfirmPasswordVisible">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Register Button and close modal button -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button name="register" class="btn btn-info">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./dist/login-register-input-validation.prod.js"></script>