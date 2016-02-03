<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Talent extends CI_Model{
    
    public function __construct(){
        
    }
    
    function getListeTalents(){
        $path = './assets/json/talents_list.json';
        $data = array();
        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);
        return $data;
    }
    
    function getListeTalentsDesc(){
        $path = './assets/json/talents_desc.json';
        $data = array();
        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);
        return $data;
    }
    
    function getTalent($nom){
        $data = array();
        $res = array();
        $path = './assets/json/talents_list.json';     
        $jsonString = file_get_contents($path);
        $data = json_decode($jsonString, true);
        $res = $data[$nom];
        return $res;
    }
    
}

?>