<section class="contenido wrapper">

<?php
$validador=$count_results;

if ($privilegio==2){
$validador1=$validador;

}else{
$validador1=count($lista);
}
//cuentas articulos públicados para perfil 1 y consulta sin autenticación y/o desde android
if ($validador1>0){

 ?>
<center> <h3> Artículos publicados </h3></center>
<div class="container">
<div class="table-responsive">
<table class="table table-hover">
<thead >
<tr>
<th class="input-group-addon col-sm-1">
<span class="glyphicon glyphicon-book"></span> <label>Artículo</label> </th>
<th class="input-group-addon col-sm-1">
<span class="glyphicon glyphicon-user"></span> <label>Autor</label> </th>
<th class="input-group-addon col-sm-1">
<span class="glyphicon glyphicon-bookmark"></span> <label>Palabras claves</label> </th>
<th class="input-group-addon col-sm-1">
<span class="glyphicon glyphicon-list-alt"></span> <label>Resumen</label>  </th>
<th  class="input-group-addon col-sm-1"><span class="glyphicon glyphicon-file"></span> <label>Archivo</label> </th>
<?php if($privilegio==2){
	echo '<th  class="input-group-addon col-sm-1"><span class="glyphicon glyphicon-share"></span> <label>Públicado</label> </th>';
	} ?>
</tr>
</thead>

<tbody>
	<?php 
//echo count($lista);
foreach ($lista as $value) {
	echo "<tr>";
	echo "<td>".$value->titulo."</td>";
	echo "<td>". $value->autor."</td>";
	echo "<td>".$value->claves."</td>";
	echo "<td>".$value->resumen."</td>";
	echo "<td align='center'> <a href='$value->file' target='_blank'><span class='glyphicon glyphicon-download-alt'>"."</span></a></td>";
	
	if($privilegio==2){
		if ($value->publicado==0){
			echo "<td align='center'> 
			<form method='post' id='listar-form' action='http://localhost/revista/Fus/publicar_articulo'>
			<button type='submit' class='btn-link' id='btn_publica' name='btn_publica' value='$value->id_articulo' onclick='publica()'>Publicar  <span class='glyphicon glyphicon-download-alt'></span></button> 
				</form>
			</td> </tr>";		
		}else{
			echo "<td align='center'> <span class='glyphicon glyphicon-share'></span>  Públicado</td> </tr>";
		}
		
	}
	echo "</tr>"; }?>
	


 </tbody>
<tr><td colspan="5" align="center"><?php echo "Total de artículos: ".	$validador1; ?></td></tr>
 </table>
 <?php
}else{



 ?>
 <center> <h3> No hay artículos publicados </h3></center>
 </div>
 </div>
<?php } ?>
</section>

<script src="<?php echo base_url(); ?>/assets/js/jquery.min1.js"></script>
<script type="text/javascript">
  
/*function publica(){
	var articulo_id= document.getElementById("btn_publica").value;
            bootbox.alert("Hello world!"+articulo_id, function() {
                console.log("Alert Callback");
            });
        }*/

     
 $(document).ready(function(){
 $("#listar-form").submit(function(){
 $.ajax({
 url: $(this).attr("action"),
 type: $(this).attr("method"),
 data: $(this).serialize(),
     beforeSend:function(){
     $("#btn_publica").html('<span class="glyphicon glyphicon-transfer"></span>  &nbsp; publicando ...');
     
     },
     success:function(){
     $("#btn_publica").html('<img src="http://localhost/revista/assets/img/loader.gif" /> &nbsp; Signing In ...');
     setTimeout('window.location.href = "http://localhost/revista/Fus/"; ',2000);
     }

 }); 
 
 }); 
 return false;
 });
</script>
