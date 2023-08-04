<?php

require "functions.php";
require "Database.php";

//requires
$config = require ('config.php');
$db = new Bases($config['database']);

//Gericht tabellen zoeken DB
$rows = $db->query("select * from input")->fetchall();

//Check of dat value in DB op te halen is
foreach($rows as $row) {
    if(isset($row)) {
        $row = "Variable not set";
    } else {
        echo $row['Name'];
    }
}


//querys bewerken die vanuit DB komen
//querys terug plaatsen in DB
//DB tabellen en columns bewerken
//beveiliging querys
