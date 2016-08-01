<?php

	// For help on using hooks, please refer to http://bigprof.com/appgini/help/working-with-generated-web-database-application/hooks

	function t_registros_publicaciones_ppam_publicador_init(&$options, $memberInfo, &$args)
	{
		$options->DefaultSortField = '`t_registros_publicaciones_ppam_publicador`.`FechaRegistro` desc, `t_registros_publicaciones_ppam_publicador`.`IdPPAM` asc, `t_registros_publicaciones_ppam_publicador`.`IdTurno` desc, `t_registros_publicaciones_ppam_publicador`.`IdVoluntario` asc';

		$DisplayRecords = $_REQUEST['DisplayRecords'];
		if(!in_array($DisplayRecords, array('user', 'group')))
		{ 
			$DisplayRecords = 'all'; 
		}

		$perm=getTablePermissions('t_registros_publicaciones_ppam_publicador');
		

		$Filtro = !$_REQUEST['NoFilter_x'];

//echo '<BR><BR><BR><BR>'.$perm[2].'<BR>'.$DisplayRecords.'<BR>'.$Filtro.'<BR>InfoUsuario[0]:'.$memberInfo['custom'][0].'<BR>InfoUsuario[1]:'.$memberInfo['custom'][1];
		
		if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && $Filtro))
		{ // view owner only
			$options->QueryFrom.=', membership_userrecords';
			$options->QueryWhere="where `t_registros_publicaciones_ppam_publicador`.`IdRegistro`=membership_userrecords.pkValue and membership_userrecords.tableName='t_registros_publicaciones_ppam_publicador' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
		}
		elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && $Filtro))
		{ // view group only
			$options->QueryWhere="where `t_registros_publicaciones_ppam_publicador`.`IdPPAM` = '".$memberInfo['custom'][0]."' ";
		}
		elseif($perm[2]==3)
		{ // view all
			if ($memberInfo['custom'][1] != 99)
			{
				$options->QueryFrom.=', t_ubicaciones_ppam ';
				$options->QueryWhere=" where `t_ubicaciones_ppam`.`IdCiudadPPAM` = '".$memberInfo['custom'][1]."' and `t_registros_publicaciones_ppam_publicador`.`IdPPAM` = `t_ubicaciones_ppam`.`IdPPAM`";
			}
		}
		elseif($perm[2]==0){ // view none
			$options->QueryFields = array("Not enough permissions" => "NEP");
			$options->QueryFrom = '`t_registros_publicaciones_ppam_publicador`';
			$options->QueryWhere = '';
			$options->DefaultSortField = '';
		}

//echo '<BR><BR><BR><BR>'.$options->QueryWhere;

		return TRUE;
	}

	function t_registros_publicaciones_ppam_publicador_header($contentType, $memberInfo, &$args){
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

	function t_registros_publicaciones_ppam_publicador_footer($contentType, $memberInfo, &$args){
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

	function t_registros_publicaciones_ppam_publicador_before_insert(&$data, $memberInfo, &$args){

		return TRUE;
	}

	function t_registros_publicaciones_ppam_publicador_after_insert($data, $memberInfo, &$args){

		return TRUE;
	}

	function t_registros_publicaciones_ppam_publicador_before_update(&$data, $memberInfo, &$args){

		return TRUE;
	}

	function t_registros_publicaciones_ppam_publicador_after_update($data, $memberInfo, &$args){

		return TRUE;
	}

	function t_registros_publicaciones_ppam_publicador_before_delete($selectedID, &$skipChecks, $memberInfo, &$args){

		return TRUE;
	}

	function t_registros_publicaciones_ppam_publicador_after_delete($selectedID, $memberInfo, &$args){

	}

	function t_registros_publicaciones_ppam_publicador_dv($selectedID, $memberInfo, &$html, &$args)
	{

	}

	function t_registros_publicaciones_ppam_publicador_csv($query, $memberInfo, &$args){

		return $query;
	}
	function t_registros_publicaciones_ppam_publicador_batch_actions(&$args){

		return array();
	}
