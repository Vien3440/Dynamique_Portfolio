<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Projet;
use AppBundle\Form\ProjetType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of AdminController
 *
 * @author vivien
 */
class AdminController extends Controller {
    
//    Partie View 
    /**
     * @Route("/projet", name="projet");
     * @Template("projet.html.twig");
     */
    public function projet() {
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository("AppBundle:Projet")->findAll();
        return $this->render('projet.html.twig', array("projets" => $projet));
    }

    
//    Partie Admin  

    //    Edit Admin Projet
    /**
     * @Route("/admin/projet", name="projetAdmin");
     * @Template("projet.html.twig");
     */
    public function projetAdmin() {
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository("AppBundle:Projet")->findAll();
        return $this->render('projetAdmin.html.twig', array("projets" => $projet));
    }

 //    Ajout Admin Projet
    
    // Form maping 
    /**
     * @Route("/admin/projet/add", name="adminProjetAdd")
     * @Template("adminProjetAdd.html.twig")
     */
    public function addProjet() {

        $f = $this->createForm(ProjetType::class, new Projet());
        return array("formProjet" => $f->createView());
    }
    
    // Form persist 
    /**
     * @Route("/admin/projet/get", name="valid")
     */
    public function persistProjet(Request $request) {

        $palon = new Projet();

        $f = $this->createForm(ProjetType::class, $palon);
        $f->handleRequest($request);
        
         $nomDuFichier = md5(uniqid()).'.'.$palon->getImages()->getClientOriginalExtension();
         $palon->getImages()->move('../web/images',$nomDuFichier);
         $palon->setImages($nomDuFichier);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($palon);
        $em->flush();

        return $this->redirect($this->generateUrl('projetAdmin'));
    }

    
    // Supre Projet
    /**
     * @Route("/admin/projet/supr/{id}", name="suprProjet")
     */
     public function suprProjet($id){
        $em = $this->getDoctrine()->getEntityManager();
        $recupId = $em->find("AppBundle:Projet", $id);
        $em->remove($recupId);
        $em->flush();
        return $this->redirect($this->generateUrl('projetAdmin'));
    }
    
    
    // Modif Projet
    /**
     * @Route("admin/projet/edit/{id}",name="editProjet")
     * @Template("projetModif.html.twig")
     * 
     */
    public function editAnnonce($id,Projet $a){
        
        return array("formProjet" => $this->createForm(ProjetType::class, $a)->createView(),'id'=>$id);
    }
    
     
   /**
    * @Route("admin/projet/update/{id}",name="modifProjet")
    */
   public function  uptdateProjet(Request $request , $id){
        $a = new Projet();
        $em = $this->getDoctrine()->getManager();
        $a = $em->find("AppBundle:Projet", $id);
        
        
        $f= $this->createForm(ProjetType::class,$a);
        $f->handleRequest($request);
        
        if($f->isValid())
        {
        
            
        $em->merge($a);
        $em->flush();
        }
        return $this->redirect($this->generateUrl('projetAdmin'));
   }
}
 