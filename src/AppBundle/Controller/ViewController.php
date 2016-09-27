<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of ViewController
 *
 * @author vivien
 */
class ViewController extends Controller{
    
    /**
     * @Route("/",name="home");
     * @Template("index.html.twig");
     */
    public function Index(){
               
    }

    
}
