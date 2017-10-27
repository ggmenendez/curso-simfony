<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Asignatura;
use AppBundle\Form\AsignaturaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AsignaturasController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Asignaturas:index.html.twig', array(
            // ...
        ));
    }

    public function newAction()
    {
        $subjet = new Asignatura();
        $form = $this->createForm(AsignaturaType::class, $subjet);

        return $this->render('Asignaturas/new.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function editAction()
    {
        return $this->render('Asignaturas/edit.html.twig', array(
            // ...
        ));
    }

    public function deleteAction($id)
    {
        return $this->render('Asignaturas/delete.html.twig', array(
            // ...
        ));
    }

}
