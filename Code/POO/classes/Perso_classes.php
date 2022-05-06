<?php

class Personnage
{
    public $nom;
    public $prenom;
    private $_age = 25;
    public $sexe;
    protected $naissance = "2020-1-1";

public function setNom(){
//    return $this->_nom;
}

public function setPrenom(){
//    return $this->_prenom;
}

public function getAge(){
    return $this->_age;
}

public function setAge($age){
    $this->_age = $age;

}
public function __toString() {
    return $this->nom . " " . $this->prenom;
}

}


class Artiste extends Personnage {
    public $metier;
    public function getNaissance() {
        return $this->naissance;
    }

    public function getAAge(){
        return $this->_age;
    }




}




