<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta charset="utf-8">
        <title>jdr helper</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- JQuery -->
        <script type="text/javascript" src=<?php echo base_url()."assets/js/jquery.min.js"; ?>></script>

        <!-- Bootstrap -->
        <link href=<?php echo base_url()."assets/css/bootstrap.min.css"; ?> rel="stylesheet">
        <link rel="stylesheet" href=<?php echo base_url()."assets/css/bootstrap.min.css"; ?> type="text/css">
        <script type="text/javascript" src=<?php echo base_url()."assets/js/bootstrap.min.js"; ?>></script>

        <!-- AMCHARTS -->
        <script type="text/javascript" src=<?php echo base_url()."assets/js/amcharts.js"; ?>></script>
        <script type="text/javascript" src=<?php echo base_url()."assets/js/pie.js"; ?>></script>
        <script type="text/javascript" src=<?php echo base_url()."assets/js/serial.js"; ?>></script>

        <!-- DataTables -->
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

        <!-- Le CSS perso quand la flemme de chercher dans les 14 trilliards de librairies :D -->
        <link href=<?php echo base_url()."assets/css/css_perso.css"; ?> rel="stylesheet">
        <link href=<?php echo base_url()."assets/css/tableGenerator.css"; ?> rel="stylesheet">

    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url();?>index.php/home"> <span class="glyphicon glyphicon-home"></span></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul id="navbar_content_left" class="nav navbar-nav">
                        <li><a href="<?php echo base_url()."index.php/home/creerArchetype"; ?>"><span class="glyphicon glyphicon-list"></span> Creer un archetype</a></li>
                        <li><a href="<?php echo base_url()."index.php/encounter"; ?>"><span class="glyphicon glyphicon-list"></span> Encounter</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">