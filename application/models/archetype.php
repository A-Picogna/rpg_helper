<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archetype extends CI_Model{
    
    public function __construct(){
        
    }
    
    function creerArchetype($carac, $nom_liste){
        $data = array();
        $path = './assets/json/bibliotheque'.$nom_liste.'.json'; 
        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);
        $id = uniqid();
        $data[$id] = array  ( 
                            "nom" => $carac["nom"],
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
                            "FS" => $carac["FS"],
                            "talents" => $carac["talents"],
                            "competences" => array(),
                            "armes" => array()
                            );
        $newJsonString = json_encode($data, JSON_UNESCAPED_UNICODE);
        file_put_contents($path, $newJsonString);        
    }
    
    function modifierArchetype($carac, $nom_liste, $id){
        $data = array();
        $path = './assets/json/bibliotheque'.$nom_liste.'.json'; 
        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);
        $data[$id]["nom"] = $carac["nom"];
        $data[$id]["CC"] = $carac["CC"];
        $data[$id]["CT"] = $carac["CT"];
        $data[$id]["F"] = $carac["F"];
        $data[$id]["E"] = $carac["E"];
        $data[$id]["Ag"] = $carac["Ag"];
        $data[$id]["Per"] = $carac["Per"];
        $data[$id]["Int"] = $carac["Int"];
        $data[$id]["FM"] = $carac["FM"];
        $data[$id]["Soc"] = $carac["Soc"];
        $data[$id]["PV"] = $carac["PV"];
        $data[$id]["PA_tete"] = $carac["PA_tete"];
        $data[$id]["PA_bd"] = $carac["PA_bd"];
        $data[$id]["PA_bg"] = $carac["PA_bg"];
        $data[$id]["PA_corps"] = $carac["PA_corps"];
        $data[$id]["PA_jd"] = $carac["PA_jd"];
        $data[$id]["typeA"] = $carac["typeA"];
        $data[$id]["ES"] = $carac["ES"];
        $data[$id]["FS"] = $carac["FS"];
        $data[$id]["talents"] = $carac["talents"];
        $newJsonString = json_encode($data, JSON_UNESCAPED_UNICODE);
        file_put_contents($path, $newJsonString);        
    }
    
    
    function getListeTalents(){
        $path = './assets/json/talents.json';
        $data = array();
        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);
        return $data;
    }
    
    function ajoutCompetence($competence, $nom_liste, $id){
        $data = array();
        $path = './assets/json/bibliotheque'.$nom_liste.'.json'; 
        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);
        array_push($data[$id]["competences"], $competence);
        $newJsonString = json_encode($data, JSON_UNESCAPED_UNICODE);
        file_put_contents($path, $newJsonString); 
    }
    
    function ajoutArme($arme, $nom_liste, $id){
        $data = array();
        $path = './assets/json/bibliotheque'.$nom_liste.'.json'; 
        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);
        $tab = array(   "nomArme" => $arme["nomArme"],
                                        "groupe" => $arme["groupe"],
                                        "degats" => $arme["degats"],
                                        "type" => $arme["type"],
                                        "pen" => $arme["pen"],
                                        "portee" => $arme["portee"],
                                        "mode" => $arme["mode"],
                                        "AT" => $arme["AT"],
                                        "rch" => $arme["rch"],
                                        "attributs" => $arme["attributs"]
                                    );        
        $data[$id]["armes"][uniqid()] = $tab;
        $newJsonString = json_encode($data, JSON_UNESCAPED_UNICODE);
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