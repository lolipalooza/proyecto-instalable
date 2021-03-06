<?php include('config.php') ?>
<?php $fase = isset($_GET['fase']) ? $_GET['fase'] : '' ?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie8"><![endif]-->
<!--[if IE 9]><html class="ie9 gt-ie8"><![endif]-->
<!--[if gt IE 9]><!--> <html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title>Asistente de Instalación</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
	<!-- Open Sans font from Google CDN -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css"/>
	<!-- Pixel Admin's stylesheets -->
	<link href="<?php echo $assets_url?>/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<!--<link href="<?php echo $assets_url?>/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css"/>-->
	<link rel="stylesheet" href="<?php echo $assets_url?>/font-awesome/css/font-awesome.min.css">
	<link href="<?php echo $assets_url?>/stylesheets/widgets.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $assets_url?>/stylesheets/rtl.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $assets_url?>/stylesheets/themes.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $assets_url?>/css/instalador.css" rel="stylesheet" type="text/css"/>
	<!--[if lt IE 9]>
	<script src="<?php echo $assets_url?>/js/ie.min.js"></script>
	<![endif]-->
</head>
<body class="<?php echo isset($_GET['fase']) ? "flex-body" : "" ?>">
	<script>var init = [];</script>

	<?php if (isset($_GET['fase'])): ?>
		
		<section class="sidebar">
		<h3>Etapas</h3>
			<ul>
				<?php foreach ($fases as $i => $f): ?>
					<?php if($_GET['fase'] < $i+1): ?>
						<li style="">
							<i class="fa fa-circle-o"></i>
							<?php echo $f ?>
						</li>
					<?php elseif($_GET['fase'] == $i+1): ?>
						<li style="font-weight:bold">
							<i class="fa fa-circle"></i>
							<?php echo $f ?>
						</li>
					<?php elseif($_GET['fase'] > $i+1): ?>
						<li style="color: #a5c2fd">
							<i class="fa fa-check"></i>
							<?php echo $f ?>
						</li>
					<?php endif ?>
				<?php endforeach ?>
			</ul>
		</section>
	<?php endif ?>

	<?php if (!isset($_GET['fase'])): ?>
	<?php /*************************
	* FASE INICIAL DE INSTALACIÓN
	********************************/ ?>
		<section class="main">
			<h1>Bienvenido al asistente de instalación</h1>
			<div class="subtext">Este asistente le guiará a través del proceso de instalación.</div>
			<div>
				<a class="btn btn-info btn-lg btn-continuar" href="?fase=1">Continuar</a>
				<div><a href="">Guía de instalación</a></div>
			</div>
		</section>

	<?php elseif ($fase <= count($fases) && $fases[$fase-1]=='Validar licencia'): ?>
	<?php /*************************
	* FASE: VALIDAR LICENCIA
	********************************/ ?>
		<div id="modal-validar-licencia" class="modal fade" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" style="display: none;">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title modal-title-user" id="myModalLabel">Validar Licencia</h4>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i> <span></span>
						<p style="margin-top:22px"><strong>Nota:</strong> <em>Si lo desea puede saltarse este paso (tendrá que validar la licencia más tarde para poder disfrutar de todas las características del producto).</em></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a href="?fase=<?php echo $fase+1 ?>" class="btn btn-primary">Continuar sin validar licencia</a>
					</div>
				</div>
			</div>
		</div>
		<section class="main2">
			<?php if (!isset($_GET['validado'])): ?>
			<h1>Validar licencia</h1>
			<div class="subtext">
				Adquiera la licencia en <a href="<?php echo $validar_licencia?>/licencias-demo.php" target="_blank"><?php echo $adquirir_licencia ?></a> y luego complete los campos con la información solicitada.
			</div>
			<form id="form-validar-licencia">
				<div class="form-group">
					<label class="col-md-2 form-label text-right" for="validator-url">
						Url validación <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="El dominio de la página que realizará la validación."></i>:
					</label>
					<div class="col-md-8 input-group">
						<input type="text" class="form-control" id="validator-url" placeholder="http(s)://dominio-de-la-pagina" value="<?php echo $validar_licencia ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 form-label text-right" for="license-code">
						Licencia <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Serial de la licencia."></i>:
					</label>
					<div class="col-md-8 input-group">
						<input type="text" class="form-control" id="license-code" placeholder="XXXXX-XXXXX-XXXXX-XXXXX-XXXXX-XXXXX" required>
					</div>
				</div>
				<?php /* ?><div class="form-group">
					<div class="col-md-7 col-md-offset-2 input-group">
						<button type="submit" class="btn btn-info">Continuar</button>
					</div>
				</div><?php */ ?>
			</form>
			<div class="form-group">
				<div class="col-md-7 col-md-offset-2 input-group">
					<a href="?fase=<?php echo $fase+1 ?>" class="btn btn-info btn-validar-licencia">Continuar</a>
				</div>
			</div>
			<?php else: ?>
			<h1>Su licencia ha sido validada exitosamente <i class="fa fa-check"></i></h1>
			<div class="form-group">
				<div class="col-md-7 input-group">
					<a href="?fase=<?php echo $fase+1 ?>" class="btn btn-info">Continuar</a>
				</div>
			</div>
			<?php endif ?>
		</section>

	<?php elseif ($fase <= count($fases) && $fases[$fase-1]=='Comprobación del Sistema'): ?>
	<?php /*************************
	* FASE: COMPROBACIÓN DEL SISTEMA
	********************************/ ?>
		<?php $fail = false ?>
		<section class="main2">
			<h1>Comprobación del sistema</h1>
			<div class="subtext">Comprobando los requerimientos de instalación.</div>
			<div class="lista">
				<h4>Sistema</h4>
				<ul>
					<?php foreach ($system_checks as $name => $check): ?>
					<li <?php echo !$check[0]?'class="text-red"':''?>>
						<i class="fa fa-<?php echo $check[0] ? 'check' : 'exclamation-triangle' ?>"></i>
						<?php echo $name ?>
						<?php if(!$check[0]):?>
							<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="<?php echo $check[1] ?>"></i>
						<?php endif?>
					</li>
					<?php $fail = $fail || (!$check[0] ? true : false) ?>
					<?php endforeach ?>
				</ul>
				<h4>Permisos de escritura</h4>
				<ul>
					<?php foreach ($writable_dirs as $directory): ?>
						<?php if (!file_exists($basepath.'/'.$directory)) mkdir($basepath.'/'.$directory) ?>
						<li <?php echo !is_writable($basepath.'/'.$directory)?'class="text-red"':''?>>
							<i class="fa fa-<?php echo is_writable($basepath.'/'.$directory) ? 'check' : 'exclamation-triangle' ?>"></i>
							<?php echo str_replace("//", "/", $basepath.'/'.$directory) ?>
							<?php if(!is_writable($basepath.'/'.$directory)):?>
								<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Habilite los permisos de escritura para esta ruta"></i>
							<?php endif?>
						</li>
					<?php endforeach ?>
				</ul>
				<?php if ($fail): ?>
					<p class="text-red">Se ha detectado uno o más errores durante la comprobación.<br/>Se recomienda solucionar los problemas antes de continuar. Algunos problemas podrían estar asociados a limitaciones del servidor.<br/>Si continua la instalación, es probable que el sistema trabaje de forma errática.</p>
					<?php foreach ($system_checks as $check): ?>
						<?php if (isset($check[2])): ?>
							<p class="text-red dark-bg"><?php echo $check[2] ?></p>
						<?php endif ?>
					<?php endforeach ?>
				<?php endif ?>
			</div>
			<div class="form-group">
				<div class="col-md-7 input-group">
					<a href="?fase=<?php echo $fase+1 ?>" class="btn btn-info">Continuar</a>
				</div>
			</div>
		</section>

	<?php elseif ($fase <= count($fases) && $fases[$fase-1]=='Configuracion del server'): ?>
	<?php /*************************
	* FASE: CONFIGURAR SERVIDOR
	********************************/ ?>
	<?php
		if (isset($_GET['error'])) {
			$host = isset($_GET['host']) ? $_GET['host'] : "localhost";
			$db = isset($_GET['db']) ? $_GET['db'] : "";
			$user = isset($_GET['user']) ? $_GET['user'] : "";
			$site = isset($_GET['site']) ? $_GET['site'] : "";
			$error = $_GET['error'];
		} else {
			$host="localhost"; $db=""; $user=""; $site="";
			$error = "";
		}
	?>
		<section class="main2">
			<h1>Datos básicos de configuración</h1>
			<div class="subtext">Complete los campos con la información solicitada.</div>
			<form id="form-detalles-servidor">
				<div class="form-group"><h4>Base de datos:</h4></div>
				<div class="form-group">
					<label class="col-md-3 form-label text-right" for="server-host">
						Host <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Normalmente es localhost. No se recomienda cambiar este dato a menos que se sepa lo que se hace."></i>:
					</label>
					<div class="col-md-7 input-group">
						<input type="text" class="form-control" id="server-host" placeholder="Nombre del host para la base de datos (comúnmente: localhost)" value="<?php echo $host ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 form-label text-right" for="server-db">
						Base de datos <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Nombre para la base de datos que será utilizada por el sistema. A menos que el servidor tenga bloqueados los permisos, la base de datos será creada automáticamente."></i>:
					</label>
					<div class="col-md-7 input-group">
						<input type="text" class="form-control" id="server-db" placeholder="Nombre de la base de datos principal" value="<?php echo $db ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 form-label text-right <?php echo $error==1 ? "text-red":"" ?>" for="db-user">
						Usuario <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="El dato usuario para hacer login en la base de datos."></i>:
					</label>
					<div class="col-md-7 input-group">
						<input type="text" class="form-control" id="db-user" placeholder="Usuario de la base de datos" value="<?php echo $user ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 form-label text-right <?php echo $error==1 ? "text-red":"" ?>" for="db-pass">
						Contraseña <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="El dato contraseña para hacer login en la base de datos."></i>:
					</label>
					<div class="col-md-7 input-group">
						<input type="password" class="form-control" id="db-pass" placeholder="Contraseña para la base de datos" required>
						<?php if($error==1): ?>
							<div class="text-red">Datos incorrectos. Revise cuidadosamente los datos ingresados y reintente.</div>
						<?php endif ?>
					</div>
				</div>
				<div class="form-group"><h4>Página:</h4></div>
				<div class="form-group">
					<label class="col-md-3 form-label text-right" for="site-name">
						Nombre de la página <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Este nombre aparecerá en los títulos de cada una de las secciones de su página (pestañas del navegador), así como en cada area donde corresponda."></i>:
					</label>
					<div class="col-md-7 input-group">
						<input type="text" class="form-control" id="site-name" placeholder="Nombre de la página" value="<?php echo $site ?>" required>
					</div>
				</div>
				<?php if($error==2): ?>
				<div class="form-group">
					<div class="col-md-8 col-md-offset-2 text-red input-group create-db-error"><strong><i class="fa fa-exclamation-triangle"></i> Aviso:</strong> Este instalador tiene la capacidad de crear la base de datos por usted. Sin embargo, en esta ocasión se ha detectado que el servidor no tiene habilitados los permisos, y por lo tanto tendrá que crear la base de datos manualmente desde <code>phpMyAdmin</code>.</div>
				</div>
				<div class="form-group">
					<div class="col-md-7 col-md-offset-2 input-group">
						<a href="?fase=<?php echo $fase+1 ?>" class="btn btn-info">Lo entiendo y deseo continuar</a>
						<a href="?fase=<?php echo $fase ?>" class="btn btn-warning">Re-ingresar los datos del servidor</a>
					</div>
				</div>
				<?php else: ?>
				<div class="form-group">
					<div class="col-md-7 col-md-offset-2 input-group">
						<button type="submit" class="btn btn-info">Continuar</button>
					</div>
				</div>
				<?php endif ?>
			</form>
		</section>

	<?php elseif ($fase <= count($fases) && $fases[$fase-1]=='Cuenta del admin'): ?>
	<?php /*************************
	* FASE: CREAR CUENTA DE ADMINISTRADOR
	********************************/ ?>
		<section class="main2">
			<h1>Datos básicos de configuración</h1>
			<div class="subtext">Complete los campos con la información solicitada.</div>
			<form id="form-detalles-admin">
				<div class="form-group"><h4>Cuenta de administrador:</h4></div>
				<div class="form-group">
					<label class="col-md-3 form-label text-right" for="admin-firstname">Nombre:</label>
					<div class="col-md-7 input-group">
						<input type="text" class="form-control" id="admin-firstname" placeholder="Nombre del usuario" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 form-label text-right" for="admin-lastname">Apellido:</label>
					<div class="col-md-7 input-group">
						<input type="text" class="form-control" id="admin-lastname" placeholder="Apellido del usuario" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 form-label text-right" for="admin-email">Correo:</label>
					<div class="col-md-7 input-group">
						<input type="email" class="form-control" id="admin-email" placeholder="Correo del usuario" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 form-label text-right" for="admin-user">Usuario:</label>
					<div class="col-md-7 input-group">
						<input type="text" class="form-control" id="admin-user" placeholder="Usuario administrador" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 form-label text-right" for="admin-pass">Contraseña:</label>
					<div class="col-md-7 input-group">
						<input type="password" class="form-control" id="admin-pass" placeholder="Ingresar contraseña" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 form-label text-right" for="admin-pass-confirm">Confirmar Contraseña:</label>
					<div class="col-md-7 input-group">
						<input type="password" class="form-control" id="admin-pass-confirm" placeholder="Ingresar contraseña nuevamente" required>
						<br/><span class="error-msg text-red"></span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-7 col-md-offset-3 input-group">
						<button type="submit" class="btn btn-info">Continuar</button>
					</div>
				</div>
			</form>
		</section>

	<?php elseif ($fase <= count($fases) && $fases[$fase-1]=='activar reCAPTCHA'): ?>
	<?php /*************************
	* FASE: HABILITAR RECAPTCHA
	********************************/ ?>
		<section class="main2">
			<h1>Habilitar reCAPTCHA</h1>
			<div class="subtext">
				Necesita habilitar una cuenta de reCAPTCHA para poder tener una página de login funcional.<br/>
				Ingrese a <a href="https://www.google.com/recaptcha/admin/create">https://www.google.com/recaptcha/admin/create</a>,
				y complete los datos para poder recibir las claves necesarias, luego valídelas.<br/><br/>
				<strong>NOTA:</strong> es necesario elegir la opción <code>reCAPTCHA v2 > Casilla No soy un robot</code>.
			</div>
			<form id="form-detalles-recaptcha">
				<div class="form-group"><h4>Datos de la cuenta de reCAPTCHA:</h4></div>
				<div class="form-group">
					<label class="col-md-3 form-label text-right" for="front-code">Clave de sitio web:</label>
					<div class="col-md-7 input-group">
						<input type="text" class="form-control" name="front-code" id="front-code" placeholder="Clave para el FrontEnd" value="<?php echo isset($_GET['code1']) ? $_GET['code1'] : '' ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 form-label text-right <?php echo isset($_GET['error']) ? "text-red":"" ?>" for="back-code">
						Clave secreta:
					</label>
					<div class="col-md-7 input-group">
						<input type="text" class="form-control" name="back-code" id="back-code" placeholder="Clave para el BackEnd" value="<?php echo isset($_GET['code2']) ? $_GET['code2'] : '' ?>" required>
						<?php if(isset($_GET['error'])): ?>
							<div class="text-red">Parece que la clave secreta es incorrecta. Revise cuidadosamente los datos y vuelva a intentar.</div>
						<?php endif ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-7 col-md-offset-3 input-group">
						<button type="submit" class="btn btn-info btn-validar-claves">Validar claves</button>
					</div>
				</div>
				<div class="form-group recaptcha-group">
					<label class="col-md-3 form-label text-right">
						Validar reCAPTCHA <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Si aparece un mensaje de error en el captcha, es porque las claves no han sido validadas, o son incorrectas."></i>:
					</label>
					<div class="col-md-7 col-md-offset-3 input-group recaptcha-input-group">
						<div class="g-recaptcha" data-sitekey="<?php echo isset($_GET['code1']) ? $_GET['code1'] : 'empty' ?>"></div>
					</div>
					<div class="col-md-7 col-md-offset-3 input-group">
						<button type="submit" class="btn btn-info btn-validar-captcha">Validar reCAPTCHA y continuar</button>
					</div>
				</div>
			</form>
		</section>

		<script src='https://www.google.com/recaptcha/api.js?hl=es'></script>

	<?php elseif ($fase <= count($fases) && $fases[$fase-1]=='Elegir módulos'): ?>
	<?php /*************************
	* FASE: PERSONALIZAR MÓDULOS
	********************************/ ?>
		<section class="main2">
			<h1>Personalizar instalación de módulos</h1>
			<div class="subtext">Seleccione los módulos que desea instalar.</div>
			<form id="form-detalles-modulos">
				<?php foreach ($modulos as $modulo): ?>
					<div class="form-group">
						<label class="container col-md-offset-1"><?php echo $modulo['nombre'] ?>
							<input type="checkbox" name="<?php echo $modulo['etiqueta'] ?>" checked/>
							<span class="checkmark"></span>
						</label>
					</div>
				<?php endforeach ?>
				<div class="form-group">
					<div class="col-md-7 col-md-offset-1 input-group">
						<button type="submit" class="btn btn-info">Continuar</button>
					</div>
				</div>
			</form>
		</section>

	<?php elseif ($fase <= count($fases) && $fases[$fase-1]=='Instalación'): ?>
	<?php /*************************
	* FASE: REALIZANDO INSTALACIÓN
	********************************/ ?>
		<section class="main2">
			<h1>Realizando instalación</h1>
			<div class="subtext">En breve la instalación habrá terminado.</div>
			<div class="progress" style="width:60%">
				<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
					<span class="sr-only">45% Complete</span>
				</div>
			</div>
			<div class="subtext estado-de-instalacion"><em>Iniciando instalación...</em></div>
			<div class="install-error text-red"></div>
		</section>

	<?php elseif ($fase > count($fases)): ?>
	<?php /*************************
	* FASE: INSTALACIÓN COMPLETA
	********************************/ ?>
		<section class="main2">
			<h1><i class="fa fa-check"></i> Proceso finalizado</h1>
			<div class="subtext">
				La instalación ha sido realizada con éxito.<br/>
				<br/>
				Puedes acceder al sitio a través del siguiente <a href="../login">enlace</a>.
			</div>
		</section>

	<?php else: ?>
		<section class="main2"></section>
	<?php endif ?>

    <?php if ($load_resources_locally): ?>
        <script src="<?php echo $assets_url?>/js/jquery-2.0.3.min.js"></script>
    <?php else: ?>
	<!-- Get jQuery from Google CDN -->
	<!--[if !IE]> -->
	<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js">'+"<"+"/script>"); </script>
	<!-- <![endif]-->
	<!--[if lte IE 9]>
	<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">'+"<"+"/script>"); </script>
	<![endif]-->
    <?php endif ?>


	<!-- Pixel Admin's javascripts -->
	<script src="<?php echo $assets_url?>/js/bootstrap.min.js"></script>
	<script src="<?php echo $assets_url?>/js/pixel-admin.min.js"></script>
	<script type="text/javascript">
		init.push(function () {
			// Javascript code here
		})
		window.PixelAdmin.start(init);

		$('#form-validar-licencia').on('submit', function(e){
			e.preventDefault()
		})
		$('.btn-validar-licencia').on('click', function(e){
			e.preventDefault()

			var thisButton = this;
			var thisText = $(thisButton).text()
			$(thisButton).attr('disabled', true).text('Validando licencia...')

			let serial = $('#license-code').val(),
				url = $('#validator-url').val();

			if(!url || !serial) {
				$('#modal-validar-licencia .modal-body span').text( "Falta uno o más datos." )
				$('#modal-validar-licencia').modal('show')
				$(thisButton).attr('disabled', false).text(thisText)
			} else {

				// Validar licencia en el servidor proveedor de licencias
				$.ajax({
					dataType: 'jsonp',
					data: {license: serial},
					url: url+'/validar-licencia',
					success : function(r) {
						if (r.validated) {
							
							// Guardar licencia validada en la configuración del instalador
							$.ajax({
								url: "crear-configuracion-licencia.php",
								data: {server: url, serial: serial},
								type: 'POST',
								dataType: 'html',
								success: function() {
									$(location).attr('href', `?fase=<?php echo $fase ?>&validado`)
								},
								error: function(xhr, status) {
									alert('Un error inesperado ha ocurrido.');
									console.log({xhr:xhr, status:status})
								},
							})

						} else {
							$('#modal-validar-licencia .modal-body span').text( r.error )
							$('#modal-validar-licencia').modal('show')
							$(thisButton).attr('disabled', false).text(thisText)
						}
					},
					error : function(xhr, status) {
						alert('Disculpe, ocurrió un problema');
						$(thisButton).attr('disabled', false).text(thisText)
					},
				})

			}
		})

		$('.btn-verificar-correo').on('click', function(){
			let correo = $('input[type=email]').val()
			$(location).attr('href', "?fase=<?php echo $fase ?>&correo="+correo)
		})
		$('.btn-verificar-correo-atras').on('click', function(){
			$(location).attr('href', "?fase=<?php echo $fase ?>")
		})

		$('#form-detalles-servidor').on('submit', function(e){
			e.preventDefault()
			let host = $('#server-host').val()
			let db = $('#server-db').val()
			let user = $('#db-user').val()
			let pass = $('#db-pass').val()
			let sitename = $('#site-name').val()
			$.ajax({
				url: "crear-configuracion-servidor.php",
				data: {
					host: host,
					db: db,
					user: user,
					pass: pass,
					sitename: sitename,
				},
				type: 'POST',
				dataType: 'html',
				success: function(r) {console.log(r)
					if (r=="SUCCESS")
						$(location).attr('href', "?fase=<?php echo $fase+1 ?>")
					else if (r=="SUCCESS_DB_ERROR")
						$(location).attr('href', `?fase=<?php echo $fase ?>&error=2&host=${host}&db=${db}&user=${user}&site=${sitename}`)
					else
						$(location).attr('href', `?fase=<?php echo $fase ?>&error=1&host=${host}&db=${db}&user=${user}&site=${sitename}`)
				},
				error: function(xhr, status) {
					alert('Un error inesperado ha ocurrido.');
					console.log({xhr:xhr, status:status})
				},
			})
		})

		$('#form-detalles-admin').on('submit', function(e){
			e.preventDefault()
			if($("#admin-pass").val() != $("#admin-pass-confirm").val()) {
				$('label[for=admin-pass], label[for=admin-pass-confirm]').addClass('text-red')
				$('span.error-msg').text('Las contraseñas no coinciden.')
			} else if ($("#admin-pass").val().length<8){
				$('label[for=admin-pass], label[for=admin-pass-confirm]').addClass('text-red')
				$('span.error-msg').text('Elija una contraseña de mínimo 8 caracteres.')
			} else {
				$('label[for=admin-pass], label[for=admin-pass-confirm]').removeClass('text-red')
				$('span.error-msg').text('')
				$.ajax({
					url: "registrar-admin.php",
					data: {
						nombre: $("#admin-firstname").val(),
						apellido: $("#admin-lastname").val(),
						correo: $("#admin-email").val(),
						user: $("#admin-user").val(),
						pass: $("#admin-pass").val(),
					},
					type: 'POST',
					dataType: 'html',
					success: function() {
						$(location).attr('href', "?fase=<?php echo $fase+1 ?>")
					},
					error: function(xhr, status) {
						alert('Un error inesperado ha ocurrido.');
						console.log({xhr:xhr, status:status})
					},
				})
			}
		})
		$('.btn-validar-claves').on('click', function() {
			let code1 = $('#front-code').val()
			let code2 = $('#back-code').val()
			$(location).attr('href', "?fase=<?php echo $fase ?>&code1="+code1+"&code2="+code2)
		})
		$('.btn-validar-captcha').on('click', function() {
			let code1 = $('#front-code').val()
			let code2 = $('#back-code').val()
			$('.btn-validar-captcha').attr('disabled', true).text('Validando captcha...')
			$.ajax({
				url: "validar-captcha.php",
				type: 'POST',
				processData: false,
				contentType: false,
				data: new FormData(document.querySelector("#form-detalles-recaptcha")),
				type : 'POST',
				success: function (respuesta) {
					if (respuesta == "SUCCESS") {
						$(location).attr('href', "?fase=<?php echo $fase+1 ?>")
					} else {
						$(location).attr('href', "?fase=<?php echo $fase ?>&code1="+code1+"&code2="+code2+"&error=1")
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.status + ', ' + thrownError + '\n')
				}
			});
		})
		$('#form-detalles-recaptcha').on('submit', function(e){
			e.preventDefault()
		})
		$('#form-detalles-modulos').on('submit', function(e){
			e.preventDefault()
			let modulos = []
			$('input').each(function(){
				if ($(this).prop('checked'))
					modulos.push($(this).prop('name'))
			})
			$.ajax({
				url: "validar-modulos.php",
				data: {
					modulos: modulos.join("|"),
				},
				type: 'POST',
				dataType: 'html',
				success: function() {
					$(location).attr('href', "?fase=<?php echo $fase+1 ?>")
				},
				error: function(xhr, status) {
					alert('Un error inesperado ha ocurrido.');
					console.log({xhr:xhr, status:status})
				},
			})
		})

<?php if ($fase <= count($fases) && $fases[$fase-1]=='Instalación'): ?>
		$(document).ready(function(){
			performInstallAction()
		})

		function performInstallAction(step=1) {
			$.ajax({
				url: "instalacion.php",
				data: {
					step: step,
				},
				type: 'POST',
				dataType: 'html',
				success: function(r) {
					console.log(r)
					r = JSON.parse(r)
					let progress = r.total ? Math.round(step / r.total * 100) : 0;
					console.log(`${step}/${r.total} ${progress}% - ${r.estado}`)
					if (!r.error && progress < 100 && !isNaN(r.total)) {
						performInstallAction(step+1)
					} else if (!r.error && progress >= 100) {
						setTimeout(function(){
							$('.progress-bar').css('width', '100%')
							$('.estado-de-instalacion').html(`<h1>100%</h1><em>Instalación completa!</em>`)
							setTimeout(function(){
								$(location).attr('href', "?fase=<?php echo $fase+1 ?>")
							}, 1500)
						}, 1500)
					}
					$('.progress-bar').css('width', progress+'%')
					$('.estado-de-instalacion').html(`<h1>${progress}%</h1><em>${r.estado}</em>`)
					
					if ( r.error )
						$('.install-error').html( r.error )
				},
				error: function(xhr, status) {
					alert('Un error inesperado ha ocurrido.');
					console.log({xhr:xhr, status:status})
				},
			})
		}
<?php endif ?>

		$('[data-toggle="tooltip"]').tooltip()
	</script>
</body>
</html>