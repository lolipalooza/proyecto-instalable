<?php

$assets_url = "../assets";
$load_resources_locally = true;

$fases = array(
	'Validar licencia',
	'Configuracion del server',
	'Cuenta del admin',
	'activar reCAPTCHA',
	'Elegir módulos',
	'Instalación',
);

$modulosPorDefecto = ["sistema", "fichada"];

$modulos = [
	['etiqueta' => 'cotizador2', 'nombre' => 'Cotizador 2'],
	['etiqueta' => 'presupuestos', 'nombre' => 'Presupuestos'],
];

