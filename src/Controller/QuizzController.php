<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Answer;
use App\Repository\AnswerRepository;
use App\Repository\ProjectRepository;

class QuizzController extends AbstractController
{
    /**
     * @Route("/quizz/{idProject}", name="app_quizz")
     */
    public function index($idProject): Response
    {
        return $this->render('quizz/index.html.twig', [
            'controller_name' => 'QuizzController',
            'idProject' => $idProject,
        ]);
    }

    /**
     * @Route("/quizzRep", name="app_quizz_rep")
     */
    public function quizzAnswer(Request $request, AnswerRepository $answerRepository, ProjectRepository $projectRepository, EntityManagerInterface $entityManager): Response
    {
        $idproject =$request->request->get("idProject");
        $idproject = intval($idproject);
        $project = $projectRepository->find($idproject);

        $answer = new Answer();
        $answer->setArchived(0);
        $answer->setQ1($request->request->get("q1"));
        $answer->setQ2($request->request->get("q2"));
        $answer->setQ3($request->request->get("q3"));
        $answer->setQ4($request->request->get("q4"));
        $answer->setQ5($request->request->get("q5"));
        $answer->setQ6($request->request->get("q6"));
        $answer->setQ7($request->request->get("q7"));
        $answer->setIdProject($project);
        $entityManager->persist($answer);
        $entityManager->flush();


        return $this->redirectToRoute('indexLogin');
    }
}
