<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Alumno;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }


    /**
     * @Route("/hi", name="helloworld")
     */
    public function hiAction(Request $request)
    {
        $name_name = 'Guille';
        // replace this example code with whatever you need
        return $this->render('helloworld/helloworld.html.twig', [
            'name-name' => $name_name
        ]);
    }

    /**
     * @Route("/exercise1", name="exercise1")
     */
    public function exerciseAction(Request $request)
    {
        $manager = new \AppBundle\Service\AsignaturasManager();
        $subjects = $manager->get('01AE');
        // replace this example code with whatever you need
        return $this->render('exercises/exercise1.html.twig', ['subjects' => $subjects]);
    }

    public function ejercicioNotasAction(Request $request, int $id)
    {
//        $em = $this->getDoctrine()->getManager();
        $sr = $this->getDoctrine()->getRepository(Alumno::class);
        $student = $sr->find($id);

        if (!$student) {
            throw $this->createNotFoundException(
                'No se ha encontrado ningún estudiante con el id '.$id
            );
        } else {
            return $this->render('exercises/qualifications.twig',
                [
                    'student' => $student
                ]);
        }
    }
}
