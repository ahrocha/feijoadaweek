<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Restaurante;
use App\Entity\Prato;

class RestauranteController extends AbstractController
{
    /**
     * @Route("/restaurante", name="restaurante")
     */
    public function index()
    {
        return $this->render('restaurante/index.html.twig', [
            'controller_name' => 'RestauranteController',
        ]);
    }

    /**
     * @Route("/restaurante/{slug}", name="retaurante_show")
     */
    public function show($slug)
    {
        $restaurante = $this->getDoctrine()
            ->getRepository(Restaurante::class)
            ->findOneBy(['slug' => $slug]);

        if (!$restaurante) {
            throw $this->createNotFoundException(
                'No product found for id ' . $slug
            );
        }
        
        $repository = $this->getDoctrine()->getRepository(Prato::class);
        $pratos = $repository->findBy(array('restaurante' => $restaurante->getId()), array('id' => 'DESC'),10);

        return $this->render('restaurante/index.html.twig', [
            'controller_name' => 'Restaurante :: Feijoada Week',
            'restaurante' => $restaurante,
            'pratos' => $pratos
        ]);
    }

}
