<?php
    $title = 'home';
    include('../view/header.php');

    // Database
    $sql = <<<EOD
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

    $args = [1];

    $result = getSingleRow($sql, $args);
    checkResult($result);
?>

<div class="container">
    <div class="info-page">
        <h1><?= $result['title'] ?></h1>

        <?= $result['data'] ?>

        <figure class="figure">
            <img src="img/800/<?= $result['image1'] ?>" alt="<?= $result['image1Alt'] ?>">
            <figcaption><?= $result['image1Text'] ?></figcaption>
        </figure>
    </div>
</div>

<?php include('../view/footer.php') ?>