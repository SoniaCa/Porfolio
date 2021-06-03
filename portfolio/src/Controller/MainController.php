<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(Request $request): Response
    {

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            // $email=$form['email']->getData();
            // $name=$form['name']->getData();
            // $message=$form['message']->getData();

            // $email = (new Email())
            //     ->from($email) 
            //     ->to('carmon.sonia@gmail.com')
            //     ->priority(Email::PRIORITY_HIGH) 
            //     ->subject('Porfolio message : ' . $name)
            //     ->text($message) 
            // ;

            // $mailer->send($email);
 
            $this->addFlash('success', 'Votre message a bien été envoyé !');
            return $this->redirect('/#home');
        }
 
        return $this->render('main/home.html.twig', [
            'form' => $form->createView(),
         ]);
     
    }

    /**
    * @Route("/cv", name="cv")
    */
    public function cv()
    {
        // send the file contents and force the browser to download it
        return $this->file('assets/CV.pdf', 'CVSoniaCarmon.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
        //Chemin à partir du dossier public 
            
    }

     /**
    * @Route("/prog", name="prog")
    */
    public function prog()
    {
        // send the file contents and force the browser to download it
        return $this->file('assets/prog.pdf', 'ProgrammeOclock.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
        //Chemin à partir du dossier public 
            
    }


}
