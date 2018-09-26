<?php

namespace CDR\ProjetBundle\Controller;

use CDR\ProjetBundle\Entity\Projet;
use CDR\ProjetBundle\Entity\Suivi;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CDR\ProjetBundle\Form\ProjetType;
use CDR\ProjetBundle\Form\SuiviType;
use CDR\ProjetBundle\Form\ProjetEditType;
use CDR\ProjetBundle\Form\ProjetConsultType;
use CDR\ProjetBundle\Form\ProjetSaisieIndicsType;

class ProjetController extends Controller {

    public function listerAction() {
        $em = $this->getDoctrine()->getManager();
        $projets = $em->getRepository("CDRProjetBundle:Projet")->findAll();
        return $this->render('CDRProjetBundle:Projet:lister.html.twig', array(
                    'projets' => $projets
        ));
    }

    public function ajouterAction(Request $request) {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', 'Vous ne pouvez pas accéder à cette page.');
        $projet = new Projet();
        $projet->setTermine(false);
        $form = $this->get('form.factory')->create(ProjetType::class, $projet);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projet);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Le projet a bien été créé.');
            return $this->redirectToRoute('cdr_projet_homepage');
        }

        return $this->render('CDRProjetBundle:Projet:ajouter.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    public function supprimerAction(Request $request, $id) {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', 'Vous ne pouvez pas accéder à cette page.');
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository("CDRProjetBundle:Projet")->find($id);
        if (null === $projet) {
            throw new NotFoundHttpException("Le projet d'id " . $id . " n'existe pas.");
        }
        // On crée un formulaire vide, qui ne contiendra que le champ CSRF
        // Cela permet de protéger la suppression d'annonce contre cette faille
        $form = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->remove($projet);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Le projet a bien été supprimé.');
            return $this->redirectToRoute('cdr_projet_homepage');
        }
        return $this->render('CDRProjetBundle:Projet:supprimer.html.twig', array(
                    'projet' => $projet,
                    'form' => $form->createView(),
        ));
    }

    public function consulterAction($id) {
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository('CDRProjetBundle:Projet')->find($id);
        // Récupération de la liste des suivis réalisés sur le projet
        $suivis = $em
                ->getRepository('CDRProjetBundle:Suivi')
                ->findBy(array('projet' => $projet))
        ;
        if (null === $projet) {
            throw new NotFoundHttpException("Le projet d'id " . $id . " n'existe pas.");
        }
        $form = $this->get('form.factory')->create(ProjetConsultType::class, $projet);
        return $this->render('CDRProjetBundle:Projet:consulter.html.twig', array(
                    'projet' => $projet,
                    'suivis' => $suivis,
                    'form' => $form->createView(),
        ));
    }

    public function modifierAction($id, Request $request) {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', 'Vous ne pouvez pas accéder à cette page.');

        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository('CDRProjetBundle:Projet')->find($id);
        if (null === $projet) {
            throw new NotFoundHttpException("Le projet d'id " . $id . " n'existe pas.");
        }
        $form = $this->get('form.factory')->create(ProjetEditType::class, $projet);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Le projet a bien été modifié.');
            return $this->redirectToRoute('cdr_projet_consulter', ['id' => $projet->getId()]);
        }
        return $this->render('CDRProjetBundle:Projet:modifier.html.twig', array(
                    'projet' => $projet,
                    'form' => $form->createView(),
        ));
    }

    public function listerprojetsagentsAction() {
        $em = $this->getDoctrine()->getManager();
        $projets = $em->getRepository("CDRProjetBundle:Projet")->findAll();
        $agents = $em->getRepository("CDRUserBundle:User")->findAll();
        return $this->render('CDRProjetBundle:Projet:listerprojetsagents.html.twig', array(
                    'projets' => $projets,
                    'agents' => $agents
        ));
    }

    public function cloturerAction(Request $request, $id) {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', 'Vous ne pouvez pas accéder à cette page.');

        $this->denyAccessUnlessGranted('ROLE_ADMIN', 'Vous ne pouvez pas accéder à cette page.');
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository("CDRProjetBundle:Projet")->find($id);
        if (null === $projet) {
            throw new NotFoundHttpException("Le projet d'id " . $id . " n'existe pas.");
        }
        $form = $this->get('form.factory')->create(ProjetSaisieIndicsType::class, $projet);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $projet->setTermine(true);
            $projet->setIndic1SatisfactionClient($form["indic1_satisfactionClient"]->getData());
            $projet->setIndic2RatioCharges($form["indic2_ratioCharges"]->getData());
            $projet->setIndic3TauxCouverture($form["indic3_tauxCouverture"]->getData());
            $projet->setIndic4TauxFSDeclassees($form["indic4_tauxFSDeclassees"]->getData());
            $projet->setIndic5NombreTests($form["indic5_nombreTests"]->getData());
            $projet->setIndic6NombreRelivraisons($form["indic6_nombreRelivraisons"]->getData());
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Le projet a bien été clôturé, et les indicateurs enregistrés.');
            return $this->redirectToRoute('cdr_projet_consulter', ['id' => $projet->getId()]);
        }
        return $this->render('CDRProjetBundle:Projet:cloturer.html.twig', array(
                    'projet' => $projet,
                    'form' => $form->createView(),
        ));
    }

    public function decloturerAction(Request $request, $id) {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', 'Vous ne pouvez pas accéder à cette page.');
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository("CDRProjetBundle:Projet")->find($id);
        if (null === $projet) {
            throw new NotFoundHttpException("Le projet d'id " . $id . " n'existe pas.");
        }
        // On crée un formulaire vide, qui ne contiendra que le champ CSRF
        // Cela permet de protéger la suppression d'annonce contre cette faille
        $form = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $projet->setTermine(false);
            $projet->setIndic1SatisfactionClient(null);
            $projet->setIndic2RatioCharges(null);
            $projet->setIndic3TauxCouverture(null);
            $projet->setIndic4TauxFSDeclassees(null);
            $projet->setIndic5NombreTests(null);
            $projet->setIndic6NombreRelivraisons(null);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Le projet a bien été déclôturé.');
            return $this->redirectToRoute('cdr_projet_consulter', ['id' => $projet->getId()]);
        }
        return $this->render('CDRProjetBundle:Projet:decloturer.html.twig', array(
                    'projet' => $projet,
                    'form' => $form->createView(),
        ));
    }

    public function ajouterSuiviAction(Request $request, $id) {
        $this->denyAccessUnlessGranted('ROLE_REFERENT', 'Vous ne pouvez pas accéder à cette page.');

        $suivi = new Suivi();
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository("CDRProjetBundle:Projet")->find($id);
        $form = $this->get('form.factory')->create(SuiviType::class, $suivi);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $suivi->setProjet($projet);
            $file = $suivi->getFichier();
            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $file->move(
                    $this->getParameter('pj_directory'), $fileName
            );

            $suivi->setFichier($fileName);
            $em->persist($suivi);
            $em->flush();
			$request->getSession()->getFlashBag()->add('notice', 'Suivi enregistré.');
            return $this->redirectToRoute('cdr_projet_consulter', ['id' => $projet->getId()]);
        }

        return $this->render('CDRProjetBundle:Projet:ajoutsuivi.html.twig', array(
                    'projet' => $projet,
                    'form' => $form->createView(),
        ));
    }

    public function supprimerSuiviAction(Request $request, $idSuivi, $idProjet = 'a') {
        $this->denyAccessUnlessGranted('ROLE_REFERENT', 'Vous ne pouvez pas accéder à cette page.');
        $em = $this->getDoctrine()->getManager();
        $suivi = $em->getRepository("CDRProjetBundle:Suivi")->find($idSuivi);
        $projet = $em->getRepository("CDRProjetBundle:Projet")->find($idProjet);

        if (null === $suivi) {
            throw new NotFoundHttpException("Le suivi d'id " . $idSuivi . " n'existe pas.");
        }
        $em->remove($suivi);
        $em->flush();
		$request->getSession()->getFlashBag()->add('notice', 'Suivi supprimé.');
        return $this->redirectToRoute('cdr_projet_consulter', ['id' => $projet->getId()]);
    }

    public function planningAction() {
        $em = $this->getDoctrine()->getManager();
        $projets = $em->getRepository("CDRProjetBundle:Projet")->findAll();
        $agents = $em->getRepository("CDRUserBundle:User")->findAll();
        return $this->render('CDRProjetBundle:Projet:planningprojetsagents.html.twig', array(
                    'projets' => $projets,
                    'agents' => $agents
        ));
    }

    /**
     * @return string
     */
    private function generateUniqueFileName() {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

}
