<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
<body>
<head>
    <title>
        Resultaten
    </title>
</head>


<?php
$resImpres = $_SESSION["impression"] ?? "";
$resImprov = $_SESSION["improvement"] ?? "";
$resRat = $_SESSION["rating"] ??  "";
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
<br>
<br>
</body>
</html>

<?php
session_destroy();
session_abort();

?>

<?php
date_default_timezone_set("Europe/Amsterdam");
echo date("d-m-Y H:i:s");
?>


