<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;
use App\Entity\SousCategorie;
use App\Entity\Fournisseur;
use App\Entity\Article;
use App\Entity\Type;
use App\Entity\Utilisateur;
use Faker;

class Jeu1 extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $categorie1 = new Categorie();
        $categorie1->setCatNom("Instruments à cordes");
        
        $manager->persist($categorie1);

        $categorie2 = new Categorie();
        $categorie2->setCatNom("Instruments à vents");
        
        $manager->persist($categorie2);

        $categorie3 = new Categorie();
        $categorie3->setCatNom("Percussions");

        $manager->persist($categorie3);

        $souscategories = Array();

        $souscategorie1 = new SousCategorie();
        $souscategorie1->setSouCatNom("Guitares");
        $souscategorie1->setCategorie($categorie1);

        $manager->persist($souscategorie1);

        array_push($souscategories, $souscategorie1);

        $souscategorie2 = new SousCategorie();
        $souscategorie2->setSouCatNom("Violons");
        $souscategorie2->setCategorie($categorie1);

        $manager->persist($souscategorie2);

        array_push($souscategories, $souscategorie2);


        $souscategorie3 = new SousCategorie();
        $souscategorie3->setSouCatNom("Saxophones");
        $souscategorie3->setCategorie($categorie2);

        $manager->persist($souscategorie3);

        array_push($souscategories, $souscategorie3);


        $souscategorie4 = new SousCategorie();
        $souscategorie4->setSouCatNom("Flûtes");
        $souscategorie4->setCategorie($categorie2);

        $manager->persist($souscategorie4);

        array_push($souscategories, $souscategorie4);

        $souscategorie5 = new SousCategorie();
        $souscategorie5->setSouCatNom("Batteries");
        $souscategorie5->setCategorie($categorie3);

        array_push($souscategories, $souscategorie5);

        $manager->persist($souscategorie5);
        
        $souscategorie6 = new SousCategorie();
        $souscategorie6->setSouCatNom("Bodhran");
        $souscategorie6->setCategorie($categorie3);

        array_push($souscategories, $souscategorie6);

        $manager->persist($souscategorie6);

        $fournisseurs = Array();

        for($i=0 ; $i<5; $i++) {
            $fournisseurs[$i] = new Fournisseur();
            $fournisseurs[$i]->setFouNom($faker->name())
                             ->setFouAdresse($faker->streetAddress())
                             ->setFouCodePostal("80000")
                             ->setFouCommune("Amiens");
            
            $manager->persist($fournisseurs[$i]);

        };

        $articles = Array();

        for($j=0; $j<20; $j++) {
            $articles[$j] = new Article();
            $articles[$j]->setArtNom($faker->word())
                         ->setArtPrixHt($faker->randomFloat($nbMaxDecimals = 2, $min = 0.5, $max = 999.99))
                         ->setArtTauxTva($faker->randomElement($array = array(20, 5.5)))
                         ->setArtTva(($articles[$j]->getArtPrixHt())*($articles[$j]->getArtTauxTva())/100)
                         ->setArtPrixTtc($articles[$j]->getArtPrixHt() + $articles[$j]->getArtTva())
                         ->setArtPrixFournisseurHt($faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = $articles[$j]->getArtPrixHt() / 2))
                         ->setArtPrixFournisseurTtc(($articles[$j]->getArtPrixFournisseurHt()) * (1 + $articles[$j]->getArtTauxTva() / 100))
                         ->setArtStock($faker->randomDigit())
                         ->setSousCategorie($faker->randomElement($array = $souscategories))
                         ->setFournisseur($fournisseurs[$j%5]);
            
            $manager->persist($articles[$j]);
            
            
        };


        $types = Array();

        $type1 = new Type();
        $type1->setTypNom("Particulier");

        $manager->persist($type1);

        array_push($types, $type1);

        $type2 = new Type();
        $type2->setTypNom("Professionnel");

        $manager->persist($type2);

        array_push($types, $type2);

        $utilisateurs = Array();

        for($k = 0; $k<12; $k++) {
            $utilisateurs[$k] = new Utilisateur();
            $utilisateurs[$k]->setUtiNom($faker->lastName())
                             ->setUtiPrenom($faker->firstName())
                             ->setUtiDateNaissance($faker->dateTime($max = '2001-01-01'))
                             ->setUtiAdresse($faker->streetAddress())
                             ->setUtiCodePostal('80000')
                             ->setUtiCommune('Amiens')
                             ->setUtiMail($utilisateurs[$k]->getUtiPrenom() . '.' . $utilisateurs[$k]->getUtiNom() . '@' . $faker->freeEmailDomain)
                             ->setUtiTelephoneMobile($faker->mobileNumber)
                             ->setType($faker->randomElement($array = $types));
            
            $manager->persist($utilisateurs[$k]);


        }

        $commandes = Array();


        $manager->flush();
    }
}
