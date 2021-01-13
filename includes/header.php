<?php
session_start();
?>
<header class="fixed-top" style="width:100%;">
    <nav class="navbar navbar-light header scrolling-navbar">
        <div class="container-fluid">
            <div class="row" style="width:100%;">
                <div class="col-4 my-auto">
                    <h5 class="text-white">
                        <?php if (isset($_SESSION['id'])) {
                            echo "Hello, " . $_SESSION['username'];
                        }
                        ?>
                    </h5>
                </div>
                <div class="col-4">
                    <a href="https://www.nightcatdigitalsolutions.com" class="navbar-brand mx-auto">
                        <img class="img-fluid rounded" src="./assets/titleImage.jpeg" alt="Title Image">
                    </a>
                </div>
                <div class="col-4 text-right my-auto">

                    <?php
                    if (isset($_SESSION['id'])) {
                    ?>
                        <button class="btn py-3 text-white loginBtn" data-toggle="modal" data-target="#logoutModal">
                            <span class="textBreak">Logout</span>
                            <span class="iconBreak"><i class="fas fa-sign-out-alt fa-2x"></i></span>
                        </button>
                    <?php
                    } else {
                    ?>
                        <button class="btn py-3 text-white loginBtn" data-toggle="modal" data-target="#loginRegisterModal">
                            <span class="textBreak">Login/Register</span>
                            <span class="iconBreak"><i class="fas fa-sign-in-alt fa-2x"></i></span>
                        </button>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
</header>

<?php
if (isset($_SESSION['id'])) {
    // if logined
    include_once './includes/components/logout_modal.php';
} else {
    // if logouted
    include_once './includes/components/login_register_modal.php';
}
?>