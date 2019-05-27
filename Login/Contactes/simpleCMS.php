<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

//Creació de la connexió
$conn = new mysqli($servername, $username, $password);
//Comprovació
if ($conn->connect_error) {
   die($missatge01 = "<span style='color:#4CAF50;'>Status Servidor</span>&nbsp;&xrarr; " . $conn->connect_error);
}

$missatge01 = "<span style='color:#4CAF50;'>Status Servidor</span>&nbsp;&xrarr; Connexió establerta amb el servidor";
//Create database
$sql = "CREATE DATABASE test";
if ($conn->query($sql) === TRUE) {
   $missatge02 = "<span style='color:#4CAF50;'>Status Dbase</span>&nbsp;&xrarr; La Base de dades s'ha creat satisfactòriament.";
} else {
   $missatge02 = "<span style='color:#4CAF50;'>Status Dbase</span>&nbsp;&xrarr; ". $conn->error;
}
// Connexió a la base de dades
$conn = new mysqli($servername, $username, $password, $dbname);
//Crear taula
$sql = "CREATE TABLE Contactes (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  contacte VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  numero VARCHAR(9) NOT NULL
  )";

  if ($conn->query($sql) === TRUE) {
    $missatge03 = "<span style='color:#4CAF50;'>Status Taula</span>&nbsp;&xrarr; La Taula s'ha creat satisfactòriament";
  } else {
    $missatge03 = "<span style='color:#4CAF50;'>Status Taula</span>&nbsp;&xrarr; ". $conn->error;;
  }
//LOOP PART 1
  $sql = "SELECT * FROM Contactes";
  $result = mysqli_query($conn, $sql);

      ?>



<div class="post">
  <p><?php echo $missatge01 ?></p>
  <p><?php echo $missatge02 ?></p>
  <p><?php echo $missatge03 ?></p>
  </div>
<div class="form">
  <form action="formaction.php" method="post">
    <label for="contacte">Contactes</label>
    <input name="contacte" id="contacte" type="text" maxlength="30" />
    <label for="email">Email</label>
    <input name="email" id="email" type="text" maxlength="50" />
    <label for="numero">Número</label>
    <input name="numero" id="numero" type="text" maxlength="9" /></br></br>
    <div id='btn'><input type="submit" value="Crea contacte"/></div>
  </form>
<table>
  <!--LOOP part 2-->
  <?php while($row = mysqli_fetch_array($result)) { ?>
  <tr>
    <td id='id'> <?php echo $row['id'] ?></td>
    <td id='contacte'> <?php echo $row['contacte'] ?></td>
    <td id='email'> <a href="mailto:<?php echo $row['email'] ?>"><?php echo $row['email'] ?></td>
    <td id='numero'> <?php echo $row['numero'] ?></td>
  </tr>
<!--FINAL LOOP TANCAMENT CONNEXIÓ-->
  <?php
  }mysqli_close($conn);
   ?>
</table>
</div>
