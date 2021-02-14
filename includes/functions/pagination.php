<?php
    //Set number of question to be rendered in single page
    $rowsPerPage = 20;
    $result = mysqli_query($conn, $sql);

    //Count the total question existing in database
    $rowCount = mysqli_num_rows($result);

    //Calculate total number of pages
    $pageNum = ceil($rowCount / $rowsPerPage);

    //If there is page parameter in get request, set page, otherwise set page = 1
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    //Calculate the index for the first row of page
    $thisPageFirstRow = ($page - 1) * $rowsPerPage;