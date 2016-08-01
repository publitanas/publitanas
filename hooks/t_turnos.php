<?php
	// For help on using hooks, please refer to http://bigprof.com/appgini/help/working-with-generated-web-database-application/hooks

	function t_turnos_init(&$options, $memberInfo, &$args){

		$options->DefaultSortField = '`t_turnos`.`IdTurno` asc ';

		$DisplayRecords = $_REQUEST['DisplayRecords'];
		if(!in_array($DisplayRecords, array('user', 'group')))
		{ 
			$DisplayRecords = 'all'; 
		}

		$perm=getTablePermissions('t_turnos');
		
		$Filtro = !$_REQUEST['NoFilter_x'];
//echo '<BR><BR><BR><BR>'.$perm[2].'<BR>'.$DisplayRecords.'<BR>'.$Filtro.'<BR>InfoUsuario[0]:'.$memberInfo['custom'][0].'<BR>InfoUsuario[1]:'.$memberInfo['custom'][1];

//echo '<BR><BR><BR><BR>'.$options->QueryWhere;

		return TRUE;
	}

	function t_turnos_header($contentType, $memberInfo, &$args){
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

	function t_turnos_footer($contentType, $memberInfo, &$args){
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

	function t_turnos_before_insert(&$data, $memberInfo, &$args){

		return TRUE;
	}

	function t_turnos_after_insert($data, $memberInfo, &$args){

		return TRUE;
	}

	function t_turnos_before_update(&$data, $memberInfo, &$args){

		return TRUE;
	}

	function t_turnos_after_update($data, $memberInfo, &$args){

		return TRUE;
	}

	function t_turnos_before_delete($selectedID, &$skipChecks, $memberInfo, &$args){

		return TRUE;
	}

	function t_turnos_after_delete($selectedID, $memberInfo, &$args){

	}

	function t_turnos_dv($selectedID, $memberInfo, &$html, &$args){

	}

	function t_turnos_csv($query, $memberInfo, &$args){

		return $query;
	}
	function t_turnos_batch_actions(&$args){

		return array();
	}
