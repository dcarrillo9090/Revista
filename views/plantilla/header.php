<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title> <?php echo $titulo; echo $nombre; ?> </title>
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">


.contenido {
  padding-top: 10px;

}
.negro {
    background-color: #000000;

</style>
<script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
</head>
<body class="fullpage logged-out">
<header>

<div class="negro">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  <div class="navbar-brand"> <img src="<?php echo base_url(); ?>assets/img/logo1.png"/></div>
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url(); ?>Fus">  FUS - Revista de Investigación</a>
    </div>
  <ul  class="nav navbar-nav">
  <li><a href="<?php echo base_url(); ?>Fus/Agregar">Agregar artículos</a></li>
  <li><a href="<?php echo base_url(); ?>Fus/Listar">Artículos públicados</a></li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
  
<?php

if ($this->session->userdata('get_user')){
         ?>
          <li><a ><span class="glyphicon glyphicon-user">&nbsp;</span>
             <?php
             //echo  $this->session->userdata('usuario');
             
             echo $consulta_get_where;
             //echo $numero;
              ?> </a></li>
             <li> <a href="<?php echo base_url().'login/logout'; ?>"><span class="glyphicon glyphicon-log-out"></span> &nbsp;Salir </a></li>
         <?php }else{ ?>
               <li ><a href="<?php echo base_url(); ?>login"> <span class="glyphicon glyphicon-log-in" ></span>&nbsp; Ingresar</a></li>; 
         <?php }    ?>
  
</ul>
</div>
</nav>
</div>
</section>
</header>
<?php
date_default_timezone_set('America/Bogota');
$zonahoraria = date_default_timezone_get();
?>
