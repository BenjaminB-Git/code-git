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

        $catCordes = new Categorie();
        $catCordes->setCatNom("Instruments à cordes");
        
        $manager->persist($catCordes);

        $catVents = new Categorie();
        $catVents->setCatNom("Instruments à vents");
        
        $manager->persist($catVents);

        $catPercu = new Categorie();
        $catPercu->setCatNom("Percussions");

        $manager->persist($catPercu);

        $souscategories = Array();

        $ssCatGuitares = new SousCategorie();
        $ssCatGuitares->setSouCatNom("Guitares");
        $ssCatGuitares->setCategorie($catCordes);

        $manager->persist($ssCatGuitares);

        array_push($souscategories, $ssCatGuitares);

        $ssCatViolons = new SousCategorie();
        $ssCatViolons->setSouCatNom("Violons/Fiddles");
        $ssCatViolons->setCategorie($catCordes);

        $manager->persist($ssCatViolons);

        $ssCatHarpes = new SousCategorie();
        $ssCatHarpes->setSouCatNom("Harpes");
        $ssCatHarpes->setCategorie($catCordes);

        $manager->persist($ssCatHarpes);

        array_push($souscategories, $ssCatViolons);

        $ssCatViolons = new SousCategorie();
        $ssCatViolons->setSouCatNom("Violons");
        $ssCatViolons->setCategorie($catCordes);

        $manager->persist($ssCatViolons);

        array_push($souscategories, $ssCatViolons);

        $ssCatCornemuses = new SousCategorie();
        $ssCatCornemuses->setSouCatNom("Cornemuses");
        $ssCatCornemuses->setCategorie($catVents);

        $manager->persist($ssCatCornemuses);

        array_push($souscategories, $ssCatCornemuses);

        $ssCatFlutes = new SousCategorie();
        $ssCatFlutes->setSouCatNom("Flûtes");
        $ssCatFlutes->setCategorie($catVents);

        $manager->persist($ssCatFlutes);

        array_push($souscategories, $ssCatFlutes);

        $ssCatBombos = new SousCategorie();
        $ssCatBombos->setSouCatNom("Bombos");
        $ssCatBombos->setCategorie($catPercu);

        array_push($souscategories, $ssCatBombos);

        $manager->persist($ssCatBombos);
        
        $ssCatBodhrans = new SousCategorie();
        $ssCatBodhrans->setSouCatNom("Bodhran");
        $ssCatBodhrans->setCategorie($catPercu);

        array_push($souscategories, $ssCatBodhrans);

        $manager->persist($ssCatBodhrans);

        $ssCatTambours = new SousCategorie();
        $ssCatTambours->setSouCatNom("Tambours");
        $ssCatTambours->setCategorie($catPercu);

        array_push($souscategories, $ssCatTambours);

        $manager->persist($ssCatTambours);


        $fournisseurs = Array();

        for($i=0 ; $i<5; $i++) {
            $fournisseurs[$i] = new Fournisseur();
            $fournisseurs[$i]->setFouNom($faker->name())
                             ->setFouAdresse($faker->streetAddress())
                             ->setFouCodePostal("80000")
                             ->setFouCommune("Amiens");
            
            $manager->persist($fournisseurs[$i]);

        };

        /* Créer la liste d'articles

        Vent : cornemuses, flûtes...
        Cordes : harpes, guitares folk, violons, vielles à roue
        Percussion : bodhran, bombo, tambours
        
        */

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



        $manager->flush();
    }
}
