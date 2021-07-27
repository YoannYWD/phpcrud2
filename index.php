<?php 
require "./db.php";
$sql = "SELECT joueur.id, joueur.nom, joueur.numero, poste.nom AS poste, club.nom AS club FROM joueur
        INNER JOIN poste
        ON poste.id = joueur.poste
        INNER JOIN club
        ON club.id = joueur.club;";
$statement = $connection->prepare($sql);
$statement->execute();
$joueurs = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php
include "./head.php";
?>

<div class="container my-5">
    <h1 class="text-center mb-5">Liste des joueurs</h1>
  <div class="card mt-5">
    <div class="card-header">
      <h2>Tous les joueurs</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
          <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Numero</th>
              <th>Poste</th>
              <th>Club</th>
              <th>Action</th>
          </tr>
            <?php foreach($joueurs as $joueur): ?>
          <tr>
            <td><?= $joueur->id; ?></td>
            <td><?= $joueur->nom; ?></td>
            <td><?= $joueur->numero; ?></td>
            <td><?= $joueur->poste; ?></td>
            <td><?= $joueur->club; ?></td>
            <td>
              <a href="edit.php?id=<?= $joueur->id; ?>" class="btn btn-info">Editer</a>
              <a href="delete.php?monid=<?= $joueur->id; ?>" class='btn btn-danger'>Supprimer</a>
            </td>
          </tr>
          <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php
include "./footer.php";
?>