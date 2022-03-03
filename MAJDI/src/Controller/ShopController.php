<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\SubCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{
    /**
     * @Route("/shop", name="shop")
     */
    public function index(CategoryRepository $categoryRepository): Response
    {

        $categories = $categoryRepository->findAll();


        return $this->render('front/Shop.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/category/{id}", name="subCategories")
     */
    public function ListofSubCategories(String $id, SubCategoryRepository $subCategoryRepository): Response
    {
        $subcategories = $subCategoryRepository->findBy(["Category" => $id]);


        return $this->render('front/SubCategories.html.twig', []);
    }
}
