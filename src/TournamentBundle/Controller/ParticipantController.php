<?php

namespace TournamentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TournamentBundle\Entity\Participant;
use TournamentBundle\Entity\Peloton;
use TournamentBundle\Form\ParticipantType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of PelotonCOntroller
 *
 * @author Valdior
 */
class ParticipantController  extends Controller 
{
    public function addAction(Request $request, Peloton $peloton)
    {        
        $participant = new Participant();
        $participant->setPeloton($peloton);
        $form       = $this->get('form.factory')->create(ParticipantType::class, $participant);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $participant->setPeloton($peloton);
            $em = $this->getDoctrine()->getManager();
            $em->persist($participant);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Le participant a bien été enregistré.');
            return $this->redirectToRoute('peloton_view', array('id' => $peloton->getId()));
        }
        
      
        return $this->render('TournamentBundle:Participant:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}