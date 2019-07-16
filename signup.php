<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['susu_nombre']) && !empty($_POST['susu_password'])) {
    $sql = "INSERT INTO susu_usuario (susu_nombre, susu_password, peemp_codigo, susu_codigo, sper_codigo) VALUES (:susu_nombre, :susu_password, :peemp_codigo, :susu_codigo, :sper_codigo)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':peemp_codigo', $_POST['peemp_codigo']);
    $stmt->bindParam(':susu_codigo', $_POST['susu_codigo']);
    $stmt->bindParam(':sper_codigo', $_POST['sper_codigo']);
    $stmt->bindParam(':susu_nombre', $_POST['susu_nombre']);
    $password = password_hash($_POST['susu_password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':susu_password', $password);

    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>SignUp</h1>
    <span>or <a href="login.php">Login</a></span>

    <form action="signup.php" method="POST">
      <input name="peemp_codigo" type="text" placeholder="Ingrese su codigo de empleado">
      <input name="susu_codigo" type="text" placeholder="Ingrese su codigo de usuario">
      <input name="sper_codigo" type="text" placeholder="Ingrese su codigo de persona">
      <input name="susu_nombre" type="text" placeholder="Ingrese su codigo de email">
      <input name="susu_password" type="password" placeholder="Enter your Password">
      <input name="confirm_password" type="password" placeholder="Confirm Password">
      <input type="submit" value="Submit">
    </form>

  </body>
</html>
