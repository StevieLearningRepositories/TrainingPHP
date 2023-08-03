<?php

class Bases {

    public $connect;
    public function __construct($config)
    {
        $dbh = 'mysql:' . http_build_query($config, '', ';');

        $this->connect = new PDO($dbh, 'root', 'root', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query)
    {
        $statement = $this->connect->prepare($query);

        $statement->execute();

        return $statement;
    }
}