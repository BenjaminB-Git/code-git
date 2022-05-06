<?php 

    require "Perso_classes.php";
    $jeff = new Personnage();
    $jeff->nom = "Lebowski";
    $jeff->prenom = "Jeff";
    echo "1. " . $jeff->nom . "<br>";   //Lebowski
    echo ("2. " . $jeff->getAge() . "<br>"); // 25
    //echo $jeff->naissance;


    $jeff->setAge(23);
    echo "3. " . $jeff->getAge() . "<br>"; // 23

  //  var_dump($jeff);

    $bob = new Artiste();

    echo "4. " . $bob->getAge() . "<br>"; //25

    echo "5. " . $bob->getNaissance() . "<br>"; // 2020-1-1
    echo "6. " . $bob->getAAge() . "<br>"; // --vide--
    echo "7. " . $bob->getAge() . "<br>"; // 25
    echo "8. " . $jeff . "<br>"; // Lebowski Jeff