<!DOCTYPE HTML>
<html lang="en">
<body>
<head>
    <title>
        Resultaten
    </title>
</head>


<?php
session_start();
$resImpres = $_POST["impression"];
$resImprov = $_POST["improvement"];
$resRat = ($_POST["rating"]) ??  "";
?>

<h2>Jouw ingevulde oordeel:</h2>
<span style="font-weight:bold;">Jouw impressie: </span> <?= $resImpres?>
<br><br>
<span style="font-weight:bold;">Mijn verbeteringen: </span> <?= $resImprov?>
<br><br>
<span style="font-weight:bold;">Jouw beoordeling: </span> <?= $resRat?>
<br><br>
<br><br>
<button onclick="document.location='forms.php'">Go back</button>

</body>
</html>

