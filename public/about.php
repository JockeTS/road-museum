<?php
    $title = 'about';
    include('../view/header.php');

    // Database
    $query = <<<EOD
    SELECT 
    id,
    title,
    data,
    image1,
    image1Text,
    image1Alt
    FROM article
    WHERE id = ?
    ;
    EOD;

    $args = [2];

    $result = getSingleRow($query, $args);
    checkResult($result);
?>

<div class="container">
    <div class="info-page">
        <p class="doc"><a href="doc.php">Dokumentation</a></p>

        <h1><?= $result['title'] ?></h1>

        <?= $result['data'] ?>

        <figure class="figure">
            <img src="img/500/<?= $result['image1'] ?>" alt="<?= $result['image1Alt'] ?>">
            <figcaption><?= $result['image1Text'] ?></figcaption>
        </figure>
    </div>
</div>

<?php include('../view/footer.php') ?>