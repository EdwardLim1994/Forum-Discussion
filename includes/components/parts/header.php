<div class="blue">
    <div class="container">
        <div class="py-2 row">
            <div class="my-auto col-4">

            </div>
            <div class="text-center col-4">
                <a href="https://www.nightcatdigitalsolutions.com">
                    <img class="rounded img-fluid logo hoverable" src="./assets/titleImage.jpeg" alt="Title Image">
                </a>
            </div>
            <div class="flex-row my-auto text-right col-4 d-md-flex justify-content-md-end align-items-md-center">
            <?php if ($hasLogin) : ?>
                <h5 class="pr-2 text-white">Hello, <?php echo $_SESSION['username']; ?></h5>
            <?php endif; ?>
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