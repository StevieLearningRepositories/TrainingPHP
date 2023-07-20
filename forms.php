<!DOCTYPE html>
<html lang="en">
<body>
<head>
    <title>
        Beoordelings formulier
    </title>
</head>
<?php
$impressie = "";

 if (empty($_POST["impressie"])) {
    $impressie = "";
  } else {
    $impressie = test_input($_POST["impressie"]);
  }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h1>Geef hier je oordeel over dit project</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Impressie: <textarea name="impressie" rows="2" cols="40"></textarea>
    <input type="submit" name="submit" value="Submit">
</form>


<?php
echo "<h2>Jouw ingevulde oordeel:</h2>";
echo $impressie;
echo "<br>";
?>

<button onclick="document.location='index.html'">Ga terug</button>
</body>
</html>