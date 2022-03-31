<?php
    //Récupération des valeurs
    $id = isset($_POST['idDisc']) && $_POST['idDisc'] != "" ? $_POST['idDisc'] : Null;
    $title = isset($_POST['title']) && $_POST['title'] != "" ? $_POST['title'] : Null;
    $artist = isset($_POST['artist']) && $_POST['artist'] != "" ? $_POST['artist'] : Null;
    $discyear = isset($_POST['year']) && $_POST['year'] != "" ? $_POST['year'] : Null;
    $genre = isset($_POST['genre']) && $_POST['genre'] != "" ? $_POST['genre'] : Null;
    $label = isset($_POST['label']) && $_POST['label'] != "" ? $_POST['label'] : Null;
    $price = isset($_POST['price']) && $_POST['price'] != "" ? $_POST['price'] : Null;

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

    require "record.php";
    $db = connexionBase();
    $artist = intval($artist);

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