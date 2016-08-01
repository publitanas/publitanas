<?php
	// For help on using hooks, please refer to http://bigprof.com/appgini/help/working-with-generated-web-database-application/hooks

	function t_incidencias_init(&$options, $memberInfo, &$args){

		$options->DefaultSortField = '`t_incidencias`.`IdPPAM` asc, `t_incidencias`.`FechaIncidencia` desc, `t_incidencias`.`IdVoluntario` asc';

		$DisplayRecords = $_REQUEST['DisplayRecords'];
		if(!in_array($DisplayRecords, array('user', 'group')))
		{ 
			$DisplayRecords = 'all'; 
		}

		$perm=getTablePermissions('t_incidencias');
		
		$Filtro = !$_REQUEST['NoFilter_x'];
		
//echo '<BR><BR><BR><BR>'.$perm[2].'<BR>'.$DisplayRecords.'<BR>'.$Filtro.'<BR>InfoUsuario[0]:'.$memberInfo['custom'][0].'<BR>InfoUsuario[1]:'.$memberInfo['custom'][1];

		if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
		
		if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && $Filtro)) // Ve sólo los registros que ha creado el usuario
		{ 
			$options->QueryFrom.=', membership_userrecords';
			$options->QueryWhere="where `t_incidencias`.`IdIncidencia`=membership_userrecords.pkValue and membership_userrecords.tableName='t_incidencias' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
		}
		elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && $Filtro))  // Ve todos los registros del PPAM al que pertenece el usuario
		{ 
			$options->QueryWhere="where `t_incidencias`.`IdPPAM` = '" .$memberInfo['custom'][0] ."' ";
		}
		elseif($perm[2]==3)
		{ 
			if ($memberInfo['custom'][1] != 99)
			{
				$options->QueryFrom.=', t_ubicaciones_ppam ';
				$options->QueryWhere=" where `t_ubicaciones_ppam`.`IdCiudadPPAM` = '" .$memberInfo['custom'][1] ."' and `t_incidencias`.`IdPPAM` = `t_ubicaciones_ppam`.`IdPPAM` ";		
			}
		}
		elseif($perm[2]==0)  // No tiene permisos para ver registros
		{ 
			$options->QueryFields = array("Not enough permissions" => "NEP");
			$options->QueryFrom = '`t_incidencias`';
			$options->QueryWhere = '';
			$options->DefaultSortField = '';
		}
		
//echo '<BR><BR><BR><BR>'.$options->QueryWhere;

		return TRUE;
	}

	function t_incidencias_header($contentType, $memberInfo, &$args){
		$header='';

		switch($contentType){
			case 'tableview':
				$header='';
				break;

			case 'detailview':
				$header='';
				break;

			case 'tableview+detailview':
				$header='';
				break;

			case 'print-tableview':
				$header='';
				break;

			case 'print-detailview':
				$header='';
				break;

			case 'filters':
				$header='';
				break;
		}

		return $header;
	}

	function t_incidencias_footer($contentType, $memberInfo, &$args){
		$footer='';

		switch($contentType){
			case 'tableview':
				$footer='';
				break;

			case 'detailview':
				$footer='';
				break;

			case 'tableview+detailview':
				$footer='';
				break;

			case 'print-tableview':
				$footer='';
				break;

			case 'print-detailview':
				$footer='';
				break;

			case 'filters':
				$footer='';
				break;
		}

		return $footer;
	}

	function t_incidencias_before_insert(&$data, $memberInfo, &$args){

		return TRUE;
	}

	function t_incidencias_after_insert($data, $memberInfo, &$args){

		return TRUE;
	}

	function t_incidencias_before_update(&$data, $memberInfo, &$args){

		return TRUE;
	}

	function t_incidencias_after_update($data, $memberInfo, &$args){

		return TRUE;
	}

	function t_incidencias_before_delete($selectedID, &$skipChecks, $memberInfo, &$args){

		return TRUE;
	}

	function t_incidencias_after_delete($selectedID, $memberInfo, &$args){

	}

	function t_incidencias_dv($selectedID, $memberInfo, &$html, &$args){

	}

	function t_incidencias_csv($query, $memberInfo, &$args){

		return $query;
	}
	function t_incidencias_batch_actions(&$args){

		return array();
	}
