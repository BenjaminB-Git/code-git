<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création</title>
</head>
<body>
    <form method="post" action="script_signup.php" id="form">
        <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom"><br>
        <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom"><br>
        <label for="mail">Mail :</label>
            <input type="email" name="mail" id="mail"><br>
        <label for="mdp">Mot de Passe :
            <input type="password" name="mdp" id="mdp"><br>
        <label for="confirm">Confirmer le mot de passe : </label>
            <input type="password" name="confirm" id="confirm"><br>
        <input type="submit" id="submit" value="Envoyer">

    </form>

</body>