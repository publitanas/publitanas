<?php

$currDir = dirname(__FILE__);
include("$currDir/defaultLang.php");
include("$currDir/language.php");
include("$currDir/lib.php");
 
include_once("$currDir/header.php");
 

/* grant access to the groups 'Admins' and 'Data entry' */
$mi = getMemberInfo();

if(!in_array($mi['group'], array('Admins', 'Contacto Zonal', 'Nexo Informatico', 'Superintendente de Turno Avanzado')))
{
	echo "Acceso denegado. Hable con el Administrador";
	exit;
} 

echo '
<div class="row">
	<div class="col-xs-11 col-md-12">
		<div class="page-header"><h1><div class="row"><div class="col-sm-8"><a style="text-decoration: none; color: inherit;" href="generadorCalendarioTurnosView.php"><img src="resources/table_icons/database_repeat.png">Generador del Calendario de Turnos</a></div>
	</div>
</div>


<form id="generadorCalendarioForm" method="post" class="form-horizontal" action="generadorCalendarioTurnos.php">


	<div class="form-group">
		<label class="col-xs-3 control-label"> </label>
	</div>
	<div class="col-xs-6 col-xs-offset-3">
		<div class="btn-group" style="width: 100%;">
			<input name="accion" value="Generar Calendario de Turnos Mes Siguiente" type="submit" class="btn btn-lg btn-info" style="width: 100%" " />
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-3 control-label"> </label>
	</div>
	<div class="col-xs-6 col-xs-offset-3">
		<div class="btn-group" style="width: 100%;">
			<input name="accion" value="Rechequear Incidencias Mes Actual" type="submit" class="btn btn-lg btn-info" style="width: 100%" " />
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-3 control-label"> </label>
	</div>
	<div class="col-xs-6 col-xs-offset-3">
		<div class="btn-group" style="width: 100%;">
			<input name="accion" value="Rechequear Incidencias Mes Siguiente" type="submit" class="btn btn-lg btn-info" style="width: 100%" " />
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-3 control-label"> </label>
	</div>
	<div class="col-xs-6 col-xs-offset-3">
		<div class="btn-group" style="width: 100%;">
			<input name="accion" value="Borrar Calendario Mes Siguiente" type="submit" class="btn btn-lg btn-info" style="width: 100%" " />
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-3 control-label"> </label>
	</div>
	<div class="col-xs-6 col-xs-offset-3">
		<div class="btn-group" style="width: 100%;">
			<input name="accion" value="Publicar Calendario Mes Siguiente" type="submit" class="btn btn-lg btn-info" style="width: 100%" " />
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-3 control-label"> </label>
	</div>
	<div class="col-xs-6 col-xs-offset-3">
		<div class="btn-group" style="width: 100%;">
			<input name="accion" value="Cambiar Fecha Calendario Mes Actual" type="submit" class="btn btn-lg btn-info" style="width: 100%" " />
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-3 control-label"> </label>
	</div>
	<div class="col-xs-6 col-xs-offset-3">
		<div class="btn-group" style="width: 100%;">
			<input name="accion" value="Cambiar Fecha Calendario Mes Siguiente" type="submit" class="btn btn-lg btn-info" style="width: 100%" " />
		</div>
	</div>


</form>' ;

//			<a style="width: 100%;" class="btn btn-lg btn-info" title="" <img src="resources/table_icons/database_repeat.png"><strong>Generar Calendario de Turnos</strong></a>


include_once("$currDir/footer.php");

?>