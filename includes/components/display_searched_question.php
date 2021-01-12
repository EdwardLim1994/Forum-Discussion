<?php
require_once "./includes/functions/connectDB.php";

$searchInput = $_GET['search'];
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
        WHERE Question.title LIKE '%".$searchInput."%';";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $questionId = $row['questionID'];
        $questionTitle = $row['questionTitle'];
        $questionContent = $row['questionContent'];
        $questionDatetime = $row['questionDateTime'];
        $userID = $row['userID'];
        $username = $row['userName'];

?>
        <a class="card my-3" href="./forum.php?question=<?php echo $questionId; ?>">
            <div class="card-body p-4 px-5">
                <div class="row">
                    <h2 class="card-title text-black"><?php echo $questionTitle; ?></h2>
                </div>
                <div class="row">
                    <div class="col-9 py-auto text-black">
                        <p class="text-black">from <?php echo $username; ?></p>
                    </div>

                    <div class="col-3 py-auto text-right">
                        <p class="text-black"><?php echo $questionDatetime; ?></p>
                    </div>
                </div>
                <div class="row py-3">
                    <p class="card-text text-justify" style="font-size:20px;">
                        <?php echo $questionContent; ?>
                    </p>
                </div>
            </div>
        </a>
<?php
    }
}else{

}

mysqli_close($conn);
?>