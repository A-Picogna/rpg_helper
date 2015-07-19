<script>
    $(document).ready( function () {
        $('#table_id').DataTable({
            scrollY: 500,
            paging: false,
            "autoWidth": false,
            scrollX: false,
            scrollY: false,
            "searching": false
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
                    <tr class="">
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
                        <th></th>
                    </tr>
                </thead>
                <tbody class="ligne_couleur_alterne">
                    <?php
                        $options = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30);
                        $i = 0;
                    if(!empty($listeArchetype)){
                        foreach($listeArchetype as $key=>$val){
                            echo '<tr class = "gras">';
                                echo '<td>'.str_replace('_', ' ', $key).'</td>';
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
                                                <button type="button" value='.$key.' class="btn btn-primary btn-xs my_button" data-toggle="modal" data-target="#myModal">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </button>
                                            </a>
                                        </td>';
                                echo '  <td>
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
<?php 
            echo form_submit('submit', 'Creer Rencontre','class="btn btn-lg btn-primary"');
        echo form_close(); 
?>
    </div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
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
                        echo form_open('creationVerif', 'class=""');
                        echo validation_errors('<div class="alert alert-danger gras">', '</div>');
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
