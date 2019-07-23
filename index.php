<?php
  session_start();

  require 'basededatos/database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT susu_codigo, susu_nombre FROM susu_usuario WHERE susu_codigo = :susu_codigo');
    $records->bindParam(':susu_codigo', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Monsters University</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php //include('includes/header.php'); ?>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Bienvenido. <?= $user['susu_nombre']; ?>
      <br>Has iniciado sesión correctamente
      <a href="login/logout.php">
        Salir
      </a>
    <?php else: ?>
      <h1>Por favor ingresa o regístrate</h1>

      <a href="login/login.php">Ingresa</a> o
      <a href="login/signup.php">Registrate</a>
    <?php endif; ?>
  </body>
</html>

