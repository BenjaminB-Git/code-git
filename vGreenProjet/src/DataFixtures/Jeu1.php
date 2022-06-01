<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;
use App\Entity\SousCategorie;

class Jeu1 extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categorie1 = new Categorie();
        $categorie1->setCatNom("Instruments à cordes");
        
        $manager->persist($categorie1);

        $categorie2 = new Categorie();
        $categorie2->setCatNom("Instruments à vents");
        
        $manager->persist($categorie2);

        $categorie3 = new Categorie();
        $categorie3->setCatNom("Percussions");

        $manager->persist($categorie3);


        $souscategorie1 = new SousCategorie();
        $souscategorie1->setSouCatNom("Guitares");
        $souscategorie1->setCategorie($categorie1);

        $manager->persist($souscategorie1);

        $souscategorie2 = new SousCategorie();
        $souscategorie2->setSouCatNom("Violons");
        $souscategorie2->setCategorie($categorie1);

        $manager->persist($souscategorie2);

        $souscategorie3 = new SousCategorie();
        $souscategorie3->setSouCatNom("Saxophones");
        $souscategorie3->setCategorie($categorie2);

        $manager->persist($souscategorie3);

        $souscategorie4 = new SousCategorie();
        $souscategorie4->setSouCatNom("Flûtes");
        $souscategorie4->setCategorie($categorie2);

        $manager->persist($souscategorie4);

        $souscategorie5 = new SousCategorie();
        $souscategorie5->setSouCatNom("Batteries");
        $souscategorie5->setCategorie($categorie3);

        $manager->persist($souscategorie5);
        
        $souscategorie6 = new SousCategorie();
        $souscategorie6->setSouCatNom("Bodhran");
        $souscategorie6->setCategorie($categorie3);

        $manager->persist($souscategorie6);




        $manager->flush();
    }
}
