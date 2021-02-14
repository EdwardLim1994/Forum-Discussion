<?php

//Start session
session_start();

//Temporary store current url
$currentUrl = $_SESSION['currentUrl'];

//Destroy all current session
session_unset();
session_destroy();

//Redirect to current url
header("location:" . $currentUrl);
exit();