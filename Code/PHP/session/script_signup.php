<?php

    $nom = isset($_POST['nom']) && $_POST['nom'] != ""? $_POST['nom'] : Null;
    $prenom = isset($_POST['prenom']) && $_POST['prenom'] != "" ? $_POST['prenom'] : Null;
    $mail = isset($_POST['mail']) && $_POST['mail'] != "" ? $_POST['mail'] : Null;
    $password = isset($_POST['mdp']) && $_POST['mdp'] != "" ? $_POST['mdp'] : Null;
    $confirm = isset($_POST['confirm']) && $_POST['confirm'] != "" ? $_POST['confirm'] : Null;

    /*var_dump($nom);
    var_dump($prenom);
    var_dump($mail);
    var_dump($password);
    var_dump($confirm);
    exit;*/



    if ($nom == Null || $prenom == Null || $mail == Null || $password == Null || $confirm == Null)
    {
        header('Location: signup_form.php');
        exit;
    };

    if ($password != $confirm)
    {
        echo('Confirmation différente du mot de passe.
        <br>
        <a href="signup_form.php">Retour</a>');
        die;
    };


    require "db.php";
    $db = connexionBase();

    $password_hash = password_hash($password, PASSWORD_DEFAULT);


    try
    {
        $requete = $db->prepare("INSERT INTO user_id (user_last_name, user_first_name, user_password, user_mail) VALUES (:last_name, :first_name, :password_hash, :mail)");
        $requete->bindValue(":last_name", $nom, PDO::PARAM_STR);
        $requete->bindValue(":first_name", $prenom, PDO::PARAM_STR);
        $requete->bindValue(":mail", $mail, PDO::PARAM_STR);
        $requete->bindValue(":password_hash", $password_hash, PDO::PARAM_STR);
        $requete->execute();
        $requete->closeCursor();       

    }
    catch (Exception $e)
    {
        echo("Erreur : " . $requete->errorInfo()[2] . $e->getMessage() . "<br>");
        die("Fin du script (script_signup.php)");
    };


    header('Location:login_form.php');
    exit;






























?>