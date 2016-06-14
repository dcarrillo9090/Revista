
<style type="text/css">
.loader{
 display: none;
 margin-left: 200px;
 margin-top: -45px;
 position: absolute;
}
</style>

<section class="contenido wrapper">
<center> <h3> Agregar artículos </h3></center>
<div class="container">
<div class="col-md-7 col-md-offset-3">

          <span class="text-danger"><?php echo $error; ?></span>

         <!-- <?php 
          $attributes //= array("class" => "form-horizontal", "id" => "insertform", "name" => "insertform" );?>
          <?php //echo form_open_multipart('data/articulo');?>
          <?php //echo form_open_multipart('upload/upload_it');?> -->
          <form id="form_articulo" name="form_articulo" method="post" action="<?php echo base_url(); ?>data/articulo" enctype="multipart/form-data" >
	<div class="form-group row">
        <label class="control-label col-xs-3">Titulo del artículo</label>
        <div class="col-xs-9">
        <div class="input-group">
               <div class="input-group-addon">
                    <span class="glyphicon glyphicon-book"></span> </div>
            <input type="text" class="form-control" id="articulo" name="articulo" placeholder="articulo" onKeyUp="buscar();">
            </div>
            <span class="text-danger"><?php echo form_error('articulo'); ?></span>
            </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-xs-3">Autor(es)</label>
        <div class="col-xs-9">
        <div class="input-group">
               <div class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span> </div>
            <input type="text" class="form-control" id="autor" name="autor" placeholder="autores separados por comas" data-toggle="tooltip" title="Ingresar cada uno de los co-autores">
            </div>
            <span class="text-danger"><?php echo form_error('autor'); ?></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-xs-3">Palabras claves</label>
        <div class="col-xs-9">
        <div class="input-group">
               <div class="input-group-addon">
                    <span class="glyphicon glyphicon-bookmark"></span> </div>
            <input type="text" class="form-control" id="keyword" name="keyword" placeholder="claves de su articulo">
            </div>
            <span class="text-danger"><?php echo form_error('keyword'); ?></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-xs-3">Resumen</label>
        <div class="col-xs-9">
        <div class="input-group">
               <div class="input-group-addon">
                    <span class="glyphicon glyphicon-list-alt"></span> </div>
            <textarea rows="3" class="form-control" placeholder="resumen de su articulo" id="resumen" name="resumen"></textarea>
            </div>
            <span class="text-danger"><?php echo form_error('resumen'); ?></span>
        </div>
    </div>
   <div class="form-group row">
        <label class="control-label col-xs-3" >Archivo</label>
        <div class="col-xs-9">
            <input type = "file" name="userfile" id="userfile" size ="20"  multiple="multiple"/> 
            <span class="text-danger"><?php echo form_error('userfile'); ?></span>
        </div>
    </div>
         
    <div class="form-group row">
        <label class="control-label col-xs-3">Token</label>
        <div class="col-xs-9">
        <div class="input-group">
               <div class="input-group-addon">
                    <span class="glyphicon glyphicon-envelope"></span> </div>
            <input type="text" class="form-control" id="token" name="token" placeholder="codigo de validación" >
            </div><span class="text-danger"><?php echo form_error('token'); ?></span>
            <span class="help-block" id="correo" name="correo">De clic aquí para enviar el token</span>
            <input type="hidden" name="email" id="email" value="<?php echo $consulta_get_mail; ?>">
        </div>
    </div>
    	
         
    <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            <label class="checkbox-inline">
                <input type="checkbox" value="agree" id="acuerdos" name="acuerdos">  Accepto <a href="#">Terminos y condiciones</a>.
            </label>
            <span class="text-danger"><?php echo form_error('acuerdos'); ?></span>
        </div>
    </div>

    <br><br>
    <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            <input type="submit" class="btn btn-primary" value="Enviar" >
            <input type="reset" class="btn btn-default" value="Limpiar">
        </div>
        <div id="mensaje"></div>
    </div>
    </div>
    </div>
    <div class="bb-alert alert alert-info" style="display:none;">
        <span>The examples populate this alert with dummy content</span>
    </div>
    </form>
    <div id="resultadoBusqueda"></div>
    </section>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.min1.js"></script>
        <!-- bootbox code -->
    
    <script>
    var textoBusqueda = $("input#email").val();
        $('#correo').on("click", function(e) {
            bootbox.dialog({
  message: "Se enviará un token a su dirección de correo registrada: "+textoBusqueda,
  title: "<img src='http://localhost/revista/assets/img/logo1.png'/>"+"  FUS - Revista de Investigacion",
  buttons: {
    main: {
      label: "Aceptar",
      className: "btn-primary",
      callback: function() {
        Example.show("Enviando correo electrónico..."+"<img src='http://localhost/revista/assets/img/spin.gif'/>");
        $.post("http://localhost/revista/Fus/correo",'correo='+textoBusqueda,function(textoBusqueda){
            
        });
      }
    }
  }
});
        });
        
        


var Example = (function() {
    "use strict";

    var elem,
        hideHandler,
        that = {};

    that.init = function(options) {
        elem = $(options.selector);
    };

    that.show = function(text) {
        clearTimeout(hideHandler);

        elem.find("span").html(text);
        elem.delay(200).fadeIn().delay(2000).fadeOut();
    };

    return that;
}());

    </script>

    <script>
        $(function () {
            Example.init({
                "selector": ".bb-alert"
            });
        });
    </script>
    