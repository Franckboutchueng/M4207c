<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Utilisateur;



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
        $pseudoV = $manager -> getRepository(Utilisateur::class) -> findOneBy([ "Login" => $pseudo]);
        if ($pseudoV ==NULL)
            $msg ='cette est utilisateur inconnus';
        elseif ($password == $pseudoV -> getPassword()){
            $msg= 'Les informations sont correctes';
        }
        
        else{
            $msg = 'ces informations ne correspondent pas';
        }
        
         return $this->render('boutchueng/traitement.html.twig', [
            'controller_name' => 'BoutchuengController',
            'pseudo'=>$pseudo,
            'pass'=>$password,
            'message'=>$msg,
            'loginV' =>$pseudoV,
        ]);
    }

      /**
     * @Route("/New_users1", name="New_users1")
     */ 
    public function New_users1(Request $request,  EntityManagerInterface $manager): Response
    {


        return $this->render('boutchueng/New_users1.html.twig', [
            'controller_name' => 'BoutchuengController',
           
        ]);
    }

      /**
     * @Route("/New_users", name="New_users")
     */ 
    public function New_users(Request $request,   EntityManagerInterface $manager): Response
    {
        $Login= $request -> request -> get("username");
        $password= $request -> request ->get("pass");
        $monUtilisateur = new Utilisateur ();
        $monUtilisateur -> setLogin($Login);
        $monUtilisateur-> setPassword($password);
        $manager -> persist($monUtilisateur);
        $manager -> flush ();



        return $this->redirectToRoute('New_users1');
    }
     
    
}

