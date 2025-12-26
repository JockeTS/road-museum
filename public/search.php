<?php
$title = 'search';
include('../view/header.php');

$query = $_GET['query'] ?? null;

$matches = [];

if ($query) {
    $matches = [];

    // Objects
    $sql = <<<EOD
    SELECT 
    id,
    name,
    title,
    image1
    FROM object
    WHERE title LIKE ?
    ;
    EOD;

    $args = ["%$query%"];

    $objects = getMultiRow($sql, $args);

    foreach ($objects as $object) {
        $object['link'] = "object.php?obj=" . $object['name'];
        array_push($matches, $object);
    }

    // Articles
    $sql = <<<EOD
    SELECT 
    id,
    name,
    title,
    image1
    FROM article
    WHERE title LIKE ?
    AND id NOT IN (1, 2, 24)
    ;
    EOD;

    $args = ["%$query%"];

    $articles = getMultiRow($sql, $args);

    foreach ($articles as $article) {
        $article['link'] = "article.php?art=" . $article['name'];
        array_push($matches, $article);
    }

    usort($matches, function ($a, $b) {
        if ($a['title'] > $b['title']) {
            return 1;
        }
    });
}

?>

<div class="container">
    <form action="search.php" method="get" class="search-form">
        <fieldset>
            <legend>Sök objekt och artiklar: </legend>

            <input type="text" name="query" value="">

            <input type="submit" name="submit" value="Sök" >
        </fieldset>
    </form>

    <?php if ($query && !$matches) : ?>
        <p>Inga resultat hittades.</p>
    <?php endif; ?>

    <ul class="results-list">
        <?php foreach ($matches as $match) : ?>
            <li class="result-item">
                <?php if ($match['image1']) : ?>
                    <img src="img/80x80/<?= $match['image1'] ?>" alt="thumbnail">
                <?php endif; ?>
                
                <a href="<?= $match['link'] ?>"><?= $match['title'] ?></a>
            </li>
        <?php endforeach ?>
    </ul>
</div>

<?php include('../view/footer.php') ?>