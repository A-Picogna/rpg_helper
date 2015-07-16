<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListeCommune extends CI_Controller {
    
    function __construct(){
        parent::__construct();
    }
    
	public function index(){
        $data['listeArchetype'] = $this->Personnage->getListeArchetype();
        $this->load->view('header');
        $this->load->view('listeCommune_view', $data);        
        $this->load->view('footer');
	}
    
	public function addListePerso($archetype){
	}
    
    
}

?>


