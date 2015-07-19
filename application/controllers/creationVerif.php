<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CreationVerif extends CI_Controller {
    
    function __construct(){
        parent::__construct();
    }
   
    function index(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nom', 'nom_archetype', 'trim|required|max_length[100]|alpha_dash');
        $this->form_validation->set_rules('CC', 'capacite_combat', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('CT', 'capacite_tir', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('F', 'force', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('E', 'encdurance', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('Ag', 'agilite', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('Per', 'perception', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('Int', 'intelligence', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('FM', 'force_mentale', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('Soc', 'sociabilite', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('PA_tete', 'armure_tete', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('PA_bd', 'armure_bras_droit', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('PA_bg', 'armure_bras_gauche', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('PA_corps', 'armure_corps', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('PA_jd', 'armure_jambe_droite', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('PA_jg', 'armure_jambe_gauche', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('PV', 'blessure', 'trim|required|numeric|integer|greater_than[0]');

        if($this->form_validation->run() == FALSE){
            $this->load->view('header');
            $this->load->view('creation_view');
            $this->load->view('footer');
        }
        else{           
            $tab = array(   "nom" => $this->input->post('nom'),
                            "CC" => $this->input->post('CC'),
                            "CT" => $this->input->post('CT'),
                            "F" => $this->input->post('F'),
                            "E" => $this->input->post('E'),
                            "Ag" => $this->input->post('Ag'),
                            "Per" => $this->input->post('Per'),
                            "Int" => $this->input->post('Int'),
                            "FM" => $this->input->post('FM'),
                            "Soc" => $this->input->post('Soc'),
                            "PV" => $this->input->post('PV'),
                            "PA_tete" => $this->input->post('PA_tete'),
                            "PA_bd" =>$this->input->post('PA_bd'),
                            "PA_bg" => $this->input->post('PA_bg'),
                            "PA_corps" => $this->input->post('PA_corps'),
                            "PA_jd" => $this->input->post('PA_jd'),
                            "PA_jg" => $this->input->post('PA_jg'),
                            "typeA" => $this->input->post('typeA'),
                            "ES" => $this->input->post('ES'),
                            "FS" => $this->input->post('FS')
                           );        
            $this->Archetype->creerArchetype($tab, $this->session->userdata("bibliotheque"));
            redirect('home', 'refresh');
        }
    }
}
?>