<?php

session_start();

$currentUrl = $_SESSION['currentUrl'];
session_unset();
session_destroy();

header("location:" . $currentUrl);
exit();