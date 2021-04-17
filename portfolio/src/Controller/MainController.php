<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('main/home.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/competences", name="compt")
     */
    public function compt(): Response
    {
        return $this->render('main/compt.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/formation", name="form")
     */
    public function form(): Response
    {
        return $this->render('main/form.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/experience", name="exp")
     */
    public function exp(): Response
    {
        return $this->render('main/exp.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request): Response
    {
       
       $contact = new Contact();
       $form = $this->createForm(ContactType::class, $contact);
       $form->handleRequest($request);
       
       if ($form->isSubmitted() && $form->isValid()) {
           $em = $this->getDoctrine()->getManager();
           $em->persist($contact);
           $em->flush();

           $this->addFlash('success', 'Votre message a bien été envoyé !');
           return $this->redirectToRoute('contact');
       }

        return $this->render('main/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
