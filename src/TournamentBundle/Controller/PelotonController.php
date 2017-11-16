<?php

namespace TournamentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TournamentBundle\Entity\Tournament;
use TournamentBundle\Entity\Peloton;
use TournamentBundle\Form\PelotonType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of PelotonCOntroller
 *
 * @author Valdior
 */
class PelotonController  extends Controller 
{
    public function indexAction(Tournament $tournament)
    {
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

    public function addAction(Request $request, Tournament $tournament)
    {        
        $peloton = new Peloton();
        $form    = $this->get('form.factory')->create(PelotonType::class, $peloton);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $peloton->setTournament($tournament);
            $em = $this->getDoctrine()->getManager();
            $em->persist($peloton);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Peloton bien enregistrée.');
            return $this->redirectToRoute('peloton_view', array('id' => $peloton->getId()));
        }
        
      
        return $this->render('TournamentBundle:Peloton:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
