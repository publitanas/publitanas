<?php
	// For help on using hooks, please refer to http://bigprof.com/appgini/help/working-with-generated-web-database-application/hooks

	function v_informeturnosporsemana_init(&$options, $memberInfo, &$args)
	{
		$options->DefaultSortField = '`v_informeturnosporsemana`.`NombreVoluntario` asc, `v_informeturnosporsemana`.`semana` desc';

		$DisplayRecords = $_REQUEST['DisplayRecords'];
		if(!in_array($DisplayRecords, array('user', 'group')))
		{ 
			$DisplayRecords = 'all'; 
		}

		$perm=getTablePermissions('v_informeturnosporsemana');
		
		$Filtro = !$_REQUEST['NoFilter_x'];

//echo '<BR><BR><BR><BR>'.$perm[2].'<BR>'.$DisplayRecords.'<BR>'.$Filtro.'<BR>InfoUsuario[0]:'.$memberInfo['custom'][0].'<BR>InfoUsuario[1]:'.$memberInfo['custom'][1];

		if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && $Filtro)) // Ve sólo los registros que ha creado el usuario
		{ 
			// NO aplica
//			$options->QueryFrom.=', membership_userrecords';
//			$options->QueryWhere=" where `t_voluntarios`.`IdVoluntario`=membership_userrecords.pkValue and membership_userrecords.tableName='t_voluntarios' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
		}
		elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && $Filtro))  // Ve todos los registros del PPAM al que pertenece el usuario
		{ 
//				$options->QueryWhere=" where `v_informeturnosporsemana`.`IdCiudadPPAM` = '".$memberInfo['custom'][0]."' "; 
		}
		elseif($perm[2]==3) // Ver todos los registros de una Ciudad salvo la Ciudad 99 que ve todas las Ciudades
		{ 
			if ($memberInfo['custom'][1] != 99)
			{
//				$options->QueryWhere=" where `t_ciudades_ppam`.`IdCiudadPPAM` = '".$memberInfo['custom'][1]."' "; 
			}
		}
		elseif($perm[2]==0)   // No tiene permiso para ver registros
		{
			$options->QueryFields = array("Not enough permissions" => "NEP");
			$options->QueryFrom = '`v_informeturnosporsemana`';
			$options->QueryWhere = '';
			$options->DefaultSortField = '';
		}

//echo '<BR><BR><BR><BR>'.$options->QueryWhere;

		return TRUE;
	}

	function v_informeturnosporsemana_header($contentType, $memberInfo, &$args){
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

	function v_informeturnosporsemana_footer($contentType, $memberInfo, &$args){
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

	function v_informeturnosporsemana_before_insert(&$data, $memberInfo, &$args){

		return TRUE;
	}

	function v_informeturnosporsemana_after_insert($data, $memberInfo, &$args){

		return TRUE;
	}

	function v_informeturnosporsemana_before_update(&$data, $memberInfo, &$args){

		return TRUE;
	}

	function v_informeturnosporsemana_after_update($data, $memberInfo, &$args){

		return TRUE;
	}

	function v_informeturnosporsemana_before_delete($selectedID, &$skipChecks, $memberInfo, &$args){

		return TRUE;
	}

	function v_informeturnosporsemana_after_delete($selectedID, $memberInfo, &$args){

	}

	function v_informeturnosporsemana_dv($selectedID, $memberInfo, &$html, &$args){

	}

	function v_informeturnosporsemana_csv($query, $memberInfo, &$args){

		return $query;
	}
	function v_informeturnosporsemana_batch_actions(&$args){

		return array();
	}
