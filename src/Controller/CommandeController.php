<?php

namespace App\Controller;

use App\Form\CommandeFormType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends AbstractController
{
    /**
     * @Route("/commande", name="commande")
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(CommandeFormType::class);
        $contact = $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $message = (new TemplatedEmail())
                ->from($contact->get('email')->getData())
                ->to('promenadesucree@gmail.com')
                ->subject('Vous avez reçu un email du site Promenade Sucrée')
                ->context([
                    'nom' => $contact->get('nom')->getData(),
                    'telephone' => $contact->get('telephone')->getData(),
                    'livraison' => $contact->get('livraison')->getData(),
                    'adresse' => $contact->get('adresse')->getData(),
                    'message' => $contact->get('message')->getData(),
                ]);
            $mailer->send($message);
            $this->addFlash('success', 'Vore message a été envoyé');
            return $this->redirectToRoute('commande');
        }
        return $this->render('commande/index.html.twig', [
            'commandeForm' => $form->createView()
        ]);
    }
}
