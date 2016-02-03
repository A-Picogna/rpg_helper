<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ajoutArmeVerif extends CI_Controller {
    
    function __construct(){
        parent::__construct();
    }
   
    function index(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nomArme', 'Nom de l\'arme', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('groupe', 'Groupe', 'trim|required|max_length[20]');
        $this->form_validation->set_rules('degats', 'Dégats', 'trim|required|max_length[20]');
        $this->form_validation->set_rules('type', 'Type', 'trim|required|max_length[20]');
        $this->form_validation->set_rules('pen', 'Pénétration', 'trim|required|max_length[20]');
        $this->form_validation->set_rules('portee', 'Portée', 'trim|required|max_length[20]');
        $this->form_validation->set_rules('mode', 'Mode', 'trim|required|max_length[20]');
        $this->form_validation->set_rules('AT', 'AT', 'trim|required|max_length[20]');
        $this->form_validation->set_rules('rch', 'Rechargement', 'trim|required|max_length[20]');
        $this->form_validation->set_rules('attributs', 'Attributs', 'trim|required|max_length[50]');

        if($this->form_validation->run() == FALSE){
            $data['listeArchetype'] = $this->Archetype->getListeArchetypePerso($this->session->userdata("bibliotheque"));
            $data['listeTalents'] = $this->Talent->getListeTalents();
            $this->load->view('header');
            $this->load->view('home_view', $data); 
            $this->load->view('footer');
        }
        else{    
            $tab = array(   "nomArme" => $this->input->post('nomArme'),
                            "groupe" => $this->input->post('groupe'),
                            "degats" => $this->input->post('degats'),
                            "type" => $this->input->post('type'),
                            "pen" => $this->input->post('pen'),
                            "portee" => $this->input->post('portee'),
                            "mode" => $this->input->post('mode'),
                            "AT" => $this->input->post('AT'),
                            "rch" => $this->input->post('rch'),
                            "attributs" => $this->input->post('attributs'),
                           );        
            $this->Archetype->ajoutArme($tab, $this->session->userdata("bibliotheque"), $this->input->post('id'));
            redirect('home', 'refresh');
        }
    }
}
?>