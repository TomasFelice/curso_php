<?php 
$cantPaginas = getCantPaginas(BLOG_CONFIG['post_por_pagina'], $conn);
$actualPage = getActualPage();
?>
<section class="paginacion">
    <ul>
        <?php if($actualPage === 1): ?>
            <li class="disabled">&laquo;</li>
        <?php else: ?>
            <li><a href="index.php?p=<?= $actualPage - 1 ?>">&laquo;</a></li>
        <?php endif; ?>

        <?php for($i = 1; $i <= $cantPaginas; $i++): ?>
            <?php if($actualPage === $i): ?>
                <li class="active"><?= $i ?></li>
            <?php else: ?>
                <li><a href="index.php?p=<?= $i ?>"><?= $i ?></a></li>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if($actualPage === $cantPaginas): ?>
            <li class="disabled">&raquo;</li>
        <?php else: ?>
            <li><a href="index.php?p=<?= $actualPage + 1 ?>">&raquo;</a></li>
        <?php endif; ?>

    </ul>
</section>