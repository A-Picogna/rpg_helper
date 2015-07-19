<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ChargerBiblio extends CI_Controller {
    
    function __construct(){
        parent::__construct();
    }
   
    function index(){
        $this->form_validation->set_rules('identifiant', 'Identifiant', 'trim|required|max_length[100]|alpha_dash|callback_chargerListe');

        if($this->form_validation->run() == FALSE){
            $this->load->view('header');
            $this->load->view('home_view');
            $this->load->view('footer');
        }
        else{
            redirect('home', 'refresh');
        }
    }
    
    function chargerListe(){
        $id = $this->input->post('identifiant');      
        $path = './assets/json/bibliotheque_'.$id.'.json';
        if (file_exists($path)){
            $this->session->unset_userdata("bibliotheque");
            $this->session->set_userdata("bibliotheque", $id);
            return true;
        }
        else{
            $this->form_validation->set_message('chargerListe', 'Cette liste n\'existe pas');
            return false;
        }
    }
    
    
}
?>