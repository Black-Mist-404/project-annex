<?php

namespace App\Controller;

use App\Entity\Team;
use App\Form\TeamType;
use App\Repository\TeamRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
#[Route('/admin/team')]
class AdminTeamController extends AbstractController
{
    #[Route('/', name: 'admin_team_list')]
    public function list(TeamRepository $repo): Response
    {
        return $this->render('admin_team/list.html.twig', [
            'teams' => $repo->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_team_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $team = new Team();
        $form = $this->createForm(TeamType::class, $team);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($team);
            $em->flush();
            return $this->redirectToRoute('admin_team_list');
        }

        return $this->render('admin_team/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_team_edit')]
    public function edit(Team $team, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(TeamType::class, $team);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('admin_team_list');
        }

        return $this->render('admin_team/edit.html.twig', [
            'form' => $form->createView(),
            'team' => $team,
        ]);
    }

    #[Route('/{id}/delete', name: 'admin_team_delete', methods: ['POST'])]
    public function delete(Team $team, EntityManagerInterface $em): Response
    {
        $em->remove($team);
        $em->flush();
        return $this->redirectToRoute('admin_team_list');
    }
}
