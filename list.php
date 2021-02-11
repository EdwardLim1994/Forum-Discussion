<?php
session_start();

$pageTitle = "List";

if (isset($_SESSION['id'])) {
    $hasLogin = true;
} else {
    $hasLogin = false;
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include "./includes/components/parts/head.php"; ?>
    </head>

    <body>
        <header class="sticky-top z-depth-1">
            <?php include "./includes/components/parts/header.php"; ?>
            <?php include "./includes/components/parts/search-post-question-button.php"; ?>
        </header>

        <main>


            <?php


        if ($hasLogin) :
            include "./includes/components/alerts/logout-alert.php";
            include "./includes/components/modals/post-question-modal.php";

            if (isset($_GET['success'])) :
                include "./includes/components/alerts/success-alert.php";
            endif;
        else :
            include "./includes/components/modals/login-register-modal.php";
            include "./includes/components/alerts/failed-alert.php";
        endif;
        ?>


            <div class="container">
                <section class="py-2">
                    <?php include "./includes/components/parts/question-listing.php"; ?>
                </section>

                <section class="py-2">
                    <?php include "./includes/components/parts/pagination.php"; ?>
                </section>

            </div>
        </main>

        <?php include "./includes/components/parts/footer.php"; ?>
    </body>


</html>