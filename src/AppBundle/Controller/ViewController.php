<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of ViewController
 *
 * @author vivien
 */
class ViewController extends Controller {

// Home   
    /**
     * @Route("/",name="home");
     * @Template("index.html.twig");
     */
    public function index() {
        
    }

//Section Qui suis je
    /**
     * @Route("/qui",name="qui");
     * @Template("sectionQui.html.twig");
     */
    public function indexQui() {
        
    }
    
//Section Formation
    /**
     * @Route("/formation",name="forma");
     * @Template("sectionFormation.html.twig");
     */
    public function indexFormation() {
        
    }
//Section Compétence
    /**
     * @Route("/competence",name="compe");
     * @Template("sectionConpetence.html.twig");
     */
    public function indexCompetence() {
        
    }
//Section Contact
    
    /**
     * @Route("/contact",name="contact");
     * @Template("sectionContacte.html.twig");
     */
    public function indexContacte() {
        
        
    }
    

//Section Projet
    /**
     * @Route("/projet", name="projet");
     * @Template("projet.html.twig");
     */
    public function indexProjet() {
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository("AppBundle:Projet")->findAll();
        return array("projets" => $projet);
    }

}
