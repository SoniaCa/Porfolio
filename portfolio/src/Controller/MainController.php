<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
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
    public function contact(): Response
    {
        return $this->render('main/contact.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
