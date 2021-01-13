<?php

session_start();
session_unset();
session_destroy();

header("location: ../../list.php&page=1");
exit();
