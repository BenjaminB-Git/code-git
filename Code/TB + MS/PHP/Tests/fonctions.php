<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

function lien($link,$title)
{
    echo '<a href="'.$link.'">' .$title. '</a>';
};

lien("https://www.reddit.com/", "Reddit Hug");


function somme($tableau)
{
    $sum = 0;
    for ($i = 0; $i < count($tableau); $i++)
    {
        $sum += $tableau[$i];
    };
    echo $sum;
};

$tab = array(4, 3, 8, 2);
$resultat = somme($tab);

$resultat;
$j = $i + 1;

//Y'a rien qui va ici, à reprendre
function complex_password($mdp)
{
    $success = false;
    if (preg_match('/^.*[A-Z]+.*$/',$mdp) == 1 and preg_match('/^.*[a-z]+.*$/',$mdp) == 1 and preg_match('/^.*[0-9]+.$/',$mdp) == 1 and strlen($mdp) >= 8)
    {
        $success = true;
    };
    echo $success;
};

$result = complex_password('Aa8aaaaaaa');

$result;

    ?>
    
</body>
</html>