<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'proyecto'
) or die(mysqli_erro($mysqli));

?>
