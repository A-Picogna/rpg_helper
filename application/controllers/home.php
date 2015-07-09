<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    function __construct(){
        parent::__construct();
    }
    
	public function index(){
        session_destroy();
        $data['listeArchetype'] = $this->Personnage->getListeArchetype();
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
        $this->Personnage->supprimerArchetype($nom);
        redirect('home', 'refresh');
    }
}

?>


