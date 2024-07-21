<?php

namespace App\Controller;

use App\Repository\GroupChannelsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
class GroupChannelsController extends AbstractController {
    #[Route('/group/channels', name: 'app_group_channels')]

    public function index(GroupChannelsRepository $repository): Response {
        $channels = $repository->findAll();
        return $this->render('group_channels/index.html.twig', [
            'controller_name' => 'GroupChannelsController',
            'channels' => $channels,
        ]);
    }
}
