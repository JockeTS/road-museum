<?php

function connectToDatabase(): object
{
    // Path to database
    $fileName = "../db/nvm.sqlite";
    $dsn = "sqlite:$fileName";

    // Open the database file and set some attributes on interface
    // and catch the exception if it fails.
    try {
        $dbh = new PDO($dsn);
        $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Failed to connect to the database using DSN:<br>'$dsn'<br>";
        throw $e;
    }

    return $dbh;
}

function searchDatabase($query, $args): object
{
    $dbh = connectToDatabase();

    $stmt = $dbh->prepare($query);

    $stmt->execute($args);

    return $stmt;
}

function getSingleRow($query, $args): array
{
    $stmt = searchDatabase($query, $args);

    $row = $stmt->fetch();

    return $row;
}

function getMultiRow($query, $args): array
{
    $stmt = searchDatabase($query, $args);

    $row = $stmt->fetchAll();

    return $row;
}

function checkResult($result): void
{
    if (!$result) {
        header("Location: error.php");
        exit();
    }
}
