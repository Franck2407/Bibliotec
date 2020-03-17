<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  'ico1',
  'Biblioteca'
) or die(mysqli_erro($mysqli));

?>
