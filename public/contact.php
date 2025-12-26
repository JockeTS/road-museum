<?php
    $title = 'contact';
    include('../view/header.php');

    // Database
    $sql = <<<EOD
    SELECT 
    id,
    title,
    data
    FROM article
    WHERE id = ?
    ;
    EOD;

    $args = [24];

    $result = getSingleRow($sql, $args);
    checkResult($result);
?>

<div class="container">
    <div class="info-page">
        <h1><?= $result['title'] ?></h1>

        <?= $result['data'] ?>
    </div>
</div>

<?php include('../view/footer.php') ?>