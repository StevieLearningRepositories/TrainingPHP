<?php

require "functions.php";
require "Database.php";

$config = require ('config.php');

$db = new Bases($config['database']);

$rows = $db->query("select * from input")->fetchall();

