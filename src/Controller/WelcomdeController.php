<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomdeController extends Controller
{
    /**
     * @Route("/welcomde", name="welcomde")
     */
    public function index()
    {
        return $this->render('welcomde/index.html.twig', [
            'controller_name' => 'WelcomdeController',
        ]);
    }
}
