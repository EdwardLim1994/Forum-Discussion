<div class="modal fade" id="loginRegisterModal" tabindex="-1" role="dialog" aria-labelledby="loginRegisterModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs row" id="myTab" role="tablist">
                    <li class="nav-item col-6 text-center">
                        <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">
                            <h5>Login</h5>
                        </a>
                    </li>
                    <li class="nav-item col-6 text-center">
                        <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">
                            <h5>Register</h5>
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <form action="./includes/functions/login.inc.php" method="POST" id="loginForm">
                            <div class="modal-body">
                                <div class="md-form mb-5">
                                    <i class="fas fa-user prefix grey-text"></i>
                                    <input type="text" id="loginUsername" name="loginUsername" pattern="^[a-zA-Z].*" class="form-control validate my-2" required>
                                    <label data-error="Username usually don't start from digit" data-success="Seem OK" for="loginUsername" id="loginUsernameLabel">Your name</label>
                                </div>
                                <div class="md-form mb-4">
                                    <i class="fas fa-lock prefix grey-text"></i>
                                    <input type="password" id="loginPassword" name="loginPassword" pattern="^(?=.*\d)(?=.*[a-zA-Z]).{6,}$" class="form-control my-2" required>
                                    <label data-error="Password contains more than 6 characters with digits and alphabert" data-success="Seem OK" for="loginPassword" id="loginPasswordLabel">Your password</label>
                                    <p id="passwordAlert" class="text-danger invisible">Please fill in</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary save" name="login">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <form action="./includes/functions/register.inc.php" method="POST" id="registerForm">
                            <div class="modal-body pb-4">
                                <div class="md-form mb-5">
                                    <i class="fas fa-user prefix grey-text"></i>
                                    <input type="text" id="registerUsername" name="registerUsername" pattern="^[a-zA-Z].*" class="form-control validate" required>
                                    <label data-error="Username usually don't start from digit" data-success="Seem OK" for="registerUsername" id="registerUsernameLabel">Your name</label>
                                </div>

                                <div class="md-form mb-4">
                                    <i class="fas fa-lock prefix grey-text"></i>
                                    <input type="password" id="registerPassword" name="registerPassword" pattern="^(?=.*\d)(?=.*[a-zA-Z]).{6,}$" class="form-control validate" required>
                                    <label data-error="Contains at least 6 characters with combination of digits and alphabert" data-success="Seem OK" for="registerPassword">Your password</label>
                                </div>

                                <div class="md-form mb-4">
                                    <i class="fas fa-lock prefix grey-text"></i>
                                    <input type="password" id="passwordConfirm" class="form-control" required>
                                    <label data-error="Password not match" data-success="Seem OK" for="passwordConfirm" id="passwordConfirmLabel">Confirm password</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" name="register" class="btn btn-primary save">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>