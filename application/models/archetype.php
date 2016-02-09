<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archetype extends CI_Model{
    
    public function __construct(){
        
    }
    
    /* ==================================================== */
    /* ==================== ARCHETYPES ==================== */
    /* ==================================================== */
    
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
                            "traits" => $carac["traits"],
                            "competences" => array(),
                            "pouvoirs" => array(),
                            "armes" => array()
                            );
        $newJsonString = json_encode($data, JSON_UNESCAPED_UNICODE);
        file_put_contents($path, $newJsonString);        
    }
    
    function modifierArchetype($carac, $nom_liste, $id){
        $data = array();
        $nom_liste = strtolower($nom_liste);
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
        $data[$id]["traits"] = $carac["traits"];
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
    
    function importerArchetype($archetype, $nom_liste){
        $data = array();
        $nom_liste = strtolower($nom_liste);
        $path = './assets/json/bibliotheque'.$nom_liste.'.json';       
        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);
        $data[$archetype] = $this->Archetype->getArchetypeListePublique($archetype);
        $newJsonString = json_encode($data);
        file_put_contents($path, $newJsonString);  
    }
    
    function getArchetype($nom, $nom_liste=""){
        $data = array();
        $res = array();
        $nom_liste = strtolower($nom_liste);
        $path = './assets/json/bibliotheque'.$nom_liste.'.json';       
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
    
    function supprimerArchetype($nom, $nom_liste){
        $data = array();
        $nom_liste = strtolower($nom_liste);
        $path = './assets/json/bibliotheque'.$nom_liste.'.json'; 
        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);
        unset($data[$nom]);
        $newJsonString = json_encode($data);
        file_put_contents($path, $newJsonString);  
    }
    
    public function supprimerBibliotheque($nom_liste){
        $nom_liste = strtolower($nom_liste);
        $path = './assets/json/bibliotheque'.$nom_liste.'.json'; 
        unlink($path);
    }
    
    function getListeArchetypePerso($nom_liste){
        $nom_liste = strtolower($nom_liste);
        $path = './assets/json/bibliotheque'.$nom_liste.'.json';
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
    
    /* ===================================================== */
    /* ==================== Compétences ==================== */
    /* ===================================================== */
    
    function ajoutCompetence($comp, $desc, $nom_liste, $id){
        $data = array();
        $path = './assets/json/bibliotheque'.$nom_liste.'.json'; 
        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);
        $data[$id]["competences"][$comp] = $desc;
        $newJsonString = json_encode($data, JSON_UNESCAPED_UNICODE);
        file_put_contents($path, $newJsonString); 
    }
    
    function getCompList(){
        $data = array();
        $path = './assets/json/competences_list.json'; 
        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);
        return $data;
    }
    
    /* ===================================================== */
    /* ==================== Pouvoirs ==================== */
    /* ===================================================== */
    
    function ajoutPouvoir($pp, $desc, $nom_liste, $id){
        $data = array();
        $path = './assets/json/bibliotheque'.$nom_liste.'.json'; 
        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);
        $data[$id]["pouvoirs"][$pp] = $desc;
        $newJsonString = json_encode($data, JSON_UNESCAPED_UNICODE);
        file_put_contents($path, $newJsonString); 
    }
    
    /* =============================================== */
    /* ==================== Armes ==================== */
    /* =============================================== */
    
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
    
    /* =============================================== */
    /* ==================== Tools ==================== */
    /* =============================================== */
    
    function splitJsonArray($path, $path1, $path2){
        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);
        $JsonString1 = json_encode(array_keys($data), JSON_UNESCAPED_UNICODE);
        $JsonString2 = json_encode(array_values($data), JSON_UNESCAPED_UNICODE);
        file_put_contents($path1, $JsonString1);        
        file_put_contents($path2, $JsonString2);        
    }
}

?>