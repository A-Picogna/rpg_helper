<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encounter extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        session_start();
    }
    
	public function index(){
        $listeNom = $this->Archetype->getListeArchetype();
        $listeCombat = array();
        foreach ($listeNom as $key => $val){
            if (($this->input->post($key) != null) && $this->input->post($key) > 0){
                $listeCombat[$key] = $this->Archetype->getArchetype($key);
                $listeCombat[$key]["nbGen"] = $this->input->post($key);
            }
        }
        
        if (empty($listeCombat)){
            redirect('home','refresh');
        }
        else{
            $this->session->set_userdata('encounter', $listeCombat);
            $data['listeEncounter'] = $listeCombat;
            $this->load->view('header');
            $this->load->view('encounter_view', $data);        
            $this->load->view('footer');
        }
	}
}

?>