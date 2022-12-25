<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php if ($pager->hasPrevious()) : ?>
        <li class="page-item first">
            <a class="page-link" href="<?= $pager->getFirst() ?>" title="awal">
                <i class='tf-icon bx bxs-chevrons-left'></i>
            </a>
        </li>
        <li class="page-item prev">
            <a class="page-link" href="<?= $pager->getPreviousPage() ?>" title="kembali">
                <i class='tf-icon bx bxs-chevron-left'></i>
            </a>
        </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link): ?>
        <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
            <a class="page-link" href="<?= $link['uri'] ?>">
                <?= $link['title'] ?>
            </a>
        </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
        <li class="page-item next">
            <a class="page-link" href="<?= $pager->getNextPage() ?>" title="selanjutnya">
                <i class='tf-icon bx bxs-chevron-right'></i>
            </a>
        </li>
        <li class="page-item last">
            <a class="page-link" href="<?= $pager->getLast() ?>" title="akhir">
                <i class='tf-icon bx bxs-chevrons-right'></i>
            </a>
        </li>
        <?php endif ?>
    </ul>
</nav>