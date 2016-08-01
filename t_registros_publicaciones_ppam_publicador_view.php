<?php
// This script and data application were generated by AppGini 5.50
// Download AppGini for free from http://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/t_registros_publicaciones_ppam_publicador.php");
	include("$currDir/t_registros_publicaciones_ppam_publicador_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('t_registros_publicaciones_ppam_publicador');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "t_registros_publicaciones_ppam_publicador";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV=array(   
		"`t_registros_publicaciones_ppam_publicador`.`IdRegistro`" => "IdRegistro",
		"if(`t_registros_publicaciones_ppam_publicador`.`FechaRegistro`,date_format(`t_registros_publicaciones_ppam_publicador`.`FechaRegistro`,'%d-%m-%Y'),'')" => "FechaRegistro",
		"IF(    CHAR_LENGTH(`t_ubicaciones_ppam1`.`NombrePPAM`), CONCAT_WS('',   `t_ubicaciones_ppam1`.`NombrePPAM`), '') /* PPAM */" => "IdPPAM",
		"IF(    CHAR_LENGTH(`t_voluntarios1`.`NombreVoluntario`), CONCAT_WS('',   `t_voluntarios1`.`NombreVoluntario`), '') /* Voluntario */" => "IdVoluntario",
		"IF(    CHAR_LENGTH(`t_turnos1`.`DescTurno`), CONCAT_WS('',   `t_turnos1`.`DescTurno`), '') /* Turno */" => "IdTurno",
		"IF(    CHAR_LENGTH(`m_publicaciones1`.`NombrePublicacion`), CONCAT_WS('',   `m_publicaciones1`.`NombrePublicacion`), '') /* Publicaci&oacute;n */" => "IdPublicacion",
		"`t_registros_publicaciones_ppam_publicador`.`CantidadColocada`" => "CantidadColocada"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`t_registros_publicaciones_ppam_publicador`.`IdRegistro`',
		2 => '`t_registros_publicaciones_ppam_publicador`.`FechaRegistro`',
		3 => 3,
		4 => 4,
		5 => 5,
		6 => 6,
		7 => '`t_registros_publicaciones_ppam_publicador`.`CantidadColocada`'
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV=array(   
		"`t_registros_publicaciones_ppam_publicador`.`IdRegistro`" => "IdRegistro",
		"if(`t_registros_publicaciones_ppam_publicador`.`FechaRegistro`,date_format(`t_registros_publicaciones_ppam_publicador`.`FechaRegistro`,'%d-%m-%Y'),'')" => "FechaRegistro",
		"IF(    CHAR_LENGTH(`t_ubicaciones_ppam1`.`NombrePPAM`), CONCAT_WS('',   `t_ubicaciones_ppam1`.`NombrePPAM`), '') /* PPAM */" => "IdPPAM",
		"IF(    CHAR_LENGTH(`t_voluntarios1`.`NombreVoluntario`), CONCAT_WS('',   `t_voluntarios1`.`NombreVoluntario`), '') /* Voluntario */" => "IdVoluntario",
		"IF(    CHAR_LENGTH(`t_turnos1`.`DescTurno`), CONCAT_WS('',   `t_turnos1`.`DescTurno`), '') /* Turno */" => "IdTurno",
		"IF(    CHAR_LENGTH(`m_publicaciones1`.`NombrePublicacion`), CONCAT_WS('',   `m_publicaciones1`.`NombrePublicacion`), '') /* Publicaci&oacute;n */" => "IdPublicacion",
		"`t_registros_publicaciones_ppam_publicador`.`CantidadColocada`" => "CantidadColocada"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters=array(   
		"`t_registros_publicaciones_ppam_publicador`.`IdRegistro`" => "IdRegistro",
		"`t_registros_publicaciones_ppam_publicador`.`FechaRegistro`" => "Fecha Registro",
		"IF(    CHAR_LENGTH(`t_ubicaciones_ppam1`.`NombrePPAM`), CONCAT_WS('',   `t_ubicaciones_ppam1`.`NombrePPAM`), '') /* PPAM */" => "PPAM",
		"IF(    CHAR_LENGTH(`t_voluntarios1`.`NombreVoluntario`), CONCAT_WS('',   `t_voluntarios1`.`NombreVoluntario`), '') /* Voluntario */" => "Voluntario",
		"IF(    CHAR_LENGTH(`t_turnos1`.`DescTurno`), CONCAT_WS('',   `t_turnos1`.`DescTurno`), '') /* Turno */" => "Turno",
		"IF(    CHAR_LENGTH(`m_publicaciones1`.`NombrePublicacion`), CONCAT_WS('',   `m_publicaciones1`.`NombrePublicacion`), '') /* Publicaci&oacute;n */" => "Publicaci&oacute;n",
		"`t_registros_publicaciones_ppam_publicador`.`CantidadColocada`" => "Cantidad Colocada"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS=array(   
		"`t_registros_publicaciones_ppam_publicador`.`IdRegistro`" => "IdRegistro",
		"if(`t_registros_publicaciones_ppam_publicador`.`FechaRegistro`,date_format(`t_registros_publicaciones_ppam_publicador`.`FechaRegistro`,'%d-%m-%Y'),'')" => "FechaRegistro",
		"IF(    CHAR_LENGTH(`t_ubicaciones_ppam1`.`NombrePPAM`), CONCAT_WS('',   `t_ubicaciones_ppam1`.`NombrePPAM`), '') /* PPAM */" => "IdPPAM",
		"IF(    CHAR_LENGTH(`t_voluntarios1`.`NombreVoluntario`), CONCAT_WS('',   `t_voluntarios1`.`NombreVoluntario`), '') /* Voluntario */" => "IdVoluntario",
		"IF(    CHAR_LENGTH(`t_turnos1`.`DescTurno`), CONCAT_WS('',   `t_turnos1`.`DescTurno`), '') /* Turno */" => "IdTurno",
		"IF(    CHAR_LENGTH(`m_publicaciones1`.`NombrePublicacion`), CONCAT_WS('',   `m_publicaciones1`.`NombrePublicacion`), '') /* Publicaci&oacute;n */" => "IdPublicacion",
		"`t_registros_publicaciones_ppam_publicador`.`CantidadColocada`" => "CantidadColocada"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'IdPPAM' => 'PPAM', 'IdVoluntario' => 'Voluntario', 'IdTurno' => 'Turno', 'IdPublicacion' => 'Publicaci&oacute;n');

	$x->QueryFrom="`t_registros_publicaciones_ppam_publicador` LEFT JOIN `t_ubicaciones_ppam` as t_ubicaciones_ppam1 ON `t_ubicaciones_ppam1`.`IdPPAM`=`t_registros_publicaciones_ppam_publicador`.`IdPPAM` LEFT JOIN `t_voluntarios` as t_voluntarios1 ON `t_voluntarios1`.`IdVoluntario`=`t_registros_publicaciones_ppam_publicador`.`IdVoluntario` LEFT JOIN `t_turnos` as t_turnos1 ON `t_turnos1`.`IdTurno`=`t_registros_publicaciones_ppam_publicador`.`IdTurno` LEFT JOIN `m_publicaciones` as m_publicaciones1 ON `m_publicaciones1`.`IdPublicacion`=`t_registros_publicaciones_ppam_publicador`.`IdPublicacion` ";
	$x->QueryWhere='';
	$x->QueryOrder='';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = false;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 0;
	$x->AllowSavingFilters = 0;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 0;
	$x->AllowCSV = 0;
	$x->RecordsPerPage = 20;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "t_registros_publicaciones_ppam_publicador_view.php";
	$x->RedirectAfterInsert = "t_registros_publicaciones_ppam_publicador_view.php?SelectedID=#ID#";
	$x->TableTitle = "Registro de Publicaciones";
	$x->TableIcon = "resources/table_icons/attributes_display (2).png";
	$x->PrimaryKey = "`t_registros_publicaciones_ppam_publicador`.`IdRegistro`";

	$x->ColWidth   = array(  150, 150, 150, 100, 150, 150);
	$x->ColCaption = array("Fecha Registro", "PPAM", "Voluntario", "Turno", "Publicaci&oacute;n", "Cantidad Colocada");
	$x->ColFieldName = array('FechaRegistro', 'IdPPAM', 'IdVoluntario', 'IdTurno', 'IdPublicacion', 'CantidadColocada');
	$x->ColNumber  = array(2, 3, 4, 5, 6, 7);

	$x->Template = 'templates/t_registros_publicaciones_ppam_publicador_templateTV.html';
	$x->SelectedTemplate = 'templates/t_registros_publicaciones_ppam_publicador_templateTVS.html';
	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `t_registros_publicaciones_ppam_publicador`.`IdRegistro`=membership_userrecords.pkValue and membership_userrecords.tableName='t_registros_publicaciones_ppam_publicador' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `t_registros_publicaciones_ppam_publicador`.`IdRegistro`=membership_userrecords.pkValue and membership_userrecords.tableName='t_registros_publicaciones_ppam_publicador' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`t_registros_publicaciones_ppam_publicador`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: t_registros_publicaciones_ppam_publicador_init
	$render=TRUE;
	if(function_exists('t_registros_publicaciones_ppam_publicador_init')){
		$args=array();
		$render=t_registros_publicaciones_ppam_publicador_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: t_registros_publicaciones_ppam_publicador_header
	$headerCode='';
	if(function_exists('t_registros_publicaciones_ppam_publicador_header')){
		$args=array();
		$headerCode=t_registros_publicaciones_ppam_publicador_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: t_registros_publicaciones_ppam_publicador_footer
	$footerCode='';
	if(function_exists('t_registros_publicaciones_ppam_publicador_footer')){
		$args=array();
		$footerCode=t_registros_publicaciones_ppam_publicador_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>