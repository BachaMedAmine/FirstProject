<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $contact = $form->getData();
          $message = (new \Swift_Message('Nouveau Contact'))
              ->setFrom($contact['email'])
              ->setTo('votre@adresse.fr')
              ->setBody(
                  $this->renderView(
                      'contact/index.html.twig', compact('contact')
                  ),
                  'text/html'
              );
          $mailer->send($message);
          $this->addFlash('message', 'Le message a bien été envoyé');
          return $this->redirectToRoute('front');
        }
        return $this->render('front/contact.html.twig',
            [
            'form' => $form->createView()
        ]);
    }
}
