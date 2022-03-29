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
        <h1>Liste des albums</h1>

        <div class="row">
        <?php foreach ($tableau as $disc): ?>
            <div class="col-12 col-lg-6">
                <table>
                    <td><img class="img-responsive" src="jaquettes/<?= $disc->disc_picture ?>" width="200" margin-right="15"></td>
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
                            <input type="button" class="btn btn-primary" onclick=window.location.href="disc_detail.php?id=<?= $disc->disc_id ?>" value="Détails">
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