<?php

namespace App\Controller;

use App\Entity\Rubrique;
use App\Repository\ActuRepository;
use App\Repository\RubriqueRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private $actuRepository;
    private $rubriqueRepository;

    public function __construct(ActuRepository $actuRepository, RubriqueRepository $rubriqueRepository)
    {
        $this->actuRepository = $actuRepository;
        $this->rubriqueRepository = $rubriqueRepository;
    }

    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        $rubriques = $this->rubriqueRepository->findBy([], ['intitule' => 'ASC']);

        $actus = $this->actuRepository->findBy([], ['datePublication' => 'DESC']);

        // dd($actus);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'actus' => $actus,
            'rubriques' => $rubriques,
            'nomPage' => 'home'
        ]);
    }

    /**
     * @Route("/showByRubrique/{id}", name="show_by_rubrique")
     */
    public function showActus(?Rubrique $rubrique): Response
    {
        if ($rubrique) {
            $actusConcernees = $rubrique->getActusConcernees()->getValues();
        } else {
            return $this->redirectToRoute('app_home');
        }

        $rubriques = $this->rubriqueRepository->findBy([], ['intitule' => 'ASC']);

        // dd($actusConcernees);

        return $this->render('show/showActus.html.twig', [
            'controller_name' => 'HomeController',
            'rubriques' => $rubriques,
            'rubriqueSelectionnee' => $rubrique,
            'actus' => $actusConcernees,
            'nomPage' => 'home'
        ]);
    }
}
