<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\TeamRepository;
use App\Repository\PlayerRepository;

class SearchController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Request $request, TeamRepository $teamRepo, PlayerRepository $playerRepo): Response
    {   
        
        $query = $request->query->get('q', '');

        $teams = [];
        $players = [];

        if ($query) {
            $teams = $teamRepo->createQueryBuilder('t')
                ->where('t.name LIKE :query')
                ->setParameter('query', '%' . $query . '%')
                ->getQuery()
                ->getResult();

            $players = $playerRepo->createQueryBuilder('p')
                ->where('p.name LIKE :query')
                ->setParameter('query', '%' . $query . '%')
                ->getQuery()
                ->getResult();
        }

        return $this->render('search/index.html.twig', [
            'teams' => $teams,
            'players' => $players,
            'query' => $query
        ]);
    }
    #[Route('/secret', name: 'secret')]
    public function secret(): Response
    {
        return new Response('You are logged in!');
    }
}