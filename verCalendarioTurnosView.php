<?php

$currDir = dirname(__FILE__);
include("$currDir/defaultLang.php");
include("$currDir/language.php");
include("$currDir/lib.php");
 
include_once("$currDir/header.php");
 

/* grant access to the groups 'Admins' and 'Data entry' */
$mi = getMemberInfo();

if(!in_array($mi['group'], array('Contacto Zonal', 'Superintendente de Turno', 'Superintendente de Turno Avanzado', 'Coordinador PPAM', 'Nexo Informatico', 'Voluntarios', 'Admins', 'ST y Calendario')))
{
	echo "Acceso denegado. Hable con el Administrador.";
	exit;
} 

$URLPosicionCalendario= 'verCalendarioTurnos.php#Semana_'.date("W");

//echo '<BR><BR><BR><BR>'.$URLPosicionCalendario;

echo '
	<div class="row">
		<div class="col-xs-11 col-md-12">
			<div class="page-header"><h1><div class="row"><div class="col-sm-8"><a style="text-decoration: none; color: inherit;"
			href="verCalendarioTurnos.php"><img src="resources/table_icons/calendar_view_week.png"> Ver Calendario de Turnos</a></div>
		</div>
	</div>

<form id="verCalendarioForm" method="post" class="form-horizontal" action="'.$URLPosicionCalendario.'">


	<div class="form-group">
		<label class="col-xs-3 control-label"> </label>
	</div>
	<div class="col-xs-6 col-xs-offset-3">
		<div class="btn-group" style="width: 100%;">
			<input name="mes" value="Mes Actual" type="submit" class="btn btn-lg btn-info" style="width: 100%" " />
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-3 control-label"> </label>
	</div>
	<div class="col-xs-6 col-xs-offset-3">
		<div class="btn-group" style="width: 100%;">
			<input name="mes" value="Mes Siguiente" type="submit" class="btn btn-lg btn-info" style="width: 100%" " />
		</div>
	</div>

</form>' ;


include_once("$currDir/footer.php");

?>