<?php

namespace ArcheryBundle\Controller;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FOS\RestBundle\View\View;
use FOS\RestBundle\Context\Context;
use ArcheryBundle\Entity\Archer;
use FOS\RestBundle\Controller\FOSRestController;

class ArcherRestController extends FOSRestController
{
    public function getArcherAction(string $slug)
    {
        $repository = $this->getDoctrine()
            ->getRepository('ArcheryBundle:Archer')
        ;

        $archer =  $repository->findBySlug($slug);

        $templateData = array('archer' => $archer);

        $view = $this->view($archer, 200)
            ->setTemplate("ArcheryBundle:Archer:view.html.twig")
            ->setTemplateVar('archer')
            ->setTemplateData($templateData)
        ;

        return $this->handleView($view);
    }
}
