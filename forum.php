<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="./assets/favicon/android-chrome-192x192.png" />
    <link rel="icon" type="image/png" sizes="512x512" href="./assets/favicon/android-chrome-512x512.png" />
    <link rel="apple-touch-icon" href="./assets/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" href="./assets/favicon/favicon.ico">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.0.0/mdb.min.css" rel="stylesheet" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.0.0/mdb.min.js"></script>

    <link rel="stylesheet" href="./dist/style.min.css">
    <script src="./dist/script.prod.js"></script>
</head>

<body>
    <header class="fixed-top">
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
                                <button class="btn py-3 text-white loginBtn">Login/Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="bg-white py-4">
        </div>
    </header>

    <!-- Main Section -->
    <main class="main-section">
        <div class="container">
            <section class="container stickyContent bg-white position-fixed pt-3">
                <h1 class="py-2">Question 1</h1>
                <div class="row py-3 pb-4">
                    <div class="col-6 text-left my-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-white">
                                <li class="breadcrumb-item"><a href="./list.php">Question</a></li>
                                <li class="breadcrumb-item active">Question 1</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </section>

            <section class="answerList">
                <div class="card my-3">
                    <div class="card-body p-4 px-5">
                        <div class="row">
                            <div class="col-3">
                                <h2 class="card-title">Question 1</h2>
                            </div>
                            <div class="col-7 py-auto">
                                <h5>from tester 1</h5>
                            </div>
                            <div class="col-2 py-auto text-right">
                                <p>2020-09-28 9:30am</p>
                            </div>
                        </div>
                        <div class="row py-3">
                            <p class="card-text text-justify" style="font-size:20px;">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt eius placeat consequuntur odio sed, aperiam deserunt commodi esse laudantium libero doloribus ullam facere,laudantium libero doloribus ullam facerelaudantium libero doloribus ullam facere ...
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card my-3">
                    <div class="card-body p-4 px-5">
                        <div class="row">
                            <div class="col-10">
                                <h4 class="card-title">tester 2</h4>
                            </div>
                            <div class="col-2 py-auto text-right">
                                <p>2020-09-28 12:30pm</p>
                            </div>
                        </div>
                        <div class="row py-3">
                            <p class="card-text text-justify" style="font-size:16px;">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt eius placeat consequuntur odio sed, aperiam deserunt commodi esse laudantium libero doloribus ullam facere,laudantium libero doloribus ullam facerelaudantium libero doloribus ullam facere ...
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="py-4" id="pagination">

            </section>

            <section class="postAnswer container">
                <div class="md-form mb-4 pink-textarea active-pink-textarea">
                    <div class="row p-4" style="background-color:#0774dd; border-radius:20px 20px 5px 5px;">
                        <div class="col-6 text-left my-auto">
                            <h4 class="text-white">Share your answer</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-primary postAnswerBtn px-5 py-2">Post</button>
                        </div>
                    </div>
                    <div class="row p-4" style="background-color:#e1e1e1;border-radius:5px 5px 20px 20px;">
                        <textarea class="md-textarea form-control" placeholder="Place your answer here" rows="5"></textarea>
                    </div>
                </div>
            </section>




        </div>
    </main>

    <!-- Footer -->
    <footer class=" page-footer font-small mdb-color blue" style="width: auto;">
        <div class="col-md-12">

            <!-- Social Link on Bottom -->
            <div class="mb-4 pt-4 flex-center bottomLink">
                <a class="whatsappLink">
                    <i class="fab fa-whatsapp a-lg mr-md-5 mr-3 fa-2x"></i>
                </a>
                <!-- Facebook -->
                <a class="fb-ic" href="https://www.facebook.com/nightcatdigitalsolutions">
                    <i class="fab fa-facebook fa-lg mr-md-5 mr-3 fa-2x"> </i>
                </a>
                <!-- Twitter -->
                <a class="tw-ic" href="https://twitter.com/nightcatdigital">
                    <i class="fab fa-twitter fa-lg mr-md-5 mr-3 fa-2x"> </i>
                </a>
                <!--Instagram-->
                <a class="ins-ic" href="https://www.instagram.com/nightcatdigitalsolutions/">
                    <i class="fab fa-instagram fa-lg mr-md-5 mr-3 fa-2x"> </i>
                </a>
            </div>
        </div>
        <div class="footer-copyright text-center py-3">
            <a href="https://www.nightcatdigitalsolutions.com">NIGHTCAT DIGITAL SOLUTIONS © 2013 -
                <span id="latestYear"></span>. ALL RIGHTS RESERVED</a>
        </div>
    </footer>

</body>
<script type="text/javascript">

</script>

</html>