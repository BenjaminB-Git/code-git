<?php
    require "record.php";
    $db = connexionBase();
    $requetetab = $db->query("SELECT * FROM artist ORDER BY artist_name");
    $tableau = $requetetab->fetchAll(PDO::FETCH_OBJ);
    $requetetab->closeCursor();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - Ajout Disque</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>


<body>
     <div class="container">

        <form action="script_disc_ajout.php" enctype="multipart/form-data" method="post" id="form_ajout">
        <div class="form-group">
            <fieldset>
                <legend>Ajouter un vinyle</legend>
                <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title_for_new_disc">
                    <i id="new_par_title"></i><br>

                <label for="artist">Artist</label>
                    <select class="form-control" name="artist" id="artist_for_new_disc">
                        <option value="" selected disabled>Choisissez un artiste</option>
                        <?php foreach ($tableau as $artist): ?>
                            <option value ="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
                        <?php endforeach ?>
                    </select>
                    <i id="new_par_artist"></i><br>
                <label for="year">Year</label>
                    <input class="form-control" type="text" name="year" id="year_for_new_disc">
                    <i id="new_par_year"></i><br>
                <label for="genre">Genre</label>
                    <input class="form-control" type="text" name="genre" id="genre_for_new_disc">
                    <i id="new_par_genre"></i><br>
                <label for="label">Label</label>
                    <input class="form-control" type="text" name="label" id="label_for_new_disc">
                    <i id="new_par_label"></i><br>
                <label for="price">Price</label>
                    <input class="form-control" type="text" name="price" id="price_for_new_disc">
                    <i id="new_par_price"></i><br>
                <label for="picture">Picture</label><br>
                    <input type="file" name="picture" id="picture_for_new_disc"><br>
                    <i id="new_par_picture"></i><br>

                <input class="btn btn-primary envoi_form" type="button" id="valid_update" name="upload" value="Envoyer">
                <a class="btn btn-primary" href="discs.php">Retour à l'accueil</a>
                </fieldset>
        </div>
        </form>


<script src="assets/js/script_ajout.js"></script>

</body>
</html>
