<?php
    require 'controller/controleur.php';

    // header('Access-Control-Allow-Origin: *');
    
    
    if(isset($_GET['action'])){
        if($_GET['action'] == 'client'){
            $idClient = intval($_GET['id']);
            $response=client($idClient);
        }
        } else {
            $response = accueil();

        }


    // $response = accueil();
    // var_dump($response);
    echo $response;