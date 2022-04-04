<?php

namespace App\Controller;

use App\Repository\RubriqueRepository;
use App\Repository\RedacteurRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RedacteurController extends AbstractController
{
    private $redacteurRepository;

    public function __construct(RedacteurRepository $redacteurRepository)
    {
        $this->redacteurRepository = $redacteurRepository;
    }

    /**
     * @Route("/redacteur", name="app_redacteur")
     */
    public function index(RubriqueRepository $rubriqueRepository): Response
    {
        $rubriques = $rubriqueRepository->findBy([], ['intitule' => 'ASC']);

        $redacteurs = $this->redacteurRepository->findBy([], ['nom' => 'ASC']);

        return $this->render('redacteur/index.html.twig', [
            'controller_name' => 'RedacteurController',
            'redacteurs' => $redacteurs,
            'rubriques' => $rubriques,
            'nomPage' => 'redacteur'
        ]);
    }
}
