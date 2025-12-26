<?php
    $title = 'articles';
    include('../view/header.php');

    $sql = <<<EOD
    SELECT 
    id,
    name,
    title
    FROM article
    WHERE id 
    NOT IN (1, 2, 24)
    ;
    EOD;

    $args = [];

    $result = getMultiRow($sql, $args);
    checkResult($result);
?>

<div class="container">
    <ul class="articles-list">
        <?php foreach ($result as $row) : ?>
            <li class="article-preview">
                <a href="article.php?art=<?= $row['name'] ?>"><?= $row['title'] ?></a>
            </li>
        <?php endforeach ?>
    </ul>
</div>

<?php include('../view/footer.php') ?>
