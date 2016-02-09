<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestionListe extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        if (!$this->session->userdata("bibliotheque")){
            redirect('home', 'refresh');
        }
    }    
	public function index(){
        $data['listeArchetype'] = $this->Archetype->getListeArchetype();
        $this->load->view('header');
        $this->load->view('gestionListe_view', $data);        
        $this->load->view('footer');
	}
        
    public function creerArchetype(){
		$this->load->view('header');
        $data['listeTalents'] = $this->Talent->getListeTalents();
        $data['listeTraits'] = $this->Talent->getListeTraits();
		$this->load->view('creation_view', $data);
		$this->load->view('footer');
	}
    
    public function supprimerArchetype($nom){
        $this->Archetype->supprimerArchetype($nom, $this->session->userdata("bibliotheque"));
        redirect('home', 'refresh');
    }
    
    public function supprimerBibliotheque(){
        $this->Archetype->supprimerBibliotheque($this->session->userdata("bibliotheque"));
        redirect('home', 'refresh');
    }
    
	public function addListePerso($archetype){
        $this->Archetype->importerArchetype($archetype, $this->session->userdata("bibliotheque"));
        redirect('home', 'refresh');
	}
    
    
}

?>


