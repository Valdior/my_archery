<?php

namespace TournamentBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TournamentBundle\Entity\Tournament;
use TournamentBundle\Form\TournamentType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\DateType;



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

    public function addAction(Request $request)
    {        
        $tournament = new Tournament();
        $form       = $this->get('form.factory')->create(TournamentType::class, $tournament);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tournament);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Compétition bien enregistrée.');
            return $this->redirectToRoute('tournament_view', array('id' => $tournament->getId()));
        }
        
      
        return $this->render('TournamentBundle:Tournament:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
