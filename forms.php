<!DOCTYPE html>
<html lang="en">
<body>

<?php
echo $_SERVER['PHP_SELF'];
?>

<form action="forms.php" method="post">
    Name: <input type="text" name="name"><br>
    E-mail: <input type="text" name="email"><br>
    <input type="submit">
</form>

</body>
</html>

