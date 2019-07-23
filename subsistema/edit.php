<?php
include("../basededatos/db.php");

$nombre = '';
$codigoe = '';
$codigop = '';
$codigou = '';

if  (isset($_GET['SUSU_CODIGO'])) {
  $SUSU_CODIGO = $_GET['SUSU_CODIGO'];
  $query = "SELECT * FROM susu_usuario WHERE SUSU_CODIGO=$SUSU_CODIGO";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['SUSU_NOMBRE'];
    $codigoe = $row['PEEMP_CODIGO'];
    $codigop = $row['SPER_CODIGO'];
    $codigou = $row['SUSU_CODIGO'];
  }
}

if (isset($_POST['update'])) {
  $SUSU_CODIGO = $_GET['SUSU_CODIGO'];
  $nombre = $_POST['nombre'];
  $codigoe = $_POST['codigoe'];
  $codigop = $_POST['SPER_CODIGO'];
  $codigou = $_POST['SUSU_CODIGO'];

  $query = "UPDATE susu_usuario set SUSU_NOMBRE = '$nombre', PEEMP_CODIGO = '$codigoe', SPER_CODIGO = '$codigop' WHERE SUSU_CODIGO=$SUSU_CODIGO";
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
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="codigou" class="form-control" placeholder="Codigo usuario">
          </div>
          <div class="form-group">
            <input type="text" name="codigop" class="form-control" placeholder="Codigo persona">
          </div>
          <div class="form-group">
            <input type="text" name="codigoe" class="form-control" placeholder="Codigo empleado">
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
