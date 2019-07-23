<?php

include("../basededatos/db.php");

if(isset($_GET['SUSU_CODIGO'])) {
  $SUSU_CODIGO = $_GET['SUSU_CODIGO'];
  $query = "DELETE FROM susu_usuario WHERE SUSU_CODIGO = $SUSU_CODIGO";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Existio un problema al eliminar.");
  }

  $_SESSION['message'] = 'El usuario ha sido eliminado';
  $_SESSION['message_type'] = 'danger';
  header('Location: usuario.php');
}

?>
