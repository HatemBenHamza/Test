<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProjectController extends Controller
{


    /**
     * @Route("/home", name="home")
     */
    public function indexAction(Request $request)
    {

       
        $Crs = $this->getDoctrine()->getRepository('AppBundle:Course')->findAll();

        return $this->render('Project_Views/index.html.twig',array(
           'Courses' => $Crs
            ));
    }


/**
     * @Route("/list_Coureurs", name="list")
     */
    public function detAction(Request $request)
    { 
         $C = $this->getDoctrine()->getRepository('AppBundle:Coureur')->findAll();
           
            return $this->render('Project_Views/list_Coureurs.html.twig',array(
           'Coureurs' => $C
            ));

    }




   


    /**
     * @Route("/delete/{numCoureur}", name="delete_action")
     */
    public function deleteAction($numCoureur)
    {


        $em = $this->getDoctrine()->getManager();
        $C = $em->getRepository('AppBundle:Coureur')->findOneBy(array(
            'numCoureur'=>$numCoureur));
        $em->remove($C);
        $em->flush();

        $this->addFlash(
            'notice',
            'Coureur Supprime'
            );

        return $this->redirectToRoute('list');
       
    }


    /**
     * @Route("/details/{id}", name="details")
     */
    public function detailsAction($id,Request $request)
    {
            
             $em = $this->getDoctrine()->getManager();
             $part = $em->getRepository('AppBundle:Participe')->findOneBy(array(
            'id'=>$id));

          $C = $this->getDoctrine()->getRepository('AppBundle:Coureur')->findAll();

        return $this->render('Project_Views/CourseDetails.html.twig');
    }
    /**
     * @Route("/participant_course/{id}", name="participant_course")
     */
    public function getParticipantsCourseAction($id,Request $request)
    {
      
      $participes = $this->getDoctrine()->getRepository('AppBundle:Participe')->findBy(array(
            'course'=>$id));
           
        

        return $this->render('Project_Views/list.html.twig', array(
            'participes'=>$participes
            ));
    }




     /**
     * @Route("/deletepart", name="delete_part")
     */
    public function deleteParticpeAction(Request $request)
    {


            $Ids = $request->query->get('id',[]);

         foreach ($Ids as $Id) {
               $em = $this->getDoctrine()->getManager();
               $element= $em->getRepository('AppBundle:Participe')->findOneBy(array(
                 'id' => $Id
                ));

                $em->remove($element); 
                $em->flush();   
         
         }
              
        
         return $this->redirectToRoute('home');

    }
}


