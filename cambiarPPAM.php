<?php

$currDir = dirname(__FILE__);
include("$currDir/defaultLang.php");
include("$currDir/language.php");
include("$currDir/lib.php");
 
include_once("$currDir/header.php");
 

/* grant access to the groups 'Admins' and 'Data entry' */
$mi = getMemberInfo();

if(!in_array($mi['group'], array('Contacto Zonal', 'Contacto Zonal BCN', 'Superintendente de Turno', 'Superintendente de Turno Avanzado', 'Coordinador PPAM', 'Nexo Informatico',  'Voluntarios', 'Admins')))
{
	echo "Acceso denegado. Hable con el Administrador";
	exit;
} 

//echo "Seleccionada Opcion - ".$_POST['opcion'];

$arrPPAMUsuario = getListaPPAM($mi['email']);
$opcionSeleccionada = $_POST['opcion'];

//Guardamos los datos
$sentenciaUpdate = 'UPDATE membership_users set custom1 = '.$arrPPAMUsuario[$opcionSeleccionada][0].', custom3='.$arrPPAMUsuario[$opcionSeleccionada][2].' WHERE memberID = \''.$mi['username'].'\'';

//echo '<br>'.$sentenciaUpdate;

sql($sentenciaUpdate, $eo);

echo '<script>history.go(-1);</script>';

?>
