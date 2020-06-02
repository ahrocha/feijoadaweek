<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Restaurante;
use App\Entity\Prato;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        if ($this->container->has('profiler')) {
            $this->container->get('profiler')->disable();
        }

        $repository = $this->getDoctrine()->getRepository(Prato::class);
        $pratos = $repository->findBy(array(), array('id' => 'DESC'),10);

        return $this->render('index/index.html.twig', [
            'controller_name' => 'Feijoada Week',
            'pratos' => $pratos
        ]);
    }
}
