<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Restaurante;

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
	 * @Route("/restaurante/{id}", name="retaurante_show")
	 */
	public function show($id)
	{
	    $product = $this->getDoctrine()
	        ->getRepository(Restaurante::class)
	        ->find($id);

	    if (!$product) {
	        throw $this->createNotFoundException(
	            'No product found for id '.$id
	        );
	    }

	    return new Response('Check out this great product: '.$product->getNome());

	    // or render a template
	    // in the template, print things with {{ product.name }}
	    // return $this->render('product/show.html.twig', ['product' => $product]);
	}

}
