<?php
    require "record.php";
    $db = connexionBase();
    $id = $_GET['id'];
    $requete = $db->prepare("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id WHERE disc_id=?");
    $requete->execute(array($id));
    $myDisc = $requete->fetch(PDO::FETCH_OBJ);
    $requete->closeCursor();
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
<?php
include "record.php";
$db = connexionBase();
$requetetab = $db->query("SELECT * FROM artist");
$tableau = $requetetab->fetchAll(PDO::FETCH_OBJ);
$requetetab->closeCursor();

?>
    <div class="container">






























    </div>
<script src="assets/js/script.js"></script>
</body>
</html>