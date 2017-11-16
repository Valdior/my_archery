<?php

namespace TournamentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TournamentBundle\Entity\Participant;
use TournamentBundle\Entity\Peloton;
use TournamentBundle\Form\ParticipantType;
use TournamentBundle\Form\ParticipantEditType;
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

    public function editAction(Request $request, Participant $participant)
    {
        $form  = $this->get('form.factory')->create(ParticipantEditType::class, $participant);        

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Le participant a bien été modifié.');
            return $this->redirectToRoute('peloton_view', array('id' => $participant->getPeloton()->getId()));
        }        
      
        return $this->render('TournamentBundle:Participant:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}