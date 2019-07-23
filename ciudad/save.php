<?php

include('../basededatos/db.php');

if ($_POST['password']==$_POST['password_c']){
if (isset($_POST['save'])) {
    $nombre = $_POST['nombre'];
    $codigoe = $_POST['codigoe'];
    $codigop = $_POST['codigop'];
    $codigou = $_POST['codigou'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $query = "INSERT INTO susu_usuario (susu_nombre, peemp_codigo, susu_codigo, sper_codigo, susu_password) VALUES ('$nombre', '$codigop','$codigou','$codigoe','$password')";
    $result = mysqli_query($conn, $query);
    if(!$result) {
      die("Algo salio mal.");
    }

    $_SESSION['message'] = 'Usuario ingresado exitosamente';
    $_SESSION['message_type'] = 'success';
    header('Location: usuario.php'); 
}
}
else{
  $_SESSION['message'] = 'Las contraseñas no coinciden';
  $_SESSION['message_type'] = 'danger';
  header('Location: usuario.php'); 
}
?>
