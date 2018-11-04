<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" type="text/css" href="/static/css/login.css" /> -->
    <link rel="stylesheet" href="<?php echo base_url()?>static/css/alertify.css">
    <link rel="stylesheet" href="<?php echo base_url()?>static/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url()?>static/biblioteca/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url()?>static/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url()?>static/css/util.css">

    <title>Ingreso al Sistema</title>

</head>

<body>
    <script src="<?php echo base_url()?>static/js/jquery-3.1.1.js"></script>
    <script src="<?php echo base_url()?>static/js/jquery.validate.js"></script>
    <script src="<?php echo base_url()?>static/js/alertify.js"></script>
    <script type="text/javascript">
        alertify.defaults.transition = "slide";
        alertify.defaults.theme.ok = "btn btn-primary";
        alertify.defaults.theme.cancel = "btn btn-danger";
        alertify.defaults.theme.input = "form-control";
    </script>
    <div class="limiter">
  		<div class="container-login100">
  			<div class="wrap-login100">
  				<div class="login100-form-title" style="background-image: url(/static/img/dreamsboys.jpg);">
  					<span class="login100-form-title-1">
  						INICIAR SESSION
  					</span>
  				</div>

  				<form class="login100-form validate-form"  method="POST" action="/login/check" id="login">
            <?php if ($error_login): ?><div class="alert alert-danger"><?php echo $error_login ?></div><?php endif ?>
  					<div class="wrap-input100 validate-input m-b-26" data-validate="Usuario requerido">
  						<span class="label-input100">Usuario</span>
  						<input class="input100" type="text" name="user" id="user" placeholder="DreamsBoys">
  						<span class="focus-input100"></span>
  					</div>

  					<div class="wrap-input100 validate-input m-b-18" data-validate = "Contraseña requerido">
  						<span class="label-input100">Contraseña</span>
  						<input class="input100" type="password" name="pwd" id="pwd" placeholder="*******">
  						<span class="focus-input100"></span>
  					</div>


  					<div class="container-login100-form-btn">
  						<button class="login100-form-btn">
  							INICIAR SESSION
  						</button>
  					</div>
  				</form>
  			</div>
  		</div>
  	</div>

    <script src="<?php echo base_url()?>static/js/main.js"></script>
    <script src="<?php echo base_url()?>static/js/map-custom.js"></script>
</body>
