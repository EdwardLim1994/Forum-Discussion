<?php
session_start();
require_once './includes/functions/connectDB.php';
$pageTitle = "List";

$_SESSION['currentUrl'] = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'], 2)[0] . "?page=" . $_GET['page'];

if (isset($_SESSION['userID'])) {
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

        <?php
    include "./includes/components/parts/footer.php";
    include_once "./includes/functions/closeDB.php";
    ?>
    </body>


</html>