<?php

namespace TournamentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TournamentBundle:Default:index.html.twig');
    }
}
