<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Tronem a crear la connexió
$conn = new mysqli($servername, $username, $password, $dbname);
// Comprovem la connexió
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$formes = htmlspecialchars($_POST['contacte']);
$formli = $_POST['email'];
$formda = $_POST['numero'];

$sql = "INSERT INTO Contactes (contacte, email, numero)
VALUES ('$formes', '$formli', '$formda')";

if ($conn->query($sql) === TRUE) {
   $missatge04 = "Has creat una nova entrada.";
} else {
   $missatge04 = "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="ca">
  <head>
    <meta charset="UTF-8" />
    <title>Simple CMS</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
  	<div id="page-wrap">
      <?php echo $missatge04 ?>
      <input type="button" value="Torna al forumlari d'esdeveniments" onclick="window.open('index.php','_self')"/>
	   </div>
  </body>
</html>
