<?php
$conn = new mysqli("localhost", "langar", "langar", "langar");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
