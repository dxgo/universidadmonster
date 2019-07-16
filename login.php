<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /universidadmonster');
  }
  require 'database.php';

  if (!empty($_POST['susu_nombre']) && !empty($_POST['susu_password'])) {
    $records = $conn->prepare('SELECT susu_codigo, susu_nombre, susu_password FROM susu_usuario WHERE susu_nombre = :susu_nombre');
    $records->bindParam(':susu_nombre', $_POST['susu_nombre']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['susu_password'], $results['susu_password'])) {
      $_SESSION['user_id'] = $results['susu_codigo'];
      header("Location: /universidadmonster");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Login</h1>
    <span>or <a href="signup.php">SignUp</a></span>

    <form action="login.php" method="POST">
      <input name="susu_nombre" type="text" placeholder="Ingrese su usuario">
      <input name="susu_password" type="password" placeholder="Ingrese su contraseña">
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
