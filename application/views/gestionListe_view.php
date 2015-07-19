<script>
    $(document).ready( function () {
        $('#table_id').DataTable({
            scrollY: 1000,
            "autoWidth": false,
            scrollX: false,
            scrollY: false,
            
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
    <h1 class="titre">Liste Commune</h1>
    <div class="col-xs-12">
        <?php //echo form_open('encounter', 'class=""'); ?>
            <table id="table_id" class="table">
                <thead>
                    <tr class="">
                        <th></th>
                        <th>Nom</th>
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
                    </tr>
                </thead>
                <tbody class="ligne_couleur_alterne">
                    <?php
                        $i = 0;
                    foreach($listeArchetype as $key=>$val){
                        echo '<tr class = "gras">';
                            echo '  <td>
                                        <a href="'.base_url().'index.php/gestionListe/addListePerso/'.$key.'"
                                        class="link tooltip-link"
                                        data-toggle="tooltip"
                                        data-original-title="Ajouter à sa bibliothèque">
                                            <button type="button" class="btn btn-primary btn-xs">
                                                <span class="glyphicon glyphicon-save" ></span>
                                            </button>
                                        </a>
                                    </td>';
                            echo '<td>'.str_replace('_', ' ', $key).'</td>';
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
                        echo '</tr>';
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
<?php 
            //echo form_submit('submit', 'Creer Rencontre','class="btn btn-lg btn-primary"');
        //echo form_close(); 
?>
    </div>
</div>
