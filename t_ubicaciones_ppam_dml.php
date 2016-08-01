<?php

// Data functions (insert, update, delete, form) for table t_ubicaciones_ppam

// This script and data application were generated by AppGini 5.50
// Download AppGini for free from http://bigprof.com/appgini/download/

function t_ubicaciones_ppam_insert(){
	global $Translation;

	// mm: can member insert record?
	$arrPerm=getTablePermissions('t_ubicaciones_ppam');
	if(!$arrPerm[1]){
		return false;
	}

	$data['IdPPAM'] = makeSafe($_REQUEST['IdPPAM']);
		if($data['IdPPAM'] == empty_lookup_value){ $data['IdPPAM'] = ''; }
	$data['NombrePPAM'] = makeSafe($_REQUEST['NombrePPAM']);
		if($data['NombrePPAM'] == empty_lookup_value){ $data['NombrePPAM'] = ''; }
	$data['UbicacionPPAM'] = makeSafe($_REQUEST['UbicacionPPAM']);
		if($data['UbicacionPPAM'] == empty_lookup_value){ $data['UbicacionPPAM'] = ''; }
	$data['PoblacionPPAM'] = makeSafe($_REQUEST['PoblacionPPAM']);
		if($data['PoblacionPPAM'] == empty_lookup_value){ $data['PoblacionPPAM'] = ''; }
	$data['CoordenadasGPS'] = makeSafe($_REQUEST['CoordenadasGPS']);
		if($data['CoordenadasGPS'] == empty_lookup_value){ $data['CoordenadasGPS'] = ''; }
	$data['IdCiudadPPAM'] = makeSafe($_REQUEST['IdCiudadPPAM']);
		if($data['IdCiudadPPAM'] == empty_lookup_value){ $data['IdCiudadPPAM'] = ''; }
	if($data['IdPPAM'] == '') {echo StyleSheet() . "\n\n<div class=\"alert alert-danger\">" . $Translation['error:'] . " 'IdPPAM': " . $Translation['pkfield empty'] . '</div>'; exit;}


	// hook: t_ubicaciones_ppam_before_insert
	if(function_exists('t_ubicaciones_ppam_before_insert')){
		$args=array();
		if(!t_ubicaciones_ppam_before_insert($data, getMemberInfo(), $args)){ return false; }
	}

	$o=array('silentErrors' => true);
	sql('insert into `t_ubicaciones_ppam` set       `NombrePPAM`=' . (($data['NombrePPAM'] !== '' && $data['NombrePPAM'] !== NULL) ? "'{$data['NombrePPAM']}'" : 'NULL') . ', `UbicacionPPAM`=' . (($data['UbicacionPPAM'] !== '' && $data['UbicacionPPAM'] !== NULL) ? "'{$data['UbicacionPPAM']}'" : 'NULL') . ', `PoblacionPPAM`=' . (($data['PoblacionPPAM'] !== '' && $data['PoblacionPPAM'] !== NULL) ? "'{$data['PoblacionPPAM']}'" : 'NULL') . ', `CoordenadasGPS`=' . (($data['CoordenadasGPS'] !== '' && $data['CoordenadasGPS'] !== NULL) ? "'{$data['CoordenadasGPS']}'" : 'NULL') . ', `IdCiudadPPAM`=' . (($data['IdCiudadPPAM'] !== '' && $data['IdCiudadPPAM'] !== NULL) ? "'{$data['IdCiudadPPAM']}'" : 'NULL'), $o);
	if($o['error']!=''){
		echo $o['error'];
		echo "<a href=\"t_ubicaciones_ppam_view.php?addNew_x=1\">{$Translation['< back']}</a>";
		exit;
	}

	$recID = $data['IdPPAM'];

	// hook: t_ubicaciones_ppam_after_insert
	if(function_exists('t_ubicaciones_ppam_after_insert')){
		$res = sql("select * from `t_ubicaciones_ppam` where `IdPPAM`='" . makeSafe($recID, false) . "' limit 1", $eo);
		if($row = db_fetch_assoc($res)){
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = makeSafe($recID, false);
		$args=array();
		if(!t_ubicaciones_ppam_after_insert($data, getMemberInfo(), $args)){ return (get_magic_quotes_gpc() ? stripslashes($recID) : $recID); }
	}

	// mm: save ownership data
	sql("insert ignore into membership_userrecords set tableName='t_ubicaciones_ppam', pkValue='$recID', memberID='".getLoggedMemberID()."', dateAdded='".time()."', dateUpdated='".time()."', groupID='".getLoggedGroupID()."'", $eo);

	return (get_magic_quotes_gpc() ? stripslashes($recID) : $recID);
}

function t_ubicaciones_ppam_delete($selected_id, $AllowDeleteOfParents=false, $skipChecks=false){
	// insure referential integrity ...
	global $Translation;
	$selected_id=makeSafe($selected_id);

	// mm: can member delete record?
	$arrPerm=getTablePermissions('t_ubicaciones_ppam');
	$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='t_ubicaciones_ppam' and pkValue='$selected_id'");
	$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='t_ubicaciones_ppam' and pkValue='$selected_id'");
	if(($arrPerm[4]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[4]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[4]==3){ // allow delete?
		// delete allowed, so continue ...
	}else{
		return $Translation['You don\'t have enough permissions to delete this record'];
	}

	// hook: t_ubicaciones_ppam_before_delete
	if(function_exists('t_ubicaciones_ppam_before_delete')){
		$args=array();
		if(!t_ubicaciones_ppam_before_delete($selected_id, $skipChecks, getMemberInfo(), $args))
			return $Translation['Couldn\'t delete this record'];
	}

	// child table: t_registros_publicaciones_ppam_publicador
	$res = sql("select `IdPPAM` from `t_ubicaciones_ppam` where `IdPPAM`='$selected_id'", $eo);
	$IdPPAM = db_fetch_row($res);
	$rires = sql("select count(1) from `t_registros_publicaciones_ppam_publicador` where `IdPPAM`='".addslashes($IdPPAM[0])."'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "t_registros_publicaciones_ppam_publicador", $RetMsg);
		return $RetMsg;
	}elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["confirm delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "t_registros_publicaciones_ppam_publicador", $RetMsg);
		$RetMsg = str_replace("<Delete>", "<input type=\"button\" class=\"button\" value=\"".$Translation['yes']."\" onClick=\"window.location='t_ubicaciones_ppam_view.php?SelectedID=".urlencode($selected_id)."&delete_x=1&confirmed=1';\">", $RetMsg);
		$RetMsg = str_replace("<Cancel>", "<input type=\"button\" class=\"button\" value=\"".$Translation['no']."\" onClick=\"window.location='t_ubicaciones_ppam_view.php?SelectedID=".urlencode($selected_id)."';\">", $RetMsg);
		return $RetMsg;
	}

	// child table: t_registro_estudios
	$res = sql("select `IdPPAM` from `t_ubicaciones_ppam` where `IdPPAM`='$selected_id'", $eo);
	$IdPPAM = db_fetch_row($res);
	$rires = sql("select count(1) from `t_registro_estudios` where `IdPPAM`='".addslashes($IdPPAM[0])."'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "t_registro_estudios", $RetMsg);
		return $RetMsg;
	}elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["confirm delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "t_registro_estudios", $RetMsg);
		$RetMsg = str_replace("<Delete>", "<input type=\"button\" class=\"button\" value=\"".$Translation['yes']."\" onClick=\"window.location='t_ubicaciones_ppam_view.php?SelectedID=".urlencode($selected_id)."&delete_x=1&confirmed=1';\">", $RetMsg);
		$RetMsg = str_replace("<Cancel>", "<input type=\"button\" class=\"button\" value=\"".$Translation['no']."\" onClick=\"window.location='t_ubicaciones_ppam_view.php?SelectedID=".urlencode($selected_id)."';\">", $RetMsg);
		return $RetMsg;
	}

	// child table: t_incidencias
	$res = sql("select `IdPPAM` from `t_ubicaciones_ppam` where `IdPPAM`='$selected_id'", $eo);
	$IdPPAM = db_fetch_row($res);
	$rires = sql("select count(1) from `t_incidencias` where `IdPPAM`='".addslashes($IdPPAM[0])."'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "t_incidencias", $RetMsg);
		return $RetMsg;
	}elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["confirm delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "t_incidencias", $RetMsg);
		$RetMsg = str_replace("<Delete>", "<input type=\"button\" class=\"button\" value=\"".$Translation['yes']."\" onClick=\"window.location='t_ubicaciones_ppam_view.php?SelectedID=".urlencode($selected_id)."&delete_x=1&confirmed=1';\">", $RetMsg);
		$RetMsg = str_replace("<Cancel>", "<input type=\"button\" class=\"button\" value=\"".$Translation['no']."\" onClick=\"window.location='t_ubicaciones_ppam_view.php?SelectedID=".urlencode($selected_id)."';\">", $RetMsg);
		return $RetMsg;
	}

	// child table: t_turnos_hermanos
	$res = sql("select `IdPPAM` from `t_ubicaciones_ppam` where `IdPPAM`='$selected_id'", $eo);
	$IdPPAM = db_fetch_row($res);
	$rires = sql("select count(1) from `t_turnos_hermanos` where `IdPPAM`='".addslashes($IdPPAM[0])."'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "t_turnos_hermanos", $RetMsg);
		return $RetMsg;
	}elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["confirm delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "t_turnos_hermanos", $RetMsg);
		$RetMsg = str_replace("<Delete>", "<input type=\"button\" class=\"button\" value=\"".$Translation['yes']."\" onClick=\"window.location='t_ubicaciones_ppam_view.php?SelectedID=".urlencode($selected_id)."&delete_x=1&confirmed=1';\">", $RetMsg);
		$RetMsg = str_replace("<Cancel>", "<input type=\"button\" class=\"button\" value=\"".$Translation['no']."\" onClick=\"window.location='t_ubicaciones_ppam_view.php?SelectedID=".urlencode($selected_id)."';\">", $RetMsg);
		return $RetMsg;
	}

	// child table: t_voluntarios
	$res = sql("select `IdPPAM` from `t_ubicaciones_ppam` where `IdPPAM`='$selected_id'", $eo);
	$IdPPAM = db_fetch_row($res);
	$rires = sql("select count(1) from `t_voluntarios` where `IdPPAM`='".addslashes($IdPPAM[0])."'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "t_voluntarios", $RetMsg);
		return $RetMsg;
	}elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["confirm delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "t_voluntarios", $RetMsg);
		$RetMsg = str_replace("<Delete>", "<input type=\"button\" class=\"button\" value=\"".$Translation['yes']."\" onClick=\"window.location='t_ubicaciones_ppam_view.php?SelectedID=".urlencode($selected_id)."&delete_x=1&confirmed=1';\">", $RetMsg);
		$RetMsg = str_replace("<Cancel>", "<input type=\"button\" class=\"button\" value=\"".$Translation['no']."\" onClick=\"window.location='t_ubicaciones_ppam_view.php?SelectedID=".urlencode($selected_id)."';\">", $RetMsg);
		return $RetMsg;
	}

	// child table: t_colaboraciones_ppam
	$res = sql("select `IdPPAM` from `t_ubicaciones_ppam` where `IdPPAM`='$selected_id'", $eo);
	$IdPPAM = db_fetch_row($res);
	$rires = sql("select count(1) from `t_colaboraciones_ppam` where `IdPPAM`='".addslashes($IdPPAM[0])."'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "t_colaboraciones_ppam", $RetMsg);
		return $RetMsg;
	}elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["confirm delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "t_colaboraciones_ppam", $RetMsg);
		$RetMsg = str_replace("<Delete>", "<input type=\"button\" class=\"button\" value=\"".$Translation['yes']."\" onClick=\"window.location='t_ubicaciones_ppam_view.php?SelectedID=".urlencode($selected_id)."&delete_x=1&confirmed=1';\">", $RetMsg);
		$RetMsg = str_replace("<Cancel>", "<input type=\"button\" class=\"button\" value=\"".$Translation['no']."\" onClick=\"window.location='t_ubicaciones_ppam_view.php?SelectedID=".urlencode($selected_id)."';\">", $RetMsg);
		return $RetMsg;
	}

	// child table: t_disponibilidades_voluntarios
	$res = sql("select `IdPPAM` from `t_ubicaciones_ppam` where `IdPPAM`='$selected_id'", $eo);
	$IdPPAM = db_fetch_row($res);
	$rires = sql("select count(1) from `t_disponibilidades_voluntarios` where `IdPPAM`='".addslashes($IdPPAM[0])."'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "t_disponibilidades_voluntarios", $RetMsg);
		return $RetMsg;
	}elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["confirm delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "t_disponibilidades_voluntarios", $RetMsg);
		$RetMsg = str_replace("<Delete>", "<input type=\"button\" class=\"button\" value=\"".$Translation['yes']."\" onClick=\"window.location='t_ubicaciones_ppam_view.php?SelectedID=".urlencode($selected_id)."&delete_x=1&confirmed=1';\">", $RetMsg);
		$RetMsg = str_replace("<Cancel>", "<input type=\"button\" class=\"button\" value=\"".$Translation['no']."\" onClick=\"window.location='t_ubicaciones_ppam_view.php?SelectedID=".urlencode($selected_id)."';\">", $RetMsg);
		return $RetMsg;
	}

	// child table: t_turnos_hermanos_maestro
	$res = sql("select `IdPPAM` from `t_ubicaciones_ppam` where `IdPPAM`='$selected_id'", $eo);
	$IdPPAM = db_fetch_row($res);
	$rires = sql("select count(1) from `t_turnos_hermanos_maestro` where `IdPPAM`='".addslashes($IdPPAM[0])."'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "t_turnos_hermanos_maestro", $RetMsg);
		return $RetMsg;
	}elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["confirm delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "t_turnos_hermanos_maestro", $RetMsg);
		$RetMsg = str_replace("<Delete>", "<input type=\"button\" class=\"button\" value=\"".$Translation['yes']."\" onClick=\"window.location='t_ubicaciones_ppam_view.php?SelectedID=".urlencode($selected_id)."&delete_x=1&confirmed=1';\">", $RetMsg);
		$RetMsg = str_replace("<Cancel>", "<input type=\"button\" class=\"button\" value=\"".$Translation['no']."\" onClick=\"window.location='t_ubicaciones_ppam_view.php?SelectedID=".urlencode($selected_id)."';\">", $RetMsg);
		return $RetMsg;
	}

	// child table: t_horarios_calendario_turnos
	$res = sql("select `IdPPAM` from `t_ubicaciones_ppam` where `IdPPAM`='$selected_id'", $eo);
	$IdPPAM = db_fetch_row($res);
	$rires = sql("select count(1) from `t_horarios_calendario_turnos` where `idPPAM`='".addslashes($IdPPAM[0])."'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "t_horarios_calendario_turnos", $RetMsg);
		return $RetMsg;
	}elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["confirm delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "t_horarios_calendario_turnos", $RetMsg);
		$RetMsg = str_replace("<Delete>", "<input type=\"button\" class=\"button\" value=\"".$Translation['yes']."\" onClick=\"window.location='t_ubicaciones_ppam_view.php?SelectedID=".urlencode($selected_id)."&delete_x=1&confirmed=1';\">", $RetMsg);
		$RetMsg = str_replace("<Cancel>", "<input type=\"button\" class=\"button\" value=\"".$Translation['no']."\" onClick=\"window.location='t_ubicaciones_ppam_view.php?SelectedID=".urlencode($selected_id)."';\">", $RetMsg);
		return $RetMsg;
	}

	sql("delete from `t_ubicaciones_ppam` where `IdPPAM`='$selected_id'", $eo);

	// hook: t_ubicaciones_ppam_after_delete
	if(function_exists('t_ubicaciones_ppam_after_delete')){
		$args=array();
		t_ubicaciones_ppam_after_delete($selected_id, getMemberInfo(), $args);
	}

	// mm: delete ownership data
	sql("delete from membership_userrecords where tableName='t_ubicaciones_ppam' and pkValue='$selected_id'", $eo);
}

function t_ubicaciones_ppam_update($selected_id){
	global $Translation;

	// mm: can member edit record?
	$arrPerm=getTablePermissions('t_ubicaciones_ppam');
	$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='t_ubicaciones_ppam' and pkValue='".makeSafe($selected_id)."'");
	$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='t_ubicaciones_ppam' and pkValue='".makeSafe($selected_id)."'");
	if(($arrPerm[3]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[3]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[3]==3){ // allow update?
		// update allowed, so continue ...
	}else{
		return false;
	}

	$data['IdPPAM'] = makeSafe($_REQUEST['IdPPAM']);
		if($data['IdPPAM'] == empty_lookup_value){ $data['IdPPAM'] = ''; }
	$data['NombrePPAM'] = makeSafe($_REQUEST['NombrePPAM']);
		if($data['NombrePPAM'] == empty_lookup_value){ $data['NombrePPAM'] = ''; }
	$data['UbicacionPPAM'] = makeSafe($_REQUEST['UbicacionPPAM']);
		if($data['UbicacionPPAM'] == empty_lookup_value){ $data['UbicacionPPAM'] = ''; }
	$data['PoblacionPPAM'] = makeSafe($_REQUEST['PoblacionPPAM']);
		if($data['PoblacionPPAM'] == empty_lookup_value){ $data['PoblacionPPAM'] = ''; }
	$data['CoordenadasGPS'] = makeSafe($_REQUEST['CoordenadasGPS']);
		if($data['CoordenadasGPS'] == empty_lookup_value){ $data['CoordenadasGPS'] = ''; }
	$data['IdCiudadPPAM'] = makeSafe($_REQUEST['IdCiudadPPAM']);
		if($data['IdCiudadPPAM'] == empty_lookup_value){ $data['IdCiudadPPAM'] = ''; }
	$data['selectedID']=makeSafe($selected_id);

	// hook: t_ubicaciones_ppam_before_update
	if(function_exists('t_ubicaciones_ppam_before_update')){
		$args=array();
		if(!t_ubicaciones_ppam_before_update($data, getMemberInfo(), $args)){ return false; }
	}

	$o=array('silentErrors' => true);
	sql('update `t_ubicaciones_ppam` set       `NombrePPAM`=' . (($data['NombrePPAM'] !== '' && $data['NombrePPAM'] !== NULL) ? "'{$data['NombrePPAM']}'" : 'NULL') . ', `UbicacionPPAM`=' . (($data['UbicacionPPAM'] !== '' && $data['UbicacionPPAM'] !== NULL) ? "'{$data['UbicacionPPAM']}'" : 'NULL') . ', `PoblacionPPAM`=' . (($data['PoblacionPPAM'] !== '' && $data['PoblacionPPAM'] !== NULL) ? "'{$data['PoblacionPPAM']}'" : 'NULL') . ', `CoordenadasGPS`=' . (($data['CoordenadasGPS'] !== '' && $data['CoordenadasGPS'] !== NULL) ? "'{$data['CoordenadasGPS']}'" : 'NULL') . ', `IdCiudadPPAM`=' . (($data['IdCiudadPPAM'] !== '' && $data['IdCiudadPPAM'] !== NULL) ? "'{$data['IdCiudadPPAM']}'" : 'NULL') . " where `IdPPAM`='".makeSafe($selected_id)."'", $o);
	if($o['error']!=''){
		echo $o['error'];
		echo '<a href="t_ubicaciones_ppam_view.php?SelectedID='.urlencode($selected_id)."\">{$Translation['< back']}</a>";
		exit;
	}

	$data['selectedID'] = $data['IdPPAM'];

	// hook: t_ubicaciones_ppam_after_update
	if(function_exists('t_ubicaciones_ppam_after_update')){
		$res = sql("SELECT * FROM `t_ubicaciones_ppam` WHERE `IdPPAM`='{$data['selectedID']}' LIMIT 1", $eo);
		if($row = db_fetch_assoc($res)){
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = $data['IdPPAM'];
		$args = array();
		if(!t_ubicaciones_ppam_after_update($data, getMemberInfo(), $args)){ return; }
	}

	// mm: update ownership data
	sql("update membership_userrecords set dateUpdated='".time()."', pkValue='{$data['IdPPAM']}' where tableName='t_ubicaciones_ppam' and pkValue='".makeSafe($selected_id)."'", $eo);

}

function t_ubicaciones_ppam_form($selected_id = '', $AllowUpdate = 1, $AllowInsert = 1, $AllowDelete = 1, $ShowCancel = 0){
	// function to return an editable form for a table records
	// and fill it with data of record whose ID is $selected_id. If $selected_id
	// is empty, an empty form is shown, with only an 'Add New'
	// button displayed.

	global $Translation;

	// mm: get table permissions
	$arrPerm=getTablePermissions('t_ubicaciones_ppam');
	if(!$arrPerm[1] && $selected_id==''){ return ''; }
	$AllowInsert = ($arrPerm[1] ? true : false);
	// print preview?
	$dvprint = false;
	if($selected_id && $_REQUEST['dvprint_x'] != ''){
		$dvprint = true;
	}

	$filterer_IdCiudadPPAM = thisOr(undo_magic_quotes($_REQUEST['filterer_IdCiudadPPAM']), '');

	// populate filterers, starting from children to grand-parents

	// unique random identifier
	$rnd1 = ($dvprint ? rand(1000000, 9999999) : '');
	// combobox: IdCiudadPPAM
	$combo_IdCiudadPPAM = new DataCombo;

	if($selected_id){
		// mm: check member permissions
		if(!$arrPerm[2]){
			return "";
		}
		// mm: who is the owner?
		$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='t_ubicaciones_ppam' and pkValue='".makeSafe($selected_id)."'");
		$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='t_ubicaciones_ppam' and pkValue='".makeSafe($selected_id)."'");
		if($arrPerm[2]==1 && getLoggedMemberID()!=$ownerMemberID){
			return "";
		}
		if($arrPerm[2]==2 && getLoggedGroupID()!=$ownerGroupID){
			return "";
		}

		// can edit?
		if(($arrPerm[3]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[3]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[3]==3){
			$AllowUpdate=1;
		}else{
			$AllowUpdate=0;
		}

		$res = sql("select * from `t_ubicaciones_ppam` where `IdPPAM`='".makeSafe($selected_id)."'", $eo);
		if(!($row = db_fetch_array($res))){
			return error_message($Translation['No records found']);
		}
		$urow = $row; /* unsanitized data */
		$hc = new CI_Input();
		$row = $hc->xss_clean($row); /* sanitize data */
		$combo_IdCiudadPPAM->SelectedData = $row['IdCiudadPPAM'];
	}else{
		$combo_IdCiudadPPAM->SelectedData = $filterer_IdCiudadPPAM;
	}
	$combo_IdCiudadPPAM->HTML = '<span id="IdCiudadPPAM-container' . $rnd1 . '"></span><input type="hidden" name="IdCiudadPPAM" id="IdCiudadPPAM' . $rnd1 . '" value="' . htmlspecialchars($combo_IdCiudadPPAM->SelectedData, ENT_QUOTES, 'UTF-8') . '">';
	$combo_IdCiudadPPAM->MatchText = '<span id="IdCiudadPPAM-container-readonly' . $rnd1 . '"></span><input type="hidden" name="IdCiudadPPAM" id="IdCiudadPPAM' . $rnd1 . '" value="' . htmlspecialchars($combo_IdCiudadPPAM->SelectedData, ENT_QUOTES, 'UTF-8') . '">';

	ob_start();
	?>

	<script>
		// initial lookup values
		var current_IdCiudadPPAM__RAND__ = { text: "", value: "<?php echo addslashes($selected_id ? $urow['IdCiudadPPAM'] : $filterer_IdCiudadPPAM); ?>"};

		jQuery(function() {
			if(typeof(IdCiudadPPAM_reload__RAND__) == 'function') IdCiudadPPAM_reload__RAND__();
		});
		function IdCiudadPPAM_reload__RAND__(){
		<?php if(($AllowUpdate || $AllowInsert) && !$dvprint){ ?>

			jQuery("#IdCiudadPPAM-container__RAND__").select2({
				/* initial default value */
				initSelection: function(e, c){
					jQuery.ajax({
						url: 'ajax_combo.php',
						dataType: 'json',
						data: { id: current_IdCiudadPPAM__RAND__.value, t: 't_ubicaciones_ppam', f: 'IdCiudadPPAM' }
					}).done(function(resp){
						c({
							id: resp.results[0].id,
							text: resp.results[0].text
						});
						jQuery('[name="IdCiudadPPAM"]').val(resp.results[0].id);
						jQuery('[id=IdCiudadPPAM-container-readonly__RAND__]').html('<span id="IdCiudadPPAM-match-text">' + resp.results[0].text + '</span>');


						if(typeof(IdCiudadPPAM_update_autofills__RAND__) == 'function') IdCiudadPPAM_update_autofills__RAND__();
					});
				},
				width: ($j('fieldset .col-xs-11').width() - 109) + 'px',
				formatNoMatches: function(term){ return '<?php echo addslashes($Translation['No matches found!']); ?>'; },
				minimumResultsForSearch: 10,
				loadMorePadding: 200,
				ajax: {
					url: 'ajax_combo.php',
					dataType: 'json',
					cache: true,
					data: function(term, page){ return { s: term, p: page, t: 't_ubicaciones_ppam', f: 'IdCiudadPPAM' }; },
					results: function(resp, page){ return resp; }
				}
			}).on('change', function(e){
				current_IdCiudadPPAM__RAND__.value = e.added.id;
				current_IdCiudadPPAM__RAND__.text = e.added.text;
				jQuery('[name="IdCiudadPPAM"]').val(e.added.id);


				if(typeof(IdCiudadPPAM_update_autofills__RAND__) == 'function') IdCiudadPPAM_update_autofills__RAND__();
			});

			if(!$j("#IdCiudadPPAM-container__RAND__").length){
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: { id: current_IdCiudadPPAM__RAND__.value, t: 't_ubicaciones_ppam', f: 'IdCiudadPPAM' }
				}).done(function(resp){
					$j('[name="IdCiudadPPAM"]').val(resp.results[0].id);
					$j('[id=IdCiudadPPAM-container-readonly__RAND__]').html('<span id="IdCiudadPPAM-match-text">' + resp.results[0].text + '</span>');

					if(typeof(IdCiudadPPAM_update_autofills__RAND__) == 'function') IdCiudadPPAM_update_autofills__RAND__();
				});
			}

		<?php }else{ ?>

			jQuery.ajax({
				url: 'ajax_combo.php',
				dataType: 'json',
				data: { id: current_IdCiudadPPAM__RAND__.value, t: 't_ubicaciones_ppam', f: 'IdCiudadPPAM' }
			}).done(function(resp){
				jQuery('[id=IdCiudadPPAM-container__RAND__], [id=IdCiudadPPAM-container-readonly__RAND__]').html('<span id="IdCiudadPPAM-match-text">' + resp.results[0].text + '</span>');

				if(typeof(IdCiudadPPAM_update_autofills__RAND__) == 'function') IdCiudadPPAM_update_autofills__RAND__();
			});
		<?php } ?>

		}
	</script>
	<?php

	$lookups = str_replace('__RAND__', $rnd1, ob_get_contents());
	ob_end_clean();


	// code for template based detail view forms

	// open the detail view template
	$templateCode = @file_get_contents('./templates/t_ubicaciones_ppam_templateDV.html');

	// process form title
	$templateCode = str_replace('<%%DETAIL_VIEW_TITLE%%>', 'Detalle del Registro', $templateCode);
	$templateCode = str_replace('<%%RND1%%>', $rnd1, $templateCode);
	$templateCode = str_replace('<%%EMBEDDED%%>', ($_REQUEST['Embedded'] ? 'Embedded=1' : ''), $templateCode);
	// process buttons
	if($arrPerm[1] && !$selected_id){ // allow insert and no record selected?
		if(!$selected_id) $templateCode=str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-success" id="insert" name="insert_x" value="1" onclick="return t_ubicaciones_ppam_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save New'] . '</button>', $templateCode);
		$templateCode=str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="insert" name="insert_x" value="1" onclick="return t_ubicaciones_ppam_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save As Copy'] . '</button>', $templateCode);
	}else{
		$templateCode=str_replace('<%%INSERT_BUTTON%%>', '', $templateCode);
	}

	// 'Back' button action
	if($_REQUEST['Embedded']){
		$backAction = 'window.parent.jQuery(\'.modal\').modal(\'hide\'); return false;';
	}else{
		$backAction = '$$(\'form\')[0].writeAttribute(\'novalidate\', \'novalidate\'); document.myform.reset(); return true;';
	}

	if($selected_id){
		if($AllowUpdate){
			$templateCode=str_replace('<%%UPDATE_BUTTON%%>', '<button type="submit" class="btn btn-success btn-lg" id="update" name="update_x" value="1" onclick="return t_ubicaciones_ppam_validateData();"><i class="glyphicon glyphicon-ok"></i> ' . $Translation['Save Changes'] . '</button>', $templateCode);
		}else{
			$templateCode=str_replace('<%%UPDATE_BUTTON%%>', '', $templateCode);
		}
		if(($arrPerm[4]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[4]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[4]==3){ // allow delete?
			$templateCode=str_replace('<%%DELETE_BUTTON%%>', '<button type="submit" class="btn btn-danger" id="delete" name="delete_x" value="1" onclick="return confirm(\'' . $Translation['are you sure?'] . '\');"><i class="glyphicon glyphicon-trash"></i> ' . $Translation['Delete'] . '</button>', $templateCode);
		}else{
			$templateCode=str_replace('<%%DELETE_BUTTON%%>', '', $templateCode);
		}
		$templateCode=str_replace('<%%DESELECT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="deselect" name="deselect_x" value="1" onclick="' . $backAction . '"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['Back'] . '</button>', $templateCode);
	}else{
		$templateCode=str_replace('<%%UPDATE_BUTTON%%>', '', $templateCode);
		$templateCode=str_replace('<%%DELETE_BUTTON%%>', '', $templateCode);
		$templateCode=str_replace('<%%DESELECT_BUTTON%%>', ($ShowCancel ? '<button type="submit" class="btn btn-default" id="deselect" name="deselect_x" value="1" onclick="' . $backAction . '"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['Back'] . '</button>' : ''), $templateCode);
	}

	// set records to read only if user can't insert new records and can't edit current record
	if(($selected_id && !$AllowUpdate) || (!$selected_id && !$AllowInsert)){
		$jsReadOnly .= "\tjQuery('#NombrePPAM').replaceWith('<div class=\"form-control-static\" id=\"NombrePPAM\">' + (jQuery('#NombrePPAM').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#UbicacionPPAM').replaceWith('<div class=\"form-control-static\" id=\"UbicacionPPAM\">' + (jQuery('#UbicacionPPAM').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#PoblacionPPAM').replaceWith('<div class=\"form-control-static\" id=\"PoblacionPPAM\">' + (jQuery('#PoblacionPPAM').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#CoordenadasGPS').replaceWith('<div class=\"form-control-static\" id=\"CoordenadasGPS\">' + (jQuery('#CoordenadasGPS').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#IdCiudadPPAM').prop('disabled', true).css({ color: '#555', backgroundColor: '#fff' });\n";
		$jsReadOnly .= "\tjQuery('#IdCiudadPPAM_caption').prop('disabled', true).css({ color: '#555', backgroundColor: 'white' });\n";
		$jsReadOnly .= "\tjQuery('.select2-container').hide();\n";

		$noUploads = true;
	}elseif(($AllowInsert && !$selected_id) || ($AllowUpdate && $selected_id)){
		$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', true);"; // temporarily disable form change handler
			$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', false);"; // re-enable form change handler
	}

	// process combos
	$templateCode=str_replace('<%%COMBO(IdCiudadPPAM)%%>', $combo_IdCiudadPPAM->HTML, $templateCode);
	$templateCode=str_replace('<%%COMBOTEXT(IdCiudadPPAM)%%>', $combo_IdCiudadPPAM->MatchText, $templateCode);
	$templateCode=str_replace('<%%URLCOMBOTEXT(IdCiudadPPAM)%%>', urlencode($combo_IdCiudadPPAM->MatchText), $templateCode);

	/* lookup fields array: 'lookup field name' => array('parent table name', 'lookup field caption') */
	$lookup_fields = array(  'IdCiudadPPAM' => array('t_ciudades_ppam', 'Ciudad PPAM'));
	foreach($lookup_fields as $luf => $ptfc){
		$pt_perm = getTablePermissions($ptfc[0]);

		// process foreign key links
		if($pt_perm['view'] || $pt_perm['edit']){
			$templateCode = str_replace("<%%PLINK({$luf})%%>", '<button type="button" class="btn btn-default view_parent hspacer-lg" id="' . $ptfc[0] . '_view_parent" title="' . htmlspecialchars($Translation['View'] . ' ' . $ptfc[1], ENT_QUOTES, 'UTF-8') . '"><i class="glyphicon glyphicon-eye-open"></i></button>', $templateCode);
		}

		// if user has insert permission to parent table of a lookup field, put an add new button
		if($pt_perm['insert'] && !$_REQUEST['Embedded']){
			$templateCode = str_replace("<%%ADDNEW({$ptfc[0]})%%>", '<button type="button" class="btn btn-success add_new_parent" id="' . $ptfc[0] . '_add_new" title="' . htmlspecialchars($Translation['Add New'] . ' ' . $ptfc[1], ENT_QUOTES, 'UTF-8') . '"><i class="glyphicon glyphicon-plus-sign"></i></button>', $templateCode);
		}
	}

	// process images
	$templateCode=str_replace('<%%UPLOADFILE(IdPPAM)%%>', '', $templateCode);
	$templateCode=str_replace('<%%UPLOADFILE(NombrePPAM)%%>', '', $templateCode);
	$templateCode=str_replace('<%%UPLOADFILE(UbicacionPPAM)%%>', '', $templateCode);
	$templateCode=str_replace('<%%UPLOADFILE(PoblacionPPAM)%%>', '', $templateCode);
	$templateCode=str_replace('<%%UPLOADFILE(CoordenadasGPS)%%>', '', $templateCode);
	$templateCode=str_replace('<%%UPLOADFILE(IdCiudadPPAM)%%>', '', $templateCode);

	// process values
	if($selected_id){
		$templateCode=str_replace('<%%VALUE(IdPPAM)%%>', htmlspecialchars($row['IdPPAM'], ENT_QUOTES, 'UTF-8'), $templateCode);
		$templateCode=str_replace('<%%URLVALUE(IdPPAM)%%>', urlencode($urow['IdPPAM']), $templateCode);
		$templateCode=str_replace('<%%VALUE(NombrePPAM)%%>', htmlspecialchars($row['NombrePPAM'], ENT_QUOTES, 'UTF-8'), $templateCode);
		$templateCode=str_replace('<%%URLVALUE(NombrePPAM)%%>', urlencode($urow['NombrePPAM']), $templateCode);
		$templateCode=str_replace('<%%VALUE(UbicacionPPAM)%%>', htmlspecialchars($row['UbicacionPPAM'], ENT_QUOTES, 'UTF-8'), $templateCode);
		$templateCode=str_replace('<%%URLVALUE(UbicacionPPAM)%%>', urlencode($urow['UbicacionPPAM']), $templateCode);
		$templateCode=str_replace('<%%VALUE(PoblacionPPAM)%%>', htmlspecialchars($row['PoblacionPPAM'], ENT_QUOTES, 'UTF-8'), $templateCode);
		$templateCode=str_replace('<%%URLVALUE(PoblacionPPAM)%%>', urlencode($urow['PoblacionPPAM']), $templateCode);
		$templateCode=str_replace('<%%VALUE(CoordenadasGPS)%%>', htmlspecialchars($row['CoordenadasGPS'], ENT_QUOTES, 'UTF-8'), $templateCode);
		$templateCode=str_replace('<%%URLVALUE(CoordenadasGPS)%%>', urlencode($urow['CoordenadasGPS']), $templateCode);
		$templateCode=str_replace('<%%VALUE(IdCiudadPPAM)%%>', htmlspecialchars($row['IdCiudadPPAM'], ENT_QUOTES, 'UTF-8'), $templateCode);
		$templateCode=str_replace('<%%URLVALUE(IdCiudadPPAM)%%>', urlencode($urow['IdCiudadPPAM']), $templateCode);
	}else{
		$templateCode=str_replace('<%%VALUE(IdPPAM)%%>', '', $templateCode);
		$templateCode=str_replace('<%%URLVALUE(IdPPAM)%%>', urlencode(''), $templateCode);
		$templateCode=str_replace('<%%VALUE(NombrePPAM)%%>', '', $templateCode);
		$templateCode=str_replace('<%%URLVALUE(NombrePPAM)%%>', urlencode(''), $templateCode);
		$templateCode=str_replace('<%%VALUE(UbicacionPPAM)%%>', '', $templateCode);
		$templateCode=str_replace('<%%URLVALUE(UbicacionPPAM)%%>', urlencode(''), $templateCode);
		$templateCode=str_replace('<%%VALUE(PoblacionPPAM)%%>', '', $templateCode);
		$templateCode=str_replace('<%%URLVALUE(PoblacionPPAM)%%>', urlencode(''), $templateCode);
		$templateCode=str_replace('<%%VALUE(CoordenadasGPS)%%>', '', $templateCode);
		$templateCode=str_replace('<%%URLVALUE(CoordenadasGPS)%%>', urlencode(''), $templateCode);
		$templateCode=str_replace('<%%VALUE(IdCiudadPPAM)%%>', '', $templateCode);
		$templateCode=str_replace('<%%URLVALUE(IdCiudadPPAM)%%>', urlencode(''), $templateCode);
	}

	// process translations
	foreach($Translation as $symbol=>$trans){
		$templateCode=str_replace("<%%TRANSLATION($symbol)%%>", $trans, $templateCode);
	}

	// clear scrap
	$templateCode=str_replace('<%%', '<!-- ', $templateCode);
	$templateCode=str_replace('%%>', ' -->', $templateCode);

	// hide links to inaccessible tables
	if($_REQUEST['dvprint_x'] == ''){
		$templateCode .= "\n\n<script>\$j(function(){\n";
		$arrTables = getTableList();
		foreach($arrTables as $name => $caption){
			$templateCode .= "\t\$j('#{$name}_link').removeClass('hidden');\n";
			$templateCode .= "\t\$j('#xs_{$name}_link').removeClass('hidden');\n";
		}

		$templateCode .= $jsReadOnly;
		$templateCode .= $jsEditable;

		if(!$selected_id){
		}

		$templateCode.="\n});</script>\n";
	}

	// ajaxed auto-fill fields
	$templateCode .= '<script>';
	$templateCode .= '$j(function() {';


	$templateCode.="});";
	$templateCode.="</script>";
	$templateCode .= $lookups;

	// handle enforced parent values for read-only lookup fields

	// don't include blank images in lightbox gallery
	$templateCode = preg_replace('/blank.gif" data-lightbox=".*?"/', 'blank.gif"', $templateCode);

	// don't display empty email links
	$templateCode=preg_replace('/<a .*?href="mailto:".*?<\/a>/', '', $templateCode);

	// hook: t_ubicaciones_ppam_dv
	if(function_exists('t_ubicaciones_ppam_dv')){
		$args=array();
		t_ubicaciones_ppam_dv(($selected_id ? $selected_id : FALSE), getMemberInfo(), $templateCode, $args);
	}

	return $templateCode;
}
?>