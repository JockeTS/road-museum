<?php
$title = 'gallery';
include('../view/header.php');

$query = $_GET['query'] ?? 1; // 1, 2, 3...

$startingId = 3;
$numImages = 4;

$end_pos = $query * $numImages + ($startingId - 1); // 4, 8, 12...
$start_pos = $end_pos - $numImages + 1; // 1, 5, 9...

$sql = <<<EOD
SELECT 
id,
name,
image1
FROM object
WHERE id
BETWEEN
? AND ?
;
EOD;

$args = [$start_pos, $end_pos];

$result = getMultiRow($sql, $args);

if (!$result && $query != 1) {
    header("Location: ?query=1");
    exit();
}

checkResult($result);
?>

<div class="container">
    <div class="gall-ctrl">
        <a href="?query=<?= $query - 1 ?>">&lt;&lt;&lt;</a>
        <a href="?query=<?= $query + 1 ?>">&gt;&gt;&gt;</a>
    </div>

    <div class="gallery">
        <?php foreach ($result as $row) : ?>
            <a href="img/800/<?= $row['image1'] ?>">
                <img src="img/150x150/<?= $row['image1'] ?>" alt="thumbnail">
            </a>
        <?php endforeach ?>
    </div>
</div>

<?php include('../view/footer.php') ?>