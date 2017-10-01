<?php

namespace TournamentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TournamentBundle\Entity\Tournament;
use TournamentBundle\Entity\Peloton;

/**
 * Description of PelotonCOntroller
 *
 * @author Valdior
 */
class PelotonController  extends Controller 
{
    public function indexAction(Tournament $tournament)
    {        
//        $repository = $this->getDoctrine()
//                            ->getManager()
//                            ->getRepository('TournamentBundle:Peloton')
//                          ;
//        
//        $pelotons = $repository->findByTournament($tournament);
        
        return $this->render('TournamentBundle:Peloton:index.html.twig', array(
                                'pelotons' => $tournament->getPelotons()
                              ));
    }
    
    public function viewAction(Peloton $peloton)
    {        
        return $this->render('TournamentBundle:Peloton:view.html.twig', array(
                                'peloton' => $peloton
                              ));
    }
}
