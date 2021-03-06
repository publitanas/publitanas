<?php
	// For help on using hooks, please refer to http://bigprof.com/appgini/help/working-with-generated-web-database-application/hooks

	function v_informemensualporciudad_init(&$options, $memberInfo, &$args)
	{
		$options->DefaultSortField = '`v_informemensualporciudad`.`fecha` desc, `v_informemensualporciudad`.`ciudadppam` asc, `v_informemensualporciudad`.`publicacion` asc';

		$DisplayRecords = $_REQUEST['DisplayRecords'];
		if(!in_array($DisplayRecords, array('user', 'group')))
		{ 
			$DisplayRecords = 'all'; 
		}

		$perm=getTablePermissions('v_informemensualporciudad');
		

		$Filtro = !$_REQUEST['NoFilter_x'];

//echo '<BR><BR><BR><BR>'.$perm[2].'<BR>'.$DisplayRecords.'<BR>'.$Filtro.'<BR>InfoUsuario[0]:'.$memberInfo['custom'][0].'<BR>InfoUsuario[1]:'.$memberInfo['custom'][1];
		if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && $Filtro))
		{ // view owner only
			$options->QueryFrom.=', membership_userrecords';
			$options->QueryWhere="where `v_informepublicacionesporppamymes`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='v_informemensualporciudad' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
		}
		elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && $Filtro))
		{ // view group only
			$options->QueryWhere=" where `v_informemensualporciudad`.`IdCiudadPPAM` = '".$memberInfo['custom'][1] ."' "; 
		}
		elseif($perm[2]==3)
		{ // view all
			if ($memberInfo['custom'][1] != 99)
			{
				$options->QueryWhere="where `v_informemensualporciudad`.`IdCiudadPPAM` = '".$memberInfo['custom'][1] ."'  "; 
			}
		}
		elseif($perm[2]==0){ // view none
			$options->QueryFields = array("Not enough permissions" => "NEP");
			$options->QueryFrom = '`v_informemensualporciudad`';
			$options->QueryWhere = '';
			$options->DefaultSortField = '';
		}
//echo '<BR><BR><BR><BR>'.$options->QueryWhere;

		return TRUE;
	}

	function v_informemensualporciudad_header($contentType, $memberInfo, &$args){
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

	function v_informemensualporciudad_footer($contentType, $memberInfo, &$args){
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

	function v_informemensualporciudad_before_insert(&$data, $memberInfo, &$args){

		return TRUE;
	}

	function v_informemensualporciudad_after_insert($data, $memberInfo, &$args){

		return TRUE;
	}

	function v_informemensualporciudad_before_update(&$data, $memberInfo, &$args){

		return TRUE;
	}

	function v_informemensualporciudad_after_update($data, $memberInfo, &$args){

		return TRUE;
	}

	function v_informemensualporciudad_before_delete($selectedID, &$skipChecks, $memberInfo, &$args){

		return TRUE;
	}

	function v_informemensualporciudad_after_delete($selectedID, $memberInfo, &$args){

	}

	function v_informemensualporciudad_dv($selectedID, $memberInfo, &$html, &$args){

	}

	function v_informemensualporciudad_csv($query, $memberInfo, &$args){

		return $query;
	}
	function v_informemensualporciudad_batch_actions(&$args){

		return array();
	}
