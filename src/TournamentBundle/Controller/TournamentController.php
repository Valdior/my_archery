<?php

namespace TournamentBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TournamentBundle\Entity\Tournament;

/**
 * Description of TournamentController
 *
 * @author Valdior
 */
class TournamentController extends Controller 
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('TournamentBundle:Tournament')
                          ;
        
        $tournaments = $repository->findBy([], ['dateStart' => 'ASC']);
        
        return $this->render('TournamentBundle:Tournament:index.html.twig', array(
                                'tournaments' => $tournaments
                              ));
    }
    
    public function viewAction(Tournament $tournament)
    {        
        return $this->render('TournamentBundle:Tournament:view.html.twig', array(
                                'tournament' => $tournament
                              ));
    }
}
