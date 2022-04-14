<?php

require 'model/model.php';

// Affiche la liste de tous les billets du blog
function accueil() {
    $billets = getBillets();
    require 'vue/vueAccueil.php';
}

// Affiche les détails sur un billet
function billet($idBillet) {
    $billet = getBillet($idBillet);
    $commentaires = getComments($idBillet);
    require 'vue/vueBillet.php';
}

// Affiche une erreur
function erreur($msgErreur) {
    require 'vue/vueErreur.php';
}

?>