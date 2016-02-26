<script>
    
    $(document).ready( function () {
        $('#table_id').DataTable({
            paging: false,
            "autoWidth": false,
            "searching": false,
            responsive: true
        });
    } );
    $(function(){$(".tooltip-link").tooltip();});
    $(document).ready(function(){
        var user_data;
        $('.my_button').click(function(){
            <?php
            $liste = json_encode($listeArchetype);
            echo "user_data = $liste;";
            ?>
            var user_index = ($(this).val());
            user_data = user_data[user_index];
            $("input[name='id']").val($(this).val());
            $("input[name='nom']").val(user_data["nom"]);
            $("input[name='CC']").val(user_data["CC"]);
            $("input[name='CT']").val(user_data["CT"]);
            $("input[name='F']").val(user_data["F"]);
            $("input[name='E']").val(user_data["E"]);
            $("input[name='Ag']").val(user_data["Ag"]);
            $("input[name='Per']").val(user_data["Per"]);
            $("input[name='Int']").val(user_data["Int"]);
            $("input[name='FM']").val(user_data["FM"]);
            $("input[name='Soc']").val(user_data["Soc"]);
            $("input[name='PV']").val(user_data["PV"]);
            $("input[name='PA_tete']").val(user_data["PA_tete"]);
            $("input[name='PA_bd']").val(user_data["PA_bd"]);
            $("input[name='PA_bg']").val(user_data["PA_bg"]);
            $("input[name='PA_corps']").val(user_data["PA_corps"]);
            $("input[name='PA_jd']").val(user_data["PA_jd"]);
            $("input[name='PA_jg']").val(user_data["PA_jg"]);
            $("select[name='typeA']").val(user_data["typeA"]);
            $("select[name='ES']").val(user_data["ES"]);
            $("select[name='FS']").val(user_data["FS"]);
            $("select[name='talents[]']").val(user_data["talents"]);
            $("select[name='traits[]']").val(user_data["traits"]);
        });
    });

</script>
<div class="row">
    <h1 class="titre">Bibliothèque d'Archetypes</h1>
    <div class="col-xs-12">
        <?php 
        echo validation_errors('<div class="alert alert-danger gras">', '</div>');
        echo form_open('encounter', 'class=""'); 
        ?>
        <table id="table_id" class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th></th>
                    <th>CC</th>
                    <th>CT</th>
                    <th>F</th>
                    <th>E</th>
                    <th>Ag</th>
                    <th>Int</th>
                    <th>Per</th>
                    <th>FM</th>
                    <th>Soc</th>
                    <th>PV</th>
                    <th>Armure</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="transparant">
                <?php 
                    $options = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
                    $i = 0;
                if(!empty($listeArchetype)){
                    foreach($listeArchetype as $key=>$val){
                        echo '<tr class = "gras">';
                            echo '<td>'.$val['nom'].'</td>';
                            echo '<td>'.form_dropdown($key, $options, 0,'class=""').'</td>';
                            echo '<td>'.$val['CC'].'</td>';
                            echo '<td>'.$val['CT'].'</td>';
                            echo '<td>'.$val['F'];
                            for ($j = 1 ; $j < $val['FS'] ; $j++){
                                echo '<span class="glyphicon glyphicon-flash"></span>';
                            }
                            echo '</td>';
                            echo '<td>'.$val['E'];
                            for ($j = 1 ; $j < $val['ES'] ; $j++){
                                echo '<span class="glyphicon glyphicon-flash"></span>';
                            }
                            echo '</td>';
                            echo '<td>'.$val['Ag'].'</td>';
                            echo '<td>'.$val['Int'].'</td>';
                            echo '<td>'.$val['Per'].'</td>';
                            echo '<td>'.$val['FM'].'</td>';
                            echo '<td>'.$val['Soc'].'</td>';
                            echo '<td class="text-red">'.$val['PV'].'</td>';
                            echo '<td class="text-green">';
                            echo $val['PA_tete'].'/';
                            echo $val['PA_bd'].'/';
                            echo $val['PA_bg'].'/';
                            echo $val['PA_corps'].'/';
                            echo $val['PA_jd'].'/';
                            echo $val['PA_jg'];
                            echo '</td>';
                            echo '  <td>
                                        <a href="#"
                                        class="link tooltip-link"
                                        data-toggle="tooltip"
                                        data-original-title="Modifier">
                                            <button type="button" value='.$key.' class="btn btn-primary btn-xs my_button" data-toggle="modal" data-target="#modifArchetype">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </button>
                                        </a>
                                        <a href="#"
                                        class="link tooltip-link"
                                        data-toggle="tooltip"
                                        data-original-title="Ajout Note">
                                            <button type="button" value='.$key.' class="btn btn-success btn-xs my_button" data-toggle="modal" data-target="#ajoutCompetence">
                                                <span class="glyphicon glyphicon-wrench"></span>
                                            </button>
                                        </a>
                                        <a href="#"
                                        class="link tooltip-link"
                                        data-toggle="tooltip"
                                        data-original-title="Ajout Arme">
                                            <button type="button" value='.$key.' class="btn btn-warning btn-xs my_button" data-toggle="modal" data-target="#ajoutArme">
                                                <span class="glyphicon glyphicon-fire"></span>
                                            </button>
                                        </a>
                                        <a href="#"
                                        class="link tooltip-link"
                                        data-toggle="tooltip"
                                        data-original-title="Ajout Pouvoir">
                                            <button type="button" value='.$key.' class="btn btn-info btn-xs my_button" data-toggle="modal" data-target="#ajoutPouvoir">
                                                <span class="glyphicon glyphicon-flash"></span>
                                            </button>
                                        </a>
                                        <a href="'.base_url().'index.php/gestionListe/supprimerArchetype/'.$key.'"
                                        class="link tooltip-link"
                                        data-toggle="tooltip"
                                        data-original-title="Supprimer">
                                            <button type="button" class="btn btn-danger btn-xs" onclick="return confirm(\'Attention ! Etes-vous sûr de vouloir supprimer cet archetype ?\')">
                                                <span class="glyphicon glyphicon-trash" ></span>
                                            </button>
                                        </a>
                                    </td>';
                        echo '</tr>';
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
        <div class="row row-centered">
<?php 
        echo form_submit('submit', 'Creer Rencontre','class="btn btn-lg btn-primary"');
    echo form_close();

?>       
        </div>     
    </div>
</div>
<!-- Modal -->
<div id="modifArchetype" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content col-xs-12">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title text-center titre">Modifier un archetype</h1>
            </div>
            <div class="modal-body col-xs-12">
                <div class="col-xs-12">
                    <?php
                        $options = array(1 => 'x1', 2 => 'x2', 3 => 'x3');
                        $options_typeA = array('primitif' => 'Armure Primitive', 'pareBalle' => 'Armure Pare-Balle', 'carapace' => 'Armure Carapace', 'nrj' => 'Armure Energétique');
                        echo form_open('modificationVerif', 'class=""');
                        echo validation_errors('<div class="alert alert-danger gras">', '</div>');
                        echo form_hidden('id', '');
                        echo '<div class="col-xs-6">';
                            echo '<div class="form-group">';
                                echo form_label('Nom :', 'nom');
                                echo form_input('nom', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('CC :', 'CC');
                                echo form_input('CC', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('CT :', 'CT');
                                echo form_input('CT', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Force :', 'F');
                                echo form_input('F', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Endurance :', 'E');
                                echo form_input('E', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Agilite :', 'Ag');
                                echo form_input('Ag', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Intelligence :', 'Int');
                                echo form_input('Int', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Perception :', 'Per');
                                echo form_input('Per', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Force mentale :', 'FM');
                                echo form_input('FM', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Sociabilite :', 'Soc');
                                echo form_input('Soc', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Traits :', 'traits');
                                echo form_multiselect('traits[]', $listeTraits, '','class="form-control"');
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="col-xs-6">';
                            echo '<div class="form-group">';
                                echo form_label('Armure tête :', 'PA_tete');
                                echo form_input('PA_tete', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Armure bras droit :', 'PA_bd');
                                echo form_input('PA_bd', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Armure bras gauche :', 'PA_bg');
                                echo form_input('PA_bg', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Armure corps :', 'PA_corps');
                                echo form_input('PA_corps', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Armure jambe droite :', 'PA_jd');
                                echo form_input('PA_jd', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Armure jambe gauche', 'PA_jg');
                                echo form_input('PA_jg', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Type Armure :', 'typeA');
                                echo form_dropdown('typeA', $options_typeA, '','class="form-control"');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Points de blessures', 'PV');
                                echo form_input('PV', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Endurance surnaturelle :', 'ES');
                                echo form_dropdown('ES', $options, '','class="form-control"');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Force surnaturelle :', 'FS');
                                echo form_dropdown('FS', $options, '','class="form-control"');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Talents :', 'talents');
                                echo form_multiselect('talents[]', $listeTalents, '','class="form-control"');
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="col-xs-12">';
                            echo '<div class="form-group">';
                                echo form_submit('submit', 'Modifier','class="btn btn-lg btn-primary btn-block"');
                            echo '</div>';
                        echo '</div>';
                        echo form_close();
                    ?>
                </div>   
            </div>
        </div>
    </div>
</div>

<div id="ajoutCompetence" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content col-xs-12">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title text-center titre">Ajouter une Note</h1>
            </div>
            <div class="modal-body col-xs-12">
                <div class="col-xs-12">
                    <?php
                        echo form_open('ajoutCompetenceVerif', 'class=""');
                        echo validation_errors('<div class="alert alert-danger gras">', '</div>');
                        echo form_hidden('id', '');
                        echo '<div class="col-xs-12">';                            
                            echo '<div class="form-group">';
                                echo form_label('Note :', 'competence');
                                echo form_input('competence', '', 'list="compList" class="form-control" placeholder="" ');
                                echo '<datalist id="compList">';
                                foreach ($listeCompetences as $val){
                                    echo "<option value='$val'>";
                                }
                                echo '</datalist>';
                            echo '</div>';                            
                            echo '<div class="form-group">';
                                echo form_label('Description : (facultatif)', 'description');
                                echo form_textarea('description', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="col-xs-12">';
                            echo '<div class="form-group">';
                                echo form_submit('submit', 'Valider','class="btn btn-lg btn-primary btn-block"');
                            echo '</div>';
                        echo '</div>';
                        echo form_close();
                    ?>
                </div>   
            </div>
        </div>
    </div>
</div>

<div id="ajoutPouvoir" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content col-xs-12">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title text-center titre">Ajouter un Pouvoir Psy</h1>
            </div>
            <div class="modal-body col-xs-12">
                <div class="col-xs-12">
                    <?php
                        echo form_open('ajoutPouvoirVerif', 'class=""');
                        echo validation_errors('<div class="alert alert-danger gras">', '</div>');
                        echo form_hidden('id', '');
                        echo '<div class="col-xs-12">';                            
                            echo '<div class="form-group">';
                                echo form_label('Nom du Pouvoir Psy:', 'pouvoir');
                                echo form_input('pouvoir', '', 'class="form-control" placeholder="" ');
                            echo '</div>';                            
                            echo '<div class="form-group">';
                                echo form_label('Description :', 'description');
                                echo form_textarea('description', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="col-xs-12">';
                            echo '<div class="form-group">';
                                echo form_submit('submit', 'Valider','class="btn btn-lg btn-primary btn-block"');
                            echo '</div>';
                        echo '</div>';
                        echo form_close();
                    ?>
                </div>   
            </div>
        </div>
    </div>
</div>

<div id="ajoutArme" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content col-xs-12">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title text-center titre">Ajouter une arme</h1>
            </div>
            <div class="modal-body col-xs-12">
                <div class="col-xs-12">
                    <?php
                        $typesDegats =  array('P' => 'Pénétrant', 'I' => 'Impact', 'X' => 'Explosif', 'E' => 'Energétique');
                        $typesRech =  array('-' => '-','1/2AC' => '1/2AC','1AC' => '1AC','2AC' => '2AC','3AC' => '3AC');
                        $typesGroupe =  array('CAC' => 'CAC','Poing' => 'Poing','Base' => 'Base','Lourde' => 'Lourde');
                        echo form_open('ajoutArmeVerif', 'class=""');
                        echo validation_errors('<div class="alert alert-danger gras">', '</div>');
                        echo form_hidden('id', '');
                        echo '<div class="col-xs-6">';
                            echo '<div class="form-group">';
                                echo form_label('Nom de l\'arme :', 'nomArme');
                                echo form_input('nomArme', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Groupe :', 'groupe');
                                echo form_dropdown('groupe', $typesGroupe, '','class="form-control"');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Dégats :', 'degats');
                                echo form_input('degats', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Type :', 'type');
                                echo form_dropdown('type', $typesDegats, '','class="form-control"');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Pénétration :', 'pen');
                                echo form_input('pen', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                        echo '</div>';            
                        echo '<div class="col-xs-6">';
                            echo '<div class="form-group">';
                                echo form_label('Portée :', 'portee');
                                echo form_input('portee', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Mode :', 'mode');
                                echo form_input('mode', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('AT :', 'AT');
                                echo form_input('AT', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Rechargement', 'rch');
                                echo form_dropdown('rch', $typesRech, '','class="form-control"');
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo form_label('Attributs :', 'attributs');
                                echo form_input('attributs', '', 'class="form-control" placeholder="" ');
                            echo '</div>';
                        echo '</div>';            
                        echo '<div class="col-xs-12">';
                            echo '<div class="form-group">';
                                echo form_submit('submit', 'Valider','class="btn btn-lg btn-primary btn-block"');
                            echo '</div>';
                        echo '</div>';
                        echo form_close();
                    ?>
                </div>   
            </div>
        </div>
    </div>
</div>
