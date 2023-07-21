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
$impressieErr = $improvementErr = $ratingErr = "";
$impressie = $improvement = $rating = "";

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
    Beoordeling:<input type="radio" name="rating" <?php if (isset($rating) && $rating==="1") echo "checked";?> value="1">1
    <input type="radio" name="rating" <?php if (isset($rating) && $rating==="2") echo "checked";?> value="2">2
    <input type="radio" name="rating" <?php if (isset($rating) && $rating==="3") echo "checked";?> value="3">3
    <input type="radio" name="rating" <?php if (isset($rating) && $rating==="4") echo "checked";?> value="4">4
    <input type="radio" name="rating" <?php if (isset($rating) && $rating==="5") echo "checked";?> value="5">5
    <input type="radio" name="rating" <?php if (isset($rating) && $rating==="6") echo "checked";?> value="6">6
    <input type="radio" name="rating" <?php if (isset($rating) && $rating==="7") echo "checked";?> value="7">7
    <input type="radio" name="rating" <?php if (isset($rating) && $rating==="8") echo "checked";?> value="8">8
    <input type="radio" name="rating" <?php if (isset($rating) && $rating==="9") echo "checked";?> value="9">9
    <input type="radio" name="rating" <?php if (isset($rating) && $rating==="10") echo "checked";?> value="10">10
    <br>
    <span class="error">* <?php echo $ratingErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Verstuur">
</form>



<?php
echo "<h2>Jouw ingevulde oordeel:</h2>";
echo '<span style="font-weight:bold;">Jouw impressie: </span>';
echo $impressie;
echo "<br><br>";
echo '<span style="font-weight:bold;">Mijn verbeteringen: </span>';
echo $improvement;
echo "<br><br>";
echo '<span style="font-weight:bold;">Jouw beoordeling: </span>';
echo $rating;
?>
<br>
<br>
<br>
<button onclick="document.location='index.html'">Ga terug</button>
</body>
</html>