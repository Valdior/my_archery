<?php

namespace UserBundle\Controller;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

use FOS\RestBundle\View\View;
use FOS\RestBundle\Context\Context;

class UserRestController extends Controller
{
    public function getUserAction($username){
        $user = $this->getDoctrine()->getRepository('UserBundle:User')->findOneByUsername($username);
        if(!is_object($user)){
          throw $this->createNotFoundException();
        }

        $view = View::create();

        $view->setData($user);
        return $view;
    }
}