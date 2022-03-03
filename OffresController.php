<?php

namespace App\Controller;

use App\Entity\Offres;
use App\Entity\OffresType;
use App\Form\OffreType;
use App\Repository\OffresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class OffresController extends AbstractController
{
    /**
     * @Route("/offres", name="offres")
     */
    public function index(): Response
    {
        return $this->render('offres/index.html.twig', [
            'controller_name' => 'OffresController',
        ]);
    }
    /**
     * @Route("/ajout_offres",name="ajout_offres")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response

     * @return Response
     */
    public function ajoutoffres(Request $request )
    {
        $offres= new Offres();
        $form= $this->createForm(OffreType::class,$offres);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['image']->getData();
            if ($uploadedFile)
            {
                $destination = $this->getParameter('kernel.project_dir').'/public/uploads';
                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename.'-'.uniqid().'.'.$uploadedFile->guessExtension();
                $uploadedFile->move(
                    $destination,
                    $newFilename
                );
                $offres->setimage($newFilename);
            }

            $em=$this->getDoctrine()->getManager();

            $em->persist($offres);
            $em-> flush();
            return $this->redirectToRoute('liste_offres');

        }
        return $this->render('offres/add.html.twig', ['form' => $form->createView()]);
    }


    /**
     * @Route ("offres/Update{id}",name="Updateoffres")
     */
    function Update_Boutique(offresRepository $repository, $id,Request $request)
    {

        $offres = $repository->find($id);
        $form= $this->createForm(OffreType::class,$offres);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['image']->getData();
            if ($uploadedFile)
            {
                $destination = $this->getParameter('kernel.project_dir').'/public/uploads';
                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename.'-'.uniqid().'.'.$uploadedFile->guessExtension();
                $uploadedFile->move(
                    $destination,
                    $newFilename
                );
                $offres->setimage($newFilename);
            }
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('liste_offres');


        }
        return $this->render('offres/modif.html.twig', [
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("Deleteoffres/{id}/",name="delete_offres")
     */

    public function Deleteoffres($id ,offresRepository $repository)
    {
        $em = $this->getDoctrine()->getManager();
        $offres = $repository->find($id);
        $em->remove($offres);
        $em->flush();
        return $this->redirectToRoute('offres_boutique');
    }
    /**
     * @Route("/liste_offres", name="liste_offres")
     */
    public function liste_offres()
    {
        $repository=$this->getdoctrine()->getrepository(offres::class);
        $offres =$repository->findAll();

        return $this->render('offres/liste.html.twig',array(

            'offres' =>$offres));

    }
    /**
     * @Route("upload_test", name="upload_test")
     */
    public function temporaryUploadAction(Request $request)
    {
        /** @var UploadedFile $uploadedFile */
        $uploadedFile = $request->files->get('image');
        $destination = $this->getParameter('kernel.project_dir').'/public/uploads';
        $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $newFilename = $originalFilename.'-'.uniqid().'.'.$uploadedFile->guessExtension();
        dd($uploadedFile->move(
            $destination,
            $newFilename
        ));
    }


}
