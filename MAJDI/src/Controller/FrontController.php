<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("", name="front")
     */
    public function index(): Response
    {
        $repository = $this->getdoctrine()->getrepository(Product::class);
        $produit = $repository->findAll();

        return $this->render(
            'front/index.html.twig',
            array(
                'produit' => $produit
            )
        );
    }
    /**
     * @Route("/produit/{id}", name="view")
     */
    public function view($id)
    {

        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        return $this->render('front/detailsProd.html.twig', array(
            'product' => $product
        ));
    }
    /**
     * @Route("/shop", name="shop")
     */
    public function Shop()
    {
        return $this->render('front/shop.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }
    /**
     * @Route("/blog", name="blog")
     */
    public function blog()
    {
        return $this->render('front/blog.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }
    /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('front/about.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }
    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('front/contact.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }
}
