<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class modificationVerif extends CI_Controller {
    
    function __construct(){
        parent::__construct();
    }
   
    function index(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nom', 'Nom', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('CC', 'CC', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('CT', 'CT', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('F', 'Force', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('E', 'Endurance', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('Ag', 'Agilite', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('Per', 'Perception', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('Int', 'Intelligence', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('FM', 'Force Mentale', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('Soc', 'Sociabilite', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('PA_tete', 'Armure tête', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('PA_bd', 'Armure bras droit', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('PA_bg', 'Armure bras gauche', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('PA_corps', 'Armure corps', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('PA_jd', 'Armure jambe droite', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('PA_jg', 'Armure jambe gauche', 'trim|required|numeric|integer|greater_than[-1]|less_than[101]');
        $this->form_validation->set_rules('PV', 'Points de blessures', 'trim|required|numeric|integer|greater_than[0]');

        if($this->form_validation->run() == FALSE){
            $this->load->view('header');
            $data['listeTalents'] = $this->Talent->getListeTalents();
            $this->load->view('creation_view', $data);
            $this->load->view('footer');
        }
        else{              
            $talents = array();
            $traits = array();
            if(!empty($this->input->post('talents'))){
                foreach($this->input->post('talents') as $val){
                    array_push($talents, $val);
                }
            }
            if(!empty($this->input->post('traits'))){
                foreach($this->input->post('traits') as $val){
                    array_push($traits, $val);
                }
            }
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
                            "FS" => $this->input->post('FS'),
                            "talents" => $talents,                         
                            "traits" => $traits
                           );        
            $this->Archetype->modifierArchetype($tab, $this->session->userdata("bibliotheque"), $this->input->post('id'));
            redirect('home', 'refresh');
        }
    }
}
?>