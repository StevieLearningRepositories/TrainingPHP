<!DOCTYPE html>
<html lang="en">
<body>
<head>
    <title>
        Beoordelings formulier
    </title>
    <style>
        .error {color: #FF0000;}
    </style>
</head>


<?php
session_start();
$impressieErr = $improvementErr = $ratingErr = "";
$impressie = $improvement = $rating = "";
$numRate = 10;


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["impressie"])) {
        $impressieErr = "";
    } else {
        $impressie = test_input($_POST["impressie"]);
    }

    if (empty($_POST["rating"])) {
        $ratingErr = "Beoordeel dit formulier van 1 t/m 10";
    } else {
        $rating = test_input($_POST["rating"]);
    }

    if (empty($_POST["improvement"])) {
        $improvementErr = "Graag wil ik feedback ontvangen!";
    } else {
        $improvement = test_input($_POST["improvement"]);
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
<p><span class="error">* Verplicht veld</span></p>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Impressie: <textarea name="impressie" rows="2" cols="40"></textarea>
    <br><br>
    Verbetering: <textarea name="improvement" rows="2" cols="40"></textarea>
    <span class="error">* <?php echo $improvementErr;?></span>
    <br><br>


    <?php for ($r = 1; $r <= $numRate; $r++) { ?>

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
<button onclick="document.location='index.html'" style="margin-left: 50px">Ga terug</button>
<button onclick="document.location='results.php'" style="float: right; margin-right: 50px">Resultaat</button>

</body>
</html>