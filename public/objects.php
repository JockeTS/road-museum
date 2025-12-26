<?php
    $title = 'objects';
    include('../view/header.php');

    $sql = <<<EOD
    SELECT 
    id,
    name,
    title,
    image1,
    image1Text,
    image1Alt
    FROM object
    ;
    EOD;

    $args = [];

    $result = getMultiRow($sql, $args);
    checkResult($result);
?>

<div class="container">
    <div class="objects-grid">
        <?php foreach ($result as $row) : ?>
            <a href="object.php?obj=<?= $row['name'] ?>" class="object-preview">
                <h4><?= $row['title'] ?></h4> 
                <img src="img/250/<?= $row['image1'] ?>" alt="preview">
                <p><?= $row['image1Text'] ?></p>
            </a>
        <?php endforeach ?>
    </div>
</div>

<?php include('../view/footer.php') ?>
