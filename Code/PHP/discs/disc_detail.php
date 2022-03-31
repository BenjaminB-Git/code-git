<?php
    require "record.php";
    $db = connexionBase();
    $id = $_GET['id'];
    $requete = $db->prepare("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id WHERE disc_id=?");
    $requete->execute(array($id));
    $myDisc = $requete->fetch(PDO::FETCH_OBJ);
    $requete->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - Détail Disque</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>


<body>
    <div class="container">
        <br>
        <img class="justify-content-center" src="jaquettes/<?= $myDisc->disc_picture ?>"><br>
        <b>Title:</b> <?= $myDisc->disc_title ?><br>
        <b>Artist:</b> <?= $myDisc->artist_name ?><br>
        <b>Date:</b> <?= $myDisc->disc_year ?><br>
        <b>Label:</b> <?= $myDisc->disc_label ?><br>
        <b>Genre: </b> <?= $myDisc->disc_genre ?><br>
        <b>Price:</b> $<?= $myDisc->disc_price ?><br>
        <input type="button" class="btn btn-primary" value="Modifier" id="modifier">
        <input type="button" class="btn btn-primary" value="Supprimer" id="supprimer">
        <input type="button" class="btn btn-primary" value="Retour à l'accueil" id="retour">
        <input type="hidden" id="idDisc" value="<?= $myDisc->disc_id ?>">
        





















    </div>

<script src="assets/js/script.js"></script>
</body>
</html>