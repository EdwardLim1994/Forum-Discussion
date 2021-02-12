<?php
$sql = "SELECT a.id, a.answer, a.postdate, u.username 
        FROM Answer as a
        LEFT JOIN User as u 
        ON a.user_id = u.id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) :
    while ($row = mysqli_fetch_assoc($result)) :
?>
<div class="row py-1">
    <div class="card p-3">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h5 class="card-title"><?= $row['username'] ?></h5>
                    <p class="card-title"><?= date("Y-m-d g:ia", strtotime($row['postdate'])) ?></p>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-lg-6 col-md-3"></div>
                        <div class="col-lg-2 col-md-3 col-sm-4 text-center">
                            <button class="btn btn-pink px-3 text-white">
                                <i class="fas fa-heart"></i>
                                <span>15</span>
                            </button>
                        </div>
                        <?php if ($hasLogin) : ?>
                        <div class="col-lg-2 col-md-3 col-sm-4 text-center">
                            <button class="btn btn-default px-3" data-toggle="modal" data-target="#editAnswerModal">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 text-center" data-toggle="modal"
                            data-target="#confirmDeleteAnswerModal">
                            <button class="btn btn-danger px-3">
                                <i class="far fa-trash-alt "></i>
                            </button>
                        </div>
                        <?php else : ?>
                        <div class="col-lg-4 col-md-6 col-sm-8">
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <p class="card-text text-justify"><?= $row['answer'] ?></p>
        </div>
    </div>
</div>
<?php
    endwhile;

else :
    ?>
<div class="row py-1 text-center">
    <div class="card p-3 hoverable">
        <h3>No Answer Yet</h3>
    </div>
</div>


<?php endif; ?>