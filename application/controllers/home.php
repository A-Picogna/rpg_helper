<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        
    }
    
	public function index(){
        //$this->Archetype->splitJsonArray("./assets/json/talents_old(do not delete).json","./assets/json/talents_list.json","./assets/json/talents_desc.json");
        //$this->Archetype->splitJsonArray("traits_old(do not delete)","traits_list","traits_desc");
        if ($this->session->userdata("bibliotheque")){
            if (!file_exists('./assets/json/bibliotheque'.$this->session->userdata("bibliotheque").'.json')){
                $this->session->unset_userdata("bibliotheque");
                $data['listeArchetype'] = $this->Archetype->getListeArchetype();
                $this->load->view('header');
                $this->load->view('home_view_default', $data); 
            }
            else{
                $data['listeArchetype'] = $this->Archetype->getListeArchetypePerso($this->session->userdata("bibliotheque"));
                $data['listeTalents'] = $this->Talent->getListeTalents();
                $data['listeTraits'] = $this->Talent->getListeTraits();
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


