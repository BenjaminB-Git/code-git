<?php
    //Récupération des valeurs
    $id = isset($_POST['idDisc']) && $_POST['idDisc'] != "" ? $_POST['idDisc'] : Null;
    $title = isset($_POST['title']) && $_POST['title'] != "" ? $_POST['title'] : Null;
    $artist = isset($_POST['artist']) && $_POST['artist'] != "" ? $_POST['artist'] : Null;
    $discyear = isset($_POST['year']) && $_POST['year'] != "" ? $_POST['year'] : Null;
    $genre = isset($_POST['genre']) && $_POST['genre'] != "" ? $_POST['genre'] : Null;
    $label = isset($_POST['label']) && $_POST['label'] != "" ? $_POST['label'] : Null;
    $price = isset($_POST['price']) && $_POST['price'] != "" ? $_POST['price'] : Null;
    $picture = isset($_FILES['picture']) && $_FILES['picture']['size'] > 0 ? $_FILES['picture'] : Null;

    require "record.php";
    $db = connexionBase();
    $artist = intval($artist);


    /*$db_artist = $db->prepare("SELECT * FROM artists");
    $recup_artist = $db_artist->fetchAll(PDO::FETCH_OBJ);

    $tab_artist = array();
        foreach ($tab as $art_id => $art_name)
        {
            array_push($recup_artist, '$recup_artist->artist_id' => '$recup_artist->artist_name')
        };

    var_dump($tab_artist);
    exit;*/



    /*var_dump($_FILES);
    echo isset($_FILES['picture']);
    var_dump($picture);
    var_dump($title);
    var_dump($discyear);*/
    //exit;

    //Vérif validité du fichier
     if ($id == Null)
    {
        header("Location: discs.php");
        exit;
    }
    elseif ($title == Null || $artist == Null || $discyear == Null || $genre == Null || $label == Null || $price == Null)
    {
        header("Location: disc_modif.php?id=" . $id);
        exit;
    }

    if ($picture != Null)
    {
        if ($_FILES["picture"]["error"] > 0) 
        { 
            echo "Erreur à l'envoi du fichier";
            exit;
        };

        $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimetype = finfo_file($finfo, $_FILES["picture"]["tmp_name"]);
        finfo_close($finfo);
        $MimeExt = array(
            "image/gif" => ".gif",
            "image/jpeg" => ".jpeg",
            "image/pjpeg" => ".pjpeg",
            "image/png" => ".png",
            "image/x-png" => ".x-png",
            "image/tiff" => ".tiff"
        );

        if (in_array($mimetype, $aMimeTypes))
        {
            /* Le type est parmi ceux autorisés, donc OK, on va pouvoir 
            déplacer et renommer le fichier */

        } 
        else 
        {
        // Le type n'est pas autorisé, donc ERREUR

        echo "Type de fichier non autorisé";    
        exit;
        };


        $file_name = $title . " (" . $discyear . ")" . $MimeExt[$mimetype];
        move_uploaded_file($_FILES["picture"]["tmp_name"], "jaquettes/$file_name"); 
    };


    try 
    {
        $requete = $db->prepare("UPDATE disc SET disc_title = :title, artist_id = :artist, disc_genre = :genre, disc_year = :discyear, disc_label = :label, disc_price = :price WHERE disc_id = :id");
        $requete->bindValue(":id", $id, PDO::PARAM_INT);
        $requete->bindValue(":title", $title, PDO::PARAM_STR);
        $requete->bindValue(":artist", $artist, PDO::PARAM_INT);
        $requete->bindValue(":discyear", $discyear, PDO::PARAM_INT);
        $requete->bindValue(":genre", $genre, PDO::PARAM_STR);
        $requete->bindValue(":label", $label, PDO::PARAM_STR);
        $requete->bindValue(":price", $price, PDO::PARAM_STR);
        $requete->execute();
        $requete->closeCursor();

        if ($picture != Null)

        {
            $requete = $db->prepare("UPDATE disc SET disc_picture = :picture WHERE disc_id = :id");
            $requete->bindValue(":id", $id, PDO::PARAM_INT);
            $requete->bindValue(":picture", $file_name, PDO::PARAM_STR);
            $requete->execute();
            $requete->closeCursor();
        };


    }

    catch (Exception $e)
    {
        echo($id . "<br>");
        echo($title . "<br>");
        echo($artist . "<br>");
        echo($discyear . "<br>");
        echo($genre . "<br>");
        echo($label . "<br>");
        echo($price . "<br>");
        echo("Erreur : " . $requete->errorInfo()[2] . $e->getMessage() . "<br>");
        die("Fin du script (script_disc_modif.php)");
    }




    header("Location: disc_detail.php?id=" . $id);
    exit;

?>