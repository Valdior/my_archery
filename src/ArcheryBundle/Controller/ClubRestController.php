<?php

namespace ArcheryBundle\Controller;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FOS\RestBundle\View\View;
use FOS\RestBundle\Context\Context;
use ArcheryBundle\Entity\Club;
use FOS\RestBundle\Controller\FOSRestController;

class ClubRestController extends FOSRestController
{
    public function getClubsAction()
    {
        $repository = $this->getDoctrine()
                ->getRepository('ArcheryBundle:Club')
            ;

        $clubs =  $repository->findAll();

        $templateData = array('club' => $clubs);

        $view = $this->view($clubs, 200)
            ->setTemplate("ArcheryBundle:Club:view.html.twig")
            ->setTemplateVar('club')
            ->setTemplateData($templateData)
        ;

        return $this->handleView($view);
    }
}
