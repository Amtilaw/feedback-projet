<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Project;
use App\Repository\ProjectRepository;
use App\Entity\Manager;
use App\Repository\ManagerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;


class HomeManagerController extends AbstractController
{
    /**
     * @Route("/panel", name="app_home_manager")
     */
    public function index(ProjectRepository $projectRepository): Response
    {
        $allProject = $projectRepository->findAll();

        if(isset($_SESSION['connected'])){
            $connected = $_SESSION['connected'];
        }else{
            $connected = false;
        }
        

        return $this->render('home_manager/index.html.twig', [
            'controller_name' => 'HomeManagerController',
            'projects' => $allProject,
            'connected' => $connected
        ]);
    }

    /**
     * @Route("/addProject", name="add_project")
     */
    public function addProject(ProjectRepository $projectRepository, Request $request,ManagerRepository $managerRepository, EntityManagerInterface $entityManager): Response
    {

        $manager = $managerRepository->find(1);
        $project = new Project();
        $project->setName($request->request->get("name"));
        $project->setArchived(0);
        $project->setIdManager($manager);
        $entityManager->persist($project);
        $entityManager->flush();
        return new JsonResponse(1);
    }

    /**
     * @Route("/archiveProject", name="archive_project")
     */
    public function archiveProject(ProjectRepository $projectRepository, Request $request, EntityManagerInterface $entityManager): Response
    {

        $idProject = intval($request->request->get('projectId'));
        $project = $projectRepository->find($idProject);
        $project->setArchived(1);
        $entityManager->flush();
        return $this->redirectToRoute('app_home_manager');
    }
}
