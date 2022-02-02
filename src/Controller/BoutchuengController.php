<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
class BoutchuengController extends AbstractController
{
    /**
     * @Route("/boutchueng", name="boutchueng")
     */
    public function index(): Response
    {
        return $this->render('boutchueng/index.html.twig', [
            'controller_name' => 'BoutchuengController',
        ]);
    }
}

