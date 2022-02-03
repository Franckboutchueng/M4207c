<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;


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


    /**
     * @Route("/traitement", name="traitement")
     */ 
    public function traitement(Request $request, EntityManagerInterface $manager ): Response
    {
        $pseudo = $request -> request -> get("pseudo") ;
        $password = $request -> request -> get("pass") ;
        
        

        return $this->render('boutchueng/traitement.html.twig', [
            'controller_name' => 'BoutchuengController',
            'pseudo'=>$pseudo,
            'pass'=>$password,
        ]);
    }
}

