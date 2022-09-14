<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategorieRepository;
use App\Repository\SousCategorieRepository;
use App\Entity\Categorie;
use App\Entity\SousCategorie;
use App\Entity\Article;





class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    #[Route('/quisommesnous', name: 'qui_sommes_nous')]
    public function quisommesnous(): Response
    {
        return $this->render('test/quisommesnous.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    #[Route('/boutique', name: 'categories')]
    public function categories(CategorieRepository $repo_cat): Response
    {
        $categories = $repo_cat->findAll();

        return $this->render('test/categories.html.twig',[
            'controller_name' => 'TestController',
            'categories' => $categories
        ]);
    }

    #[Route('/boutique/{id}', name: 'sous_categories')]
    public function sous_categories(Categorie $categorie){

        return $this->render('test/souscategories.html.twig',[
            'controller_name' => 'TestController',
            'categorie' => $categorie
        ]);

    }

    #[Route('/articles/{id}', name: 'articles')]
    public function articles(SousCategorie $sousCat){
        return $this->render('test/articles.html.twig',[
            'controller_name' => 'TestController',
            'souscategorie' => $sousCat
        ]);


    }

    #[Route('/article/{id}', name: 'article')]
    public function article(Article $article){
        return $this->render('test/article.html.twig',[
            'controller_name' => 'TestController',
            'article' => $article
        ]);


    }



}
