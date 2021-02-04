<?php

require_once "../connectDB.php";

$username_list = [];
$query = "SELECT username FROM User";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($username_list, ['username' => $row['username']]);
    }
} else {
    array_push($username_list, false);
}

mysqli_close($conn);
echo json_encode($username_list);