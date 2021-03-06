ErrorDocument 404 /404.php
ErrorDocument 403 /403.php
Options -Indexes

#php_flag display_startup_errors on
#php_flag display_errors on
#php_flag html_errors on
#php_flag  log_errors on
#php_value error_log  /path/to/PHP_errors.log

RewriteEngine On

RewriteRule ^login$ /login.php
RewriteRule ^enlaces$ /enlaces.php
RewriteRule ^enlaces-(.+)$ /enlaces.php?msg=$1
RewriteRule ^usuarios$ /usuarios.php
RewriteRule ^usuarios-(.+)$ /usuarios.php?msg=$1
RewriteRule ^acceso$ /usuariosAcceso.php
RewriteRule ^banners$ /banners.php
RewriteRule ^licencia$ /licencia.php
RewriteRule ^salir$ /cerrarSesion.php

RewriteRule ^cotizador2/admin/administracion$ cotizador2/admin/administracion.php
RewriteRule ^cotizador2/admin/administracion-(.+)$ cotizador2/admin/administracion.php?msg=$1
RewriteRule ^cotizador2/admin/configuracion$ cotizador2/admin/configuraciones.php
RewriteRule ^cotizador2/admin/configuracion-(.+)$ cotizador2/admin/configuraciones.php?msg=$1
RewriteRule ^cotizador2/admin/cot-(\d+)$ cotizador2/admin/cotizacion.php?id=$1
RewriteRule ^cotizador2/admin/cot-(\d+)-(.+)$ cotizador2/admin/cotizacion.php?id=$1&msg=$2
RewriteRule ^cotizador2/admin/cotizaciones$ cotizador2/admin/cotizaciones.php
RewriteRule ^cotizador2/admin/cotizaciones-(.+)$ cotizador2/admin/cotizaciones.php?msg=$1
RewriteRule ^cotizador2/admin/cron$ cotizador2/admin/cron.php
RewriteRule ^cotizador2/admin/cot-(\d+)/pdf$ cotizador2/admin/generar-pdf.php?id=$1
RewriteRule ^cotizador2/admin/cot-(\d+)/pdf/exportar$ cotizador2/admin/generar-pdf.php?id=$1&mode=saveas
RewriteRule ^cotizador2/admin/productos$ cotizador2/admin/productos.php
RewriteRule ^cotizador2/admin/productos-(.+)$ cotizador2/admin/productos.php?msg=$1
RewriteRule ^cotizador2/admin/tareas$ cotizador2/admin/tareasprogramadas.php
RewriteRule ^cotizador2/admin/tareas-(.+)$ cotizador2/admin/tareasprogramadas.php?msg=$1
RewriteRule ^cotizador2/admin/desconectar$ cotizador2/admin/logout.php

RewriteRule ^presupuestos/nuevo$ presupuestos/nuevo.php
RewriteRule ^presupuestos/nuevo-(.+)$ presupuestos/nuevo.php?msg=$1
RewriteRule ^presupuestos/listado$ presupuestos/presupuestos.php
RewriteRule ^presupuestos/listado-(.+)$ presupuestos/presupuestos.php?msg=$1
RewriteRule ^presupuestos/configuracion$ presupuestos/configuracion.php
RewriteRule ^presupuestos/configuracion-(.+)$ presupuestos/configuracion.php?msg=$1
RewriteRule ^presupuestos/tareas$ presupuestos/tareasprogramadas.php
RewriteRule ^presupuestos/tareas-(.+)$ presupuestos/tareasprogramadas.php?msg=$1
RewriteRule ^presupuestos/cron$ presupuestos/cron.php
RewriteRule ^presupuestos/desconectar$ presupuestos/logout.php
RewriteRule ^presupuestos/(\d+)$ presupuestos/presupuesto.php?id=$1
RewriteRule ^presupuestos/(\d+)-(.+)$ presupuestos/presupuesto.php?id=$1&msg=$2
RewriteRule ^presupuestos/(\d+)/pdf$ presupuestos/generar-pdf.php?id=$1
RewriteRule ^presupuestos/(\d+)/pdf/exportar$ presupuestos/generar-pdf.php?id=$1&mode=saveas
