<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends AbstractController
{
    // /**
    //  * @Route("/commande", name="commande")
    //  */
    // public function index(): Response
    // {
    //     return $this->render('commande/index.html.twig', [
    //         'controller_name' => 'CommandeController',
    //     ]);
    // }
    // /**
    //  * @Route("/ajout_produit",name="ajout_produit")
    //  * @param Request $request
    //  * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response

    //  * @return Response
    //  */
    // public function ajout_produit(Request $request): Response
    // {
    //     $produit = new Product();
    //     $form = $this->createForm(Produ::class, $produit);
    //     $form->add('save', SubmitType::class);

    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         /** @var UploadedFile $uploadedFile */
    //         $uploadedFile = $form['image']->getData();
    //         if ($uploadedFile) {
    //             $destination = $this->getParameter('kernel.project_dir') . '/public/uploads';
    //             $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
    //             $newFilename = $originalFilename . '-' . uniqid() . '.' . $uploadedFile->guessExtension();
    //             $uploadedFile->move(
    //                 $destination,
    //                 $newFilename
    //             );
    //             $produit->setImage($newFilename);
    //         }
    //         $em = $this->getDoctrine()->getManager();

    //         $em->persist($produit);
    //         $em->flush();
    //         return $this->redirectToRoute('front');
    //     }
    //     return $this->render('test/ajout.html.twig', ['form' => $form->createView()]);
    // }
}
