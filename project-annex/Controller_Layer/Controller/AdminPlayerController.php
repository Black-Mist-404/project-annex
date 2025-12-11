<?php

namespace App\Controller;

use App\Entity\Player;
use App\Form\PlayerType;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
#[Route('/admin/player')]
class AdminPlayerController extends AbstractController
{
    #[Route('/', name: 'admin_player_list')]
    public function list(PlayerRepository $repo): Response
    {
        return $this->render('admin_player/list.html.twig', [
            'players' => $repo->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_player_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $player = new Player();
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($player);
            $em->flush();
            return $this->redirectToRoute('admin_player_list');
        }

        return $this->render('admin_player/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_player_edit')]
    public function edit(Player $player, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('admin_player_list');
        }

        return $this->render('admin_player/edit.html.twig', [
            'form' => $form->createView(),
            'player' => $player,
        ]);
    }

    #[Route('/{id}/delete', name: 'admin_player_delete', methods: ['POST'])]
    public function delete(Player $player, EntityManagerInterface $em): Response
    {
        $em->remove($player);
        $em->flush();
        return $this->redirectToRoute('admin_player_list');
    }
}
