<?php
include("../basededatos/db.php");

$SUSU_NOMBRE = '';
$PEEMP_CODIGO = '';
$SPER_CODIGO = '';
$SUSU_CODIGO = '';

if  (isset($_GET['SUSU_CODIGO'])) {
  $SUSU_CODIGO = $_GET['SUSU_CODIGO'];
  $query = "SELECT * FROM susu_usuario WHERE SUSU_CODIGO=$SUSU_CODIGO";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $SUSU_NOMBRE = $row['SUSU_NOMBRE'];
    $PEEMP_CODIGO = $row['PEEMP_CODIGO'];
    $SPER_CODIGO = $row['SPER_CODIGO'];
    $SUSU_CODIGO = $row['SUSU_CODIGO'];
  }
}

if (isset($_POST['update'])) {
  $SUSU_CODIGO = $_GET['SUSU_CODIGO'];
  $SUSU_NOMBRE = $_POST['SUSU_NOMBRE'];
  $PEEMP_CODIGO = $_POST['PEEMP_CODIGO'];
  $SPER_CODIGO = $_POST['SPER_CODIGO'];
  $codigou = $_POST['SUSU_CODIGO'];

  $query = "UPDATE susu_usuario set SUSU_NOMBRE = '$SUSU_NOMBRE', PEEMP_CODIGO = '$PEEMP_CODIGO', SPER_CODIGO = '$codigop' WHERE SUSU_CODIGO=$SUSU_CODIGO";
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
      <form action="edit.php?SUSU_CODIGO=<?php echo $_GET['SUSU_CODIGO']; ?>" method="POST">
          <div class="form-group">
            <input type="text" name="SUSU_NOMBRE" class="form-control" placeholder="Nombre" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="codigou" class="form-control" placeholder="Codigo usuario">
          </div>
          <div class="form-group">
            <input type="text" name="SPER_CODIGO" class="form-control" placeholder="Codigo persona">
          </div>
          <div class="form-group">
            <input type="text" name="PEEMP_CODIGO" class="form-control" placeholder="Codigo empleado">
          </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php'); ?>
