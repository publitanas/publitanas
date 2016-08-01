<?php

$currDir = dirname(__FILE__);
include("$currDir/defaultLang.php");
include("$currDir/language.php");
include("$currDir/lib.php");
 
include_once("$currDir/header.php");
 

/* grant access to the groups 'Admins' and 'Data entry' */
$mi = getMemberInfo();

if(!in_array($mi['group'], array('Admins', 'Nexo Informatico', 'Contacto Zonal', 'Superintendente de Turno Avanzado')))
{
	echo "Acceso denegado. Hable con el Administrador";
	exit;
} 

$mesCalendario = date("n");
$yearCalendario = date("Y");

// Datos Para el mes Siguiente
if ($mesCalendario == 12)
{
	$mesCalendarioTurno = 1;
	$yearCalendarioTurno = date("Y") + 1;
}
else
{
	$mesCalendarioTurno = $mesCalendario + 1;
	$yearCalendarioTurno = date("Y");
}

// Se obtiene PPAM de la definici—n de USuario de la Aplicaci—n
$PPAMCalendarioTurno = getMemberInfo()['custom'][0] ;

if($PPAMCalendarioTurno == '')
	echo showNotifications("Imposible Generar Calendario falta la ubicaci—n PPAM", "alert-danger", true);
else
	$PPAMCalendario = true;

//echo "POST: ".$_POST['accion'];

// Se ejecuta la acci—n seleccionada por el bot—n correspondiente
switch($_POST['accion'])
{
	case "Generar Calendario de Turnos Mes Siguiente":
		if($PPAMCalendario)
		{
			if (generarCalendarioTurnos($mesCalendarioTurno, $yearCalendarioTurno, $PPAMCalendarioTurno))
				echo showNotifications("Calendario Generado Correctamente", "alert-success", true);
			else
				echo showNotifications("Calendario con Errores", "alert-danger", true);
		}
		break;	
	case "Rechequear Incidencias Mes Actual":
//echo "<br>POST 2: ".$mesCalendario." - ".$yearCalendario." - ".$PPAMCalendarioTurno;

		if($PPAMCalendario)
		{
			if (rechequearIncidenciasCalendarioTurnos($mesCalendario, $yearCalendario, $PPAMCalendarioTurno))
				echo showNotifications("Rechequeo de Incidencias realizado correctamente", "alert-success", true);
			else
				echo showNotifications("Rechequeo de Incidencias con Errores", "alert-danger", true);
		}
		break;	
	case "Rechequear Incidencias Mes Siguiente":
//echo "<br>POST 2: ".$mesCalendarioTurno." - ".$yearCalendarioTurno." - ".$PPAMCalendarioTurno;

		if($PPAMCalendario)
		{
			if (rechequearIncidenciasCalendarioTurnos($mesCalendarioTurno, $yearCalendarioTurno, $PPAMCalendarioTurno))
				echo showNotifications("Rechequeo de Incidencias realizado correctamente", "alert-success", true);
			else
				echo showNotifications("Rechequeo de Incidencias con Errores", "alert-danger", true);
		}
		break;	
	case "Borrar Calendario Mes Siguiente":
		if($PPAMCalendario)
		{
			if (borrarCalendarioTurnos($mesCalendarioTurno, $yearCalendarioTurno, $PPAMCalendarioTurno))
				echo showNotifications("Calendario Borrado Correctamente", "alert-success", true);
			else
				echo showNotifications("Calendario Borrado con Errores", "alert-danger", true);
		}
		break;	
	case "Cambiar Horario Turnos":
		break;	
	case "Publicar Calendario Mes Siguiente":
		if($PPAMCalendario)
		{
			if (PublicarCalendarioTurnos($mesCalendarioTurno, $yearCalendarioTurno, $PPAMCalendarioTurno))
				echo showNotifications("Publicado Calendario Correctamente", "alert-success", true);
			else
				echo showNotifications("No se pudo Publicar Calendario", "alert-danger", true);
		}
		break;
	case "Cambiar Fecha Calendario Mes Actual":
		if($PPAMCalendario)
		{
			if (cambiarFechaCalendarioTurnos($mesCalendario, $yearCalendario, $PPAMCalendarioTurno))
				echo showNotifications("Fecha Cambiada Correctamente", "alert-success", true);
			else
				echo showNotifications("Fecha Cambiada con Errores", "alert-danger", true);
		}
		break;
	case "Cambiar Fecha Calendario Mes Siguiente":
		if($PPAMCalendario)
		{
			if (cambiarFechaCalendarioTurnos($mesCalendarioTurno, $yearCalendarioTurno, $PPAMCalendarioTurno))
				echo showNotifications("Fecha Cambiada Correctamente", "alert-success", true);
			else
				echo showNotifications("Fecha Cambiada con Errores", "alert-danger", true);
		}
		break;
	}

header("refresh: 4; URL=generadorCalendarioTurnosView.php"); 


function generarCalendarioTurnos($mes, $year, $idPPAM)
{
	$resultadoInsert = "insert into t_turnos_hermanos (IdPPAM, IdTurno, IdVoluntario, IdResponsabilidad, FechaAsignacionTurno) values ";

	for ($i=1; $i<32; $i++)
	{
		$fecha= $year."-".$mes."-".$i;

		if(checkdate($mes, $i, $year))
		{
//echo "<br>Busco datos: ".$fecha;		
			
			$strInsert = buscarDiaMaestroTurnos($fecha, $idPPAM);
			if (!$strInsert)
			{
				return false;	
			}
			else
				$resultadoInsert .= $strInsert;
			
		}
	}

	$resultadoInsert = substr($resultadoInsert, 0, strlen($resultadoInsert)-2);

//echo "<br>Insert Completo del Mes: ".$resultadoInsert."<br><br><br><br><br>";		
	$resultadoInsert = sql($resultadoInsert, $error);

	if($error)
	{
		echo showNotifications("Error al insertar: ".$error, "alert-danger", true);
		return false;
	}

	// Se genera el registro en t_Calendario_turnos
	$resultadoInsertT_Calendario = "insert into t_calendario_turnos (IdPPAM, mes, year, VersionCalendario, FechaPublicacionCalendario) values (".$idPPAM.", ".$mes.", ".$year.", -1, '".date("Y-m-d")."') ";

//echo "<br>Insert t_Calendario_turnos: ".$resultadoInsertT_Calendario."<br><br><br><br><br>";		
	$resultadoInsertT_Calendario = sql($resultadoInsertT_Calendario, $error);

	if($error)
	{
		echo showNotifications("Error al insertar en t_Calendario_turnos ".$error, "alert-danger", true);
		return false;
	}
	
	return true;
}


function buscarDiaMaestroTurnos($fecha, $idPPAM)
{
	// Obtenemos el día de la semana de la fecha pasada
	$diaSemana = date('N', strtotime($fecha));
	
//echo "<br>DIA SEMANA:".$diaSemana;


	// Buscamos los datos del maestro de turnos para el día de la semana pasado
	$datosMaestroTurnos = sql("select distinct IdTurnoHermanoMaestro, t_turnos_hermanos_maestro.IdPPAM, IdDiaSemana, IdTurno, t_turnos_hermanos_maestro.IdVoluntario, IdResponsabilidad from t_turnos_hermanos_maestro, t_incidencias where t_turnos_hermanos_maestro.IdPPAM = '".$idPPAM."' and IdDiaSemana = '".$diaSemana."' and t_turnos_hermanos_maestro.IdVoluntario not in (select IdVoluntario from t_incidencias where t_incidencias.IdPPAM = '".$idPPAM."' and t_incidencias.FechaIncidencia = '".$fecha."')", $error);

	if($error)
	{
		echo showNotifications("Error al Buscar datos del Calendario Maestro: ".$error, "alert-danger", true);
		return false;
	}
	if($datosMaestroTurnos == null)
	{
		echo showNotifications("No hay datos del Calendario Maestro para este PPAM", "alert-danger", true);
		return false;
	}


	while($registro=db_fetch_row($datosMaestroTurnos))
	{
		$consultaInsert .= "(".$registro[1].", ".$registro[3].", ".$registro[4].", ".$registro[5].", '".$fecha."'), ";
	}	

	return  $consultaInsert;
}

function borrarCalendarioTurnos($mes, $year, $idPPAM)
{
	$resultadoDelete = "delete from t_turnos_hermanos where idPPAM = ".$idPPAM." and FechaAsignacionTurno >= '".$year."-".$mes."-01' and FechaAsignacionTurno <= '".$year."-".$mes."-31'";

	$resultadoDelete = sql($resultadoDelete, $error);

	if($error)
	{
		echo showNotifications("Error al Borrar Datos del Calendario de Turnos", "alert-danger", true);
		return false;
	}

	return true;
}

function rechequearIncidenciasCalendarioTurnos($mes, $year, $idPPAM)
{
	$consultaIncidencias = "SELECT IdIncidencia, t_incidencias.idppam, t_incidencias.IdVoluntario, FechaIncidencia, IdTurnoHermano FROM `t_incidencias`, t_turnos_hermanos WHERE t_incidencias.idppam = ".$idPPAM." and FechaIncidencia>= '" .$year."-".$mes."-01' and FechaIncidencia<= '".$year."-".$mes."-31' and t_turnos_hermanos.IdPPAM= t_incidencias.idppam and t_turnos_hermanos.FechaAsignacionTurno = t_incidencias.FechaIncidencia and t_turnos_hermanos.IdVoluntario = t_incidencias.IdVoluntario order by FechaIncidencia";

//echo '<br>'.$consultaIncidencias;

	$resultadoConsultaInc = sql($consultaIncidencias, $error);


	if($error)
	{
		echo showNotifications("Error al Rechequear Incidencias ".$error, "alert-danger", true);
		return false;
	}
	

	while($registroInc = db_fetch_row($resultadoConsultaInc))
	{
		if ($registroInc[4] != null)
		{
//echo "<br> Borrando Registro - Delete from t_turnos_hermanos where IdTurnoHermano = ".$registroInc[4];

			$resultadoBorrado = sql("Delete from t_turnos_hermanos where IdTurnoHermano = ".$registroInc[4] , $error);

			if($error)
			{
				echo showNotifications("Error al Borrar Turno en rechequeo de Incidencias. ".$error, "alert-danger", true);
				return false;
			}
		}
	}		

	
	return true;

}

function publicarCalendarioTurnos($mes, $year, $idPPAM)
{
//	echo "Fecha: ".date("Y-m-d");
	
	$resultadoUpdate = "update t_calendario_turnos set VersionCalendario = 0, FechaPublicacionCalendario = '".date("Y-m-d")."' where idPPAM = ".$idPPAM." and mes = '".$mes."' and year = '".$year."' and VersionCalendario = -1";

	$resultadoUpdate = sql($resultadoUpdate, $error);

	if($error)
	{
		echo showNotifications("Error al Cambiar Fecha del Calendario de Turnos", "alert-danger", true);
		return false;
	}

	return true;
}

function cambiarFechaCalendarioTurnos($mes, $year, $idPPAM)
{
//	echo "Fecha: ".date("Y-m-d");
	
	$resultadoUpdate = "update t_calendario_turnos set FechaPublicacionCalendario = '".date("Y-m-d")."' where idPPAM = ".$idPPAM." and mes = '".$mes."' and year = '".$year."' and VersionCalendario >= 0";

	$resultadoUpdate = sql($resultadoUpdate, $error);

	if($error)
	{
		echo showNotifications("Error al Cambiar Fecha del Calendario de Turnos", "alert-danger", true);
		return false;
	}

	return true;
}
//include_once("$currDir/footer.php");

?>