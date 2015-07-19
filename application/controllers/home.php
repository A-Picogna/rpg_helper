<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    function __construct(){
        parent::__construct();
    }
    
	public function index(){
        if ($this->session->userdata("bibliotheque")){
            $data['listeArchetype'] = $this->Archetype->getListeArchetypePerso($this->session->userdata("bibliotheque"));
        }
        else{
            $data['listeArchetype'] = $this->Archetype->getListeArchetype();
        }
        $this->load->view('header');
        $this->load->view('home_view', $data);        
        $this->load->view('footer');
	}
    
    public function creerArchetype(){
		$this->load->view('header');
		$this->load->view('creation_view');        
		$this->load->view('footer');
	}
    
    public function supprimerArchetype($nom){
        $this->Archetype->supprimerArchetype($nom);
        redirect('home', 'refresh');
    }
    
    public function finRencontre(){
        $this->session->unset_userdata('encounter');
        session_destroy();
        $data['listeArchetype'] = $this->Archetype->getListeArchetype();
        $this->load->view('header');
        $this->load->view('home_view', $data);        
        $this->load->view('footer');
    }
}

?>


