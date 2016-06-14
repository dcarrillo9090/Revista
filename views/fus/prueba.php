<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>  </title>
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="fullpage logged-out">
<p>Content here. <a class="alert" href=#>Alert!</a></p>
<form >
<input type="text" name="nombre" id="nombre">
</form>

    <!-- JS dependencies -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery.min1.js"></script>
        <!-- bootbox code -->
    
   <!-- <script type="text/javascript">
if (window.addEventListener) { // Mozilla, Netscape, Firefox
    window.addEventListener('load', WindowLoad, false);
} else if (window.attachEvent) { // IE
    window.attachEvent('onload', WindowLoad);
}

function WindowLoad(event) {
   bootbox.dialog({
  title: "That html",
  message: '<img src="http://www.dlsespanol.com/lms/www/themes/efront2013/images/logo/logo.png" width="100px"/><br/>'
});
}
</script>-->

<script>
        $('#nombre').on("click", function(e) {
            bootbox.alert("Hello world!", function() {
                console.log("Alert Callback");
            });
        });
    </script>

</body>
<script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
<hr/>
<center> &copy Todos los derechos reversados - 2016 </center>
</html>