<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archetype extends CI_Model{
    
    public function __construct(){
        
    }
    
    function creerArchetype($carac, $id){
        $data = array();
        $path = './assets/json/bibliotheque'.$id.'.json'; 
        $jsonString = file_get_contents($path);
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
        file_put_contents($path, $newJsonString);        
    }
    
    function getListeArchetype(){
        $path = './assets/json/archetypes.json';
        $data = array();
        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);
        return $data;
    }

    function importerArchetype($archetype, $id){
        $data = array();
        $path = './assets/json/bibliotheque'.$id.'.json';       
        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);
        $data[$archetype] = $this->Archetype->getArchetypeListePublique($archetype);
        $newJsonString = json_encode($data);
        file_put_contents($path, $newJsonString);  
    }
    
    function getArchetype($nom, $id=""){
        $data = array();
        $res = array();
        $path = './assets/json/bibliotheque'.$id.'.json';       
        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);
        $res = $data[$nom];
        return $res;
    }
    
    function getArchetypeListePublique($nom){
        $data = array();
        $res = array();
        $path = './assets/json/archetypes.json';       
        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);
        $res = $data[$nom];
        return $res;
    }
    
    function supprimerArchetype($nom, $id){
        $data = array();
        $path = './assets/json/bibliotheque'.$id.'.json'; 
        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);
        unset($data[$nom]);
        $newJsonString = json_encode($data);
        file_put_contents($path, $newJsonString);  
    }
    
    public function supprimerBibliotheque($id){
        $path = './assets/json/bibliotheque'.$id.'.json'; 
        unlink($path);
    }
    
    function getListeArchetypePerso($id){
        $path = './assets/json/bibliotheque'.$id.'.json';
        $data = array();        
        if (file_exists($path)){
            $jsonString = file_get_contents($path);
            $data = json_decode($jsonString, true);
            return $data;
        }
        else{
            return "";   
        }
    }
}

?>