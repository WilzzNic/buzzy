<?php

namespace App\Controller;

use App\Entity\GroupChannels;
use App\Form\GroupChannelsType;
use App\Repository\GroupChannelsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\Request;

#[Route('/group-channels')]
#[IsGranted('ROLE_USER')]
class GroupChannelsController extends AbstractController {

    #[Route('/', name: 'app_group_channels_index')]
    public function index(GroupChannelsRepository $repository): Response {
        $channels = $repository->findAll();
        return $this->render('group_channels/index.html.twig', [
            'controller_name' => 'GroupChannelsController',
            'channels' => $channels,
        ]);
    }

    #[Route('/new', name: 'app_group_channels_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, LoggerInterface $logger): Response {
        $groupChannel = new GroupChannels();
        $form = $this->createForm(GroupChannelsType::class, $groupChannel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($groupChannel);
            $entityManager->flush();

            return $this->redirectToRoute('app_group_channels_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('group_channels/new.html.twig', [
            'group_channel' => $groupChannel,
            'form' => $form,
        ]);
    }

    #[Route('/show/{id}', name: 'app_group_channels_show', methods: ['GET'])]
    public function show(EntityManagerInterface $entityManager, int $id): Response {
        $channels = $entityManager->getRepository(GroupChannels::class)->findAll();

        $groupChannel = $entityManager->getRepository(GroupChannels::class)->find($id);

        if ($groupChannel === null) {
            throw $this->createNotFoundException('The group channel does not exist');
        }

        return $this->render('group_channels/show.html.twig', [
            'groupChannel' => $groupChannel,
            'channels' => $channels,
        ]);
    }
}
