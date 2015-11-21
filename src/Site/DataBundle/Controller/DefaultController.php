<?php

namespace Site\DataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SiteDataBundle:Default:index.html.twig', array('name' => $name));
    }
}
