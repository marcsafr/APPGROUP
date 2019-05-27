function full(){
$sql = "INSERT INTO taula_calendari (esdeveniment, hora)
VALUES ('$formli', '$formda')";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT * FROM taula_calendari";
if($result = mysqli_query($conn, $sql)){
  if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_array($result)) {
       $continguts = "<tr><td class='esdeveniment'>" .  $row["esdeveniment"]. "</td><td class='hora'>" . $row["hora"] . "</td></tr>";
    }

    mysqli_free_result($result);
  } else {
    $continguts = "Encara no hi ha esdeveniments.";
  }
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
