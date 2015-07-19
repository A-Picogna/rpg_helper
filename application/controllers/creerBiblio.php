<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CreerBiblio extends CI_Controller {
    
    function __construct(){
        parent::__construct();
    }
   
    function index(){
        $this->form_validation->set_rules('identifiant', 'Identifiant', 'trim|required|max_length[100]|alpha_dash|callback_creerListe');

        if($this->form_validation->run() == FALSE){
            $this->load->view('header');
            $this->load->view('home_view');
            $this->load->view('footer');
        }
        else{
            redirect('home', 'refresh');
        }
    }
    
    function creerListe(){
        $id = $this->input->post('identifiant');
        $choix = $this->input->post('choixListe');        
        $path = './assets/json/bibliotheque'.$id.'.json';
        if (!file_exists($path)){
            write_file($path , "");
            $this->session->unset_userdata('bibliotheque');
            $this->session->set_userdata('bibliotheque', $id);
            if ($choix == 1){
                file_put_contents($path, file_get_contents('./assets/json/archetypes.json'));
            }
            return true;
        }
        else{
            $this->form_validation->set_message('creerListe', 'Ce nom existe déjà');
            return false;
        }
    }
    
    
}
?>