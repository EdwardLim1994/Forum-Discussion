<?php

    //SQL to get all question data
    $sql = "SELECT * FROM Question";

    //Include pagination logic
    include "./includes/functions/pagination.php";

    //If there is get request from Search Bar
    if (isset($_GET['searchKeyword'])) {

        //SQL to get current question data associated with search keyword and the range of pagination
        $sql_search = "SELECT q.id, q.title, q.content, q.postdate, u.username 
                FROM Question as q 
                LEFT JOIN User as u 
                ON q.user_id = u.id 
                WHERE q.title LIKE '%". addslashes($_GET['searchKeyword']) ."%'
                ORDER BY q.postdate DESC
                LIMIT $thisPageFirstRow, $rowsPerPage";
        $result_search = mysqli_query($conn, $sql_search);
?>
        <div class="row py-2">
            <h5>You are searching : <?= addslashes($_GET['searchKeyword']) ?></h5>
        </div>


    <?php
        //If question data is successfully retrieved, render the result inside webpage, otherwise render "No question found"
        if (mysqli_num_rows($result_search) > 0) :
            while ($row = mysqli_fetch_assoc($result_search)) :
    ?>
            <div class="row my-2">
                <a class="text-black" href="./forum.php?page=1&question=<?= $row['id'] ?>">
                    <div class="card p-3 hoverable">
                        <div class="card-body">
                            <h3 class="card-title"><?= $row['title']  ?></h3>
                            <p class="card-title"><?= $row['username'] ?></p>
                            <p class="card-title"><?= date("Y-m-d g:ia", strtotime($row['postdate'])) ?></p>
                            <p class="card-text text-justify text-truncate"><?= $row['content'] ?></p>
                        </div>
                    </div>
                </a>
            </div>
    <?php
            endwhile;
        else :
    ?>
            <div class="row my-2 text-center">
                <div class="card p-3 hoverable">
                    <h3>No Question Found</h3>
                </div>
            </div>
<?php
        endif;

        //If there is NO get request from Search Bar
    } else {

        //SQL to get current question data associated with the range of pagination
        $sql = "SELECT q.id, q.title, q.content, q.postdate, u.username 
                FROM Question as q 
                LEFT JOIN User as u 
                ON q.user_id = u.id
                ORDER BY q.postdate DESC
                LIMIT $thisPageFirstRow, $rowsPerPage";
        $result = mysqli_query($conn, $sql);

        //If question data is successfully retrieved, render the result inside webpage, otherwise render "No question Yet"
        if (mysqli_num_rows($result) > 0) :
            $doesListingExist = true;
            while ($row = mysqli_fetch_assoc($result)) :
?>
                <div class="row my-2">
                    <a class="text-black" href="./forum.php?page=1&question=<?= $row['id'] ?>">
                        <div class="card p-3 hoverable">
                            <div class="card-body">
                                <h3 class="card-title"><?= $row['title']  ?></h3>
                                <p class="card-title"><?= $row['username'] ?></p>
                                <p class="card-title"><?= date("Y-m-d g:ia", strtotime($row['postdate'])) ?></p>
                                <p class="card-text text-justify text-truncate"><?= $row['content'] ?></p>
                            </div>
                        </div>
                    </a>
                </div>
<?php
            endwhile;
        else :
            $doesListingExist = false;
?>
            <div class="row my-2 text-center">
                <div class="card p-3 hoverable">
                    <h3>No Question Yet</h3>
                </div>
            </div>
<?php
        endif;
    }
?>