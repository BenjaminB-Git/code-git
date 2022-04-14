<?php

    $login = isset($_POST['login']) && $_POST['login'] != "" ? $_POST['login'] : Null;
    $password = isset($_POST['password']) && $_POST['password'] != "" ? $_POST['password'] : Null;


    if ($login == Null || $password == Null)
    {
        header('Location: login_form.php');
        exit;
    };

    require "db.php";
    $db = connexionBase();
    $requete = $db->prepare("SELECT * FROM user_id WHERE user_mail = ?");
    $requete->execute(array($login));
    $myLog = $requete->fetch(PDO::FETCH_OBJ);
    $requete->closeCursor();
    


    

    if ($myLog == false)
    {
        echo("Nope");
        exit;
    }

    session_start();
    $_SESSION["login"] = $myLog->user_mail;
    $_SESSION["password"] = $myLog->user_password;


    
    //var_dump($myLog);
    //var_dump($password_hash);
    //exit;

    $verif = password_verify($password, $myLog->user_password);

    if ($verif == false)
    {
        echo("Mot de passe incorrect");
        unset($_SESSION["login"]);
        unset($_SESSION["password"]);

        if (ini_get("session.use_cookies")) 
        {
            setcookie(session_name(), '', time()-42000);
        }

        session_destroy();
        var_dump($_SESSION);
        exit;

    }

        header('Location: target.php');
        exit;
?>