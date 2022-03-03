<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\SubCategoryRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/admin/add/product", name="AjoutProduit")
     */
    public function AddProduct(SubCategoryRepository $subCategoryRepository, ManagerRegistry $managerRegistry, Request $request): Response
    {
        $subcategories = $subCategoryRepository->findAll();


        $product = new Product();

        if ($request->isMethod("POST")) {
            $product->setName($request->get("name"));
            $product->setDescription($request->get("description"));
            $product->setImage($request->get("image"));
            $subcat = $subCategoryRepository->findOneBy(["id" => $request->get("subcat")]);
            $product->setSubCategory($subcat);

            $managerRegistry->getManager()->persist($product);

            $managerRegistry->getManager()->flush();
        }



        return $this->render('admin/addProduct.html.twig', [
            "subcategories" => $subcategories,
        ]);
    }
}
