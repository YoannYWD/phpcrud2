<?php
require "./db.php";

$sqlClub = "SELECT * FROM club;";
$statementClub = $connection->prepare($sqlClub);
$statementClub->execute();
$clubs = $statementClub->fetchAll(PDO::FETCH_OBJ);

$sqlPoste = "SELECT * FROM poste;";
$statementPoste = $connection->prepare($sqlPoste);
$statementPoste->execute();
$postes = $statementPoste->fetchAll(PDO::FETCH_OBJ);

$message = "";
if(isset($_POST["nom"]) && isset($_POST["numero"]) && isset($_POST["position"])) {
    $nom = $_POST["nom"];
    $numero = $_POST["numero"];
    $position = $_POST["position"];
    $sql = "INSERT INTO joueur (nom, numero, position) VALUES (:nom, :numero, :position)";
    $statement = $connection->prepare($sql);
    if($statement->execute(
        [
            ":nom" => $nom, 
            ":numero" => $numero, 
            ":position" => $position
        ]
        )) {
        $message = "Joueur ajouté avec succès";
    }
}
?>

<?php
include "./head.php";
?>

<div class="row">
        <div class="col-6 offset-3 my-5">
            <h1 class="text-center mb-5">Ajouter un joueur</h1>
            
            <?php if(!empty($message)): ?>
                <div class="alert alert-success" role="alert">
                    <?= $message; ?>
                </div>
            <?php endif;?>     

            <form method="post">
              <div class="mb-3">
                <label>Nom</label>
                <input type="text" name="nom" class="form-control">
              </div>
              <div class="mb-3">
                <label>Numéro</label>
                <input type="number" name="numero" min="1" class="form-control">
              </div>
              <div class="mb-3">
                <label>Poste</label>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Choisissez le poste</option>
                  <?php foreach($postes as $poste): ?>
                    <option value="<?= $poste->id; ?>"><?= $poste->nom; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label>Club</label>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Choisissez le club</option>
                  <?php foreach($clubs as $club): ?>
                    <option value="<?= $club->id; ?>"><?= $club->nom; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
include "./footer.php";
?>

