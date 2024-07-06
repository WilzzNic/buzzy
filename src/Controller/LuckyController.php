<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class LuckyController extends AbstractController {
    
    #[Route('/lucky/number/{maxNumber}', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function number(int $maxNumber = 100): Response {
        $number = random_int(0, $maxNumber);

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }
}
