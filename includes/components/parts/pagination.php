<nav aria-label="Page navigation">
    <ul class="pagination pg-blue justify-content-center">

        <?php if ($_GET['page'] == 1) : ?>
        <li class="page-item disabled">
            <a class="page-link" tabindex="-1">
                <span class="textBreak">Previous</span>
                <span class="iconBreak"><i class="fas fa-backward"></i></span>
            </a>
        </li>
        <?php else : ?>
        <li class="page-item">
            <a class="page-link"
                href="<?= str_replace("page=" . $_GET['page'], "page=" . strval($_GET['page'] - 1), $_SESSION['currentUrl']); ?>">
                <span class="textBreak">Previous</span>
                <span class="iconBreak"><i class="fas fa-backward"></i></span>
            </a>
        </li>
        <?php endif; ?>

        <?php for ($p = 1; $p <= $pageNum; $p++) : ?>
        <?php if ($p == $_GET['page']) : ?>
        <li class="page-item active">
            <a class="page-link"><?= $p ?> <span class="sr-only">(current)</span></a>
        </li>
        <?php else : ?>
        <li class="page-item">
            <a class="page-link"
                href="<?= str_replace("page=" . $_GET['page'], "page=" . $p, $_SESSION['currentUrl']); ?>"><?= $p ?></a>
        </li>
        <?php endif; ?>
        <?php endfor; ?>

        <?php if ($_GET['page'] == $pageNum or $doesListingExist == false) : ?>
        <li class="page-item disabled">
            <a class="page-link" tabindex="-1">
                <span class="textBreak">Next</span>
                <span class="iconBreak"><i class="fas fa-forward"></i></span>
            </a>
        </li>
        <?php else : ?>
        <li class="page-item ">
            <a class="page-link"
                href="<?= str_replace("page=" . $_GET['page'], "page=" . strval($_GET['page'] + 1), $_SESSION['currentUrl']); ?>">
                <span class="textBreak">Next</span>
                <span class="iconBreak"><i class="fas fa-forward"></i></span>
            </a>
        </li>
        <?php endif; ?>
    </ul>
</nav>