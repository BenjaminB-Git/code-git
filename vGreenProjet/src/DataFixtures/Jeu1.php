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
        $catCordes->setCatImage("cat_cordes.jpg");
        
        $manager->persist($catCordes);

        $catVents = new Categorie();
        $catVents->setCatNom("Instruments à vents");
        $catVents->setCatImage("cat_vents.png");
        
        $manager->persist($catVents);

        $catPercu = new Categorie();
        $catPercu->setCatNom("Percussions");
        $catPercu->setCatImage("cat_percussions.png");

        $manager->persist($catPercu);

        $souscategories = Array();

        $ssCatGuitares = new SousCategorie();
        $ssCatGuitares->setSouCatNom("Guitares et bouzoukis");
        $ssCatGuitares->setCategorie($catCordes);
        $ssCatGuitares->setSouCatImage("sou_cat_guitares.JPG");

        $manager->persist($ssCatGuitares);

        array_push($souscategories, $ssCatGuitares);

        $ssCatViolons = new SousCategorie();
        $ssCatViolons->setSouCatNom("Violons/Fiddles");
        $ssCatViolons->setCategorie($catCordes);
        $ssCatViolons->setSouCatImage("sou_cat_violons.jpg");

        $manager->persist($ssCatViolons);

        $ssCatHarpes = new SousCategorie();
        $ssCatHarpes->setSouCatNom("Harpes");
        $ssCatHarpes->setCategorie($catCordes);
        $ssCatHarpes->setSouCatImage("sou_cat_harpes.jpg");

        $manager->persist($ssCatHarpes);

        array_push($souscategories, $ssCatViolons);

        $ssCatCornemuses = new SousCategorie();
        $ssCatCornemuses->setSouCatNom("Cornemuses et bombardes");
        $ssCatCornemuses->setCategorie($catVents);
        $ssCatCornemuses->setSouCatImage("sou_cat_cornemuses.png");

        $manager->persist($ssCatCornemuses);

        array_push($souscategories, $ssCatCornemuses);

        $ssCatFlutes = new SousCategorie();
        $ssCatFlutes->setSouCatNom("Flûtes");
        $ssCatFlutes->setCategorie($catVents);
        $ssCatFlutes->setSouCatImage("sou_cat_flutes.jpg");

        $manager->persist($ssCatFlutes);

        array_push($souscategories, $ssCatFlutes);

        $ssCatBombos = new SousCategorie();
        $ssCatBombos->setSouCatNom("Bombos");
        $ssCatBombos->setCategorie($catPercu);
        $ssCatBombos->setSouCatImage("sou_cat_bombos.jpg");

        array_push($souscategories, $ssCatBombos);

        $manager->persist($ssCatBombos);
        
        $ssCatBodhrans = new SousCategorie();
        $ssCatBodhrans->setSouCatNom("Bodhran");
        $ssCatBodhrans->setCategorie($catPercu);
        $ssCatBodhrans->setSouCatImage("sou_cat_bodhrans.png");

        array_push($souscategories, $ssCatBodhrans);

        $manager->persist($ssCatBodhrans);

        $ssCatTambours = new SousCategorie();
        $ssCatTambours->setSouCatNom("Tambours");
        $ssCatTambours->setCategorie($catPercu);
        $ssCatTambours->setSouCatImage("sou_cat_tambours.jpg");

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

        $articles = Array();

        $article1 = new Article();
        $article1->setArtNom("Guitare Folk Ibanez")
                 ->setFournisseur($faker->randomElement($array = $fournisseurs))
                 ->setSousCategorie($ssCatGuitares)
                 ->setArtDescription("Guitare folk 6 cordes couleur naturelle bois clair.<br>Ibanez, référence incontournable des guitares est une marque de guitare fondée en 1929.")
                 ->setArtPrixHt(100)
                 ->setArtTauxTva(20)
                 ->setArtTva($article1->getArtPrixHt() * $article1->getArtTauxTva() / 100)
                 ->setArtPrixTtc($article1->getArtPrixHt() * (1 + $article1->getArtTauxTva() / 100))
                 ->setArtPrixFournisseurHt(70)
                 ->setArtPrixFournisseurTtc($article1->getArtPrixFournisseurHt() * (1 + $article1->getArtTauxTva() / 100))
                 ->setArtStock($faker->numberBetween($min = 0, $max = 99))
                 ->setArtPhoto("guitare_folk.JPG");

        array_push($articles, $article1);

        $manager->persist($article1);

        $article2 = new Article();
        $article2->setArtNom("Bouzouki irlandais Thomann")
                 ->setFournisseur($faker->randomElement($array = $fournisseurs))
                 ->setSousCategorie($ssCatGuitares)
                 ->setArtDescription("Bouzouki irlandais à quatre double cordes.<br>D'origine arabe, puis popularisé en Grèce au début du XXe siècle, le bouzouki fut utilisé dans la musique irlandaise à partir des années 1970")
                 ->setArtPrixHt(141.66)
                 ->setArtTauxTva(20)
                 ->setArtTva($article2->getArtPrixHt() * $article2->getArtTauxTva() / 100)
                 ->setArtPrixTtc($article2->getArtPrixHt() * (1 + $article2->getArtTauxTva() / 100))
                 ->setArtPrixFournisseurHt(98)
                 ->setArtPrixFournisseurTtc($article2->getArtPrixFournisseurHt() * (1 + $article2->getArtTauxTva() / 100))
                 ->setArtStock($faker->numberBetween($min = 0, $max = 99))
                 ->setArtPhoto("bouzouki.jpg");


        array_push($articles, $article2);

        $manager->persist($article2);

        $article3 = new Article();
        $article3->setArtNom("Chapman Stick")
                 ->setFournisseur($faker->randomElement($array = $fournisseurs))
                 ->setSousCategorie($ssCatGuitares)
                 ->setArtDescription("Chapman Stick 8 cordes.<br>Le Chapman Stick, du nom de son inventeur Emmett Chapman, est un instrument de musique des plus originaux. Avec sa diversité de sonorités, il permet de jouer en même temps des mélodies sur une basse intense")
                 ->setArtPrixHt(2000)
                 ->setArtTauxTva(20)
                 ->setArtTva($article3->getArtPrixHt() * $article3->getArtTauxTva() / 100)
                 ->setArtPrixTtc($article3->getArtPrixHt() * (1 + $article3->getArtTauxTva() / 100))
                 ->setArtPrixFournisseurHt(1250)
                 ->setArtPrixFournisseurTtc($article3->getArtPrixFournisseurHt() * (1 + $article3->getArtTauxTva() / 100))
                 ->setArtStock($faker->numberBetween($min = 0, $max = 10))
                 ->setArtPhoto("chapman_stick.jpg");

        array_push($articles, $article3);

        $manager->persist($article3);

        $article4 = new Article();
        $article4->setArtNom("Violon débutant")
                 ->setFournisseur($faker->randomElement($array = $fournisseurs))
                 ->setSousCategorie($ssCatViolons)
                 ->setArtDescription("Violon 4 cordes pour débutant")
                 ->setArtPrixHt(66)
                 ->setArtTauxTva(20)
                 ->setArtTva($article4->getArtPrixHt() * $article4->getArtTauxTva() / 100)
                 ->setArtPrixTtc($article4->getArtPrixHt() * (1 + $article4->getArtTauxTva() / 100))
                 ->setArtPrixFournisseurHt(44.8)
                 ->setArtPrixFournisseurTtc($article4->getArtPrixFournisseurHt() * (1 + $article4->getArtTauxTva() / 100))
                 ->setArtStock($faker->numberBetween($min = 0, $max = 10))
                 ->setArtPhoto("violon_debutant.jpg");

        array_push($articles, $article4);

        $manager->persist($article4);

        $article5 = new Article();
        $article5->setArtNom("Violon hardanger")
                 ->setFournisseur($faker->randomElement($array = $fournisseurs))
                 ->setSousCategorie($ssCatViolons)
                 ->setArtDescription("Violon 8 cordes de haute facture.<br>Les violons hardanger sont une variante norvégienne ayant la particularité d'avoir des sous-cordes résonnant avec les quatre cordes principales")
                 ->setArtPrixHt(1228)
                 ->setArtTauxTva(5)
                 ->setArtTva($article5->getArtPrixHt() * $article5->getArtTauxTva() / 100)
                 ->setArtPrixTtc($article5->getArtPrixHt() * (1 + $article5->getArtTauxTva() / 100))
                 ->setArtPrixFournisseurHt(998)
                 ->setArtPrixFournisseurTtc($article5->getArtPrixFournisseurHt() * (1 + $article5->getArtTauxTva() / 100))
                 ->setArtStock($faker->numberBetween($min = 0, $max = 10))
                 ->setArtPhoto("violon_hardanger.jpg");

        array_push($articles, $article5);

        $manager->persist($article5);

        $article6 = new Article();
        $article6->setArtNom("Harpe irlandaise 12 cordes")
                 ->setFournisseur($faker->randomElement($array = $fournisseurs))
                 ->setSousCategorie($ssCatHarpes)
                 ->setArtDescription("Harpe irlandaise 12 cordes, format lyre")
                 ->setArtPrixHt(148)
                 ->setArtTauxTva(20)
                 ->setArtTva($article6->getArtPrixHt() * $article6->getArtTauxTva() / 100)
                 ->setArtPrixTtc($article6->getArtPrixHt() * (1 + $article6->getArtTauxTva() / 100))
                 ->setArtPrixFournisseurHt(80.16)
                 ->setArtPrixFournisseurTtc($article6->getArtPrixFournisseurHt() * (1 + $article6->getArtTauxTva() / 100))
                 ->setArtStock($faker->numberBetween($min = 0, $max = 10))
                 ->setArtPhoto("harpe_irlandaise_lyre.jpg");

        array_push($articles, $article6);

        $manager->persist($article6);

        $article7 = new Article();
        $article7->setArtNom("Harpe irlandaise 24 cordes")
                 ->setFournisseur($faker->randomElement($array = $fournisseurs))
                 ->setSousCategorie($ssCatHarpes)
                 ->setArtDescription("Harpe irlandaise 24 cordes, Hauteur 90 cm")
                 ->setArtPrixHt(397.8)
                 ->setArtTauxTva(20)
                 ->setArtTva($article7->getArtPrixHt() * $article7->getArtTauxTva() / 100)
                 ->setArtPrixTtc($article7->getArtPrixHt() * (1 + $article7->getArtTauxTva() / 100))
                 ->setArtPrixFournisseurHt(293.8)
                 ->setArtPrixFournisseurTtc($article7->getArtPrixFournisseurHt() * (1 + $article7->getArtTauxTva() / 100))
                 ->setArtStock($faker->numberBetween($min = 0, $max = 10))
                 ->setArtPhoto("harpe_celtique.jpg");

        array_push($articles, $article7);

        $manager->persist($article7);

        $article8 = new Article();
        $article8->setArtNom("Binioù kozh")
                 ->setFournisseur($faker->randomElement($array = $fournisseurs))
                 ->setSousCategorie($ssCatCornemuses)
                 ->setArtDescription("Le binioù kozh (littéralement \"Vieux binioù\" est un instrument traditionnel breton, généralement accomagné d'une bombarde")
                 ->setArtPrixHt(520)
                 ->setArtTauxTva(20)
                 ->setArtTva($article8->getArtPrixHt() * $article8->getArtTauxTva() / 100)
                 ->setArtPrixTtc($article8->getArtPrixHt() * (1 + $article8->getArtTauxTva() / 100))
                 ->setArtPrixFournisseurHt(281)
                 ->setArtPrixFournisseurTtc($article8->getArtPrixFournisseurHt() * (1 + $article8->getArtTauxTva() / 100))
                 ->setArtStock($faker->numberBetween($min = 0, $max = 20))
                 ->setArtPhoto("biniou_kozh.png");

        array_push($articles, $article8);

        $manager->persist($article8);

        $article9 = new Article();
        $article9->setArtNom("Binioù braz")
                 ->setFournisseur($faker->randomElement($array = $fournisseurs))
                 ->setSousCategorie($ssCatCornemuses)
                 ->setArtDescription("Le binioù braz (littéralement \"Grand binioù\" est un instrument traditionnel breton dérivé de la cornemuse écossaise")
                 ->setArtPrixHt(825)
                 ->setArtTauxTva(20)
                 ->setArtTva($article9->getArtPrixHt() * $article9->getArtTauxTva() / 100)
                 ->setArtPrixTtc($article9->getArtPrixHt() * (1 + $article9->getArtTauxTva() / 100))
                 ->setArtPrixFournisseurHt(411)
                 ->setArtPrixFournisseurTtc($article9->getArtPrixFournisseurHt() * (1 + $article9->getArtTauxTva() / 100))
                 ->setArtStock($faker->numberBetween($min = 0, $max = 10))
                 ->setArtPhoto("biniou_braz.png");

        array_push($articles, $article9);

        $manager->persist($article9);

        $article10 = new Article();
        $article10->setArtNom("Cornemuse irlandaise")
                  ->setFournisseur($faker->randomElement($array = $fournisseurs))
                  ->setSousCategorie($ssCatCornemuses)
                  ->setArtDescription("La cornemuse irlandaise (<i>uillean pipe</i>) est la variante irlandaise de la cornemuse. Étonnant, non ?")
                  ->setArtPrixHt(410)
                  ->setArtTauxTva(20)
                  ->setArtTva($article10->getArtPrixHt() * $article10->getArtTauxTva() / 100)
                  ->setArtPrixTtc($article10->getArtPrixHt() * (1 + $article10->getArtTauxTva() / 100))
                  ->setArtPrixFournisseurHt(180)
                  ->setArtPrixFournisseurTtc($article10->getArtPrixFournisseurHt() * (1 + $article10->getArtTauxTva() / 100))
                  ->setArtStock($faker->numberBetween($min = 0, $max = 10))
                  ->setArtPhoto("uillean_pipe.jpg");

        array_push($articles, $article10);

        $manager->persist($article10);

        $article11 = new Article();
        $article11->setArtNom("Bombarde")
                  ->setFournisseur($faker->randomElement($array = $fournisseurs))
                  ->setSousCategorie($ssCatCornemuses)
                  ->setArtDescription("La bombarde est un instrument traditionnel, généralement associé à la Bretagne. En effet, elle accompagne généralement un biniou kozh pour former un \"couple de sonneurs\".")
                  ->setArtPrixHt(180)
                  ->setArtTauxTva(20)
                  ->setArtTva($article11->getArtPrixHt() * $article11->getArtTauxTva() / 100)
                  ->setArtPrixTtc($article11->getArtPrixHt() * (1 + $article11->getArtTauxTva() / 100))
                  ->setArtPrixFournisseurHt(100)
                  ->setArtPrixFournisseurTtc($article11->getArtPrixFournisseurHt() * (1 + $article11->getArtTauxTva() / 100))
                  ->setArtStock($faker->numberBetween($min = 0, $max = 10))
                  ->setArtPhoto("bombarde.jpg");


        array_push($articles, $article11);

        $manager->persist($article11);

        $article12 = new Article();
        $article12->setArtNom("Tin whistle")
                  ->setFournisseur($faker->randomElement($array = $fournisseurs))
                  ->setSousCategorie($ssCatFlutes)
                  ->setArtDescription("Le tin whistle (ou flûte irlandaise, ou feadóg) est une flûte, généralement en métal, très présente dans la musique celtique")
                  ->setArtPrixHt(42.8)
                  ->setArtTauxTva(20)
                  ->setArtTva($article12->getArtPrixHt() * $article12->getArtTauxTva() / 100)
                  ->setArtPrixTtc($article12->getArtPrixHt() * (1 + $article12->getArtTauxTva() / 100))
                  ->setArtPrixFournisseurHt(16)
                  ->setArtPrixFournisseurTtc($article12->getArtPrixFournisseurHt() * (1 + $article12->getArtTauxTva() / 100))
                  ->setArtStock($faker->numberBetween($min = 0, $max = 10))
                  ->setArtPhoto("tin_whistle.jpg");

        array_push($articles, $article12);

        $manager->persist($article12);

        $article13 = new Article();
        $article13->setArtNom("Irish flute")
                  ->setFournisseur($faker->randomElement($array = $fournisseurs))
                  ->setSousCategorie($ssCatFlutes)
                  ->setArtDescription("L'Irish flute (ou timber flute) est une flûte traversière en bois typique de la musique irlandaise")
                  ->setArtPrixHt(51)
                  ->setArtTauxTva(20)
                  ->setArtTva($article13->getArtPrixHt() * $article13->getArtTauxTva() / 100)
                  ->setArtPrixTtc($article13->getArtPrixHt() * (1 + $article13->getArtTauxTva() / 100))
                  ->setArtPrixFournisseurHt(21)
                  ->setArtPrixFournisseurTtc($article13->getArtPrixFournisseurHt() * (1 + $article13->getArtTauxTva() / 100))
                  ->setArtStock($faker->numberBetween($min = 0, $max = 10))
                  ->setArtPhoto("irish_flute.jpg");

        array_push($articles, $article13);

        $manager->persist($article13);

        $article14 = new Article();
        $article14->setArtNom("Bombo")
                  ->setFournisseur($faker->randomElement($array = $fournisseurs))
                  ->setSousCategorie($ssCatBombos)
                  ->setArtDescription("Le bombo est un grand tambour de Galice, terre celtique au nord-ouest de l'Espagne.")
                  ->setArtPrixHt(344)
                  ->setArtTauxTva(20)
                  ->setArtTva($article14->getArtPrixHt() * $article14->getArtTauxTva() / 100)
                  ->setArtPrixTtc($article14->getArtPrixHt() * (1 + $article14->getArtTauxTva() / 100))
                  ->setArtPrixFournisseurHt(180)
                  ->setArtPrixFournisseurTtc($article14->getArtPrixFournisseurHt() * (1 + $article14->getArtTauxTva() / 100))
                  ->setArtStock($faker->numberBetween($min = 0, $max = 10))
                  ->setArtPhoto("bombo.jpg");

        array_push($articles, $article14);

        $manager->persist($article14);

        $article15 = new Article();
        $article15->setArtNom("Bodhrán avec stick")
                  ->setFournisseur($faker->randomElement($array = $fournisseurs))
                  ->setSousCategorie($ssCatBodhrans)
                  ->setArtDescription("Le bodhrán est un instrument à percussion de la musique irlandaise. Il est joué en frappant dessus avec un bâton, nommé <i>stick</i> ou <i>tipper</i>.")
                  ->setArtPrixHt(98)
                  ->setArtTauxTva(20)
                  ->setArtTva($article15->getArtPrixHt() * $article15->getArtTauxTva() / 100)
                  ->setArtPrixTtc($article15->getArtPrixHt() * (1 + $article15->getArtTauxTva() / 100))
                  ->setArtPrixFournisseurHt(51)
                  ->setArtPrixFournisseurTtc($article15->getArtPrixFournisseurHt() * (1 + $article15->getArtTauxTva() / 100))
                  ->setArtStock($faker->numberBetween($min = 0, $max = 10))
                  ->setArtPhoto("bodhran.png");

        array_push($articles, $article15);

        $manager->persist($article15);

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
                             ->setUtiMail(strtolower($utilisateurs[$k]->getUtiPrenom()) . '.' . strtolower($utilisateurs[$k]->getUtiNom()) . '@' . $faker->freeEmailDomain)
                             ->setUtiTelephoneMobile($faker->mobileNumber)
                             ->setType($faker->randomElement($array = $types));
            
            $manager->persist($utilisateurs[$k]);


        }



        $manager->flush();
    }
}
