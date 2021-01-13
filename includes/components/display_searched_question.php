<?php
require_once "./includes/functions/connectDB.php";

//Set Pagination Logic
$rowsPerPage = 15;

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

//Set Search Keyword input
$searchInput = $_GET['search'];

//SQL Command
$sql = "SELECT 
            Question.id as questionID, 
            Question.title as questionTitle, 
            Question.content as questionContent, 
            date_format(Question.postdate, '%Y-%m-%d %h:%i %p') as questionDateTime, 
            User.id as userID, 
            User.username as userName 
        FROM Question 
        LEFT JOIN User 
        ON Question.user_id = User.id
        WHERE Question.title LIKE '%".$searchInput."%'
        LIMIT $thisPageFirstRow, $rowsPerPage;";

$result = mysqli_query($conn, $sql);


// When Successfully Retrieve Data from Database
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $questionId = $row['questionID'];
        $questionTitle = $row['questionTitle'];
        $questionContent = $row['questionContent'];
        $questionDatetime = $row['questionDateTime'];
        $userID = $row['userID'];
        $username = $row['userName'];

?>
        <!-- Searched Question Card -->
        <a class="card my-3" href="./forum.php?question=<?php echo $questionId; ?>">
            <div class="card-body p-4 px-5">
            <div class="row">
                    <h2 class="card-title text-black"><?php echo $questionTitle; ?></h2>
                    <p class="text-black">from <?php echo $username; ?></p>
                    <p class="text-black dateSize"><?php echo $questionDatetime; ?></p>
                    
                </div>

                <div class="row py-3">
                    <p class="card-text text-justify questionContent">
                        <?php echo $questionContent; ?>
                    </p>
                </div>
            </div>
        </a>
<?php
    }
}else{
    ?>
        <!-- When no related question is found -->
        <h4 class="text-center">Not Found</h4>
    <?php
}


?>