<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personnage extends CI_Model{
    
    public function __construct(){
        
    }
    
    function creerPersonnage($carac){
        $data = array();
        $jsonString = file_get_contents('archetypes.json');
        $data = json_decode($jsonString, true);
        $tmp = $carac['nom'];
        $data[$tmp] = array(    "nom" => $carac["nom"],
                                "CC" => $carac["CC"],
                                "CT" => $carac["CT"],
                                "F" => $carac["F"],
                                "E" => $carac["E"],
                                "Ag" => $carac["Ag"],
                                "Per" => $carac["Per"],
                                "Int" => $carac["Int"],
                                "FM" => $carac["FM"],
                                "Soc" => $carac["Soc"],
                                "PV" => $carac["PV"],
                                "PA_tete" => $carac["PA_tete"],
                                "PA_bd" => $carac["PA_bd"],
                                "PA_bg" => $carac["PA_bg"],
                                "PA_corps" => $carac["PA_corps"],
                                "PA_jd" => $carac["PA_jd"],
                                "PA_jg" => $carac["PA_jg"],
                                "typeA" => $carac["typeA"],
                                "ES" => $carac["ES"],
                                "FS" => $carac["FS"]
                               );
        $newJsonString = json_encode($data);
        file_put_contents('archetypes.json', $newJsonString);        
    }
    
    function getListeArchetype(){
        $data = array();
        $jsonString = file_get_contents('archetypes.json');
        $data = json_decode($jsonString, true);
        return $data;
    }
    
    function getArchetype($nom){
        $data = array();
        $res = array();
        $jsonString = file_get_contents('archetypes.json');
        $data = json_decode($jsonString, true);
        $res = $data[$nom];
        return $res;
    }
    
    function supprimerArchetype($nom){
        $data = array();
        $jsonString = file_get_contents('archetypes.json');
        $data = json_decode($jsonString, true);
        unset($data[$nom]);
        $newJsonString = json_encode($data);
        file_put_contents('archetypes.json', $newJsonString);  
    }
}

?>