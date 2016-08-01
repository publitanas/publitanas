<?php

// Data functions (insert, update, delete, form) for table m_publicaciones

// This script and data application were generated by AppGini 5.50
// Download AppGini for free from http://bigprof.com/appgini/download/

function m_publicaciones_insert(){
	global $Translation;

	// mm: can member insert record?
	$arrPerm=getTablePermissions('m_publicaciones');
	if(!$arrPerm[1]){
		return false;
	}

	$data['NombrePublicacion'] = makeSafe($_REQUEST['NombrePublicacion']);
		if($data['NombrePublicacion'] == empty_lookup_value){ $data['NombrePublicacion'] = ''; }
	$data['SeUsaParaEstudiar'] = makeSafe($_REQUEST['SeUsaParaEstudiar']);
		if($data['SeUsaParaEstudiar'] == empty_lookup_value){ $data['SeUsaParaEstudiar'] = ''; }
	$data['IdTipoPublicacion'] = makeSafe($_REQUEST['IdTipoPublicacion']);
		if($data['IdTipoPublicacion'] == empty_lookup_value){ $data['IdTipoPublicacion'] = ''; }
	if($data['IdTipoPublicacion'] == '') $data['IdTipoPublicacion'] = "0";

	// hook: m_publicaciones_before_insert
	if(function_exists('m_publicaciones_before_insert')){
		$args=array();
		if(!m_publicaciones_before_insert($data, getMemberInfo(), $args)){ return false; }
	}

	$o=array('silentErrors' => true);
	sql('insert into `m_publicaciones` set       `NombrePublicacion`=' . (($data['NombrePublicacion'] !== '' && $data['NombrePublicacion'] !== NULL) ? "'{$data['NombrePublicacion']}'" : 'NULL') . ', `SeUsaParaEstudiar`=' . (($data['SeUsaParaEstudiar'] !== '' && $data['SeUsaParaEstudiar'] !== NULL) ? "'{$data['SeUsaParaEstudiar']}'" : 'NULL') . ', `IdTipoPublicacion`=' . (($data['IdTipoPublicacion'] !== '' && $data['IdTipoPublicacion'] !== NULL) ? "'{$data['IdTipoPublicacion']}'" : 'NULL'), $o);
	if($o['error']!=''){
		echo $o['error'];
		echo "<a href=\"m_publicaciones_view.php?addNew_x=1\">{$Translation['< back']}</a>";
		exit;
	}

	$recID = db_insert_id(db_link());

	// hook: m_publicaciones_after_insert
	if(function_exists('m_publicaciones_after_insert')){
		$res = sql("select * from `m_publicaciones` where `IdPublicacion`='" . makeSafe($recID, false) . "' limit 1", $eo);
		if($row = db_fetch_assoc($res)){
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = makeSafe($recID, false);
		$args=array();
		if(!m_publicaciones_after_insert($data, getMemberInfo(), $args)){ return (get_magic_quotes_gpc() ? stripslashes($recID) : $recID); }
	}

	// mm: save ownership data
	sql("insert ignore into membership_userrecords set tableName='m_publicaciones', pkValue='$recID', memberID='".getLoggedMemberID()."', dateAdded='".time()."', dateUpdated='".time()."', groupID='".getLoggedGroupID()."'", $eo);

	return (get_magic_quotes_gpc() ? stripslashes($recID) : $recID);
}

function m_publicaciones_delete($selected_id, $AllowDeleteOfParents=false, $skipChecks=false){
	// insure referential integrity ...
	global $Translation;
	$selected_id=makeSafe($selected_id);

	// mm: can member delete record?
	$arrPerm=getTablePermissions('m_publicaciones');
	$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='m_publicaciones' and pkValue='$selected_id'");
	$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='m_publicaciones' and pkValue='$selected_id'");
	if(($arrPerm[4]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[4]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[4]==3){ // allow delete?
		// delete allowed, so continue ...
	}else{
		return $Translation['You don\'t have enough permissions to delete this record'];
	}

	// hook: m_publicaciones_before_delete
	if(function_exists('m_publicaciones_before_delete')){
		$args=array();
		if(!m_publicaciones_before_delete($selected_id, $skipChecks, getMemberInfo(), $args))
			return $Translation['Couldn\'t delete this record'];
	}

	// child table: t_registros_publicaciones_ppam_publicador
	$res = sql("select `IdPublicacion` from `m_publicaciones` where `IdPublicacion`='$selected_id'", $eo);
	$IdPublicacion = db_fetch_row($res);
	$rires = sql("select count(1) from `t_registros_publicaciones_ppam_publicador` where `IdPublicacion`='".addslashes($IdPublicacion[0])."'", $eo);
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
		$RetMsg = str_replace("<Delete>", "<input type=\"button\" class=\"button\" value=\"".$Translation['yes']."\" onClick=\"window.location='m_publicaciones_view.php?SelectedID=".urlencode($selected_id)."&delete_x=1&confirmed=1';\">", $RetMsg);
		$RetMsg = str_replace("<Cancel>", "<input type=\"button\" class=\"button\" value=\"".$Translation['no']."\" onClick=\"window.location='m_publicaciones_view.php?SelectedID=".urlencode($selected_id)."';\">", $RetMsg);
		return $RetMsg;
	}

	// child table: t_registro_estudios
	$res = sql("select `IdPublicacion` from `m_publicaciones` where `IdPublicacion`='$selected_id'", $eo);
	$IdPublicacion = db_fetch_row($res);
	$rires = sql("select count(1) from `t_registro_estudios` where `IdPublicacion`='".addslashes($IdPublicacion[0])."'", $eo);
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
		$RetMsg = str_replace("<Delete>", "<input type=\"button\" class=\"button\" value=\"".$Translation['yes']."\" onClick=\"window.location='m_publicaciones_view.php?SelectedID=".urlencode($selected_id)."&delete_x=1&confirmed=1';\">", $RetMsg);
		$RetMsg = str_replace("<Cancel>", "<input type=\"button\" class=\"button\" value=\"".$Translation['no']."\" onClick=\"window.location='m_publicaciones_view.php?SelectedID=".urlencode($selected_id)."';\">", $RetMsg);
		return $RetMsg;
	}

	sql("delete from `m_publicaciones` where `IdPublicacion`='$selected_id'", $eo);

	// hook: m_publicaciones_after_delete
	if(function_exists('m_publicaciones_after_delete')){
		$args=array();
		m_publicaciones_after_delete($selected_id, getMemberInfo(), $args);
	}

	// mm: delete ownership data
	sql("delete from membership_userrecords where tableName='m_publicaciones' and pkValue='$selected_id'", $eo);
}

function m_publicaciones_update($selected_id){
	global $Translation;

	// mm: can member edit record?
	$arrPerm=getTablePermissions('m_publicaciones');
	$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='m_publicaciones' and pkValue='".makeSafe($selected_id)."'");
	$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='m_publicaciones' and pkValue='".makeSafe($selected_id)."'");
	if(($arrPerm[3]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[3]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[3]==3){ // allow update?
		// update allowed, so continue ...
	}else{
		return false;
	}

	$data['NombrePublicacion'] = makeSafe($_REQUEST['NombrePublicacion']);
		if($data['NombrePublicacion'] == empty_lookup_value){ $data['NombrePublicacion'] = ''; }
	$data['SeUsaParaEstudiar'] = makeSafe($_REQUEST['SeUsaParaEstudiar']);
		if($data['SeUsaParaEstudiar'] == empty_lookup_value){ $data['SeUsaParaEstudiar'] = ''; }
	$data['IdTipoPublicacion'] = makeSafe($_REQUEST['IdTipoPublicacion']);
		if($data['IdTipoPublicacion'] == empty_lookup_value){ $data['IdTipoPublicacion'] = ''; }
	$data['selectedID']=makeSafe($selected_id);

	// hook: m_publicaciones_before_update
	if(function_exists('m_publicaciones_before_update')){
		$args=array();
		if(!m_publicaciones_before_update($data, getMemberInfo(), $args)){ return false; }
	}

	$o=array('silentErrors' => true);
	sql('update `m_publicaciones` set       `NombrePublicacion`=' . (($data['NombrePublicacion'] !== '' && $data['NombrePublicacion'] !== NULL) ? "'{$data['NombrePublicacion']}'" : 'NULL') . ', `SeUsaParaEstudiar`=' . (($data['SeUsaParaEstudiar'] !== '' && $data['SeUsaParaEstudiar'] !== NULL) ? "'{$data['SeUsaParaEstudiar']}'" : 'NULL') . ', `IdTipoPublicacion`=' . (($data['IdTipoPublicacion'] !== '' && $data['IdTipoPublicacion'] !== NULL) ? "'{$data['IdTipoPublicacion']}'" : 'NULL') . " where `IdPublicacion`='".makeSafe($selected_id)."'", $o);
	if($o['error']!=''){
		echo $o['error'];
		echo '<a href="m_publicaciones_view.php?SelectedID='.urlencode($selected_id)."\">{$Translation['< back']}</a>";
		exit;
	}


	// hook: m_publicaciones_after_update
	if(function_exists('m_publicaciones_after_update')){
		$res = sql("SELECT * FROM `m_publicaciones` WHERE `IdPublicacion`='{$data['selectedID']}' LIMIT 1", $eo);
		if($row = db_fetch_assoc($res)){
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = $data['IdPublicacion'];
		$args = array();
		if(!m_publicaciones_after_update($data, getMemberInfo(), $args)){ return; }
	}

	// mm: update ownership data
	sql("update membership_userrecords set dateUpdated='".time()."' where tableName='m_publicaciones' and pkValue='".makeSafe($selected_id)."'", $eo);

}

function m_publicaciones_form($selected_id = '', $AllowUpdate = 1, $AllowInsert = 1, $AllowDelete = 1, $ShowCancel = 0){
	// function to return an editable form for a table records
	// and fill it with data of record whose ID is $selected_id. If $selected_id
	// is empty, an empty form is shown, with only an 'Add New'
	// button displayed.

	global $Translation;

	// mm: get table permissions
	$arrPerm=getTablePermissions('m_publicaciones');
	if(!$arrPerm[1] && $selected_id==''){ return ''; }
	$AllowInsert = ($arrPerm[1] ? true : false);
	// print preview?
	$dvprint = false;
	if($selected_id && $_REQUEST['dvprint_x'] != ''){
		$dvprint = true;
	}

	$filterer_IdTipoPublicacion = thisOr(undo_magic_quotes($_REQUEST['filterer_IdTipoPublicacion']), '');

	// populate filterers, starting from children to grand-parents

	// unique random identifier
	$rnd1 = ($dvprint ? rand(1000000, 9999999) : '');
	// combobox: IdTipoPublicacion
	$combo_IdTipoPublicacion = new DataCombo;

	if($selected_id){
		// mm: check member permissions
		if(!$arrPerm[2]){
			return "";
		}
		// mm: who is the owner?
		$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='m_publicaciones' and pkValue='".makeSafe($selected_id)."'");
		$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='m_publicaciones' and pkValue='".makeSafe($selected_id)."'");
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

		$res = sql("select * from `m_publicaciones` where `IdPublicacion`='".makeSafe($selected_id)."'", $eo);
		if(!($row = db_fetch_array($res))){
			return error_message($Translation['No records found']);
		}
		$urow = $row; /* unsanitized data */
		$hc = new CI_Input();
		$row = $hc->xss_clean($row); /* sanitize data */
		$combo_IdTipoPublicacion->SelectedData = $row['IdTipoPublicacion'];
	}else{
		$combo_IdTipoPublicacion->SelectedData = $filterer_IdTipoPublicacion;
	}
	$combo_IdTipoPublicacion->HTML = '<span id="IdTipoPublicacion-container' . $rnd1 . '"></span><input type="hidden" name="IdTipoPublicacion" id="IdTipoPublicacion' . $rnd1 . '" value="' . htmlspecialchars($combo_IdTipoPublicacion->SelectedData, ENT_QUOTES, 'UTF-8') . '">';
	$combo_IdTipoPublicacion->MatchText = '<span id="IdTipoPublicacion-container-readonly' . $rnd1 . '"></span><input type="hidden" name="IdTipoPublicacion" id="IdTipoPublicacion' . $rnd1 . '" value="' . htmlspecialchars($combo_IdTipoPublicacion->SelectedData, ENT_QUOTES, 'UTF-8') . '">';

	ob_start();
	?>

	<script>
		// initial lookup values
		var current_IdTipoPublicacion__RAND__ = { text: "<?php echo ($selected_id ? '' : '0'); ?>", value: "<?php echo addslashes($selected_id ? $urow['IdTipoPublicacion'] : $filterer_IdTipoPublicacion); ?>"};

		jQuery(function() {
			if(typeof(IdTipoPublicacion_reload__RAND__) == 'function') IdTipoPublicacion_reload__RAND__();
		});
		function IdTipoPublicacion_reload__RAND__(){
		<?php if(($AllowUpdate || $AllowInsert) && !$dvprint){ ?>

			jQuery("#IdTipoPublicacion-container__RAND__").select2({
				/* initial default value */
				initSelection: function(e, c){
					jQuery.ajax({
						url: 'ajax_combo.php',
						dataType: 'json',
						<?php if(!$selected_id && !$filterer_IdTipoPublicacion){ ?>
							data: { text: '0', t: 'm_publicaciones', f: 'IdTipoPublicacion' }
						<?php }else{ ?>
							data: { id: current_IdTipoPublicacion__RAND__.value, t: 'm_publicaciones', f: 'IdTipoPublicacion' }
						<?php } ?>

					}).done(function(resp){
						c({
							id: resp.results[0].id,
							text: resp.results[0].text
						});
						jQuery('[name="IdTipoPublicacion"]').val(resp.results[0].id);
						jQuery('[id=IdTipoPublicacion-container-readonly__RAND__]').html('<span id="IdTipoPublicacion-match-text">' + resp.results[0].text + '</span>');


						if(typeof(IdTipoPublicacion_update_autofills__RAND__) == 'function') IdTipoPublicacion_update_autofills__RAND__();
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
					data: function(term, page){ return { s: term, p: page, t: 'm_publicaciones', f: 'IdTipoPublicacion' }; },
					results: function(resp, page){ return resp; }
				}
			}).on('change', function(e){
				current_IdTipoPublicacion__RAND__.value = e.added.id;
				current_IdTipoPublicacion__RAND__.text = e.added.text;
				jQuery('[name="IdTipoPublicacion"]').val(e.added.id);


				if(typeof(IdTipoPublicacion_update_autofills__RAND__) == 'function') IdTipoPublicacion_update_autofills__RAND__();
			});

			if(!$j("#IdTipoPublicacion-container__RAND__").length){
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: { id: current_IdTipoPublicacion__RAND__.value, t: 'm_publicaciones', f: 'IdTipoPublicacion' }
				}).done(function(resp){
					$j('[name="IdTipoPublicacion"]').val(resp.results[0].id);
					$j('[id=IdTipoPublicacion-container-readonly__RAND__]').html('<span id="IdTipoPublicacion-match-text">' + resp.results[0].text + '</span>');

					if(typeof(IdTipoPublicacion_update_autofills__RAND__) == 'function') IdTipoPublicacion_update_autofills__RAND__();
				});
			}

		<?php }else{ ?>

			jQuery.ajax({
				url: 'ajax_combo.php',
				dataType: 'json',
				data: { id: current_IdTipoPublicacion__RAND__.value, t: 'm_publicaciones', f: 'IdTipoPublicacion' }
			}).done(function(resp){
				jQuery('[id=IdTipoPublicacion-container__RAND__], [id=IdTipoPublicacion-container-readonly__RAND__]').html('<span id="IdTipoPublicacion-match-text">' + resp.results[0].text + '</span>');

				if(typeof(IdTipoPublicacion_update_autofills__RAND__) == 'function') IdTipoPublicacion_update_autofills__RAND__();
			});
		<?php } ?>

		}
	</script>
	<?php

	$lookups = str_replace('__RAND__', $rnd1, ob_get_contents());
	ob_end_clean();


	// code for template based detail view forms

	// open the detail view template
	$templateCode = @file_get_contents('./templates/m_publicaciones_templateDV.html');

	// process form title
	$templateCode = str_replace('<%%DETAIL_VIEW_TITLE%%>', 'Detalle del Registro', $templateCode);
	$templateCode = str_replace('<%%RND1%%>', $rnd1, $templateCode);
	$templateCode = str_replace('<%%EMBEDDED%%>', ($_REQUEST['Embedded'] ? 'Embedded=1' : ''), $templateCode);
	// process buttons
	if($arrPerm[1] && !$selected_id){ // allow insert and no record selected?
		if(!$selected_id) $templateCode=str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-success" id="insert" name="insert_x" value="1" onclick="return m_publicaciones_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save New'] . '</button>', $templateCode);
		$templateCode=str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="insert" name="insert_x" value="1" onclick="return m_publicaciones_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save As Copy'] . '</button>', $templateCode);
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
			$templateCode=str_replace('<%%UPDATE_BUTTON%%>', '<button type="submit" class="btn btn-success btn-lg" id="update" name="update_x" value="1" onclick="return m_publicaciones_validateData();"><i class="glyphicon glyphicon-ok"></i> ' . $Translation['Save Changes'] . '</button>', $templateCode);
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
		$jsReadOnly .= "\tjQuery('#NombrePublicacion').replaceWith('<div class=\"form-control-static\" id=\"NombrePublicacion\">' + (jQuery('#NombrePublicacion').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#SeUsaParaEstudiar').replaceWith('<div class=\"form-control-static\" id=\"SeUsaParaEstudiar\">' + (jQuery('#SeUsaParaEstudiar').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#IdTipoPublicacion').prop('disabled', true).css({ color: '#555', backgroundColor: '#fff' });\n";
		$jsReadOnly .= "\tjQuery('#IdTipoPublicacion_caption').prop('disabled', true).css({ color: '#555', backgroundColor: 'white' });\n";
		$jsReadOnly .= "\tjQuery('.select2-container').hide();\n";

		$noUploads = true;
	}elseif(($AllowInsert && !$selected_id) || ($AllowUpdate && $selected_id)){
		$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', true);"; // temporarily disable form change handler
			$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', false);"; // re-enable form change handler
	}

	// process combos
	$templateCode=str_replace('<%%COMBO(IdTipoPublicacion)%%>', $combo_IdTipoPublicacion->HTML, $templateCode);
	$templateCode=str_replace('<%%COMBOTEXT(IdTipoPublicacion)%%>', $combo_IdTipoPublicacion->MatchText, $templateCode);
	$templateCode=str_replace('<%%URLCOMBOTEXT(IdTipoPublicacion)%%>', urlencode($combo_IdTipoPublicacion->MatchText), $templateCode);

	/* lookup fields array: 'lookup field name' => array('parent table name', 'lookup field caption') */
	$lookup_fields = array(  'IdTipoPublicacion' => array('m_tipos_publicaciones', 'Tipo Publicaci&oacute;n'));
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
	$templateCode=str_replace('<%%UPLOADFILE(IdPublicacion)%%>', '', $templateCode);
	$templateCode=str_replace('<%%UPLOADFILE(NombrePublicacion)%%>', '', $templateCode);
	$templateCode=str_replace('<%%UPLOADFILE(SeUsaParaEstudiar)%%>', '', $templateCode);
	$templateCode=str_replace('<%%UPLOADFILE(IdTipoPublicacion)%%>', '', $templateCode);

	// process values
	if($selected_id){
		$templateCode=str_replace('<%%VALUE(IdPublicacion)%%>', htmlspecialchars($row['IdPublicacion'], ENT_QUOTES, 'UTF-8'), $templateCode);
		$templateCode=str_replace('<%%URLVALUE(IdPublicacion)%%>', urlencode($urow['IdPublicacion']), $templateCode);
		$templateCode=str_replace('<%%VALUE(NombrePublicacion)%%>', htmlspecialchars($row['NombrePublicacion'], ENT_QUOTES, 'UTF-8'), $templateCode);
		$templateCode=str_replace('<%%URLVALUE(NombrePublicacion)%%>', urlencode($urow['NombrePublicacion']), $templateCode);
		$templateCode=str_replace('<%%VALUE(SeUsaParaEstudiar)%%>', htmlspecialchars($row['SeUsaParaEstudiar'], ENT_QUOTES, 'UTF-8'), $templateCode);
		$templateCode=str_replace('<%%URLVALUE(SeUsaParaEstudiar)%%>', urlencode($urow['SeUsaParaEstudiar']), $templateCode);
		$templateCode=str_replace('<%%VALUE(IdTipoPublicacion)%%>', htmlspecialchars($row['IdTipoPublicacion'], ENT_QUOTES, 'UTF-8'), $templateCode);
		$templateCode=str_replace('<%%URLVALUE(IdTipoPublicacion)%%>', urlencode($urow['IdTipoPublicacion']), $templateCode);
	}else{
		$templateCode=str_replace('<%%VALUE(IdPublicacion)%%>', '', $templateCode);
		$templateCode=str_replace('<%%URLVALUE(IdPublicacion)%%>', urlencode(''), $templateCode);
		$templateCode=str_replace('<%%VALUE(NombrePublicacion)%%>', '', $templateCode);
		$templateCode=str_replace('<%%URLVALUE(NombrePublicacion)%%>', urlencode(''), $templateCode);
		$templateCode=str_replace('<%%VALUE(SeUsaParaEstudiar)%%>', '', $templateCode);
		$templateCode=str_replace('<%%URLVALUE(SeUsaParaEstudiar)%%>', urlencode(''), $templateCode);
		$templateCode=str_replace('<%%VALUE(IdTipoPublicacion)%%>', '0', $templateCode);
		$templateCode=str_replace('<%%URLVALUE(IdTipoPublicacion)%%>', urlencode('0'), $templateCode);
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

	// hook: m_publicaciones_dv
	if(function_exists('m_publicaciones_dv')){
		$args=array();
		m_publicaciones_dv(($selected_id ? $selected_id : FALSE), getMemberInfo(), $templateCode, $args);
	}

	return $templateCode;
}
?>