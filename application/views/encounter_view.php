<div class="row">
    <h1 class="titre">Rencontre</h1>
<?php
$idPerso = 0;
$listePersonnages = array();
foreach ($listeEncounter as $l){
    echo '
    <div class="col-xs-12">
        <div class="CSSTableGenerator_2">
            <table class="">
                    <tr>
                        <td>Nom de l\'archetype</td>
                        <td>CC</td>
                        <td>CT</td>
                        <td>F</td>
                        <td>E</td>
                        <td>Ag</td>
                        <td>Int</td>
                        <td>Per</td>
                        <td>FM</td>
                        <td>Soc</td>
                        <td>BF</td>
                        <td>BE</td>
                    </tr>
                    <tr>
                        <td>'.str_replace('_', ' ', $l['nom']).'</td>
                        <td>'.$l['CC'].'</td>
                        <td>'.$l['CT'].'</td>
                        <td>'.$l['F'].'</td>
                        <td>'.$l['E'].'</td>
                        <td>'.$l['Ag'].'</td>
                        <td>'.$l['Int'].'</td>
                        <td>'.$l['Per'].'</td>
                        <td>'.$l['FM'].'</td>
                        <td>'.$l['Soc'].'</td>
                        <td>'.floor(($l['F']/10)*($l['FS'])).'</td>
                        <td>'.floor(($l['E']/10)*($l['ES'])).'</td>
                    </tr>
            </table>  
        </div>     
    </div>          
    <div class="col-xs-10 col-xs-offset-1">
        <div class="CSSTableGenerator">
            <table class="creatureTable">
                <tr>
                    <td>N° creature</td>
                    <td>Pv</td>
                    <td>Degats infligés</td>
                    <td>Pénération</td>
                    <td>Loca</td>
                    <td>Type Arme</td>
                    <td>Bilan</td>
                </tr>';
    for($i = 1 ; $i <= $l['nbGen'] ; $i++){
        $idPerso++;
        echo '
                    <tr id="'.$idPerso.'">
                        <td>'.$idPerso.'</td>
                        <td name="pv" class="gras">'.$l['PV'].'</td>
                        <td><input type="number" class="form-control" name="dmg" value="0" min="-100" max="200"></td>
                        <td><input type="number" class="form-control" name="pen" value="0" min="0" max="200"></td>
                        <td>
                            <select name="loca" class = "form-control">
                                <option value="PA_corps">Corps</option>
                                <option value="PA_tete">Tete</option>
                                <option value="PA_bd">Bras droit</option>
                                <option value="PA_bg">Bras gauche</option>
                                <option value="PA_jd">Jambe droite</option>
                                <option value="PA_jg">Jambe gauche</option>
                            </select>
                        </td>
                        <td>
                            <select name="typeArme" class = "form-control">
                                <option value="normaux">Normaux</option>
                                <option value="primitifs">Primitifs</option>
                            </select>
                        </td>
                        <td><p name="info" style="vertical-align:middle; display: inline;"></p></td>
                    </tr>';
        $listePersonnages[$idPerso] = array( 'BF' => floor(($l['F']/10)*($l['FS'])), 
                                            'BE' => floor(($l['E']/10)*($l['ES'])), 
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
    </div>';
}
$listePersonnages = json_encode($listePersonnages);
?>
</div>
<a href="<?php echo base_url().'index.php/home/finRencontre'; ?>"><button class="btn btn-lg btn-danger pull-right">Fin de la rencontre</button></a>
<button class="btn btn-lg btn-success" onClick="majPV()">Calculs</button>
            
<script type="text/javascript">
function majPV(){
    <?php echo "var nbPerso = $idPerso;";?>
    <?php echo "var tabPerso = $listePersonnages;"; ?>
    for (i = 1; i <= nbPerso ; i++){
        // on récupere les valeurs
        dmg = $("#"+i+" input[name='dmg'] ").val();
        $("#"+i+" p[name='info'] ").text("");
        pv = $("#"+i+" td[name='pv']").text();
        loca = $("#"+i+" select[name='loca'] ").val();
        pen = $("#"+i+" input[name='pen'] ").val();
        typeArme = $("#"+i+" select[name='typeArme'] ").val();
        perso = tabPerso[i];
        // si les degats sont positifs, on traite les degats sinon on considere qu'il s'agit d'un soin
        if (dmg > 0){
            
            if (typeArme === "primitifs"){
                if (perso["typeA"] !== "primitifs"){
                    armure_effective = (perso[loca]*2) - (pen);
                }
                else{
                    armure_effective = (perso[loca]) - (pen);
                }
            }
            else{
                if (perso["typeA"] === "primitifs"){
                    armure_effective = (Math.round(perso[loca]/2)) - (pen);
                }
                else{
                    armure_effective = (perso[loca]) - (pen);
                }
            }   
            if (armure_effective < 0){armure_effective = 0;}
            BE = perso["BE"];
            degats_effectifs = (dmg - (armure_effective + BE));
            if (degats_effectifs < 0){degats_effectifs = 0;}
            pv = pv - degats_effectifs;
            $("#"+i+" p[name='info'] ").text(degats_effectifs+" dmg subits ("+dmg+" reduits par "+armure_effective+" PA et "+BE+" BE)");
        }
        else{
            if (dmg < 0){
                pv = pv - dmg;
                pv_max = perso["PV_max"];
                if (pv > pv_max){
                    soin = (-dmg) - (pv - pv_max);
                    pv = pv_max;                    
                }
                else{
                    soin = (-dmg);
                }
                $("#"+i+" p[name='info'] ").text("Cible soignée de "+(soin)+" (maximum : "+pv_max+")");
            }
        }
        // On met les nouvelles valeurs
        $("#"+i+" td[name='pv']").text(pv);
        if (pv < 0){
            $("#"+i+" td[name='pv']").css({"color":"red"});
        }
        else{
            $("#"+i+" td[name='pv']").css({"color":"black"});
        }                
        $("#"+i+" select[name='loca'] ").val("PA_corps");
        $("#"+i+" input[name='pen'] ").val(0);
        $("#"+i+" input[name='dmg'] ").val(0);
    }
}

</script>