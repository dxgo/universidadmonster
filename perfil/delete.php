<?php

include("../basededatos/db.php");

if(isset($_GET['SPER_CODIGO'])) {
  $SPER_CODIGO = $_GET['SPER_CODIGO'];
  $query = "DELETE FROM sper_perfil WHERE SPER_CODIGO = $SPER_CODIGO";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Existio un problema al eliminar.");
  }

  $_SESSION['message'] = 'El perfil ha sido eliminado';
  $_SESSION['message_type'] = 'danger';
  header('Location: perfil.php');
}

?>
