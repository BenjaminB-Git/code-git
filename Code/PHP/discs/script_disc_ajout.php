<?php

    $title = isset($_POST['title']) && $_POST['title'] != "" ? $_POST['title'] : Null;
    $artist = isset($_POST['artist']) && $_POST['artist'] != "" ? $_POST['artist'] : Null;
    $discyear = isset($_POST['year']) && $_POST['year'] != "" ? $_POST['year'] : Null;
    $genre = isset($_POST['genre']) && $_POST['genre'] != "" ? $_POST['genre'] : Null;
    $label = isset($_POST['label']) && $_POST['label'] != "" ? $_POST['label'] : Null;
    $price = isset($_POST['price']) && $_POST['price'] != "" ? $_POST['price'] : Null;
    $picture = isset($_FILES['picture']) && $_FILES['picture']['size'] > 0 ? $_FILES['picture'] : Null;


    if ($title == Null || $artist == Null || $discyear == Null || $genre == Null || $label == Null || $price == Null || $picture == Null)
    {
        header("Location: disc_ajout.php");
        exit;
    };

    require "record.php";
    $db = connexionBase();

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

        try 
        {
            $requete = $db->prepare("INSERT INTO disc (disc_title, artist_id, disc_year, disc_genre, disc_label, disc_price, disc_picture) VALUES (:title, :artist, :discyear, :genre, :label, :price, :picture)");
            $requete->bindValue(":title", $title, PDO::PARAM_STR);
            $requete->bindValue(":artist", $artist, PDO::PARAM_INT);
            $requete->bindValue(":discyear", $discyear, PDO::PARAM_INT);
            $requete->bindValue(":genre", $genre, PDO::PARAM_STR);
            $requete->bindValue(":label", $label, PDO::PARAM_STR);
            $requete->bindValue(":price", $price, PDO::PARAM_STR);
            $requete->bindValue(":picture",$file_name, PDO::PARAM_STR);
            $requete->execute();
            $requete->closeCursor();
        }

        catch (Exception $e)
        {
            echo($title . "<br>");
            echo($artist . "<br>");
            echo($discyear . "<br>");
            echo($genre . "<br>");
            echo($label . "<br>");
            echo($price . "<br>");
            echo("Erreur : " . $requete->errorInfo()[2] . $e->getMessage() . "<br>");
            die("Fin du script (script_disc_modif.php)");
        }
    echo("Succès !");
    exit;

    //header("Location:discs.php");
    //exit;







?>