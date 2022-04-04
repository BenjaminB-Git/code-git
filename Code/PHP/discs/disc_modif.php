<?php
    require "record.php";
    $db = connexionBase();
    $id = $_GET['id'];
    $requete = $db->prepare("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id WHERE disc_id=?");
    $requete->execute(array($id));
    $myDisc = $requete->fetch(PDO::FETCH_OBJ);
    $requete->closeCursor();
    $requetetab = $db->query("SELECT * FROM artist ORDER BY artist_name");
    $tableau = $requetetab->fetchAll(PDO::FETCH_OBJ);
    $requetetab->closeCursor();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modif</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">

        <form action="test_upload.php?id=<?= $myDisc->disc_id ?>" enctype="multipart/form-data" method="post" id="form_modif">
        <div class="form-group">
            <fieldset>
                <legend>Modifier le vinyle</legend>
                <input type="hidden" name="idDisc" id="idDisc" value="<?= $myDisc->disc_id ?>">
                <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title_for_disc" value="<?= $myDisc->disc_title ?>"> <i id="par_title"></i><br>

                <label for="artist">Artist</label>
                    <select class="form-control" name="artist" id="artist_for_disc">
                        <option value ="" selected disabled>Choisissez un artiste</option>
                        <?php foreach ($tableau as $artist): ?>
                            <option value ="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
                        <?php endforeach ?>
                    </select><i id="par_artist"></i><br>
                <label for="year">Year</label>
                    <input class="form-control" type="text" name="year" id="year_for_disc" value="<?= $myDisc->disc_year ?>"><i id="par_year"></i><br>
                <label for="genre">Genre</label>
                    <input class="form-control" type="text" name="genre" id="genre_for_disc" value="<?= $myDisc->disc_genre ?>"><i id="par_genre"></i><br>
                <label for="label">Label</label>
                    <input class="form-control" type="text" name="label" id="label_for_disc" value="<?= $myDisc->disc_label ?>"><i id="par_label"></i><br>
                <label for="price">Price</label>
                    <input class="form-control" type="text" name="price" id="price_for_disc" value="<?= $myDisc->disc_price ?>"><i id="par_price"></i><br>
                <label for="picture">Picture</label><br>
                    <input type="file" name="picture" id="picture_for_disc" accept=".jpg, .png, .jpeg" name="picture_for_disc"><br>
                <div id="preview_image"><img src="jaquettes/<?= $myDisc->disc_picture ?>"></div>

            </fieldset>
            <input class="btn btn-primary envoi_form" type="button" id="valid_update" name="upload" value="Envoyer">
        </div>
        </form>





    </div>
<script src="assets/js/script_modif.js"></script>
</body>
</html>