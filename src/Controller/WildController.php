<?php
// src/Controller/WildController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
* @Route("/wild", name="wild_")
*/

class WildController extends AbstractController
{
    /**
    * @Route("/show/{slug}",
    *     name="show"
    * )
    */

    public function show(string $slug = ''): Response
    {
        if (empty($slug)) {
            $slugOut = "Aucune série sélectionnée, veuillez choisir une série";
        } elseif (!ctype_lower(str_replace('-', '', $slug)) || strpos($slug, '_')) {
            throw $this->createNotFoundException();
        } else {
            $slugOut = ucwords(str_replace('-', ' ', $slug));  
        }

        return $this->render('wild/show.html.twig', ['slug' => $slugOut]);
    }
}