<?php

$currDir = dirname(__FILE__);
include("$currDir/defaultLang.php");
include("$currDir/language.php");
include("$currDir/lib.php");
 
include_once("$currDir/header.php");
 
$bPonerEnlaces = false;

/* grant access to the groups 'Admins' and 'Data entry' */
$mi = getMemberInfo();

if(!in_array($mi['group'], array('Contacto Zonal', 'Superintendente de Turno', 'Superintendente de Turno Avanzado', 'Coordinador PPAM', 'ST y Calendario', 'Nexo Informatico',  'Voluntarios', 'Admins')))
{
	echo "Acceso denegado. Hable con el Administrador";
	exit;
} 

if(!in_array($mi['group'], array('Superintendente de Turno', 'Voluntarios')))
{
	$bPonerEnlaces = true;
//echo "Poner Enlaces";
}

//echo "POST: ".$_POST['mes'];

// 18 de Julio de 2016 Josué Ortega
$mes=$_GET['mes'];

if($_POST['mes']=='')
{	
	$_POST['mes']=$mes ;
}
$_SESSION['mes']=$_POST['mes'];
//Fin  18 de Julio de 2016 Josué Ortega


switch ($_POST['mes'])
{
	case "Mes Actual":
	{
		$yearSolicitado = getdate()[year];
		$mesSolicitado = getdate()[mon];
		break;
	}
	case "Mes Siguiente":
	{
		if (getdate()[mon] == 12)
		{
			$yearSolicitado = getdate()[year] + 1;
			$mesSolicitado = 1;
		}
		else
		{
			$yearSolicitado = getdate()[year];
			$mesSolicitado = getdate()[mon] +1;
		}
		
		break;
	}
}		

if ($_GET['mes']=="MesEspecifico")
{
	$yearSolicitado = $_GET['yearSolicitado'];
	$mesSolicitado = $_GET['mesSolicitado'];
	
}

//echo "POST: ".$yearSolicitado.' - '.$mesSolicitado;

if ($mesSolicitado && $yearSolicitado)
{
	$arrDatosCalendario = buscarDatosCalendario($mesSolicitado, $yearSolicitado, $bPonerEnlaces);
	
	// Si no tiene datos...
	if (!$arrDatosCalendario[1])
	{
		echo showNotifications("No existen datos para el Calendario solicitado", "alert-danger", true);
	}
	else
	{
		if (!pintarCalendario($arrDatosCalendario, $mesSolicitado, $yearSolicitado))
			echo showNotifications("Problemas al pintar el Calendario", "alert-danger", true);
	}
}
else
{
	echo showNotifications("Imposible Ver Calendario", "alert-danger", true);

}	


echo '
	<div class="row">
		<div class="col-xs-11 col-md-12">
			<div class="page-header"><h1><div class="row"><div class="col-sm-8"><a style="text-decoration: none; color: inherit;"
			href="index.php"><img src="resources/table_icons/house.png">Volver al Men&uacute; Principal</a></div>
		</div>
	</div>';


function buscardatosCalendario($mesDatos, $yearDatos, $ponerEnlaces)
{
	$inicioBusquedaDatos = $yearDatos.'-'.$mesDatos.'-1';
	$finBusquedaDatos =  $yearDatos.'-'.$mesDatos.'-31';
	$idPPAM = getMemberInfo()['custom'][0];
	$arrayCalendario = array();
	$marcarDiaCalendario = false;
	$idUsuario = getMemberInfo()['custom'][2];

	
	if ($idPPAM == "")
	{
		echo showNotifications("Imposible Ver Calendario", "alert-danger", true);
		return false;
	}

	$datosPPAM = sql("select * from t_ubicaciones_ppam, t_horarios_calendario_turnos where t_ubicaciones_ppam.IdPPAM = ".$idPPAM." and t_horarios_calendario_turnos.IdPPAM = ".$idPPAM, $eo);
	if ($datosPPAM == null or $eo != "")
		return false;
	else
	{
		while($registroPPAM=db_fetch_row($datosPPAM))
		{
			// La posici—n 0 del Array de Datos, la uso para guardar el nombre del PPAM
			$arrayCalendario[0][0]= $registroPPAM[1];
			//Horario Turno 1
			$arrayCalendario[0][1]= $registroPPAM[9];
			$arrayCalendario[0][2]= $registroPPAM[10];
			//Horario Turno 2
			$arrayCalendario[0][3]= $registroPPAM[11];
			$arrayCalendario[0][4]= $registroPPAM[12];
			//Horario Turno 3
			$arrayCalendario[0][5]= $registroPPAM[13];
			$arrayCalendario[0][6]= $registroPPAM[14];
			//Horario Turno 4
			$arrayCalendario[0][7]= $registroPPAM[15];
			$arrayCalendario[0][8]= $registroPPAM[16];
		}
	}

	// Pongo por defecto Revisi—n 1
	$arrayCalendario[0][9]= "1";
	$arrayCalendario[0][10]= "01-01-2016";
		


	// Se buscan los datos de Revision y Fecha del Calendario
	$datosVersion = sql("select * from t_calendario_turnos where IdPPAM = ".$idPPAM." and mes = ".$mesDatos." and year = ".$yearDatos, $eo);

//echo "select * from t_calendario_turnos where IdPPAM = ".$idPPAM." and mes = ".$mesDatos." and year = ".$yearDatos;
	
	while($registroVersion=db_fetch_row($datosVersion))
	{
		// La posici—n 0 del Array de Datos
		$arrayCalendario[0][9]= $registroVersion[4];

		if ($registroVersion[4] == -1)
		{
			$arrayCalendario[0][10] = '<B>'.' BORRADOR'. '</B>';
			
			$datosUsuario = getMemberInfo();
			if(in_array($datosUsuario['group'], array('Superintendente de Turno', 'Voluntarios')))
			{
				echo showNotifications("Imposible Ver Calendario", "alert-danger", true);
				return false;
			}
		}
		else
			$arrayCalendario[0][10]= date("d-m-Y", strtotime($registroVersion[5]));

	}


	
	// Buscamos los datos de los turnos 
	$datosCalendario = sql("select th.FechaAsignacionTurno, th.IdTurno, th.IdResponsabilidad, tv.NombreVoluntario, tv.TelefonoMovilVoluntario, th.IdTurnoHermano, tv.IdVoluntario from t_turnos_hermanos th, t_voluntarios tv where th.IdPPAM = ".$idPPAM." and FechaAsignacionTurno >= '".$inicioBusquedaDatos."' and FechaAsignacionTurno <= '".$finBusquedaDatos."' and tv.IdVoluntario = th.IdVoluntario order by FechaAsignacionTurno, th.IdTurno, th.IdResponsabilidad ", $eo);

	// S la consulta no devuelve datos o da error devuelvo como que no hay datos del calendario
	if ($datosCalendario == null or $eo != "")
		return false;


	
	$idTurno = 0;
	$diaDatos = 1;
	$cadenaCalendario = "";
	$finCadena = false;


	while($registro=db_fetch_row($datosCalendario))
	{

		if ($idTurno !=$registro[1]) 
		{
			if ($finCadena)
			{
				$arrayCalendario[$diaDatos][$idTurno][2] = reemplazarCaracteres($cadenaCalendario);
				$cadenaCalendario = "";
	
//echo "<br> DIA: ".$diaDatos." TURNO: ".$idTurno." .2- ".$arrayCalendario[$diaDatos][$idTurno][2] ;
			}
				
			$idTurno = $registro[1];
			$diaDatos= date("j", strtotime($registro[0]));  

			//Reviso si hay que marcar el día
			if ($registro[6] == $idUsuario)
			{
				$marcarDiaCalendario = true;
				$arrayCalendario[$diaDatos][$idTurno][3]=true;
			}
			else
				$marcarDiaCalendario = false;

			
			if ($ponerEnlaces)
			{
				$arrayCalendario[$diaDatos][$idTurno][1] = '<a href="./t_turnos_hermanos_view.php?SelectedID='.$registro[5].'&mespaso='.$_POST['mes'].'">'.reemplazarCaracteres($registro[3]."</a><br> ".$registro[4]." <br> ");
			}
			else
			{
				$arrayCalendario[$diaDatos][$idTurno][1] = reemplazarCaracteres($registro[3]." <br> ".$registro[4]." <br> ");
			}
//echo "<br> DIA: ".$diaDatos." TURNO: ".$idTurno." .1- ".$arrayCalendario[$diaDatos][$idTurno][1] ;

		}
		else		
		{
			//Reviso si hay que marcar el día
			if ($registro[6] == $idUsuario)
			{
				$marcarDiaCalendario = true;
				$arrayCalendario[$diaDatos][$idTurno][3]=true;
			}
			else
				$marcarDiaCalendario = false;


			if ($ponerEnlaces)
				$cadenaCalendario .= '<a href="./t_turnos_hermanos_view.php?SelectedID='.$registro[5].'&mespaso='.$_POST['mes'].'">'.$registro[3]."</a><br> ".$registro[4]." <br> ";
			else
				$cadenaCalendario .= $registro[3]." <br> ".$registro[4]." <br> ";			
			
			$finCadena=true;
		}
	}

	if ($finCadena)
	{
		$arrayCalendario[$diaDatos][$idTurno][2] = reemplazarCaracteres($cadenaCalendario);
//echo "<br> DIA: ".$diaDatos." TURNO: ".$idTurno." - ".$arrayCalendario[$diaDatos][$idTurno] ;
	}
	
	return $arrayCalendario;
}


function reemplazarCaracteres($cadena)
{
	$no_permitidas= array ("‡","Ž","’","—","œ","ç","ƒ","ê","î","ò","–");
	
	$permitidas= array ("&aacute;","&eacute;","&iacute;","&oacute;","&uacute;","&Aacute;","&Eacute;","&Iacute;","&Oacute;","&Uacute;","&ntilde;");
	$texto = str_replace($no_permitidas, $permitidas ,$cadena);
	return $texto;
}

function pintarCalendario($arrCalendario, $mesPintarCalendario, $yearPintarCalendario)
{
	$arrayMeses = array('ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE');
	$mesFechaCalendario = $arrayMeses[$mesPintarCalendario-1];	// Resto 1 porque el primer elemento del array es el 0

	$primerDiaMes = date("N", strtotime($yearPintarCalendario.'-'.$mesPintarCalendario.'-1'));
	$ultimoDiaMes = date("t", strtotime($yearPintarCalendario.'-'.$mesPintarCalendario.'-1'));
	$semanaDia_1_Mes = date("W", strtotime($yearPintarCalendario.'-'.$mesPintarCalendario.'-1'));
	$ultimoDiaPintadoCabecera = 0;
	$ultimoDiaPintadoDatos = 0;
	$ultimoDiaPintadoDatosAnterio = 0;
	$horasTurno = "";
	$colorTurno = "";
	$strDatosST = "";
	$strDatosTurno = "";
	$strFilaFinal = "";
	$bPonerCabecera = false;
	$bPonerDatos = false;
	$bPonerDatosAnterior = false;


	$strCabeceraDiasSemana = '</tr>
			<tr>
				<th class="text-center">Lunes</th>
				<th class="text-center">Martes</th>
				<th class="text-center">Mi&eacute;rcoles</th>
				<th class="text-center">Jueves</th>
				<th class="text-center">Viernes</th>
				<th class="text-center">S&aacute;bado</th>
				<th class="text-center">Domingo</th>
			</tr>
		</thead>
		<tbody>';

	$strCodigoHTML =  '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calendario de Turnos</title>
 
    <!-- CSS de Bootstrap -->
    <link href="bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="bootstrap.min.js"></script>
  </head>


<div class="panel panel-primary">
	<div class="panel-heading  text-center"><STRONG>CALENDARIO TURNOS '.$mesFechaCalendario.' - '.strtoupper($arrCalendario[0][0]).' - Actualizado a: '.$arrCalendario[0][10].'</STRONG></div>
	<table class="table table-responsive table-bordered table-condesed">';

	$strCodigoHTML .= '<td class="text-center active" ><A id="Semana_'.date("W", strtotime($yearPintarCalendario.'-'.$mesPintarCalendario.'-1')).'"></A></td>';

	
	for ($iTablas = 1; $iTablas<8; $iTablas++)
	{		
		//Monto la Tabla
		$strCodigoHTML .= '
		<thead>
			<tr>
				<th class="text-center" style="vertical-align:middle" rowspan= 2>Horas</th>';

 		// Pone los D’as del Mes
		for ($i=1; $i<8; $i++)
		{
			
			if (($i >= $primerDiaMes and $ultimoDiaPintadoCabecera < $ultimoDiaMes) or $bPonerCabecera)
			{
				$ultimoDiaPintadoCabecera++;
				
				if($i == $primerDiaMes)
					$bPonerCabecera = true;
				
				if($ultimoDiaPintadoCabecera == $ultimoDiaMes )
				{
					$bPonerCabecera = false;
					$iTablas = 8;
				}
				$strCodigoHTML .= '<th class="text-center">'.$ultimoDiaPintadoCabecera.' '.$mesFechaCalendario.'</th>';
			}
			else
			{
				$strCodigoHTML .= '<th class="text-center"></th>';						
			}

		}
		
		$strCodigoHTML .= $strCabeceraDiasSemana;
		$ultimoDiaPintadoDatosAnterior = $ultimoDiaPintadoDatos;
		$bPonerDatosAnterior = $bPonerDatos;

	
		for ($iTurno=1;$iTurno<5; $iTurno++)
		{
			$strCodigoHTML .= '';
			$strLineaFinal = '<td class="text-center active" >'/*<A id="Semana_'.date("W", strtotime($yearPintarCalendario.'-'.$mesPintarCalendario.'-'.$ultimoDiaPintadoCabecera)).'">Semana_'.date("W", strtotime($yearPintarCalendario.'-'.$mesPintarCalendario.'-'.$ultimoDiaPintadoCabecera)).'</A>*/.'</td>';
			$strDatosST = '';
			$strDatosTurno = '<tr>';

			
			$ultimoDiaPintadoDatos = $ultimoDiaPintadoDatosAnterior;
			$bPonerDatos = $bPonerDatosAnterior;
			
			switch ($iTurno)
			{
				case 1:
					if ($arrCalendario[0][1]== "") 
						$horasTurno = '9:00 <br>-<br> 12:00';
					else
						$horasTurno = $arrCalendario[0][1].' <br>-<br> '.$arrCalendario[0][2];
					
					$colorTurno = '';
					break;
				case 2:
					if ($arrCalendario[0][3]== "") 
						$horasTurno = '12:00 <br>-<br> 15:00';
					else
						$horasTurno = $arrCalendario[0][3].' <br>-<br> '.$arrCalendario[0][4];
					$colorTurno = '';
					break;
				case 3:
					if ($arrCalendario[0][5]== "") 
						$horasTurno = '15:00 <br>-<br> 18:00';
					else
						$horasTurno = $arrCalendario[0][5].' <br>-<br> '.$arrCalendario[0][6];
					$colorTurno = '';
					break;
				case 4:
					if ($arrCalendario[0][7]== "") 
						$horasTurno = '18:00 <br>-<br> 21:00';
					else
						$horasTurno = $arrCalendario[0][7].' <br>-<br> '.$arrCalendario[0][8];
					$colorTurno = '';
					break;
			}

			for ($i=1; $i<8; $i++)
			{
				if (($i >= $primerDiaMes and $ultimoDiaPintadoDatos <= $ultimoDiaMes) or $bPonerDatos)
				{
					$ultimoDiaPintadoDatos++;

					if($i == $primerDiaMes)
						$bPonerDatos = true;
					
					if($ultimoDiaPintadoDatos == $ultimoDiaMes )
					{
						$bPonerDatos = false;
						$iTablas = 7;
					}

					//Chequeo si tengo que marcar el turno
					if ($arrCalendario[$ultimoDiaPintadoDatos][$iTurno][3])
						$colorTurno = 'danger';
					else
						$colorTurno = '';

					if ($arrCalendario[$ultimoDiaPintadoDatos][$iTurno][1] == "")
					{	
						$strDatosST .= '<td class="text-center warning"><strong></strong></td>';
					}
					else
					{
						if ($arrCalendario[$ultimoDiaPintadoDatos][$iTurno][3])
							$strDatosST .= '<td class="text-center danger"><strong>'.$arrCalendario[$ultimoDiaPintadoDatos][$iTurno][1].'</strong></td>';
						else
							$strDatosST .= '<td class="text-center warning"><strong>'.$arrCalendario[$ultimoDiaPintadoDatos][$iTurno][1].'</strong></td>';
					}

					if ($arrCalendario[$ultimoDiaPintadoDatos][$iTurno][2] == "")		
					{
						$strDatosTurno .= '<td class="text-center '.$colorTurno.'" ></td>';							
					}
					else		
					{
						$strDatosTurno .= '<td class="text-center '.$colorTurno.'" >'.$arrCalendario[$ultimoDiaPintadoDatos][$iTurno][2].'</td>';							
					}
				}
				else
				{
					$strDatosST .= '<td class="text-center warning"></td>';
					$strDatosTurno .= '<td class="text-center '.$colorTurno.'" ></td>';							
				}

				$strLineaFinal .= '<td class="text-center active" ></td>';
			}

			$strCodigoHTML .= '
			<tr><td class="text-center info" style="vertical-align:middle" rowspan= 2>'.$horasTurno.'</td>'.$strDatosST.$strDatosTurno.'</tr>'.'</tr>';
		}
		
		// Pongo la marca de la Distintas Semanas del Mes
		$strCodigoHTML.='<tr><td><A id="Semana_'.date("W", strtotime($yearPintarCalendario.'-'.$mesPintarCalendario.'-'.($ultimoDiaPintadoCabecera+1))).'"> &nbsp</A></td></tr>';
//echo "<BR>".date("W", strtotime($yearPintarCalendario.'-'.$mesPintarCalendario.'-'.$ultimoDiaPintadoCabecera));
		
		$strCodigoHTML .= '<tr>'.$strLineaFinal.'</tr><tr>'.$strLineaFinal.'</tr></tbody>';
			
	}

	$strCodigoHTML.='</table></div>';
	
	echo $strCodigoHTML;
	
	return true;
	
}


include_once("$currDir/footer.php");

?>