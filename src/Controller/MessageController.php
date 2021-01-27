<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use GestionContact;
use \App\Entity\Message;

/**
 * @Route("/message", name="messagee_")
 */
class MessageController extends AbstractController
{

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, GestionContact $gestionContact): Response
    {
        $message = new Message();

        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $message = $form->getData();

            $gestionContact->envoiMailContact($message);

            return $this->redirectToRoute("home");
        }

        return $this->render('message/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
