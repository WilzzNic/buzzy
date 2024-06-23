<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LuckyController extends AbstractController {
    
    #[Route('/lucky/number/{maxNumber}', methods: ['GET'])]
    public function number(int $maxNumber = 100): Response {
        $number = random_int(0, $maxNumber);

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }
}
