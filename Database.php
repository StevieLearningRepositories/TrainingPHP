<?php

//class voor object te zoeken voor verbinding en scoping
class Bases {

    public PDO $connect;
    public function __construct($config)
    {
        $dbh = 'mysql:' . http_build_query($config, '', ';');

        $this->connect = new PDO($dbh, 'root', 'root', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query): bool|PDOStatement
    {
        return $this->connect->query($query);
    }
}