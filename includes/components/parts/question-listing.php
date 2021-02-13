<?php

$rowsPerPage = 20;

$sql = "SELECT * FROM Question";
$result = mysqli_query($conn, $sql);
$rowCount = mysqli_num_rows($result);
$pageNum = ceil($rowCount / $rowsPerPage);

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$thisPageFirstRow = ($page - 1) * $rowsPerPage;

if (isset($_GET['searchKeyword'])) {

    $search = $_GET['searchKeyword'];
    $sql = "SELECT q.id, q.title, q.content, q.postdate, u.username 
            FROM Question as q 
            LEFT JOIN User as u 
            ON q.user_id = u.id 
            WHERE q.title LIKE %'$search'% OR q.content LIKE %'$search'% 
            ORDER BY q.postdate DESC
            LIMIT $thisPageFirstRow, $rowsPerPage";
    $result = mysqli_query($conn, $sql);
?>
<div class="row py-2">
    <h5>You are searching : <?= $search ?></h5>
</div>
<?php
    if (mysqli_num_rows($result) > 0) :
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
        ?>
<div class="row my-2 text-center">
    <div class="card p-3 hoverable">
        <h3>No Question Found</h3>
    </div>
</div>
<?php
    endif;
} else {

    $sql = "SELECT q.id, q.title, q.content, q.postdate, u.username 
            FROM Question as q 
            LEFT JOIN User as u 
            ON q.user_id = u.id
            ORDER BY q.postdate DESC
            LIMIT $thisPageFirstRow, $rowsPerPage";
    $result = mysqli_query($conn, $sql);

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