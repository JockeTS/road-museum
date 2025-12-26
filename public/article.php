<?php
$title = 'articles';
include('../view/header.php');

$art = $_GET['art'] ?? null;

if (!$art) {
    header("Location: articles.php");
    exit();
}

$sql = <<<EOD
SELECT 
id,
name,
title,
data,
author
FROM article
WHERE id 
NOT IN (1, 2, 24)
AND
name = ?
;
EOD;

$args = [$art];

$result = getSingleRow($sql, $args);
checkResult($result);
?>

<article class="article">
    <h1><?= $result['title'] ?></h1>

    <p class="author">Av: <?= $result['author'] ?></p>

    <?= $result['data'] ?>
</article>

<?php include('../view/footer.php') ?>
