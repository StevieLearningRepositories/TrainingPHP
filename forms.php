<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Beoordelings formulier
    </title>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

<?php
session_start();
$improvementErr = $ratingErr = "";
$impressie = $improvement = $rating = "";
$ratingNum = 10;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST["improvement"])) {
        $improvementErr = "Graag wil ik feedback ontvangen!";
    } else {
        $improvement = test_input($_POST["improvement"]);
    }

    if (empty($_POST["rating"])) {
            $ratingErr = "Beoordeel dit formulier van 1 t/m 10";
    } else {
        $rating = test_input($_POST["rating"]);
    }
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<h1>Geef hier je oordeel over dit project</h1>
<span class="error">* Verplicht veld</span>
<br>
<br>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <b>Impressie:</b><textarea name="impressie" rows="2" cols="40"></textarea>
    <br><br>
    <b>Verbetering:</b><textarea name="improvement" rows="2" cols="40"></textarea>
    <span class="error">* <?php echo $improvementErr;?></span>
    <br><br>


    <?php for ($r = 1; $r <= $ratingNum; $r++) { ?>

        <input type="radio" name="rating" value="<?= $r?>"
            <?php if ($r === $rating) echo "checked"; ?> >
        <?= $r?>
            <?php } ?>
    <br>

    <span class="error">* <?php echo $ratingErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Verstuur">
</form>


<br>
<br>
<button onclick="document.location='index.html'">Ga terug</button>

</body>
</html>