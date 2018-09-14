<?php

namespace CDR\PlanningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlanningController extends Controller {
    
    public function afficherAction() {
       
        return $this->render('CDRPlanningBundle:Planning:afficher.html.twig');
    }
    
   
}

