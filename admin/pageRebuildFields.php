<?php
	$currDir = dirname(__FILE__);
	require("{$currDir}/incCommon.php");
	include("{$currDir}/incHeader.php");

	/* application schema as created in AppGini */
	$schema = array(   
		't_registros_publicaciones_ppam_publicador' => array(   
			'IdRegistro' => array('appgini' => 'INT(11) not null primary key auto_increment '),
			'FechaRegistro' => array('appgini' => 'DATE '),
			'IdPPAM' => array('appgini' => 'VARCHAR(255) '),
			'IdVoluntario' => array('appgini' => 'VARCHAR(255) '),
			'IdTurno' => array('appgini' => 'INT(11) '),
			'IdPublicacion' => array('appgini' => 'INT(11) '),
			'CantidadColocada' => array('appgini' => 'SMALLINT(6) default \'0\' ')
		),
		't_registro_estudios' => array(   
			'IdRegistroEstudios' => array('appgini' => 'INT(11) not null primary key auto_increment '),
			'IdPPAM' => array('appgini' => 'VARCHAR(255) '),
			'IdVoluntario' => array('appgini' => 'VARCHAR(255) '),
			'NombreEstudiante' => array('appgini' => 'VARCHAR(45) '),
			'IdPublicacion' => array('appgini' => 'INT(11) '),
			'Capitulo' => array('appgini' => 'INT(11) '),
			'Parrafo' => array('appgini' => 'INT(11) '),
			'Observaciones' => array('appgini' => 'VARCHAR(100) ')
		),
		't_incidencias' => array(   
			'IdIncidencia' => array('appgini' => 'INT(11) not null primary key auto_increment '),
			'IdPPAM' => array('appgini' => 'VARCHAR(255) '),
			'IdVoluntario' => array('appgini' => 'VARCHAR(255) '),
			'FechaIncidencia' => array('appgini' => 'DATE '),
			'FechaRegistro' => array('appgini' => 'DATE '),
			'DescIncidencia' => array('appgini' => 'VARCHAR(50) ')
		),
		't_turnos_hermanos' => array(   
			'IdTurnoHermano' => array('appgini' => 'INT(11) not null primary key auto_increment '),
			'IdPPAM' => array('appgini' => 'VARCHAR(255) '),
			'FechaAsignacionTurno' => array('appgini' => 'DATE '),
			'IdTurno' => array('appgini' => 'INT(11) '),
			'IdVoluntario' => array('appgini' => 'VARCHAR(255) '),
			'IdResponsabilidad' => array('appgini' => 'INT(11) ')
		),
		't_voluntarios' => array(   
			'IdVoluntario' => array('appgini' => 'VARCHAR(255) not null primary key '),
			'NombreVoluntario' => array('appgini' => 'VARCHAR(255) '),
			'IdPPAM' => array('appgini' => 'VARCHAR(255) '),
			'TelefonoMovilVoluntario' => array('appgini' => 'VARCHAR(255) '),
			'MailVoluntario' => array('appgini' => 'VARCHAR(255) '),
			'CongregacionVoluntario' => array('appgini' => 'VARCHAR(255) '),
			'Activo' => array('appgini' => 'VARCHAR(255) '),
			'TelefonoFijoVoluntario' => array('appgini' => 'VARCHAR(255) '),
			'IdResponsabilidadCongregacion' => array('appgini' => 'INT(11) '),
			'IdResponsabilidadPPAM' => array('appgini' => 'INT(11) '),
			'IdPrivilegiosServicio' => array('appgini' => 'VARCHAR(255) ')
		),
		't_colaboraciones_ppam' => array(   
			'IdColaboracion' => array('appgini' => 'INT(11) not null primary key auto_increment '),
			'IdVoluntario' => array('appgini' => 'VARCHAR(255) '),
			'IdPPAM' => array('appgini' => 'VARCHAR(255) ')
		),
		't_disponibilidades_voluntarios' => array(   
			'IdDisponibilidad' => array('appgini' => 'INT(11) not null primary key auto_increment '),
			'IdPPAM' => array('appgini' => 'VARCHAR(255) '),
			'IdVoluntario' => array('appgini' => 'VARCHAR(255) '),
			'IdDiaSemana' => array('appgini' => 'INT(11) '),
			'IdTurnoDisponible' => array('appgini' => 'INT(11) '),
			'VecesDisponibilidadMes' => array('appgini' => 'TINYINT(4) '),
			'Observaciones' => array('appgini' => 'VARCHAR(50) ')
		),
		't_turnos_hermanos_maestro' => array(   
			'IdTurnoHermanoMaestro' => array('appgini' => 'INT(11) not null primary key auto_increment '),
			'IdPPAM' => array('appgini' => 'VARCHAR(255) '),
			'IdDiaSemana' => array('appgini' => 'INT(11) '),
			'IdTurno' => array('appgini' => 'INT(11) '),
			'IdVoluntario' => array('appgini' => 'INT(11) '),
			'IdResponsabilidad' => array('appgini' => 'INT(11) ')
		),
		't_horarios_calendario_turnos' => array(   
			'idHorarioCalendario' => array('appgini' => 'VARCHAR(255) not null primary key '),
			'idPPAM' => array('appgini' => 'VARCHAR(255) '),
			'InicioTurno1' => array('appgini' => 'VARCHAR(5) '),
			'FinTurno1' => array('appgini' => 'VARCHAR(5) '),
			'InicioTurno2' => array('appgini' => 'VARCHAR(5) '),
			'FinTurno2' => array('appgini' => 'VARCHAR(5) '),
			'InicioTurno3' => array('appgini' => 'VARCHAR(5) '),
			'FinTurno3' => array('appgini' => 'VARCHAR(5) '),
			'InicioTurno4' => array('appgini' => 'VARCHAR(5) '),
			'FinTurno4' => array('appgini' => 'VARCHAR(5) ')
		),
		't_ubicaciones_ppam' => array(   
			'IdPPAM' => array('appgini' => 'VARCHAR(255) not null primary key '),
			'NombrePPAM' => array('appgini' => 'VARCHAR(255) '),
			'UbicacionPPAM' => array('appgini' => 'VARCHAR(255) '),
			'PoblacionPPAM' => array('appgini' => 'VARCHAR(255) '),
			'CoordenadasGPS' => array('appgini' => 'VARCHAR(255) '),
			'IdCiudadPPAM' => array('appgini' => 'VARCHAR(255) ')
		),
		't_ciudades_ppam' => array(   
			'IdCiudadPPAM' => array('appgini' => 'VARCHAR(255) not null primary key '),
			'NombreCiudad' => array('appgini' => 'VARCHAR(255) '),
			'IdCoordinador' => array('appgini' => 'VARCHAR(255) '),
			'idAuxiliarCoordinador1' => array('appgini' => 'VARCHAR(255) '),
			'idAuxiliarCoordinador2' => array('appgini' => 'VARCHAR(255) '),
			'idAuxiliarCoordinador3' => array('appgini' => 'VARCHAR(255) ')
		),
		'v_informediarioporppam' => array(   
			'id' => array('appgini' => 'VARCHAR(255) not null primary key '),
			'IdPPAM' => array('appgini' => 'VARCHAR(255) '),
			'ppam' => array('appgini' => 'VARCHAR(255) '),
			'fechacolocacion' => array('appgini' => 'VARCHAR(255) '),
			'publicacion' => array('appgini' => 'VARCHAR(255) '),
			'fecha' => array('appgini' => 'VARCHAR(255) '),
			'totalesmes' => array('appgini' => 'VARCHAR(255) ')
		),
		'v_informepublicacionesporppamymes' => array(   
			'id' => array('appgini' => 'VARCHAR(255) not null primary key '),
			'IdPPAM' => array('appgini' => 'VARCHAR(255) '),
			'ppam' => array('appgini' => 'VARCHAR(255) '),
			'fecha' => array('appgini' => 'VARCHAR(255) '),
			'publicacion' => array('appgini' => 'VARCHAR(255) '),
			'totalesmes' => array('appgini' => 'VARCHAR(255) ')
		),
		'v_informemensualporciudad' => array(   
			'id' => array('appgini' => 'VARCHAR(255) not null primary key '),
			'IdCiudadPPAM' => array('appgini' => 'VARCHAR(255) '),
			'ciudadppam' => array('appgini' => 'VARCHAR(255) '),
			'fecha' => array('appgini' => 'VARCHAR(255) '),
			'publicacion' => array('appgini' => 'VARCHAR(255) '),
			'totalesmes' => array('appgini' => 'VARCHAR(255) ')
		),
		'v_informemensualporpublicador' => array(   
			'id' => array('appgini' => 'VARCHAR(255) not null primary key '),
			'IdPPAM' => array('appgini' => 'VARCHAR(255) '),
			'ppam' => array('appgini' => 'VARCHAR(255) '),
			'fecha' => array('appgini' => 'VARCHAR(255) '),
			'voluntario' => array('appgini' => 'VARCHAR(255) '),
			'publicacion' => array('appgini' => 'VARCHAR(255) '),
			'totalesmes' => array('appgini' => 'VARCHAR(255) ')
		),
		'v_informeturnosporsemana' => array(   
			'id' => array('appgini' => 'VARCHAR(255) not null primary key '),
			'NombreVoluntario' => array('appgini' => 'VARCHAR(255) '),
			'semana' => array('appgini' => 'VARCHAR(255) '),
			'NumeroTurnos' => array('appgini' => 'VARCHAR(255) ')
		),
		'm_publicaciones' => array(   
			'IdPublicacion' => array('appgini' => 'INT(11) not null primary key auto_increment '),
			'NombrePublicacion' => array('appgini' => 'VARCHAR(32) '),
			'SeUsaParaEstudiar' => array('appgini' => 'TINYINT(1) '),
			'IdTipoPublicacion' => array('appgini' => 'INT(11) default \'0\' ')
		),
		'm_privilegios_servicio' => array(   
			'IdPrivilegioServicio' => array('appgini' => 'VARCHAR(255) not null primary key '),
			'DescPrivilegioServicio' => array('appgini' => 'VARCHAR(255) ')
		),
		'm_responsabilidades_ppam' => array(   
			'IdResponsabilidadPPAM' => array('appgini' => 'INT(11) not null primary key auto_increment '),
			'DescResponsabilidadPPAM' => array('appgini' => 'VARCHAR(45) ')
		),
		'm_responsabilidades_congregacion' => array(   
			'IdResponsabilidad' => array('appgini' => 'INT(11) not null primary key auto_increment '),
			'DescResponsabilidad' => array('appgini' => 'VARCHAR(45) ')
		),
		'm_tipos_publicaciones' => array(   
			'IdTipoPublicacion' => array('appgini' => 'INT(11) not null primary key auto_increment '),
			'DescTipoPublicacion' => array('appgini' => 'VARCHAR(45) ')
		),
		'm_dias_semana' => array(   
			'IdDiaSemana' => array('appgini' => 'INT(11) not null primary key auto_increment '),
			'DescDiaSemana' => array('appgini' => 'VARCHAR(32) ')
		),
		't_turnos' => array(   
			'IdTurno' => array('appgini' => 'INT(11) not null primary key auto_increment '),
			'DescTurno' => array('appgini' => 'VARCHAR(45) ')
		)
	);

	$table_captions = getTableList();

	/* function for preparing field definition for comparison */
	function prepare_def($def){
		$def = trim($def);
		$def = strtolower($def);

		/* ignore length for int data types */
		$def = preg_replace('/int\w*\([0-9]+\)/', 'int', $def);

		/* make sure there is always a space before mysql words */
		$def = preg_replace('/(\S)(unsigned|not null|binary|zerofill|auto_increment|default)/', '$1 $2', $def);

		/* treat 0.000.. same as 0 */
		$def = preg_replace('/([0-9])*\.0+/', '$1', $def);

		/* treat unsigned zerofill same as zerofill */
		$def = str_ireplace('unsigned zerofill', 'zerofill', $def);

		/* ignore zero-padding for date data types */
		$def = preg_replace("/date\s*default\s*'([0-9]{4})-0?([1-9])-0?([1-9])'/i", "date default '$1-$2-$3'", $def);

		return $def;
	}

	/* process requested fixes */
	$fix_table = (isset($_GET['t']) ? $_GET['t'] : false);
	$fix_field = (isset($_GET['f']) ? $_GET['f'] : false);

	if($fix_table && $fix_field && isset($schema[$fix_table][$fix_field])){
		$field_added = $field_updated = false;

		// field exists?
		$res = sql("show columns from `{$fix_table}` like '{$fix_field}'", $eo);
		if($row = db_fetch_assoc($res)){
			// modify field
			$qry = "alter table `{$fix_table}` modify `{$fix_field}` {$schema[$fix_table][$fix_field]['appgini']}";
			sql($qry, $eo);
			$field_updated = true;
		}else{
			// create field
			$qry = "alter table `{$fix_table}` add column `{$fix_field}` {$schema[$fix_table][$fix_field]['appgini']}";
			sql($qry, $eo);
			$field_added = true;
		}
	}

	foreach($table_captions as $tn => $tc){
		$eo['silentErrors'] = true;
		$res = sql("show columns from `{$tn}`", $eo);
		if($res){
			while($row = db_fetch_assoc($res)){
				if(!isset($schema[$tn][$row['Field']]['appgini'])) continue;
				$field_description = strtoupper(str_replace(' ', '', $row['Type']));
				$field_description = str_ireplace('unsigned', ' unsigned', $field_description);
				$field_description = str_ireplace('zerofill', ' zerofill', $field_description);
				$field_description = str_ireplace('binary', ' binary', $field_description);
				$field_description .= ($row['Null'] == 'NO' ? ' not null' : '');
				$field_description .= ($row['Key'] == 'PRI' ? ' primary key' : '');
				$field_description .= ($row['Key'] == 'UNI' ? ' unique' : '');
				$field_description .= ($row['Default'] != '' ? " default '" . makeSafe($row['Default']) . "'" : '');
				$field_description .= ($row['Extra'] == 'auto_increment' ? ' auto_increment' : '');

				$schema[$tn][$row['Field']]['db'] = '';
				if(isset($schema[$tn][$row['Field']])){
					$schema[$tn][$row['Field']]['db'] = $field_description;
				}
			}
		}
	}
?>

<?php if($field_added || $field_updated){ ?>
	<div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<i class="glyphicon glyphicon-info-sign"></i>
		<?php 
			$originalValues =  array ('<ACTION>','<FIELD>' , '<TABLE>' , '<QUERY>' );
			$action = ($field_added ? 'create' : 'update');
			$replaceValues = array ( $action , $fix_field , $fix_table , $qry );
			echo  str_replace ( $originalValues , $replaceValues , $Translation['create or update table']  );
		?>
	</div>
<?php } ?>

<div class="page-header"><h1>
	<?php echo $Translation['view or rebuild fields'] ; ?>
	<button type="button" class="btn btn-default" id="show_deviations_only"><i class="glyphicon glyphicon-eye-close"></i> <?php echo $Translation['show deviations only'] ; ?></button>
	<button type="button" class="btn btn-default hidden" id="show_all_fields"><i class="glyphicon glyphicon-eye-open"></i> <?php echo $Translation['show all fields'] ; ?></button>
</h1></div>

<p class="lead"><?php echo $Translation['compare tables page'] ; ?></p>

<div class="alert summary"></div>
<table class="table table-responsive table-hover table-striped">
	<thead><tr>
		<th></th>
		<th><?php echo $Translation['field'] ; ?></th>
		<th><?php echo $Translation['AppGini definition'] ; ?></th>
		<th><?php echo $Translation['database definition'] ; ?></th>
		<th></th>
	</tr></thead>

	<tbody>
	<?php foreach($schema as $tn => $fields){ ?>
		<tr class="text-info"><td colspan="5"><h4 data-placement="left" data-toggle="tooltip" title="<?php echo str_replace ( "<TABLENAME>" , $tn , $Translation['table name title']) ; ?>"><i class="glyphicon glyphicon-th-list"></i> <?php echo $table_captions[$tn]; ?></h4></td></tr>
		<?php foreach($fields as $fn => $fd){ ?>
			<?php $diff = ((prepare_def($fd['appgini']) == prepare_def($fd['db'])) ? false : true); ?>
			<?php $no_db = ($fd['db'] ? false : true); ?>
			<tr class="<?php echo ($diff ? 'highlight' : 'field_ok'); ?>">
				<td><i class="glyphicon glyphicon-<?php echo ($diff ? 'remove text-danger' : 'ok text-success'); ?>"></i></td>
				<td><?php echo $fn; ?></td>
				<td class="<?php echo ($diff ? 'bold text-success' : ''); ?>"><?php echo $fd['appgini']; ?></td>
				<td class="<?php echo ($diff ? 'bold text-danger' : ''); ?>"><?php echo thisOr($fd['db'], $Translation['does not exist']); ?></td>
				<td>
					<?php if($diff && $no_db){ ?>
						<a href="pageRebuildFields.php?t=<?php echo $tn; ?>&f=<?php echo $fn; ?>" class="btn btn-success btn-xs btn_create" data-toggle="tooltip" data-placement="top" title="<?php echo $Translation['create field'] ; ?>"><i class="glyphicon glyphicon-plus"></i> <?php echo $Translation['create it'] ; ?></a>
					<?php }elseif($diff){ ?>
						<a href="pageRebuildFields.php?t=<?php echo $tn; ?>&f=<?php echo $fn; ?>" class="btn btn-warning btn-xs btn_update" data-toggle="tooltip" title="<?php echo $Translation['fix field'] ; ?>"><i class="glyphicon glyphicon-cog"></i> <?php echo $Translation['fix it'] ; ?></a>
					<?php } ?>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
	</tbody>
</table>
<div class="alert summary"></div>

<style>
	.bold{ font-weight: bold; }
	.highlight, .highlight td{ background-color: #FFFFE0 !important; }
	[data-toggle="tooltip"]{ display: block !important; }
</style>

<script>
	jQuery(function(){
		jQuery('[data-toggle="tooltip"]').tooltip();

		jQuery('#show_deviations_only').click(function(){
			jQuery(this).addClass('hidden');
			jQuery('#show_all_fields').removeClass('hidden');
			jQuery('.field_ok').hide();
		});

		jQuery('#show_all_fields').click(function(){
			jQuery(this).addClass('hidden');
			jQuery('#show_deviations_only').removeClass('hidden');
			jQuery('.field_ok').show();
		});

		jQuery('.btn_update').click(function(){
			return confirm("<?php echo $Translation['field update warning'] ; ?>");
		});

		var count_updates = jQuery('.btn_update').length;
		var count_creates = jQuery('.btn_create').length;
		if(!count_creates && !count_updates){
			jQuery('.summary').addClass('alert-success').html("<?php echo $Translation['no deviations found'] ; ?>");
		}else{
			var fieldsCount = "<?php echo $Translation['error fields']; ?>";
			fieldsCount = fieldsCount.replace(/<CREATENUM>/, count_creates ).replace(/<UPDATENUM>/, count_updates);


			jQuery('.summary')
				.addClass('alert-warning')
				.html(
					fieldsCount
				);
		}
	});
</script>

<?php
	include("{$currDir}/incFooter.php");
?>
