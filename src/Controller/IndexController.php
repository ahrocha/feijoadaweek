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
        //$pratos = $repository->findAll();
        $pratos = $repository->findBy(array(), array('id' => 'DESC'),5);
        
//        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
//        $qb->select(['t.id', 't.nome', 't.restaurante'])
//           ->from('App\Entity\Prato', 't')
//           ->orderBy('t.id', 'DESC');
//        $pratos = $qb->getQuery()->getResult();
//var_dump($pratos);die;
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'pratos' => $pratos
        ]);
    }
}
