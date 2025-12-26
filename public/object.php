<?php
$title = 'object';
include('../view/header.php');

$obj = $_GET['obj'] ?? null;

if (!$obj) {
    header("Location: objects.php");
    exit();
}

// Database
$sql = <<<EOD
SELECT 
id,
title,
data,
gps,
mapImage,
image1,
image1Alt,
image1Text,
image2,
image2Alt,
image2Text
FROM object
WHERE name = ?
;
EOD;

$args = [$obj];

$result = getSingleRow($sql, $args);
checkResult($result);

$prevId = $result['id'] + -1; // print($prevId);
$nextId = $result['id'] + 1; // print($nextId);

$sql = <<<EOD
SELECT 
id,
name,
title
FROM object
WHERE id = ?
OR id = ?
;
EOD;

$args = [$prevId, $nextId];

$adjObjs = getMultiRow($sql, $args);

$prevObj = $adjObjs[0] ?? null;
$nextObj = $adjObjs[1] ?? null;

if ($prevId < 3) {
    $prevObj = null;
    $nextObj = $adjObjs[0];
}
?>

<div class="container">
    <div class="prev-next">
        <?php if ($prevObj) : ?>
            <a href="?obj=<?= $prevObj['name'] ?>">&lt;&lt;&lt; <?= $prevObj['title'] ?></a>
        <?php endif; ?>

        <?php if ($nextObj) : ?>
            <a href="?obj=<?= $nextObj['name'] ?>"><?= $nextObj['title'] ?> &gt;&gt;&gt;</a>
        <?php endif; ?>
    </div>

    <div class="object">
        <h1><?= $result['title'] ?></h1>

        <figure class="figure">
            <img src="img/800/<?= $result['image1'] ?>" alt="<?= $result['image1Alt'] ?>">
        </figure>

        <?= $result['data'] ?>

        <?php if ($result['image2']) : ?>
            <figure class="figure">
                <img src="img/800/<?= $result['image2'] ?>" alt="<?= $result['image2Alt'] ?>">
                <figcaption><?= $result['image2Text'] ?></figcaption>
            </figure>
        <?php endif; ?>

        <figure class="figure map">
            <h2>Hitta Hit</h2>
            <img src="img/800/<?= $result['mapImage'] ?>_karta.jpg" alt="<?= $result['image1Alt'] ?> karta">
            <figcaption><?= $result['gps'] ?></figcaption>
        </figure>
    </div>
</div>

<?php include('../view/footer.php') ?>