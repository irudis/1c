<?php
    global $pageSize;
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
    $totalNewsCount = getTotalNewsCount();
    $totalPages = ceil($totalNewsCount / $pageSize);
?>

<div class="padding-large surface-container-lowest">
    <?php foreach (getNews($currentPage) as $item): ?>
        <?= renderTemplate("/src/news-block.php", ["item" => $item]) ?>
    <?php endforeach ?>

    <div class="center-align">
        <nav class="no-space center-align">
            <a href="?page=<?= max(0, $currentPage - 1) ?>">
                <button class="circle no-margin left-round extra" <?= $currentPage < 1 ? 'disabled' : '' ?> >
                    <i class="no-padding no-margin">arrow_back</i>
                </button>
            </a>

            <?php if ($totalPages <= 7): ?>
                <?php for ($i = 0; $i < $totalPages; $i++): ?>
                    <a href="?page=<?= $i ?>">
                        <button class="square no-margin extra <?= $i !== $currentPage ? 'border' : '' ?>">
                            <?= $i + 1 ?>
                        </button>
                    </a>
                <?php endfor; ?>
            <?php else: ?>
                <?php if ($currentPage < 4): ?>
                    <?php for ($i = 0; $i < 5; $i++): ?>
                        <a href="?page=<?= $i ?>">
                            <button class="square no-margin extra <?= $i != $currentPage ? 'border' : '' ?>">
                                <?= $i + 1 ?>
                            </button>
                        </a>
                    <?php endfor; ?>
                    <span class="square no-margin extra">...</span>
                    <a href="?page=<?= $totalPages - 1 ?>">
                        <button class="square no-margin extra border">
                            <?= $totalPages ?>
                        </button>
                    </a>
                <?php elseif ($currentPage > $totalPages - 5): ?>
                    <a href="?page=0">
                        <button class="square no-margin extra border">
                            1
                        </button>
                    </a>
                    <span class="square no-margin extra">...</span>
                    <?php for ($i = $totalPages - 5; $i < $totalPages; $i++): ?>
                        <a href="?page=<?= $i ?>">
                            <button class="square no-margin extra <?= $i != $currentPage ? 'border' : '' ?>">
                                <?= $i + 1 ?>
                            </button>
                        </a>
                    <?php endfor; ?>
                <?php else: ?>
                    <a href="?page=0">
                        <button class="square no-margin extra border">
                            1
                        </button>
                    </a>
                    <span class="square no-margin extra">...</span>
                    <?php for ($i = $currentPage - 1; $i <= $currentPage + 1; $i++): ?>
                        <a href="?page=<?= $i ?>">
                            <button class="square no-margin extra <?= $i != $currentPage ? 'border' : '' ?>">
                                <?= $i + 1 ?>
                            </button>
                        </a>
                    <?php endfor; ?>
                    <span class="square no-margin extra">...</span>
                    <a href="?page=<?= $totalPages - 1 ?>">
                        <button class="square no-margin extra border">
                            <?= $totalPages ?>
                        </button>
                    </a>
                <?php endif; ?>
            <?php endif; ?>

            <a href="?page=<?= min($totalPages, $currentPage + 1) ?>">
                <button class="circle no-margin right-round extra" <?php if ($currentPage >= $totalPages - 1) echo 'disabled' ?> >
                    <i class="no-padding">arrow_forward</i>
                </button>
            </a>
        </nav>
    </div>
</div>