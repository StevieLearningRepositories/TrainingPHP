<?php

require "functions.php";

$dsn = "mysql:host=db;port=3306;dbname=db;";
$pdo = new PDO($dsn, 'root', 'root');


$statement = $pdo->query("SELECT * FROM input");
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

dd($posts);