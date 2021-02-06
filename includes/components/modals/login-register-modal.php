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
                        <form class="was-validated" id="loginForm" method="POST"
                            action="./includes/functions/account/login.php" novalidate>
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="col-12 mb-3 md-form">
                                        <label for="loginUsername" id="loginUsernameLabel">Your
                                            name</label>
                                        <input type="text" id="loginUsername" name="loginUsername" class="form-control"
                                            required>
                                        <div id="loginUsernameValidate"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 mb-3 md-form">
                                        <label for="loginPassword" id="loginPasswordLabel">Your
                                            password</label>
                                        <input type="password" id="loginPassword" name="loginPassword"
                                            class="form-control" autocomplete="on" required>
                                        <div id="loginPasswordValidate"></div>
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
                        <form class="was-validated" id="registerForm" method="POST"
                            action="./includes/functions/account/register.php" novalidate>

                            <div class="modal-body pb-4">
                                <div class="form-row">
                                    <div class="col-12 mb-3 md-form">
                                        <label for="registerUsername" id="registerUsernameLabel">Your
                                            name</label>
                                        <input type="text" id="registerUsername" name="registerUsername"
                                            class="form-control">
                                        <div id="registerUsernameValidate"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 mb-3 md-form">
                                        <label for="registerEmail" id="registerEmailLabel">Your Email</label>
                                        <input type="email" id="registerEmail" name="registerEmail"
                                            class="form-control">
                                        <div id="registerEmailValidate"></div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-12 mb-3 md-form">
                                        <label for="registerPassword">Your password</label>
                                        <input type="password" id="registerPassword" name="registerPassword"
                                            class="form-control" autocomplete="on">
                                        <div id="registerPasswordValidate"></div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-12 mb-3 md-form">
                                        <label for="passwordConfirm" id="passwordConfirmLabel">Confirm
                                            password</label>
                                        <input type="password" id="passwordConfirm" class="form-control"
                                            autocomplete="on">
                                        <div id="passwordConfirmValidate"></div>
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

<script src="./dist/login-register-input-validation.prod.js"></script>