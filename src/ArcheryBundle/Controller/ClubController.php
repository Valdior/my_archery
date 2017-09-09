<?php

namespace ArcheryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ArcheryBundle\Entity\Club;

class ClubController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('ArcheryBundle:Club')
                          ;
        
        $clubs = $repository->findBy([], ['number' => 'ASC']);
        
        return $this->render('ArcheryBundle:Club:index.html.twig', array(
                                'clubs' => $clubs
                              ));
    }
    
    public function viewAction(Club $club)
    {        
        return $this->render('ArcheryBundle:Club:view.html.twig', array(
                                'club' => $club
                              ));
    }
}
