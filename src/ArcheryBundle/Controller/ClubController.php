<?php

namespace ArcheryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClubController extends Controller
{
    public function indexAction()
    {
        return $this->render('ArcheryBundle:Club:index.html.twig');
    }
}
