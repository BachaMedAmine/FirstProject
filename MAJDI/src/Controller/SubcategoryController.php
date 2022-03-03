<?php

namespace App\Controller;

use App\Repository\SubCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubcategoryController extends AbstractController
{
    /**
     * @Route("/subcategory/{id}", name="subcategory")
     */
    public function index($id, SubCategoryRepository $subCategoryRepository): Response
    {
        $subcategories = $subCategoryRepository->findBy(["Category" => $id]);




        return $this->render('subcategory/index.html.twig', [
            'subcategories' => $subcategories,
        ]);
    }
}
