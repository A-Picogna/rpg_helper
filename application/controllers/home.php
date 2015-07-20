<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        
    }
    
	public function index(){
        if ($this->session->userdata("bibliotheque")){
            if (!file_exists('./assets/json/bibliotheque'.$this->session->userdata("bibliotheque").'.json')){
                $this->session->unset_userdata("bibliotheque");
                $data['listeArchetype'] = $this->Archetype->getListeArchetype();
                $this->load->view('header');
                $this->load->view('home_view_default', $data); 
            }
            else{
                $data['listeArchetype'] = $this->Archetype->getListeArchetypePerso($this->session->userdata("bibliotheque"));
                $this->load->view('header');
                $this->load->view('home_view', $data); 
            }
        }
        else{
            $data['listeArchetype'] = $this->Archetype->getListeArchetype();
            $this->load->view('header');
            $this->load->view('home_view_default', $data); 
        }       
        $this->load->view('footer');
	}

    
    public function finRencontre(){
        $this->session->unset_userdata('encounter');
        redirect('home', 'refresh');
    }
}

?>


