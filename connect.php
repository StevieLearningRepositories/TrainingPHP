<?php

require "results.php";

$dsn = "mysql:host=localhost;username=root;port=3306;dbname=db;charset=utf8mb4;";

$pdo = new PDO($dsn);

$statement = $pdo->prepare("SELECT * FROM input");
$statement->execute();
$post = $statement->fetchAll();

dd($post);