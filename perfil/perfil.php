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
            <input type="text" name="SPER_CODIGO" class="form-control" placeholder="Codigo perfil" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="CODIGO_ROL" class="form-control" placeholder="Codigo rol">
          </div>
          <div class="form-group">
            <input type="text" name="SSUB_CODIGO" class="form-control" placeholder="Codigo sub sistema">
          </div>
          <div class="form-group">
            <input type="text" name="SRO_CODIGO_ROL" class="form-control" placeholder="Rol">
          </div> 
          <div class="form-group">
            <textarea name="SPER_DESCRIPCION" rows="2" class="form-control" placeholder="Task Description"></textarea>
          </div>
          <input type="submit" name="save" class="btn btn-success btn-block" value="Guardar PERFIL">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Perfil</th>
            <th>Codigo empleado</th>
            <th>Codigo persona</th>
            <th>DEscripción</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM sper_perfil";
          $result = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row['SPER_CODIGO']; ?></td>
            <td><?php echo $row['CODIGO_ROL']; ?></td>
            <td><?php echo $row['SSUB_CODIGO']; ?></td>
            <td><?php echo $row['SRO_CODIGO_ROL']; ?></td>
            <td><?php echo $row['SPER_DESCRIPCION']; ?></td>
            <td>
              <a href="edit.php?SPER_CODIGO=<?php echo $row['SPER_CODIGO']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete.php?SPER_CODIGO=<?php echo $row['SPER_CODIGO']?>" class="btn btn-danger">
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
