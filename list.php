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

            <!-- Login-Register Modal -->
            <?php include "./includes/components/modals/login-register-modal.php"; ?>

            <!-- Logout Alert -->
            <?php include "./includes/components/alerts/logout-alert.php"; ?>

            <!-- Password Not Matched Alert -->
            <?php include "./includes/components/alerts/password-not-match-alert.php"; ?>

            <!-- Post Question Modal -->
            <?php include "./includes/components/modals/post-question-modal.php"; ?>

            <!-- Cannot Post Question Alert -->
            <?php include "./includes/components/alerts/cannot-post-question-alert.php"; ?>

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

    <script type="text/javascript">
    $(document).ready(function() {

    });
    </script>

</html>