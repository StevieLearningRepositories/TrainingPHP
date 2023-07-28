<?php
session_start()
?>

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
$errors = array();
$impression = $improvement = $rating = "";
$ratingNum = 10;


if ($_SERVER["REQUEST_METHOD"] === "POST") {


    if (empty($_POST['improvement'])) {
        $errors["improvementErr"] = "Graag wil ik feedback ontvangen!";
    } else {
        $improvement = test_input($_POST["improvement"]);
    }

    if (empty($_POST['rating'])) {
            $errors["ratingErr"] = "Beoordeel dit formulier van 1 t/m 10";
    } else {
        $rating = test_input($_POST["rating"]);
    }

    if (empty($errors)) {
        $_SESSION["impression"] = htmlspecialchars($_POST["impression"]);
        $_SESSION["improvement"] = htmlspecialchars($_POST["improvement"]);
        $_SESSION["rating"] = htmlspecialchars($_POST["rating"]);
        header("Location: results.php");
        exit;
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
    <b>Impressie:</b><textarea name="impression" rows="2" cols="40"></textarea>
    <br><br>
    <b>Verbetering:</b><textarea name="improvement" rows="2" cols="40"></textarea>
    <span class="error">* <?php echo isset($errors["improvementErr"]) ? $errors["improvementErr"] : "";?></span>
    <br><br>


    <?php for ($r = 1; $r <= $ratingNum; $r++) { ?>

        <input type="radio" name="rating" value=<?= $r?>
            <?php if (isset($r) && $r === $rating) echo "checked";?> > <?= $r ?>
            <?php } ?>
    <br>

    <span class="error">* <?php echo isset($errors["ratingErr"]) ? $errors["ratingErr"] : "";?></span>
    <br><br>
    <button formmethod="post">Verstuur</button>
</form>

<br>
<br>
<button onclick="document.location='index.html'">Ga terug</button>
<br>
<br>
<?php
date_default_timezone_set("Europe/Amsterdam");
echo date("d-m-Y H:i:s");
?>
</body>
</html>