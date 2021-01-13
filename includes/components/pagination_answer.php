<nav aria-label="Page navigation example" >
    <ul class="pagination pg-blue justify-content-center" >
        <li class="page-item" id="previousPageContainer"><a class="page-link" id="previousPageBtn">Previous</a></li>
        <?php

        for ($page = 1; $page <= $pageNum; $page++) {

            if (isset($_GET['page'])) {
                if ($_GET['page'] == $page) {
        ?>
                    <li class="page-item active">
                        <a class="page-link" href="http://localhost/Forum-Discussion/forum.php?question=<?php echo $_GET['question']; ?>&page=<?php echo $page; ?>">
                            <?php echo $page; ?>
                        </a>
                    </li>
                <?php

                } else {
                ?>
                    <li class="page-item inactive">
                        <a class="page-link" href="http://localhost/Forum-Discussion/forum.php?question=<?php echo $_GET['question']; ?>&page=<?php echo $page; ?>">
                            <?php echo $page; ?>
                        </a>
                    </li>
                <?php

                }
            } else {
                if ($page == 1) {
                ?>
                    <li class="page-item active">
                        <a class="page-link" href="http://localhost/Forum-Discussion/forum.php?question=<?php echo $_GET['question']; ?>&page=<?php echo $page; ?>">
                            <?php echo $page; ?>
                        </a>
                    </li>
                <?php

                } else {
                ?>
                    <li class="page-item inactive">
                        <a class="page-link" href="http://localhost/Forum-Discussion/forum.php?question=<?php echo $_GET['question']; ?>&page=<?php echo $page; ?>">
                            <?php echo $page; ?>
                        </a>
                    </li>
        <?php

                }
            }
        }
        ?>
        <li class="page-item" id="nextPageContainer"><a class="page-link" id="nextPageBtn">Next</a></li>
    </ul>
</nav>
<?php

mysqli_close($conn);

?>