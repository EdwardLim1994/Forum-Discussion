<?php

//Set servername, username, password and database name
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "discussionForum";
$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

//If connection failed, kill the entire process
if(!$conn)
    die("Connection failed ". mysqli_connect_error());
