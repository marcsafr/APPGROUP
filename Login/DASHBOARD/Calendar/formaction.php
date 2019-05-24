<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "calendari";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$formid = $_POST['id'];
$formli = $_POST['esdeveniment'];
$formda = $_POST['hora'];

$sql = "INSERT INTO taula_calendari (esdeveniment, hora)
VALUES ('$formli', '$formda')";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="ca">
  <head>
    <meta charset="UTF-8" />
    <title>Calendari</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
  	<div id="page-wrap">
      <?php echo $missatge04 ?>
      <input type="button" value="Torna al calendari" onclick="window.open('calendari.php','_self')"/>
	   </div>
  </body>
</html>
