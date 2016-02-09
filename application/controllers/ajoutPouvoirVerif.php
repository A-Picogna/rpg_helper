<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ajoutPouvoirVerif extends CI_Controller {
    
    function __construct(){
        parent::__construct();
    }
   
    function index(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('pouvoir', 'Pouvoir', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|max_length[200]');

        if($this->form_validation->run() == FALSE){
            $data['listeArchetype'] = $this->Archetype->getListeArchetypePerso($this->session->userdata("bibliotheque"));
            $data['listeTalents'] = $this->Talent->getListeTalents();
            $this->load->view('header');
            $this->load->view('home_view', $data); 
            $this->load->view('footer');
        }
        else{   
            $pp = $this->input->post('pouvoir');
            $desc = $this->input->post('description');      
            $this->Archetype->ajoutPouvoir($pp, $desc, $this->session->userdata("bibliotheque"), $this->input->post('id'));
            redirect('home', 'refresh');
        }
    }
}
?>