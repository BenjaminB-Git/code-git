<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - Disques</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>


<body>
<?php

include "record.php";
$db = connexionBase();
$requete = $db->query("
    SELECT * FROM disc 
    JOIN artist ON artist.artist_id = disc.artist_id;");
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();

?>
    <div class="container">
        <div class="row">
            <div class="h1 font-weight-bold col-12 col-lg-6">Liste des albums</div>
            <div class="col-12 col-lg-6 text-lg-right"><a href="disc_ajout.php" class="btn btn-primary" id="ajout">Ajouter</a></div>
        </div>
        

        <div class="row">
        <?php foreach ($tableau as $disc): ?>
            <div class="col-12 col-lg-6">
                <table>
                    <td><img alt ="pochette <?= $disc->disc_title ?>" title ="<?= $disc->disc_title ?> - <?= $disc->artist_name ?>" class="img-responsive" src="jaquettes/<?= $disc->disc_picture ?>" width="200em" margin-right="15"></td>
                    <td>
                        <div class="col justify-content-between">
                        <div>
                            <b><?= $disc->disc_title ?></b></br>
                            <?= $disc->artist_name ?><br>
                            <b>Label:</b> <?= $disc->disc_label ?><br>
                            <b>Year:</b> <?= $disc->disc_year ?> <br>
                            <b>Genre:</b> <?= $disc->disc_genre ?>
                        </div>
                        <div>
                            <a href="disc_detail.php?id=<?= $disc->disc_id ?>" class="btn btn-primary" name="<?= $disc->disc_id ?>" id="detail">Détails</a>
                        </div>
                        </div>
                    </td>
                </table>
            </div>

        <?php endforeach; ?>






        </div>
    </div>

<script src="assets/js/script.js"></script>
</body>
</html>