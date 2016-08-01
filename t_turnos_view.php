<?php
// This script and data application were generated by AppGini 5.50
// Download AppGini for free from http://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/t_turnos.php");
	include("$currDir/t_turnos_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('t_turnos');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "t_turnos";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV=array(   
		"`t_turnos`.`IdTurno`" => "IdTurno",
		"`t_turnos`.`DescTurno`" => "DescTurno"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`t_turnos`.`IdTurno`',
		2 => 2
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV=array(   
		"`t_turnos`.`IdTurno`" => "IdTurno",
		"`t_turnos`.`DescTurno`" => "DescTurno"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters=array(   
		"`t_turnos`.`IdTurno`" => "IdTurno",
		"`t_turnos`.`DescTurno`" => "Turno"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS=array(   
		"`t_turnos`.`IdTurno`" => "IdTurno",
		"`t_turnos`.`DescTurno`" => "DescTurno"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array();

	$x->QueryFrom="`t_turnos` ";
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
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "t_turnos_view.php";
	$x->RedirectAfterInsert = "t_turnos_view.php";
	$x->TableTitle = "Turnos";
	$x->TableIcon = "resources/table_icons/cog (2).png";
	$x->PrimaryKey = "`t_turnos`.`IdTurno`";
	$x->DefaultSortField = '1';
	$x->DefaultSortDirection = 'asc';

	$x->ColWidth   = array(  150);
	$x->ColCaption = array("Turno");
	$x->ColFieldName = array('DescTurno');
	$x->ColNumber  = array(2);

	$x->Template = 'templates/t_turnos_templateTV.html';
	$x->SelectedTemplate = 'templates/t_turnos_templateTVS.html';
	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `t_turnos`.`IdTurno`=membership_userrecords.pkValue and membership_userrecords.tableName='t_turnos' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `t_turnos`.`IdTurno`=membership_userrecords.pkValue and membership_userrecords.tableName='t_turnos' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`t_turnos`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: t_turnos_init
	$render=TRUE;
	if(function_exists('t_turnos_init')){
		$args=array();
		$render=t_turnos_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: t_turnos_header
	$headerCode='';
	if(function_exists('t_turnos_header')){
		$args=array();
		$headerCode=t_turnos_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: t_turnos_footer
	$footerCode='';
	if(function_exists('t_turnos_footer')){
		$args=array();
		$footerCode=t_turnos_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>