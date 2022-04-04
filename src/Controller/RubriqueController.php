<?php

namespace App\Controller;

use App\Repository\RubriqueRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RubriqueController extends AbstractController
{
    private $rubriqueRepository;

    public function __construct(RubriqueRepository $rubriqueRepository)
    {
        $this->rubriqueRepository = $rubriqueRepository;
    }

    /**
     * @Route("/rubrique", name="app_rubrique")
     */
    public function index(): Response
    {
        $rubriques = $this->rubriqueRepository->findBy([], ['intitule' => 'ASC']);

        return $this->render('rubrique/index.html.twig', [
            'controller_name' => 'RubriqueController',
            'rubriques' => $rubriques,
            'nomPage' => 'rubrique'
        ]);
    }
}
