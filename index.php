<?php
    //Set servername and username
    $servername = "localhost";
    $username = "root";

    // Create connection
    $conn = new mysqli($servername, $username);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create database
    $sql_database = file_get_contents("./sql/createDatabase.sql");
    $sql_useDB = file_get_contents("./sql/useDatabase.sql");
    $sql_user = file_get_contents("./sql/user.sql");
    $sql_question = file_get_contents("./sql/question.sql");
    $sql_answer = file_get_contents("./sql/answer.sql");
    $sql_vote = file_get_contents("./sql/vote.sql");

    //Check if success create tables
    if (
        mysqli_query($conn, $sql_database) &&
        mysqli_query($conn, $sql_useDB) &&
        mysqli_query($conn, $sql_user) &&
        mysqli_query($conn, $sql_question) &&
        mysqli_query($conn, $sql_answer) &&
        mysqli_query($conn, $sql_vote)
    ) {
        $conn->close();

    //Redirect to home page
?>
    <script type="text/javascript">
        window.location.replace("http://localhost/html/Forum-Discussion/list.php?page=1");
    </script>
<?php

    //Otherwise return error message
    } else {
        echo "Error creating database: " . $conn->error;
        $conn->close();
    }
?>