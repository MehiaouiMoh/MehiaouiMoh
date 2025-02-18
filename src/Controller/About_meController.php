<?php
// src/Controller/About-meController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class About_meController extends AbstractController
{
    #[Route('/about-me')]
    public function ToAboutMePage(): Response
    {
        return $this->render('app/about-me.html.twig');
    }
}