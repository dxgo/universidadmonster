<?php include("../basededatos/db.php"); ?>

<?php include('../includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD USER FORM -->
      <div class="card card-body">
        <form action="save.php" method="POST">
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
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Contraseña">
          </div>
          <div class="form-group">
            <input type="password" name="password_c" class="form-control" placeholder="Confirmar contraseña">
          </div>
          <input type="submit" name="save" class="btn btn-success btn-block" value="Guardar USUARIO">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Codigo perfil</th>
            <th>Fecha de creación</th>
            <th>Fecha de modificación</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM susu_usuario";
          $result = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row['SUSU_CODIGO']; ?></td>
            <td><?php echo $row['SUSU_NOMBRE']; ?></td>
            <td><?php echo $row['SPER_CODIGO']; ?></td>
            <td><?php echo $row['SUSU_FECHA_CREACION']; ?></td>
            <td><?php echo $row['SUSU_FECHA_ULT_CAMBIO']; ?></td>
            <td>
              <a href="edit.php?SUSU_CODIGO=<?php echo $row['SUSU_CODIGO']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete.php?SUSU_CODIGO=<?php echo $row['SUSU_CODIGO']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('../includes/footer.php'); ?>
