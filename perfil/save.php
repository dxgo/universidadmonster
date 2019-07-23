<?php

include('../basededatos/db.php');
if (isset($_POST['save'])) {
    $SPER_CODIGO = $_POST['SPER_CODIGO'];
    $CODIGO_ROL = $_POST['CODIGO_ROL'];
    $SSUB_CODIGO = $_POST['SSUB_CODIGO'];
    $SRO_CODIGO_ROL = $_POST['SRO_CODIGO_ROL'];
    $SPER_DESCRIPCION = $_POST['SPER_DESCRIPCION'];
    $query = "INSERT INTO sper_perfil (SPER_CODIGO, CODIGO_ROL, SSUB_CODIGO, SRO_CODIGO_ROL, SPER_DESCRIPCION) VALUES ('$SPER_CODIGO', '$CODIGO_ROL','$SSUB_CODIGO','$SRO_CODIGO_ROL','$SPER_DESCRIPCION')";
    $result = mysqli_query($conn, $query);
    if(!$result) {
      die("Algo salio mal.");
    }

    $_SESSION['message'] = 'Perfil ingresado exitosamente';
    $_SESSION['message_type'] = 'success';
    header('Location: perfil.php'); 
}
?>
