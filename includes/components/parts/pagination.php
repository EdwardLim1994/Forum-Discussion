<nav aria-label="Page navigation">
    <ul class="pagination pg-blue justify-content-center">

        <?php if ($_GET['page'] == 1) : ?>
        <li class="page-item disabled">
            <a class="page-link" tabindex="-1">Previous</a>
        </li>
        <?php else : ?>
        <li class="page-item">
            <a class="page-link"
                href="<?= str_replace("page=" . $_GET['page'], "page=" . strval($_GET['page'] - 1), "http://localhost" . $_SERVER['REQUEST_URI']); ?>">Previous</a>
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
                href="<?= str_replace("page=" . $_GET['page'], "page=" . $p, "http://localhost" . $_SERVER['REQUEST_URI']); ?>"><?= $p ?></a>
        </li>
        <?php endif; ?>
        <?php endfor; ?>

        <?php if ($_GET['page'] == $pageNum) : ?>
        <li class="page-item disabled">
            <a class="page-link" tabindex="-1">Next</a>
        </li>
        <?php else : ?>
        <li class="page-item ">
            <a class="page-link"
                href="<?= str_replace("page=" . $_GET['page'], "page=" . strval($_GET['page'] + 1), "http://localhost" . $_SERVER['REQUEST_URI']); ?>">Next</a>
        </li>
        <?php endif; ?>
    </ul>
</nav>