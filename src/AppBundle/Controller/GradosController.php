<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class GradosController extends Controller
{
    /**
     * @Route("/grados/")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Grados:index.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/grados/new")
     */
    public function newAction()
    {
        return $this->render('AppBundle:Grados:new.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/grados/edit")
     */
    public function editAction()
    {
        return $this->render('AppBundle:Grados:edit.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/delete/{id}")
     */
    public function deleteAction($id)
    {
        return $this->render('AppBundle:Grados:delete.html.twig', array(
            // ...
        ));
    }

}
