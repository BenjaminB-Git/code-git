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


//Y'a rien qui va ici, à reprendre
function complex_password($mdp)
{
    $success = 'true';
    if (preg_match('/^(.*[A-Z]+.*)$/gm',$mdp))
    {
        $success = 'false';
    };
    echo $success;
}

complex_password('AaaaAaaaaa');

    ?>
    
</body>
</html>