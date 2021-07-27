<?php
require "./db.php";

$sql = "SELECT * FROM club;";
$statement = $connection->prepare($sql);
$statement->execute();
$clubs = $statement->fetchAll(PDO::FETCH_OBJ);

$sql = "SELECT * FROM poste;";
$statement = $connection->prepare($sql);
$statement->execute();
$postes = $statement->fetchAll(PDO::FETCH_OBJ);

$sql = "SELECT * FROM joueur WHERE id = :id";
$id = $_GET["id"];
$statement = $connection->prepare($sql);
$statement->execute([":id" => $id]);
$joueur = $statement->fetch(PDO::FETCH_OBJ);
if(isset($_POST["nom"]) && isset($_POST["numero"]) && isset($_POST["poste"]) && isset($_POST["club"])) {
    $nom = $_POST["nom"];
    $numero = $_POST["numero"];
    $poste = $_POST["poste"];
    $club = $_POST["club"];
    $sql = "UPDATE joueur SET nom=:nom, numero=:numero, poste=:poste, club=:club WHERE id=:id";
    $statement = $connection->prepare($sql);
    if ($statement->execute(
        [
            ":nom" => $nom,
            ":numero" => $numero,
            ":poste" => $poste,
            ":club" => $club,
            ":id" => $id
        ]
        )) {
            header("Location: /phpcrud2");
    }
}
?>

<?php
include "./head.php";
?>

<div class="row">
        <div class="col-6 offset-3 my-5">
            <h1 class="text-center mb-5">Modifier un joueur</h1>
 
            <form method="post">
              <div class="mb-3">
                <label>Nom</label>
                <input type="text" value="<?= $joueur->nom ?>" name="nom" class="form-control">
              </div>
              <div class="mb-3">
                <label>Numéro</label>
                <input type="number" value="<?= $joueur->numero ?>" name="numero" min="1" class="form-control">
              </div>
              <div class="mb-3">
                <label>Poste</label>
                <select class="form-select" name="poste" aria-label="Default select example">
                  <option selected disabled>Sélectionner le nouveau poste</option>
                  <?php foreach($postes as $poste): ?>
                    <option value="<?= $poste->id; ?>"><?= $poste->nom; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label>Club</label>
                <select class="form-select"  name="club" aria-label="Default select example">
                  <option selected disabled>Sélectionner le nouveau club</option>
                  <?php foreach($clubs as $club): ?>
                    <option value="<?= $club->id; ?>"><?= $club->nom; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
</div>

<?php
include "./footer.php";
?>
