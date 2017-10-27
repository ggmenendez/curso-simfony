<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Grado;
use AppBundle\Form\GradoType;
use AppBundle\Repository\GradoRepository;
use Doctrine\DBAL\Exception\ForeignKeyConstraintViolationException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;

class GradosController extends Controller
{
    /**
     * @Route("/grados/")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $gr = $em->getRepository(Grado::class);
        $grades = $gr->findAll();
        return $this->render('Grados/index.html.twig', array(
            'grades' => $grades
        ));
    }

    /**
     * @Route("/grados/new")
     */
    public function newAction(Request $request)
    {
        $grade = new Grado();
        $form = $this->createForm(GradoType::class, $grade);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newGrado = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($newGrado);
            $em->flush();

            return $this->render('Grados/new.html.twig', array(
                'form' => $form->createView(),
                'data' => $newGrado
            ));
        }

        return $this->render('Grados/new.html.twig', array(
            'form' => $form->createView(),
            'data' => null
        ));
    }

    /**
     * @Route("/grados/edit/{id}")
     */
    public function editAction(Request $request, $id)
    {
        if (!$id) return $this->redirectToRoute('ejercicios_form_grados_new');
        $em = $this->getDoctrine()->getManager();
        $gr = $em->getRepository(Grado::class);
        $grade = $gr->find($id);
        $form = $this->createForm(GradoType::class, $grade);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $grade = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($grade);
            $em->flush();

            return $this->redirectToRoute('ejercicios_form_grados_index');
        }

        return $this->render('Grados/edit.html.twig', array(
            "form" => $form->createView()
        ));
    }

    /**
     * @Route("/delete/{id}")
     */
    public function deleteAction ($id)
    {
        if (!$id) return $this->redirectToRoute('ejercicios_form_grados_index');
        $em = $this->getDoctrine()->getManager();
        $gr = $em->getRepository(Grado::class)->find($id);
        $em->remove($gr);
        try{
            $em->flush();
        }catch (ForeignKeyConstraintViolationException $e) {
            return $this->render('Grados/delete.html.twig', array(
                "error" => $e->getMessage()
            ));
        }

        return $this->redirectToRoute('ejercicios_form_grados_index');
    }

}
