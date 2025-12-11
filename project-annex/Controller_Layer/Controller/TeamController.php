<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Team;

final class TeamController extends AbstractController
{
    #[Route('/team/{id}', name: 'team_show')]
    public function showTeam(Team $team): Response
    {
        return $this->render('team/index.html.twig', [
            'team' => $team ,
            'controller_name' => 'TeamController',
        ]);
    }
}
