<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        
    }
    
	public function index(){
        /*
        $this->load->view('header');
        $path = './assets/json/talents.json';
        $tab = array();
        $tab["Maître d'arme"] = "Peut relancer un test de CC raté";
        $tab["Attaque rapide"] = "Attaque deux fois au moyen d'une action complète";
        file_put_contents($path, json_encode($tab, JSON_UNESCAPED_UNICODE));        
        
        $data = array();
        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);
        print_r($data);
        
        $this->load->view('footer');
        */
    }
}

?>


