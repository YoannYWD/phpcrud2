<?php 
require "./db.php";
$sql = "SELECT * FROM club;";
$statement = $connection->prepare($sql);
$statement->execute();
$clubs = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php
include "./head.php";
?>

<div class="container my-5">
    <h1 class="text-center mb-5">Liste des clubs</h1>
  <div class="card mt-5">
    <div class="card-header">
      <h2>Tous les clubs</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
          <tr>
              <th>ID</th>
              <th>Nom</th>
          </tr>
            <?php foreach($clubs as $club): ?>
          <tr>
            <td><?= $club->id; ?></td>
            <td><?= $club->nom; ?></td>
          </tr>
          <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>

<?php
include "./footer.php";
?>