<?php

namespace App\Controller;

use App\Repository\ManagerRepository;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\Void_;
use SebastianBergmann\Type\VoidType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/", name="indexLogin")
     */
    public function index(): Response
    {
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
        ]);
    }


    /**
     * @Route("/login", name="login")
     */
    public function login(ManagerRepository $managerRepository, EntityManagerInterface $entityManager): JsonResponse
    {
        if(isset($_POST)){

            $login = $_POST['login'];
            $password = $_POST['password'];
            $return = null;
            

            //code à intégrer après validation du systeme dajout manager ????? (pas sur en gros mais au moins c'est fait)

            /*

            $hashPassword= password_hash($password, PASSWORD_DEFAULT);
            // normalement ca ici va crypter le truc
            var_dump($hashPassword);

            //copier le mdp hashé ici 

            */
            $manager = $managerRepository->findOneByLogin($login);
           if($manager == null){
                $return = false;
           }else{
                if($password == $manager->getPassword()){
                        $return = true;
                }
           }
            //flemme d'utiliser le bundle Symfony donc : 
            if($return == true){
            $_SESSION['idManager'] = $manager->getId();
            $_SESSION['login'] = $manager->getLogin();
            $_SESSION['connected'] = true;
            }
            $response = new JsonResponse(['data' => $return]);
            return $response;
        }else{
            $return = false;
        }
        
        
    }


    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        if(isset($_SESSION['idManager']) && $_SESSION['idManager'] != null ){
            unset($_SESSION['idManager']);
            unset($_SESSION['login']);
            unset($_SESSION['connected']);
            
        }
        return $this->redirectToRoute('indexLogin');
    }
}

