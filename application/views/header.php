<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<script>
$(document).ready(function(){
});
</script>
<html>
    <head>
        <meta charset="utf-8">
        <title>jdr helper</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- JQuery -->
        <script type="text/javascript" src=<?php echo base_url()."assets/js/jquery.min.js"; ?>></script>
        <script type="text/javascript" src=<?php echo base_url()."assets/js/jquery-ui.min.js"; ?>></script>

        <!-- Bootstrap -->
        <link rel="stylesheet" href=<?php echo base_url()."assets/css/bootstrap.min.css"; ?> type="text/css">
        <link rel="stylesheet" href=<?php echo base_url()."assets/css/bootstrap-multiselect.css"; ?> type="text/css">
        <link rel="stylesheet" href=<?php echo base_url()."assets/css/bootstrap_custom_navbar.css"; ?> type="text/css">
        <script type="text/javascript" src=<?php echo base_url()."assets/js/bootstrap.min.js"; ?>></script>

        <!-- AMCHARTS -->
        <script type="text/javascript" src=<?php echo base_url()."assets/js/amcharts.js"; ?>></script>
        <script type="text/javascript" src=<?php echo base_url()."assets/js/pie.js"; ?>></script>
        <script type="text/javascript" src=<?php echo base_url()."assets/js/serial.js"; ?>></script>

        <!-- DataTables -->
        <link rel="stylesheet" type="text/css" href=<?php echo base_url()."assets/css/jquery.dataTables.css"; ?> type="text/css">
        <link rel="stylesheet" type="text/css" href=<?php echo base_url()."assets/css/dataTables.responsive.css"; ?> type="text/css">
        <link rel="stylesheet" type="text/css" href=<?php echo base_url()."assets/css/jquery.dataTables_themeroller.css"; ?> type="text/css">
        <script type="text/javascript" charset="utf8" src=<?php echo base_url()."assets/js/jquery.dataTables.min.js"; ?>></script>
        <script type="text/javascript" charset="utf8" src=<?php echo base_url()."assets/js/dataTables.responsive.min.js"; ?>></script>

        <!-- Le CSS perso quand la flemme de chercher dans les 14 trilliards de librairies :D -->
        <link href=<?php echo base_url()."assets/css/css_perso.css"; ?> rel="stylesheet">
        <link href=<?php echo base_url()."assets/css/tableGenerator.css"; ?> rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url();?>index.php/home"> <span class="glyphicon glyphicon-home"></span></a>
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navHeaderCollapse">
                    <ul id="navbar_content_left" class="nav navbar-nav navbar-left">
                        <li><a href="#" data-toggle="modal" data-target="#chargerListe"><span class=""></span> Charger une liste</a></li>
                        <?php
                        if ($this->session->userdata("bibliotheque")){
                            echo '
                        <li><a href="'.base_url().'index.php/gestionListe/creerArchetype"><span class="glyphicon glyphicon-list"></span> Creer un archetype</a></li>
                        <li><a href="'.base_url().'index.php/gestionListe"><span class=""></span> Liste publique</a></li>
                        <li><a href="'.base_url().'index.php/gestionListe/supprimerBibliotheque" onclick="return confirm(\'Etes-vous sûr de vouloir supprimer votre liste actuelle ? \')"><span class=""></span> Supprimer Ma liste</a></li>
                            ';
                        }
                        if (!$this->session->userdata("bibliotheque")){
                            echo '
                        <li><a href="#" data-toggle="modal" data-target="#creerListe"><span class=""></span> Creer une liste</a></li>
                            ';
                        }
                        ?>                        
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            
            
<div id="creerListe" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title text-center">Creer une bibliothèque personalisée</h1>
            </div>
            <div class="modal-body">
<?php
                echo form_open('creerBiblio', 'class=""');
                echo validation_errors('<div class="alert alert-danger gras">', '</div>');
                echo '<div class="form-group">';
                    echo form_label('Identifiant :', 'identifiant');
                    echo form_input('identifiant', set_value('identifiant'), 'class="form-control" placeholder="Only alphanumeric" ');
                echo '</div>';
                echo '<div class="form-group">';
                    echo form_label('Importer la liste publique :', 'importerListe');
                    echo form_dropdown('choixListe', array(0 => 'non', 1 => 'oui'), 0,'class="form-control"');
                echo '</div>';
?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<?php
                echo form_submit('submit', 'Creer Bibliothèque','class="btn btn-primary"');
                echo form_close();
?>
            </div>
        </div>
    </div>
</div>
            
<div id="chargerListe" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title text-center">Charger une bibliothèque existante</h1>
            </div>
            <div class="modal-body">
<?php
                echo form_open('chargerBiblio', 'class=""');
                echo validation_errors('<div class="alert alert-danger gras">', '</div>');
                echo '<div class="form-group">';
                    echo form_label('Identifiant :', 'identifiant');
                    echo form_input('identifiant', set_value('identifiant'), 'class="form-control" placeholder="Only alphanumeric" ');
                echo '</div>';
?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<?php
                echo form_submit('submit', 'Charger la liste','class="btn btn-primary"');
                echo form_close();
?>
            </div>
        </div>
    </div>
</div>
