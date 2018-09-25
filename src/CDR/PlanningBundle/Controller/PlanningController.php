<?php

namespace CDR\PlanningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlanningController extends Controller {
    
    public function afficherAction() {
       
        $em = $this->getDoctrine()->getManager();
        $projets = $em->getRepository("CDRProjetBundle:Projet")->findAll();
        $agents = $em->getRepository("CDRUserBundle:User")->findAll();
        return $this->render('CDRProjetBundle:Projet:planningprojetsagents.html.twig', array(
                    'projets' => $projets,
                    'agents' => $agents
        ));
    }
    
   
}

