<header class="fixed-top" style="width:100%;">
    <nav class="navbar navbar-light header scrolling-navbar">
        <div class="container-fluid">
            <div class="row" style="width:100%;">
                <div class="col-4">
                </div>
                <div class="col-4">
                    <a href="https://www.nightcatdigitalsolutions.com" class="navbar-brand mx-auto">
                        <img class="img-fluid rounded" src="./assets/titleImage.jpeg" alt="Title Image">
                    </a>
                </div>
                <div class="col-4 my-auto">
                    <div class="row">
                        <div class="col-6 text-right">
                            <h5></h5>
                        </div>
                        <div class="col-6 text-left">
                            <!-- If not login -->
                            <?php
                            include_once './includes/components/login_register_button.php';
                            ?>

                            <!-- If logined -->
                            <?php
                            include_once './includes/components/logout_button.php';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- Logout Modal -->
<?php
include_once './includes/components/logout_modal.php';
?>

<!-- Login/Register Modal -->
<?php
include_once './includes/components/login_register_modal.php';
?>