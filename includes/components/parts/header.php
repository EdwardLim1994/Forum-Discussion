<div class="blue">
    <div class="container">
        <div class="row py-2">
            <div class="col-4 my-auto">
            <?php if ($hasLogin) : ?>
                <h5 class="text-white">Hello, <?php echo $_SESSION['username']; ?></h5>
            <?php endif; ?>
            </div>
            <div class="col-4 text-center">
                <a href="https://www.nightcatdigitalsolutions.com">
                    <img class="img-fluid rounded logo hoverable" src="./assets/titleImage.jpeg" alt="Title Image">
                </a>
            </div>
            <div class="col-4 text-right my-auto">
            <?php if ($hasLogin) : ?>
                <button class="btn btn-danger" id="logoutBtn" data-toggle="modal" data-target="#logoutModal">
                    <span class="textBreak">Logout</span>
                    <span class="iconBreak"><i class="fas fa-sign-out-alt"></i></span>
                </button>
            <?php else : ?>
                <button class="btn btn-danger" id="loginRegisterBtn" data-toggle="modal"
                    data-target="#loginRegisterModal">
                    <span class="textBreak">Login/Register</span>
                    <span class="iconBreak"><i class="fas fa-sign-in-alt"></i></span>
                </button>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>