<?php
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "discussionForum";

    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

    if(!$conn)
        die("COnnection failed ". mysqli_connect_error());