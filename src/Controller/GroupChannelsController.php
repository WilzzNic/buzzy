<?php

namespace App\Controller;

use App\Repository\GroupChannelsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class GroupChannelsController extends AbstractController {
    #[Route('/group/channels', name: 'app_group_channels')]
    #[IsGranted('ROLE_USER')]
    public function index(GroupChannelsRepository $repository): Response {

        return $this->render('group_channels/index.html.twig', [
            'controller_name' => 'GroupChannelsController',
        ]);
    }
}
