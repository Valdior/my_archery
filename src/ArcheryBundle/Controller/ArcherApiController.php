<?php

namespace ArcheryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ArcheryBundle\Entity\Archer;

/**
 * Description of ArcherController
 *
 * @author Valdior
 */
class ArcherApiController  extends Controller
{
    public function getArchersAction()
    {
        $repository = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('ArcheryBundle:Archer')
                          ;
        
        $archers = $repository->findBy([], ['lastname' => 'ASC', 'firstname' => 'ASC']);

        return new JsonResponse($archers);
    }
    
    public function viewAction(Archer $archer)
    {        
        return $this->render('ArcheryBundle:Archer:view.html.twig', array(
                                'archer' => $archer
                              ));
    }
}