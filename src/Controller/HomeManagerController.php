<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Project;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;

class HomeManagerController extends AbstractController
{
    /**
     * @Route("/home/manager", name="app_home_manager")
     */
    public function index(ProjectRepository $projectRepository): Response
    {
        $allProject = $projectRepository->findAll();
        return $this->render('home_manager/index.html.twig', [
            'controller_name' => 'HomeManagerController',
            'projects' => $allProject,
        ]);
    }

    /**
     * @Route("/addProject", name="add_project")
     */
    public function addProject(ProjectRepository $projectRepository): Response
    {
        return $this->redirectToRoute('app_home_manager');
    }
}
