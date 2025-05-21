<?php

namespace App\Entity;

class Client implements \JsonSerializable
{
    private $id;
    private $nom;
    private $adresse;
    private $contactNom;
    private $contactMail;
    private $contactTel;
    private $ca;
    private $devis;
    private $factures;

    public function __construct($client){
        $this->id = $client["id"];
        $this->nom = $client["name"];
        $this->adresse = $client["address_street"]." ".$client["address_zip_code"]." ".$client["address_city"];
        $this->contactNom = $client["employees"][0]["firstname"]." ".$client["employees"][0]["lastname"];
        $this->contactMail = $client["employees"][0]["email"];
        $this->contactTel = $client["employees"][0]["phone_number"];
    }

    public function getId() {
        return $this->id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getAdresse(){
        return $this->adresse;
    }

    public function getContactNom(){
        return $this->contactNom;
    }

    public function getContactMail(){
        return $this->contactMail;
    }

    public function getContactTel(){
        return $this->contactTel;
    }

    public function getDevis(){
        return $this->devis;
    }

    public function getCa(){
        return $this->ca;
    }

    public function getFactures(){
        return $this->factures;
    }

    public function setDevis($devis){
        $this->devis = $devis;
        return $this;
    }

    public function setFactures($factures){
        $this->factures = $factures;
        return $this;
    }

    public function setCa($ca){
        $this->ca = $ca;
        return $this;
    }

    public function serialize(){
        return serialize($this->data);
    }

    public function unserialize($data){
        $this->data = unserialize($data);
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(){
        return [
            "id" => $this->id,
            "nom" => $this->nom,
            "adresse" => $this->adresse,
            "contactNom" => $this->contactNom,
            "contactMail" => $this->contactMail,
            "contactTel" => $this->contactTel,
            "ca" => $this->ca,
            "devis" => $this->devis,
            "factures" => $this->factures
        ];
    }

}