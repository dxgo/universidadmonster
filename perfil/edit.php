<?php
include("../basededatos/db.php");
$SPER_CODIGO = '';
$CODIGO_ROL = '';
$SSUB_CODIGO = '';
$SRO_CODIGO_ROL = '';
$SPER_DESCRIPCION = '';

if  (isset($_GET['SPER_CODIGO'])) {
  $SPER_CODIGO = $_GET['SPER_CODIGO'];
  $query = "SELECT * FROM sper_perfil WHERE SPER_CODIGO=$SPER_CODIGO";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $SPER_CODIGO = $row['SPER_CODIGO'];
    $CODIGO_ROL = $row['CODIGO_ROL'];
    $SSUB_CODIGO = $row['SSUB_CODIGO'];
    $codigoe = $row['SPER_CODIGO'];
    $SPER_DESCRIPCION = $row['SPER_DESCRIPCION'];
  }
}

if (isset($_POST['update'])) {
  $SPER_CODIGO = $_GET['SPER_CODIGO'];
  $CODIGO_ROL = $_POST['CODIGO_ROL'];
  $SSUB_CODIGO = $_POST['SSUB_CODIGO'];
  $SRO_CODIGO_ROL = $_POST['SRO_CODIGO_ROL'];
  $SPER_DESCRIPCION = $_POST['SPER_DESCRIPCION'];

  $query = "UPDATE sper_perfil set SPER_CODIGO = '$SPER_CODIGO', SSUB_CODIGO = '$SSUB_CODIGO', SPER_DESCRIPCION = '$SPER_DESCRIPCION', SRO_CODIGO_ROL = '$SRO_CODIGO_ROL' WHERE SPER_CODIGO=$SPER_CODIGO";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actualizacion exitosa';
  $_SESSION['message_type'] = 'warning';
  header('Location: usuario.php');
}

?>
<?php include('../includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?SPER_CODIGO=<?php echo $_GET['SPER_CODIGO']; ?>" method="POST">
          <div class="form-group">
            <input type="text" name="CODIGO_ROL" class="form-control" placeholder="Codigo ROL" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="SRO_CODIGO_ROL" class="form-control" placeholder="ROL">
          </div>
          <div class="form-group">
            <input type="text" name="SSUB_CODIGO" class="form-control" placeholder="Codigo sub sistema">
          </div>
          <div class="form-group">
            <input type="text" name="SPER_DESCRIPCION" class="form-control" placeholder="Descripción">
          </div>
        <button class="btn-success" name="update">
          Actualizacion
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php'); ?>
