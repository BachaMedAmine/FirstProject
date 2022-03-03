<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/product/{id}", name="produit")
     */
    public function index($id, ProductRepository $productRepository): Response
    {

        $product = $productRepository->findBy(["SubCategory" => $id]);



        return $this->render('produit/index.html.twig', [
            'products' => $product,
        ]);
    }
}
