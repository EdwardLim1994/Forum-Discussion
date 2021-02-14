<?php

    //Start a session
    session_start();
    
    //Store current url into session
    $_SESSION['currentUrl'] = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'], 2)[0] . "?page=" . $_GET['page'];

    //if user is currently logged in
    if (isset($_SESSION['userID'])) {
        $hasLogin = true;
    } else {
        $hasLogin = false;
    }

    //Set tab title
    $pageTitle = "List";

    //Global variable to store status about whether question is existed in database
    $doesListingExist = false;

    //Create connection to server
    require_once './includes/functions/connectDB.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Include head -->
        <?php include "./includes/components/parts/head.php"; ?>
    </head>

    <body>
        <!-- Include header and search post question button bar -->
        <header class="sticky-top z-depth-1">
            <?php include "./includes/components/parts/header.php"; ?>
            <?php include "./includes/components/parts/search-post-question-button.php"; ?>
        </header>
        <main>
            <div class="container">

                <!-- Include question listing -->
                <section class="py-2">  
                    <?php include "./includes/components/parts/question-listing.php"; ?>
                </section>

                <!-- Include Pagination -->
                <section class="py-2">
                    <?php include "./includes/components/parts/pagination.php"; ?>
                </section>
            </div>
        </main>

    <?php
        //Include footer
        include "./includes/components/parts/footer.php";

        //If user is currently logged in
        if ($hasLogin) :
            
            //Include ONLY logout popout modal and post question popout modal
            include "./includes/components/alerts/logout-alert.php";
            include "./includes/components/modals/post-question-modal.php";

            //If url contains "success" parameter, Include ONLY suceess alert modal
            if (isset($_GET['success'])) :
                include "./includes/components/alerts/success-alert.php";
            endif;

            //If url contains "failed" parameter, Include ONLY failed alert modal
            if (isset($_GET['failed'])) :
                include "./includes/components/alerts/failed-alert.php";
            endif;
        else :

            //Include ONLY login-register popout modal and failed alert modal
            include "./includes/components/modals/login-register-modal.php";
            include "./includes/components/alerts/failed-alert.php";
        endif;

        //Close connection to server
        mysqli_close($conn);
    ?>
    </body>
</html>