<?php

namespace ArcheryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ArcheryBundle\Entity\Archer;

/**
 * Description of ArcherController
 *
 * @author Valdior
 */
class ArcherController  extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('ArcheryBundle:Archer')
                          ;
        
        $archers = $repository->findBy([], ['lastname' => 'ASC', 'firstname' => 'ASC']);
        
        return $this->render('ArcheryBundle:Archer:index.html.twig', array(
                                'archers' => $archers
                              ));
    }
    
    public function viewAction(Archer $archer)
    {        
        return $this->render('ArcheryBundle:Archer:view.html.twig', array(
                                'archer' => $archer
                              ));
    }
}
