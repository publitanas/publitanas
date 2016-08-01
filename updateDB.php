<?php
	// check this file's MD5 to make sure it wasn't called before
	$prevMD5=@implode('', @file(dirname(__FILE__).'/setup.md5'));
	$thisMD5=md5(@implode('', @file("./updateDB.php")));
	if($thisMD5==$prevMD5){
		$setupAlreadyRun=true;
	}else{
		// set up tables
		if(!isset($silent)){
			$silent=true;
		}

		// set up tables
		setupTable('t_registros_publicaciones_ppam_publicador', "create table if not exists `t_registros_publicaciones_ppam_publicador` (   `IdRegistro` INT(11) not null auto_increment , primary key (`IdRegistro`), `FechaRegistro` DATE , `IdPPAM` VARCHAR(255) , `IdVoluntario` VARCHAR(255) , `IdTurno` INT(11) , `IdPublicacion` INT(11) , `CantidadColocada` SMALLINT(6) default '0' ) CHARSET utf8", $silent);
		setupIndexes('t_registros_publicaciones_ppam_publicador', array('IdPPAM','IdVoluntario','IdTurno','IdPublicacion'));
		setupTable('t_registro_estudios', "create table if not exists `t_registro_estudios` (   `IdRegistroEstudios` INT(11) not null auto_increment , primary key (`IdRegistroEstudios`), `IdPPAM` VARCHAR(255) , `IdVoluntario` VARCHAR(255) , `NombreEstudiante` VARCHAR(45) , `IdPublicacion` INT(11) , `Capitulo` INT(11) , `Parrafo` INT(11) , `Observaciones` VARCHAR(100) ) CHARSET utf8", $silent);
		setupIndexes('t_registro_estudios', array('IdPPAM','IdVoluntario','IdPublicacion'));
		setupTable('t_incidencias', "create table if not exists `t_incidencias` (   `IdIncidencia` INT(11) not null auto_increment , primary key (`IdIncidencia`), `IdPPAM` VARCHAR(255) , `IdVoluntario` VARCHAR(255) , `FechaIncidencia` DATE , `FechaRegistro` DATE , `DescIncidencia` VARCHAR(50) ) CHARSET utf8", $silent);
		setupIndexes('t_incidencias', array('IdPPAM','IdVoluntario'));
		setupTable('t_turnos_hermanos', "create table if not exists `t_turnos_hermanos` (   `IdTurnoHermano` INT(11) not null auto_increment , primary key (`IdTurnoHermano`), `IdPPAM` VARCHAR(255) , `FechaAsignacionTurno` DATE , `IdTurno` INT(11) , `IdVoluntario` VARCHAR(255) , `IdResponsabilidad` INT(11) ) CHARSET utf8", $silent);
		setupIndexes('t_turnos_hermanos', array('IdPPAM','IdTurno','IdVoluntario','IdResponsabilidad'));
		setupTable('t_voluntarios', "create table if not exists `t_voluntarios` (   `IdVoluntario` VARCHAR(255) not null , primary key (`IdVoluntario`), `NombreVoluntario` VARCHAR(255) , `IdPPAM` VARCHAR(255) , `TelefonoMovilVoluntario` VARCHAR(255) , `MailVoluntario` VARCHAR(255) , `CongregacionVoluntario` VARCHAR(255) , `Activo` VARCHAR(255) , `TelefonoFijoVoluntario` VARCHAR(255) , `IdResponsabilidadCongregacion` INT(11) , `IdResponsabilidadPPAM` INT(11) , `IdPrivilegiosServicio` VARCHAR(255) ) CHARSET utf8", $silent);
		setupIndexes('t_voluntarios', array('IdPPAM','IdResponsabilidadCongregacion','IdResponsabilidadPPAM','IdPrivilegiosServicio'));
		setupTable('t_colaboraciones_ppam', "create table if not exists `t_colaboraciones_ppam` (   `IdColaboracion` INT(11) not null auto_increment , primary key (`IdColaboracion`), `IdVoluntario` VARCHAR(255) , `IdPPAM` VARCHAR(255) ) CHARSET utf8", $silent);
		setupIndexes('t_colaboraciones_ppam', array('IdVoluntario','IdPPAM'));
		setupTable('t_disponibilidades_voluntarios', "create table if not exists `t_disponibilidades_voluntarios` (   `IdDisponibilidad` INT(11) not null auto_increment , primary key (`IdDisponibilidad`), `IdPPAM` VARCHAR(255) , `IdVoluntario` VARCHAR(255) , `IdDiaSemana` INT(11) , `IdTurnoDisponible` INT(11) , `VecesDisponibilidadMes` TINYINT(4) , `Observaciones` VARCHAR(50) ) CHARSET utf8", $silent);
		setupIndexes('t_disponibilidades_voluntarios', array('IdPPAM','IdVoluntario','IdDiaSemana','IdTurnoDisponible'));
		setupTable('t_turnos_hermanos_maestro', "create table if not exists `t_turnos_hermanos_maestro` (   `IdTurnoHermanoMaestro` INT(11) not null auto_increment , primary key (`IdTurnoHermanoMaestro`), `IdPPAM` VARCHAR(255) , `IdDiaSemana` INT(11) , `IdTurno` INT(11) , `IdVoluntario` INT(11) , `IdResponsabilidad` INT(11) ) CHARSET utf8", $silent);
		setupIndexes('t_turnos_hermanos_maestro', array('IdPPAM','IdDiaSemana','IdTurno','IdVoluntario','IdResponsabilidad'));
		setupTable('t_horarios_calendario_turnos', "create table if not exists `t_horarios_calendario_turnos` (   `idHorarioCalendario` VARCHAR(255) not null , primary key (`idHorarioCalendario`), `idPPAM` VARCHAR(255) , `InicioTurno1` VARCHAR(5) , `FinTurno1` VARCHAR(5) , `InicioTurno2` VARCHAR(5) , `FinTurno2` VARCHAR(5) , `InicioTurno3` VARCHAR(5) , `FinTurno3` VARCHAR(5) , `InicioTurno4` VARCHAR(5) , `FinTurno4` VARCHAR(5) ) CHARSET utf8", $silent);
		setupIndexes('t_horarios_calendario_turnos', array('idPPAM'));
		setupTable('t_ubicaciones_ppam', "create table if not exists `t_ubicaciones_ppam` (   `IdPPAM` VARCHAR(255) not null , primary key (`IdPPAM`), `NombrePPAM` VARCHAR(255) , `UbicacionPPAM` VARCHAR(255) , `PoblacionPPAM` VARCHAR(255) , `CoordenadasGPS` VARCHAR(255) , `IdCiudadPPAM` VARCHAR(255) ) CHARSET utf8", $silent);
		setupIndexes('t_ubicaciones_ppam', array('IdCiudadPPAM'));
		setupTable('t_ciudades_ppam', "create table if not exists `t_ciudades_ppam` (   `IdCiudadPPAM` VARCHAR(255) not null , primary key (`IdCiudadPPAM`), `NombreCiudad` VARCHAR(255) , `IdCoordinador` VARCHAR(255) , `idAuxiliarCoordinador1` VARCHAR(255) , `idAuxiliarCoordinador2` VARCHAR(255) , `idAuxiliarCoordinador3` VARCHAR(255) ) CHARSET utf8", $silent);
		setupIndexes('t_ciudades_ppam', array('IdCoordinador','idAuxiliarCoordinador1','idAuxiliarCoordinador2','idAuxiliarCoordinador3'));
		setupTable('v_informediarioporppam', "create table if not exists `v_informediarioporppam` (   `id` VARCHAR(255) not null , primary key (`id`), `IdPPAM` VARCHAR(255) , `ppam` VARCHAR(255) , `fechacolocacion` VARCHAR(255) , `publicacion` VARCHAR(255) , `fecha` VARCHAR(255) , `totalesmes` VARCHAR(255) ) CHARSET utf8", $silent);
		setupTable('v_informepublicacionesporppamymes', "create table if not exists `v_informepublicacionesporppamymes` (   `id` VARCHAR(255) not null , primary key (`id`), `IdPPAM` VARCHAR(255) , `ppam` VARCHAR(255) , `fecha` VARCHAR(255) , `publicacion` VARCHAR(255) , `totalesmes` VARCHAR(255) ) CHARSET utf8", $silent);
		setupTable('v_informemensualporciudad', "create table if not exists `v_informemensualporciudad` (   `id` VARCHAR(255) not null , primary key (`id`), `IdCiudadPPAM` VARCHAR(255) , `ciudadppam` VARCHAR(255) , `fecha` VARCHAR(255) , `publicacion` VARCHAR(255) , `totalesmes` VARCHAR(255) ) CHARSET utf8", $silent);
		setupTable('v_informemensualporpublicador', "create table if not exists `v_informemensualporpublicador` (   `id` VARCHAR(255) not null , primary key (`id`), `IdPPAM` VARCHAR(255) , `ppam` VARCHAR(255) , `fecha` VARCHAR(255) , `voluntario` VARCHAR(255) , `publicacion` VARCHAR(255) , `totalesmes` VARCHAR(255) ) CHARSET utf8", $silent);
		setupTable('v_informeturnosporsemana', "create table if not exists `v_informeturnosporsemana` (   `id` VARCHAR(255) not null , primary key (`id`), `NombreVoluntario` VARCHAR(255) , `semana` VARCHAR(255) , `NumeroTurnos` VARCHAR(255) ) CHARSET utf8", $silent);
		setupTable('m_publicaciones', "create table if not exists `m_publicaciones` (   `IdPublicacion` INT(11) not null auto_increment , primary key (`IdPublicacion`), `NombrePublicacion` VARCHAR(32) , `SeUsaParaEstudiar` TINYINT(1) , `IdTipoPublicacion` INT(11) default '0' ) CHARSET utf8", $silent);
		setupIndexes('m_publicaciones', array('IdTipoPublicacion'));
		setupTable('m_privilegios_servicio', "create table if not exists `m_privilegios_servicio` (   `IdPrivilegioServicio` VARCHAR(255) not null , primary key (`IdPrivilegioServicio`), `DescPrivilegioServicio` VARCHAR(255) ) CHARSET utf8", $silent);
		setupTable('m_responsabilidades_ppam', "create table if not exists `m_responsabilidades_ppam` (   `IdResponsabilidadPPAM` INT(11) not null auto_increment , primary key (`IdResponsabilidadPPAM`), `DescResponsabilidadPPAM` VARCHAR(45) ) CHARSET utf8", $silent);
		setupTable('m_responsabilidades_congregacion', "create table if not exists `m_responsabilidades_congregacion` (   `IdResponsabilidad` INT(11) not null auto_increment , primary key (`IdResponsabilidad`), `DescResponsabilidad` VARCHAR(45) ) CHARSET utf8", $silent);
		setupTable('m_tipos_publicaciones', "create table if not exists `m_tipos_publicaciones` (   `IdTipoPublicacion` INT(11) not null auto_increment , primary key (`IdTipoPublicacion`), `DescTipoPublicacion` VARCHAR(45) ) CHARSET utf8", $silent);
		setupTable('m_dias_semana', "create table if not exists `m_dias_semana` (   `IdDiaSemana` INT(11) not null auto_increment , primary key (`IdDiaSemana`), `DescDiaSemana` VARCHAR(32) ) CHARSET utf8", $silent);
		setupTable('t_turnos', "create table if not exists `t_turnos` (   `IdTurno` INT(11) not null auto_increment , primary key (`IdTurno`), `DescTurno` VARCHAR(45) ) CHARSET utf8", $silent);


		// save MD5
		if($fp=@fopen(dirname(__FILE__).'/setup.md5', 'w')){
			fwrite($fp, $thisMD5);
			fclose($fp);
		}
	}


	function setupIndexes($tableName, $arrFields){
		if(!is_array($arrFields)){
			return false;
		}

		foreach($arrFields as $fieldName){
			if(!$res=@db_query("SHOW COLUMNS FROM `$tableName` like '$fieldName'")){
				continue;
			}
			if(!$row=@db_fetch_assoc($res)){
				continue;
			}
			if($row['Key']==''){
				@db_query("ALTER TABLE `$tableName` ADD INDEX `$fieldName` (`$fieldName`)");
			}
		}
	}


	function setupTable($tableName, $createSQL='', $silent=true, $arrAlter=''){
		global $Translation;
		ob_start();

		echo '<div style="padding: 5px; border-bottom:solid 1px silver; font-family: verdana, arial; font-size: 10px;">';

		// is there a table rename query?
		if(is_array($arrAlter)){
			$matches=array();
			if(preg_match("/ALTER TABLE `(.*)` RENAME `$tableName`/", $arrAlter[0], $matches)){
				$oldTableName=$matches[1];
			}
		}

		if($res=@db_query("select count(1) from `$tableName`")){ // table already exists
			if($row = @db_fetch_array($res)){
				echo str_replace("<TableName>", $tableName, str_replace("<NumRecords>", $row[0],$Translation["table exists"]));
				if(is_array($arrAlter)){
					echo '<br>';
					foreach($arrAlter as $alter){
						if($alter!=''){
							echo "$alter ... ";
							if(!@db_query($alter)){
								echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
								echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
							}else{
								echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
							}
						}
					}
				}else{
					echo $Translation["table uptodate"];
				}
			}else{
				echo str_replace("<TableName>", $tableName, $Translation["couldnt count"]);
			}
		}else{ // given tableName doesn't exist

			if($oldTableName!=''){ // if we have a table rename query
				if($ro=@db_query("select count(1) from `$oldTableName`")){ // if old table exists, rename it.
					$renameQuery=array_shift($arrAlter); // get and remove rename query

					echo "$renameQuery ... ";
					if(!@db_query($renameQuery)){
						echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
						echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
					}else{
						echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
					}

					if(is_array($arrAlter)) setupTable($tableName, $createSQL, false, $arrAlter); // execute Alter queries on renamed table ...
				}else{ // if old tableName doesn't exist (nor the new one since we're here), then just create the table.
					setupTable($tableName, $createSQL, false); // no Alter queries passed ...
				}
			}else{ // tableName doesn't exist and no rename, so just create the table
				echo str_replace("<TableName>", $tableName, $Translation["creating table"]);
				if(!@db_query($createSQL)){
					echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
					echo '<div class="text-danger">' . $Translation['mysql said'] . db_error(db_link()) . '</div>';
				}else{
					echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
				}
			}
		}

		echo "</div>";

		$out=ob_get_contents();
		ob_end_clean();
		if(!$silent){
			echo $out;
		}
	}
?>