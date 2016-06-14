<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validation.min.js"></script>  
<div class="container">
    
      <div class="col-md-4 col-md-offset-4">
         <!-- <?php echo validation_errors(); ?> -->
          <span class="text-danger"><?php echo $error; ?></span>

          <form method="post" id="login-form" name="login-form" class="form-horizontal" action="http://localhost/revista/login/login">         
               <legend>Inicio de sesión</legend>
               <div id="error" name="error"></div>
        
               <div class="form-group">
               <div class="row">
               <div class="col-xs-10">
               <div class="input-group">
               <div class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span> </div>
                    <input class="form-control" id="txt_username" name="txt_username" placeholder="Usuario" type="text" value="<?php echo set_value('txt_username'); ?>" />              
               </div>
               <span class="text-danger"><?php echo form_error('txt_username'); ?></span>
               </div>
               </div>
               </div>
               
               <div class="form-group">
               <div class="row">
               <div class="col-xs-10">
               <div class="input-group">
               <div class="input-group-addon">
               <span class="glyphicon glyphicon-lock"></span> </div><input class="form-control" id="txt_password" name="txt_password" placeholder="Clave" type="password" value="<?php echo set_value('txt_password'); ?>" />
               </div>
               <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
               </div>
               </div>
               </div>
                              
               <div class="form-group">
               
               <div class="col-md-5 col-md-offset-3">
                    <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Ingresar
               </button> 
                    
               </div>
               </div>
          
          </form>
     <?php echo $this->session->flashdata('msg'); ?>
          </div>
     </div>
<script type="text/javascript">
     
 $(document).ready(function(){
 $("#login-form").submit(function(){
 $.ajax({
 url: $(this).attr("action"),
 type: $(this).attr("method"),
 data: $(this).serialize(),
     beforeSend:function(){
     $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span>  &nbsp; validando ...');
     $("#error").html(data);
     },
     success:function(){
     $("#btn-login").html('<img src="http://localhost/revista/assets/img/loader.gif" /> &nbsp; Signing In ...');
     setTimeout(' window.location.href = "http://localhost/revista/login/prueba"; ',5000);
     }

 }); 
 
 }); 
 return false;
 });
</script>





<!--
     <script>
     $('document').ready(function()
{ 

     /* validation */
      $("#login-form").validate({
      rules:
       {
               txt_username: {
               required: true,
               },
               txt_password: {
            required: true,
            },
        },
       messages:
        {
            txt_username:{
                      required: "Por favor ingrese el usuario"
                     },
            txt_password: "Porfavor ingrese su contraeña",
       },
        submitHandler: submitForm  
       });  
        /* validation */
        
        /* login submit */
        function submitForm()
        {      
               
               var usuario = document.getElementById('txt_username');
               var usuario = document.getElementById('txt_password');
               var data = $("#login-form").serialize();     
               $.ajax({                    
               type : 'POST',
               url  : 'http://localhost/revista/login/user_login',
               data : data,
               beforeSend: function()
               {    
                    //$("#error").fadeOut();
                    $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; enviando ...');
                    $('#error').html(data);
               },
               success:  function(response)
                  {                          
                           $('#error').html(data+ 'response '+response);
                         if(response=="ok"){
                                             
                              $("#btn-login").html('<img src="http://localhost/revista/assets/img/loader.gif" /> &nbsp; Signing In ...');
                              setTimeout(' window.location.href = "home.php"; ',4000);
                         }
                         else{
                    $('#error').html(data+ 'response '+response);              
                    $("#error").fadeIn(1000, function(){                             
                    $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
                    $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
                                             });
                         }
                 }
               });
                    return false;
          }
        /* login submit */
});
     </script> -->




     


