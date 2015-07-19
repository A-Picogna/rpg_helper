<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListeCommune extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        if (!$this->session->userdata("bibliotheque")){
            redirect('home', 'refresh');
        }
    }
    
	public function index(){
        $data['listeArchetype'] = $this->Archetype->getListeArchetype();
        $this->load->view('header');
        $this->load->view('listeCommune_view', $data);        
        $this->load->view('footer');
	}
    
	public function addListePerso($archetype){
        $this->Archetype->importerArchetype($archetype, $this->session->userdata("bibliotheque"));
        redirect('home', 'refresh');
	}
    
    
}

?>


