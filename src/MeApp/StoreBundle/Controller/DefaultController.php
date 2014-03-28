<?php

namespace MeApp\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MeAppStoreBundle:Default:index.html.twig', array('name' => $name));
    }
}
