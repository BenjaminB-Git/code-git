<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use App\Entity\Article;


#[Route('/cart', name:'cart_')]
class CartController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(SessionInterface $session, ArticleRepository $articleRepository): Response
    {
        $cart = $session->get('panier', []);

        $datacart = [];
        $total = 0;

        foreach($cart as $id => $quantite)
        {
            $article = $articleRepository->find($id);
            $datacart[] = [
                'article' => $article,
                'quantite' => $quantite
            ];
            $total += $article->getArtPrixTtc() * $quantite;
        }


        return $this->render('cart/index.html.twig', compact('datacart', 'total'));
    }

    #[Route('/add/{id}', name: 'add')]
    public function add($id, SessionInterface $session)
    {
        $cart = $session->get('panier', []);

        if(!empty($cart[$id]))
        {
            $cart[$id]++;
        }
        else
        {
            $cart[$id] = 1;
        }

        $session->set('panier', $cart);

        return $this->redirectToRoute('cart_index');
    }

    #[Route('/remove/{id}', name: 'remove')]
    public function remove(Article $article, SessionInterface $session)
    {
        $cart = $session->get('panier', []);
        $id = $article->getId();

        if(!empty($cart[$id]))
        {
            if($cart[$id] > 1)
            {
                $cart[$id]--;
            }
            else
            {
                unset($cart[$id]);
            }

        }

        $session->set('panier', $cart);

        return $this->redirectToRoute('cart_index');
    }
    #[Route('/delete/{id}', name: 'delete')]
    public function delete(Article $article, SessionInterface $session)
    {
        $cart = $session->get('panier', []);
        $id = $article->getId();

        if(!empty($cart[$id]))
        {
            unset($cart[$id]);
        }

        $session->set('panier', $cart);

        return $this->redirectToRoute('cart_index');
    }


}
