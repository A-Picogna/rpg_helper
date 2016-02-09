<div class="row">
    <h1 class="titre">Rencontre</h1>
<?php
$idPerso = 0;
$listePersonnages = array();
foreach ($listeEncounter as $l){
    echo '
    <div class="row">
        <div class="col-xs-12">
            <h2 align=center>'.str_replace('_', ' ', $l['nom']).'</h2>
        </div> 
        <div class="gras col-xs-3 col-xs-offset-2">
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge alert-success">'.$l['CC'].'</span>
                    Capacité de Combat
                </li>
                <li class="list-group-item">
                    <span class="badge alert-success">'.$l['CT'].'</span>
                    Capacité de Tir
                </li>
                <li class="list-group-item">
                    <span class="badge alert-success">';
    if ($l["typeA"] == "nrj")
        echo ($l['F']+20);
    else
        echo $l['F'];
                    echo '</span>
                    Force
                </li>
                <li class="list-group-item">
                    <span class="badge alert-success">'.$l['E'].'</span>
                    Endurance
                </li>
                <li class="list-group-item">
                    <span class="badge alert-success">'.$l['Ag'].'</span>
                    Agilité
                </li>
                <li class="list-group-item">
                    <span class="badge alert-success">'.$l['Int'].'</span>
                    Intélligence
                </li>
                <li class="list-group-item">
                    <span class="badge alert-success">'.$l['Per'].'</span>
                    Percéption
                </li>
                <li class="list-group-item">
                    <span class="badge alert-success">'.$l['FM'].'</span>
                    Force Mentale
                </li>
                <li class="list-group-item">
                    <span class="badge alert-success">'.$l['Soc'].'</span>
                    Sociabilité
                </li>
            </ul>
        </div>        
            <div class="armor col-xs-4 col-xs-offset-1">               
                <div class="row">
                    <div class="col-xs-4">
                    </div>     
                    <div class="well col-xs-4">
                        TETE <p class="text-armor">'.$l["PA_tete"].'</p>
                        <p class="text-armor-type">type : '.$l["typeA"].'</p>
                    </div>     
                    <div class="col-xs-4">
                    </div>
                </div>        
                <div class="row">            
                    <div class="well col-xs-4">
                        BRAS DROIT <p class="text-armor">'.$l["PA_bd"].'</p>
                        <p class="text-armor-type">type : '.$l["typeA"].'</p>
                    </div>     
                    <div class="col-xs-4">
                    </div>     
                    <div class="well col-xs-4">
                        BRAS GAUCHE <p class="text-armor">'.$l["PA_bg"].'</p>
                        <p class="text-armor-type">type : '.$l["typeA"].'</p>
                    </div>     
                </div>  
                <div class="row">         
                    <div class="col-xs-4">
                    </div>     
                    <div class="well col-xs-4">
                        CORPS <p class="text-armor">'.$l["PA_corps"].'</p>
                        <p class="text-armor-type">type : '.$l["typeA"].'</p>
                    </div>     
                    <div class="col-xs-4">
                    </div>     
                </div>    
                <div class="row">
                    <div class="well col-xs-4">
                        JAMBE DROITE <p class="text-armor">'.$l["PA_jd"].'</p>
                        <p class="text-armor-type">type : '.$l["typeA"].'</p>
                    </div>     
                    <div class="col-xs-4">
                        </br>
                        <span class="label label-danger">B.E : '.floor(($l['E']/10))*($l['ES']).'</span>
                        </br>
                        </br>
                        <span class="label label-danger">B.F : '.floor(($l['F']/10))*($l['FS']).'</span>
                    </div>     
                    <div class="well col-xs-4">
                        JAMBE GAUCHE <p class="text-armor">'.$l["PA_jg"].'</p>
                        <p class="text-armor-type">type : '.$l["typeA"].'</p>
                    </div>  
                </div> 
                <div class="row">    
                </div> 
            </div>     
        </div>     
    </div>  
    <div class="row">
        <div class="col-xs-5 col-xs-offset-1">  
            <div class="panel-group">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#talents">Traits/Talents</a>
                        </h4>
                    </div>
                    <div id="talents" class="panel-collapse collapse in">
                        <ul class="list-group">';
        if (!empty($l["talents"])){
            foreach($l["talents"] as $val){ 
                echo '          <li class="list-group-item" data-toggle="tooltip" data-placement="top" title="'.$descriptionTalents[$val].'">'.$listeTalents[$val].'</li>';
            }
        }
        if (!empty($l["traits"])){
            foreach($l["traits"] as $val){ 
                echo '          <li class="list-group-item" data-toggle="tooltip" data-placement="top" title="'.$descriptionTraits[$val].'">'.$listeTraits[$val].'</li>';
            }
        }
        echo '
                        </ul> 
                    </div>
                </div>
            </div>
        </div>  
        <div class="col-xs-5">  
            <div class="panel-group">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#competences">Compétences - Notes</a>
                        </h4>
                    </div>
                    <div id="competences" class="panel-collapse collapse in">
                        <ul class="list-group">';
        if (!empty($l["competences"])){
            foreach($l["competences"] as $key=>$val){ 
                echo '          <li class="list-group-item" data-toggle="tooltip" data-placement="top" title="'.$val.'">'.$key.'</li>';
            }
        }
        echo '
                        </ul> 
                    </div>
                </div>
            </div>
        </div>  
    </div>  
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1"> 
            <table class="table table-bordered">            
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Groupe</th>
                        <th>Dégats</th>
                        <th>Type</th>
                        <th>Pén</th>
                        <th>Portée</th>
                        <th>Mode</th>
                        <th>AT</th>
                        <th>Rch</th>
                        <th>Attributs</th>
                    </tr>
                </thead>
                <tbody>';
        if (!empty($l["armes"])){
            foreach($l["armes"] as $val){ 
                echo '   
                    <tr>                 
                        <td>'.$val["nomArme"].'</td>
                        <td>'.$val["groupe"].'</td>
                        <td>'.$val["degats"].'</td>
                        <td>'.$val["type"].'</td>
                        <td>'.$val["pen"].'</td>
                        <td>'.$val["portee"].'</td>
                        <td>'.$val["mode"].'</td>
                        <td>'.$val["AT"].'</td>
                        <td>'.$val["rch"].'</td>
                        <td>'.$val["attributs"].'</td>
                    </tr>
                    ';
            }
        }
        echo ' 
                </tbody>
            </table>
        </div>
    </div>  
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <div class="CSSTableGenerator">
                <table class="creatureTable">
                    <tr>
                        <td>N° Mob</td>
                        <td>Pv</td>
                        <td>Degats</td>
                    </tr>';
        for($i = 1 ; $i <= $l['nbGen'] ; $i++){
            $idPerso++;
            echo '
                        <tr id="'.$idPerso.'">
                            <td>'.$idPerso.'</td>
                            <td name="pv" class="gras">'.$l['PV'].'</td>
                            <td><input type="number" class="form-control" name="dmg" value="0" min="-100" max="200"></td>
                        </tr>';
            $listePersonnages[$idPerso] = array( 'BF' => floor($l['F']/10)*$l['FS'], 
                                                'BE' => floor($l['E']/10)*$l['ES'], 
                                                'PV_restants' => $l['PV'],
                                                'PV_max' => $l['PV'],
                                                "PA_tete" => $l["PA_tete"], 
                                                "PA_bd" => $l["PA_bd"],
                                                "PA_bg" => $l["PA_bg"],
                                                "PA_corps" => $l["PA_corps"],
                                                "PA_jd" => $l["PA_jd"],
                                                "PA_jg" => $l["PA_jg"],
                                                "typeA" => $l["typeA"]
                                              ); 
        }
        echo '
                </table>
            </div>
        </div>
    </div>';
}
$listePersonnages = json_encode($listePersonnages);
?>
</div>
<a href="<?php echo base_url().'index.php/home/finRencontre'; ?>"><button class="btn btn-lg btn-danger pull-right">Fin de la rencontre</button></a>
<button class="btn btn-lg btn-success" onClick="majPV()">Calculs</button>
            
<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
function majPV(){
    <?php echo "var nbPerso = $idPerso;";?>
    <?php echo "var tabPerso = $listePersonnages;"; ?>
    for (i = 1; i <= nbPerso ; i++){
        // on récupere les valeurs
        dmg = $("#"+i+" input[name='dmg'] ").val();
        pv = $("#"+i+" td[name='pv']").text();
        perso = tabPerso[i];
        pv_max = perso["PV_max"];
        pv = pv - dmg;
        if (pv > pv_max){
            pv = pv_max;                    
        }
        // On met les nouvelles valeurs
        $("#"+i+" td[name='pv']").text(pv);
        if (pv < 0){
            $("#"+i+" td[name='pv']").css({"color":"red"});
        }
        else{
            $("#"+i+" td[name='pv']").css({"color":"black"});
        }
        $("#"+i+" input[name='dmg'] ").val(0);
    }
}

</script>