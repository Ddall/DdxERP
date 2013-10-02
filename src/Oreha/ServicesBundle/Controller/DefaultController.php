<?php

namespace Oreha\ServicesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('OrehaServicesBundle:Default:index.html.twig', array('name' => $name));
    }
}
