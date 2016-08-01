<?php

	// IMPORTANT:
	// ==========
	// When translating, only translate the strings that are
	// TO THE RIGHT OF the equal sign (=).
	//
	// Do NOT translate the strings between square brackets ([])
	//
	// Also, leave the text between < and > untranslated.
	//
	// =====================================================

	// incHeader.php
	$Translation['membership management'] = "Gesti&oacute;n de Usuarios";
	$Translation['password mismatch'] = "Las contrase&ntilde;as no coinciden";
	$Translation['error'] = "Error";
	$Translation['invalid email'] = "Invalid Email Address";
	$Translation['sending mails'] = "Sending mails might take some time. Please don't close this page until you see the 'Done' message.";
	$Translation['complete step 4'] = "Please complete step 4 by selecting the member you want to transfer records to.";
	$Translation['info'] = "Info";
	$Translation['sure move member'] = 'Are you sure you want to move member \'<MEMBER>\' and his data from group \'<OLDGROUP>\' to group \'<NEWGROUP>\'?';
	$Translation['sure move data of member'] = 'Are you sure you want to move data of member \'<OLDMEMBER>\' from group \'<OLDGROUP>\' to member \'<NEWMEMBER>\' from group \'<NEWGROUP>\'?';
	$Translation['sure move all members'] = 'Are you sure you want to move all members and data from group \'<OLDGROUP>\' to group \'<NEWGROUP>\'?';
	$Translation['sure move data of all members'] = 'Are you sure you want to move data of all members of group \'<OLDGROUP>\' to member \'<MEMBER>\' from group \'<NEWGROUP>\'?';
	$Translation['toggle navigation'] = "Toggle navigation";
	$Translation['admin area'] = "Area de Administraci&oacute;n";
	$Translation['groups'] = "Grupos de Usuarios";
	$Translation['view groups'] = "Ver Grupos";
	$Translation['add group'] = "A&ntilde;adir Grupo";
	$Translation['edit anonymous permissions'] = "Editar Permisos Usuario An&oacute;nimo";
	$Translation['members'] = "Usuarios";
	$Translation['view members'] = "Ver Usuarios";
	$Translation['add member'] = "A&ntilde;adir Usuario";
	$Translation["view members' records"] = "Ver Registros de Usuario";  
	$Translation["utilities"] = "Utilidades"; 
	$Translation["admin settings"] = "Propiedades"; 
	$Translation["rebuild thumbnails"] = "Rebuild Enlaces"; 
	$Translation['rebuild fields'] = "Reconstruir Campos";
	$Translation['import CSV'] = "Importar Datos en CSV";
	$Translation['batch transfer'] = "Asistente para Transferir Datos";
	$Translation['mail all users'] = "Email a todos los Usuarios";
	$Translation['AppGini forum'] = "Forum AppGini";
	$Translation["user's area"] = 'Area de Usuarios';
	$Translation["sign out"] = "Cerrar Sesi&oacute;n";
	$Translation["attention"] = "Atenci&oacute;n!!";
	$Translation['security risk admin'] = 'You are using the default admin username and password. This is a huge security risk. Please change at least the admin password from the <a href="pageSettings.php">Admin Settings</a> page <em>immediately</em>.';
	$Translation['security risk'] = 'You are using the default admin password. This is a huge security	risk. Please change the admin password from the <a href="pageSettings.php">Admin Settings</a> page <em>immediately</em>.' ;
	$Translation['plugins'] = 'Plugins';

	//pageAssignOwners.php
	$Translation["assigned table records to group"] = "Assigned <NUMBER> records of table '<TABLE>' to group '<GROUP>'";
	$Translation["assigned table records to group and member"] = "Assigned <NUMBER> records of table '<TABLE>' to group '<GROUP>' , member '<MEMBERID>'";
	$Translation['data ownership assign'] = "Assign ownership to data that has no owners";
	$Translation['records ownership done'] = "All records in all tables have owners now.<br>Back to <a href='pageHome.php'>Admin homepage</a>.";
	$Translation['select group'] = "Seleccionar Grupo";
	$Translation['data ownership'] = "Sometimes, you might have tables with data that were entered before implementing this AppGini membership management system, or entered using other applications unaware of AppGini ownership system. This data currently has no owners. This page allows you to assign owner groups and owner members to this data.";
	$Translation["table"] = "Tabla";
	$Translation["records with no owners"] = "Registros sin Propietario";
	$Translation["new owner group"] = "Nuevo Grupo Propietario";
	$Translation["new owner member"] = "Nuevo Usuario Propietario*";	
	$Translation["cancel"] = "Cancelar";
	$Translation["assign new owners"] = "Asignar Nuevo Propietario";
	$Translation["please wait"] = "Por favor espere ...";	
	$Translation["if no owner member assigned"] = '* If you assign no owner member here, you can still use the <a href="pageTransferOwnership.php">Batch Transfer Wizard</a> later to do so.';
	
	//pageDeleteGroup.php
	$Translation["can not delete group remove members"] = 'Can\'t delete this group. Please remove members first.';
	$Translation["can not delete group transfer records"] = 'Can\'t delete this group. Please transfer its data records to another group first..';
	
	//pageEditGroup.php
	$Translation["group exists error"] = "Error: Group name already exists. You must choose a unique group name.";
	$Translation["group not found error"] = "Error: Grupo no Encontrado!";								 	
	$Translation["edit group"] = "Editar Grupo '<GROUPNAME>'";
	$Translation["add new group"] = "A&ntilde;adir Grupo";
	$Translation["anonymous group attention"] = "Attention! This is the anonymous group.";
	$Translation["show tool tips"] = "Show tool tips as mouse moves over options";
	$Translation["group name"] = "Nombre del Grupo";
	$Translation["readonly group name"] = "The name of the anonymous group is read-only here.";
	$Translation["anonymous group name"] = "If you name the group '<ANONYMOUSGROUP>', it will be considered the anonymous group<br>that defines the permissions of guest visitors that do not log into the system.";
	$Translation["description"] = "Descripci&oacute;n";
	$Translation["allow visitors sign up"] = 'Permitir a los Visitantes Registrarse?';
	$Translation["admin add users"] = "No. S&oacute;lo el Administrador puede a&ntilde;adir Usuarios.";
	$Translation["admin approve users"] = "Si, y el administrador debe validarlos.";
	$Translation["automatically approve users"] = "Si, y automaticamente son validados.";
	$Translation["group table permissions"] = "Permisos de Tabla para este Grupo";
	$Translation["no"] = "No";
	$Translation["owner"] = "Propietario";
	$Translation["group"] = "Grupo";
	$Translation["all"] = "Todos";
	$Translation["insert"] = "A&ntilde;adir";
	$Translation["view"] = "Ver";
	$Translation["edit"] = "Editar";
	$Translation["delete"] = "Borrar";
	$Translation["save changes"] = "Guardar Cambios";
	
	//pageEditMember.php
	$Translation["username error"] = "Error: Username already exists or is invalid. Make sure you provide a username containing 4 to 20 valid characters.";
	$Translation["member not found"] = "Error: Member not found!";
	$Translation["user has special permissions"] = "This user has special permissions that override his group permissions.";
	$Translation["user has group permissions"] = 'This user inherits the <a href="pageEditGroup.php?groupID=<GROUPID>">permissions of his group</a>.';
	$Translation["set user special permissions"] = 'Poner permisos especiales a este usuario';
	$Translation["sure continue"] = "If you made any changes to this member and did not save them yet, they will be lost if you continue. Are you sure you want to continue?";
	$Translation["edit member"] = "Editar Usuario <MEMBERID>" ;
	$Translation["add new member"] = "A&ntilde;adir Nuevo Usuario";
	$Translation["anonymous guest member"] = "Attention! This is the anonymous (guest) member.";
	$Translation["admin member"] = 'Attention! This is the admin member. You can\'t change the username, password or email of this member here, but you can do so in the <a href="pageSettings.php">admin settings</a> page.';
	$Translation["member username"] = "Nombre de Usuario";
	$Translation["check availability"] = "Chequear Disponibilidad";
	$Translation["read only username"] = "The username of the guest member is read-only.";
	$Translation["password"] = "Clave";
	$Translation["change password"] = "Type a password only if you want to change this member's<br>password. Otherwise, leave this field empty.";
	$Translation["confirm password"] = "Confirmar Clave";
	$Translation["email"] = "Email";
	$Translation["approved"] = "Aprovado?";
	$Translation["banned"] = "BLoqueado?";
	$Translation["comments"] = "Comentarios";
	$Translation["back to members"] = "Volver a Usuarios";
	$Translation["member added"] = "USuario <USERNAME> fue a&ntilde;adido correctamente";
	
	//pageEditMemberPermissions.php
	$Translation["member permissions saved"] = "Member permissions have been saved successfully.";
	$Translation["member permissions reset"] = "Member permissions have been reset to the same as his group.";
	$Translation["user table permissions"] = "Table permissions for user <a href='pageEditMember.php?memberID=<MEMBER>' title='View member details'><MEMBERID></a> of group <a href='pageEditGroup.php?groupID=<GROUPID>'  title='View group details and permissions'><GROUP></a>";
	$Translation["no member permissions"] = 'This member doesn\'t currently have any special permissions. This list shows the permissions of his group.';
	$Translation["reset member permissions"] = "Reset member permissions";
	$Translation["remove special permissions"] = 'This would remove all special permissions of this user and he will have the same permissions as his group. Are you sure you want to do that?';
	
	//pageEditOwnership.php
	$Translation["invalid table"] = "Tabla Incorrecta.";
	$Translation["invalid primary key"] = "Invalid primary key value";
	$Translation["record not found"] = "Record not found ... if it was imported externally, try assigning an owner from the admin area.";
	$Translation["invalid username"] = "Nombre de Usuario incorrecto";
	$Translation["record not found error"] = "Error: Registro no encontrado!";
	$Translation["edit Record Ownership"] = "Edit Record Ownership";
	$Translation["owner group"] = "Grupo Propietario";
	$Translation["view all records by group"] = "Ver todos los registros de este grupo";
	$Translation["owner member"] = "Usuario Propietario";
	$Translation["view all records by member"] = "Ver todos los registros de este Usuario";
	$Translation["switch record ownership"] = "If you want to switch ownership of this record to a member of another group, you must change the owner group and save changes first.";
	$Translation["record created on"] = "Regirtro Creado en";
	$Translation["record modified on"] = "Registro Modificacdo en";
	$Translation["view all records of table"] = "Ver todos los Registros de la Tabla";
	$Translation["record data"] = "Record data";
	$Translation["print"] = "Imprimir";
	$Translation["could not retrieve field licst"] = "Couldn't retrieve field list from '<TABLENAME>'";
	$Translation["field name"] = "Nombre del Campo";
	$Translation["value"] = "Valor";
	
	//pageHome.php
	$Translation["visitor sign up"] = '<a href="../membership_signup.php" target="_blank">Visitor sign up</a> is disabled because there are no groups where visitors can sign up currently. To enable visitor sign-up, set at least one group to allow visitor sign-up.';
	$Translation["table data without owner"] = 'Tienes datos en una o varias tablas que no tienen propietario. Para asignarlos propietario, <a href="pageAssignOwners.php">pulsa aqu&iacute;</a>.';
	$Translation["membership management homepage"] = "Pagina de Gesti&oacute;n de Usuarios";
	$Translation["newest updates"] = "Nuevas Actualizaciones";
	$Translation["view record details"] = "Ver detalle de Registros";
	$Translation["newest entries"] = "Nuevas Entradas";
	$Translation["available add-ons"] = "Available add-ons";
	$Translation["more info"] = "Mas Informaci&oacute;n";
	$Translation["close"] = "Cerrar";
	$Translation["view add-ons"] = "View all add-ons";
	$Translation["top members"] = "Top de Usuarios";
	$Translation["edit member details"] = "Editar Detalles de Usuario";
	$Translation["view member records"] = "Ver registros de usuario";
	$Translation["records"] = "registros";
	$Translation["members stats"] = "Estad&iacute;sticas de Usuarios";
	$Translation["total groups"] = "Total de Grupos";
	$Translation["active members"] = "Usuarios Activos";
	$Translation["view active members"] = "Ver usuarios activos";
	$Translation["members awaiting approval"] = "Usuarios Pendientes de Validar";
	$Translation["view members awaiting approval"] = "Ver usuarios pendientes de validar";
	$Translation["banned members"] = "Usuarios Bloqueados";
	$Translation["view banned members"] = "Ver usuarios bloqueados";
	$Translation["total members"] = "Total de Usuarios";
	$Translation["view all members"] = "Ver todos los usuarios";
	$Translation["BigProf tweets"]  = "Tweets By BigProf Software";
	$Translation["follow BigProf"] = "Follow @bigprof";
	$Translation["loading bigprof feed"] = "Loading @bigprof feed ...";
	$Translation["remove feed"] = "Remove this feed";
	
	//pageMail.php
	$Translation["can not send mail"] = "You can not send emails currently. The configured sender email address is not valid.	Please <a href='pageSettings.php'>correct it first</a> then try again.";
	$Translation["all groups"] = "All groups";
	$Translation["no recipient"] = "Couldn't find recipient. Please make sure you provide a valid recipient.";
	$Translation["invalid subject line"] = "Invalid subject line.";
	$Translation["no recipient found"] = "Couldn't find any recipients. Please make sure you provide a valid recipient.";
	$Translation["mail queue not saved"] = "Couldn't save mail queue. Please make sure the directory '<CURRDIR>' is writeable (chmod 755 or chmod 777).";
	$Translation["send mail"]  = "Send mail message to a member/group";
	$Translation["send mail to all members"] = "You are sending an email to all members. This could take a lot of time and affect your server performance. If you have a huge number of members, we don't recommend sending an email to all of them at once.";
	$Translation["from"] = "De";
	$Translation["change setting"] = "Cambiar este par&aacute;metro";
	$Translation["to"] = "Para";
	$Translation["subject"] = "Asunto";
	$Translation["message"] = "Mensaje";
	$Translation["send message"] = "Enviar Mensaje";
	
	//pagePrintRecord.php
	$Translation["record details"] = "Gesti&oacute;n de Usuarios -- Detalles del Registro";
	$Translation['table name'] = "Tabla: <TABLENAME>";
	
	//pageRebuildFields.php
	$Translation['create or update table'] = "An attempt to <ACTION> the field <i><FIELD></i> in <i><TABLE></i> table was made by executing this query: <pre><QUERY></pre> Results are shown below.";

	$Translation['view or rebuild fields'] = "Ver/Reconstruir Campos";
	$Translation['show deviations only'] = "Mostrar s&oacute;lo diferencias";
	$Translation['show all fields'] = "Mostrar todos los campos";
	$Translation['compare tables page'] = "This page compares the tables and fields structure/schema as designed in AppGini to the actual database structure and allows you to fix any deviations.";
	$Translation['field'] = "Campo";
	$Translation['AppGini definition'] = "Definici&oacute;n AppGini";
	$Translation['database definition'] = "Definici&oacute;n actual en Base de Datos";
	$Translation['table name title'] = "Tabla <TABLENAME>";
	$Translation['does not exist'] = "No Existe!";
	$Translation['create field'] = "Create the field by running an ADD COLUMN query.";
	$Translation['create it'] = "Crearlo";
	$Translation['fix field'] = "Fix the field by running an ALTER COLUMN query so that its definition becomes the same as that in AppGini.";
	$Translation['fix it'] = "Repararlo";
	$Translation['field update warning'] = "DANGER!! In some cases, this might lead to data loss, truncation, or corruption. It might be a better idea sometimes to update the field in AppGini to match that in the database. Would you still like to continue?";
	$Translation['no deviations found'] = "No se encuentran Diferencias. Todos los Campos OK!";
	$Translation['error fields'] = "Found <CREATENUM> non-existing fields that need to be created.<br>Found <UPDATENUM> deviating fields that might need to be updated.";
	
	//pageRebuildThumbnails.php
	$Translation['rebuild thumbnails'] = "Rebuild thumbnails";
	$Translation['thumbnails utility'] = "Use this utility if you have one or more image fields in a table that don't have thumbnails or have thumbnails with incorrect dimensions.";
	$Translation['rebuild thumbnails of table'] = "Rebuild thumbnails of table";
	$Translation['rebuild'] = "Rebuild";
	$Translation['rebuild thumbnails of table_name'] = "Rebuilding thumbnails of '<i><TABLENAME></i>' table ...";
	$Translation['do not close page message'] = "Don't close this page until you see a confirmation message that all thumbnails have been built.";	
	$Translation['rebuild thumbnails status'] = "Status: still rebuilding thumbnails, please wait ...";
	$Translation['building field thumbnails'] =  "Building thumbnails for '<i><FIELD></i>' field...";
	$Translation['done'] = "Done.";
	$Translation['finished status'] = "Status: finished. You can close this page now.";
	
	//pageSender.php
	$Translation['invalid mail queue'] = "Invalid mail queue.";
	$Translation['sending message failed'] = " -- Sending message to '<EMAIL>': Failed.";
	$Translation['sending message ok'] = " -- Sending message to '<EMAIL>': Ok.";
	$Translation['done!'] = "Done!";
	$Translation['close page'] = "You may close this page now or browse to some other page.";
	$Translation['mail log'] = "Mail log:";
	
	//pageSettings.php
	$Translation['invalid security token'] = 'Invalid security token! Please <a href="pageSettings.php">reload the page</a> and try again.';
	$Translation['unique admin username error'] = "The new admin username is already taken by another member. Please make sure the new admin username is unique.";	
	$Translation['unique anonymous username error'] = 'The new anonymous username is already taken by another member. Please make sure the username provided is unique.';
	$Translation['unique anonymous group name error'] = 'The new anonymous group name is already in use by another group. Please make sure the group name provided is unique.';
	$Translation['admin password mismatch'] = '"Admin password" and "Confirm password" don\'t match.';
	$Translation['invalid sender email'] = 'Invalid "Sender email".';
	$Translation['errors occurred'] = "The following errors occured:";
	$Translation['go back'] = 'Please <a href="pageSettings.php" onclick="history.go(-1); return false;">go back</a> to correct the above error(s) and try again.';
	$Translation['record updated automatically'] = "Record updated automatically on <DATE>";
	$Translation['admin settings saved'] = "Admin settings saved successfully.<br>Back to <a href=\"pageSettings.php\">Admin settings</a>.";
	$Translation['admin settings not saved'] = "Admin settings were NOT saved successfully. Failure reason: <ERROR><br>Back to <a href=\"pageSettings.php\" onclick=\"history.go(-1); return false;\">Admin settings</a>.";
	$Translation['show tool tips'] = 'Show tool tips as mouse moves over options';
	$Translation['admin username'] = "Admin username";
	$Translation['admin password'] = "Admin password";
	$Translation['change admin password'] = "Type a password only if you want to change the admin password.";
	$Translation['sender email'] = "Sender email";
	$Translation['sender name and email'] = "Sender name and email are used in the 'To' field when sending";
	$Translation['email messages'] = "email messages to groups or members.";
	$Translation['admin notifications'] = "Admin notifications";
	$Translation['no email notifications'] = "No email notifications to admin.";
	$Translation['member waiting approval'] = "Notify admin only when a new member is waiting for approval.";
	$Translation['new sign-ups'] = "Notify admin for all new sign-ups.";
	$Translation['sender name'] = "Sender name";
	$Translation['members custom field 1'] = "Members custom field 1";
	$Translation['members custom field 2'] = "Members custom field 2";
	$Translation['members custom field 3'] = "Members custom field 3";
	$Translation['members custom field 4'] = "Members custom field 4";
	$Translation['member approval email subject'] = "Member approval<br>email subject";
	$Translation['member approval email subject control'] = "When the admin approves a member, the member is notified by<br>email that he is approved. You can control the subject of the<br>approval email in this box,  and the content in the box below.";
	$Translation['member approval email message'] = "Member approval<br>email message";
	$Translation['MySQL date'] = "MySQL date<br>formatting string";
	$Translation['MySQL reference'] = 'Please refer to <a href="http://dev.mysql.com/doc/refman/5.0/en/date-and-time-functions.html#function_date-format" target="_blank">the MySQL reference</a> for possible formats.';
	$Translation['PHP short date'] = "PHP short date<br>formatting string";
	$Translation['PHP manual'] = 'Please refer to <a href="http://www.php.net/manual/en/function.date.php" target="_blank">the PHP manual</a> for possible formats.'; 
	$Translation['PHP long date'] = "PHP long date<br>formatting string";
	$Translation['groups per page'] = "Grupos por p&aacute;gina";
	$Translation['members per page'] = "Usuarios por p&aacute;gina";
	$Translation['records per page'] = "Registros por p&aacute;gina";
	$Translation['default sign-up mode'] = "Default sign-up mode<br>for new groups";
	$Translation['no sign-up allowed'] = "No sign-up allowed. Only the admin can add members.";
	$Translation['admin approve members'] = "Sign-up allowed, but the admin must approve members.";
	$Translation['automatically approve members'] = "Sign-up allowed, and automatically approve members.";
	$Translation['anonymous group'] = "Name of the anonymous<br>group";
	$Translation['anonymous user name'] = "Name of the anonymous<br>user";
	$Translation['hide twitter feed'] = "Hide Twitter feed<br>in admin homepage?";
	$Translation['twitter feed'] = "Our Twitter feed helps keep you informed of our latest news, useful resources, new releases, and many other helpful tips.";
	
	//pageTransferOwnership.php
	$Translation['invalid source member'] = "Invalid source member selected.";
	$Translation['invalid destination member'] = "Invalid destination member selected.";
	$Translation['moving member'] = "Moving member '<MEMBERID>' and his data from group '<SOURCEGROUP>' to group '<DESTINATIONGROUP>' ...";
	$Translation['data records transferred'] = "Member '<MEMBERID>' now belongs to group '<NEWGROUP>'. Data records transferred: <DATARECORDS>.";
	$Translation['moving data'] = "Moving data of member '<SOURCEMEMBER>' from group '<SOURCEGROUP>' to member '<DESTINATIONMEMBER>' from group '<DESTINATIONGROUP>' ...";
	$Translation['member records status'] = "Member '<SOURCEMEMBER>' of group '<SOURCEGROUP>' had <DATABEFORE> data records. <TRANSFERSTATUS> to member '<DESTINATIONMEMBER>' of group '<DESTINATIONGROUP>'.";
	$Translation['moving all group members'] = "Moving all members and data of group '<SOURCEGROUP>' to group '<DESTINATIONGROUP>' ...";
	$Translation['failed transferring group members'] = "Operation failed. No members were transferred from group '<SOURCEGROUP>' to '<DESTINATIONGROUP>'.";
	$Translation['group members transferred'] = "All members of group '<SOURCEGROUP>' now belong to '<DESTINATIONGROUP>'. ";
	$Translation['failed transfer data records'] = "However, data records failed to transfer.";
	$Translation['data records were transferred'] = "<DATABEFORE> data records were transferred.";
	$Translation['moving group data to member'] = "Moving data of all members of group '<SOURCEGROUP>' to member '<DESTINATIONMEMBER>' from group '<DESTINATIONGROUP>' ...";
	$Translation['moving group data to member status'] = "<NUMBER> record(s) were transferred from group '<SOURCEGROUP>' to member '<DESTINATIONMEMBER>' of group '<DESTINATIONGROUP>'";
	$Translation['status'] = "ESTADO:";
	$Translation['batch transfer link'] = 'To repeat the same batch transfer again later you can <a href= "pageTransferOwnership.php?sourceGroupID=<SOURCEGROUP>&amp;sourceMemberID=<SOURCEMEMBER>&amp;destinationGroupID=<DESTINATIONGROUP>&amp;destinationMemberID=<DESTINATIONMEMBER>&amp;moveMembers=<MOVEMEMBERS>">bookmark or copy this link</a>.';
	$Translation['ownership batch transfer'] = "Batch Transfer Of Ownership";
	$Translation['step 1'] = "PASO 1:";
	$Translation['batch transfer wizard'] = "The batch transfer wizard allows you to transfer data records of one or all members of a group (the <i>source group</i>) to a member of another group (the <i>destination member</i> of the <i>destination group</i>)";
	$Translation['source group'] = "Grupo de Origen";
	$Translation['update'] = "Actualizar";
	$Translation['next step'] = "Pr&oacute;ximo Paso";
	$Translation['group statistics'] = "This group has <MEMBERS> members, and <RECORDS> data records.";
	$Translation['step 2'] = "PASO 2:";
	$Translation['source member message'] = "The source member could be one member or all members of the source group.";
	$Translation['source member'] = "Usuarios de Origen";
	$Translation['all group members'] = "Todos los usuarios de'<GROUPNAME>'";
	$Translation['member statistics'] = "This member has <RECORDS> data records.";
	$Translation['step 3'] = "PASO 3:";
	$Translation['destination group message'] = "The destination group could be the same or different from the source group. Only groups that have members are listed below.";
	$Translation['destination group'] = "Grupo de Destino";
	$Translation['step 4'] = "PASO 4:";
	$Translation['destination member message'] = "The destination member will be the new owner of the data records of the source	member.";
	$Translation['destination member'] = "Destination member";
	$Translation['begin transfer'] = "Comenzar Transferencia";	
	$Translation['move records'] = "You could either move records from the source member(s) to a member in the destination group, or move the source member(s), together with their data records to the destination group.";
	$Translation['move data records to member'] = "Move data records to this member:";
	$Translation['move source member to group'] = "Move source member(s) and all his/their data records to the '<GROUPNAME>' group.";
	
	//pageUploadCSV.php
	$Translation['file not found error'] = "Error: File '<FILENAME>' not found.";
	$Translation['preview and confirm CSV data'] = "Preview the CSV data then confirm to import it ...";
	$Translation['display csv file rows'] = "Displaying the first 10 rows of the CSV file ...";
	$Translation['change CSV settings'] = 'Change CSV settings';
	$Translation['import CSV data'] = 'Confirm and import CSV data &gt;';
	$Translation['apply CSV settings'] = 'Apply CSV Settings';
	$Translation['importing CSV data'] = 'Importing CSV data ...';
	$Translation['start at estimated record'] = "Starting at record <RECORDNUMBER> of <RECORDS> total estimated records ...";
	$Translation['table backed up'] = "Table '<TABLE>' backed up as '<TABLENAME>'.";
	$Translation['table backup not done'] = "Table '<TABLE>' is empty, so no backup was done.";
	$Translation['importing batch'] = 'Importing batch <BATCH> of <BATCHNUM>: ';
	$Translation['ok'] = 'Ok';
	$Translation['records inserted or updated successfully'] = "<RECORDS> records inserted/updated in <SECONDS> seconds.";
	$Translation['mission accomplished'] = "Mission accomplished!";
	$Translation['assign a records owner'] = "Assign an owner to the imported records &gt;";
	$Translation['please wait and do not close'] = "Please wait and don't close this page ...";
	$Translation['hide advanced options'] = "Hide advanced options";
	$Translation['show advanced options'] = "Show advanced options";
	$Translation['import CSV to database'] = "Import a CSV file to the database";
	$Translation['import CSV to database page'] = "This page allows you to upload a CSV file (for example, one generated from MS Excel) and import it to one of the tables of the database. This makes it so easy to bulk-populate the database with data from other sources rather than manually entering every single record.";
	$Translation['populate table from CSV'] = "This is the table that you want to populate with data from the CSV file.";
	$Translation['CSV file'] = "CSV file";
	$Translation['preview CSV data'] = "Preview CSV data &gt;";
	$Translation['no table name provided'] = "No table name provided.";
	$Translation['can not open CSV'] = "Can't open csv file '<FILENAME>'.";
	$Translation['empty CSV file'] = "The csv file '<FILENAME>' is empty.";		
	$Translation['no CSV file data'] = "The csv file '<FILENAME>' has no data to read." ;
	$Translation['field separator'] = "Field separator";
	$Translation['default comma'] = "The default is comma (,)";
	$Translation['field delimiter'] = "Field delimiter";
	$Translation['default double-quote'] = 'The default is double-quote (")';
	$Translation['maximum characters per line'] = "Maximum characters per line";
	$Translation['trouble importing CSV'] = "If you have trouble importing the CSV file, try increasing this value.";
	$Translation['ignore lines number'] = "Number of lines to ignore";
	$Translation['skip lines number'] = "Change this value if you want to skip a specific number of lines in the CSV file.";
	$Translation['first line field names'] = "The first line of the file contains field names";
	$Translation['field names must match'] = "Field names must <b>exactly</b> match those in the database.";
	$Translation['update table records'] = "Update table records if their primary key values match those in the CSV file.";
	$Translation['ignore CSV table records'] = "If not checked, records in the CSV file having the same primary key values as those in the table <b>will be ignored</b>";
	$Translation['back up the table'] = "Back up the table before importing CSV data into it.";
	
	//pageViewGroups.php
	$Translation['no matching results found'] = "No matching results found.";
	$Translation['search groups'] = "Busqueda de Grupos";
	$Translation['find'] = "Buscar";
	$Translation['reset'] = "Borrar";
	$Translation['members count'] = "N&uacute;mero de Usuarios";
	$Translation['Edit group'] = "Editar Grupo";
	$Translation['confirm delete group'] = "Estas seguro que quieres Borrar completamente este Grupo?";
	$Translation['delete group'] = "Borrar Grupo";
	$Translation['view group records'] = "Ver Registros del Grupo";
	$Translation['view group members'] = "Ver Usuarios del Grupo";
	$Translation['send message to group'] = "Enviar mensaje al grupo";
	$Translation['previous'] = "Anterior";
	$Translation['displaying groups'] = "Mostrando Grupos del <GROUPNUM1> al <GROUPNUM2> de <GROUPS>";
	$Translation['next'] = "Siguiente";
	$Translation['key'] = "Leyenda:";	
	$Translation['edit group details'] = "Editar Detalles y Permisos del Grupo.";
	$Translation['add member to group'] = "A&ntilde;adir Nuevo Usuario al Grupo";
	$Translation['view data records'] = "Ver todos los registros introducidos por los usuarios del grupo.";
	$Translation['list group members'] = "Listado de todos los Usuarios del Grupo.";
	$Translation['send email to all members'] = "Enviar email a todos los usuarios del grupo.";
	
	//pageViewMembers.php
	$Translation['search members'] = "Buscar Usuarios <SEARCH> en <HTMLSELECT>";
	$Translation['all fields'] = "Todos los campos";
	$Translation['any'] = "Alguno";
	$Translation['waiting approval'] = "Pendiente de Aprobaci&oacute;n";
	$Translation['active'] = "Activos";
	$Translation['Banned'] = "Bloqueados";
	$Translation['username'] = "Nombre de Usuario";
	$Translation['sign up date'] = "Fecha de Registro";
	$Translation['Status'] = "Estado";
	$Translation['Edit member'] = "Editar Usuario";	
	$Translation['sure delete user'] = "Esta seguro que desea Borrar el usuario \'<USERNAME>\'?";
	$Translation['delete member'] = "Borrar Usuario";
	$Translation["approve this member"] = "Validar Usuario";
	$Translation["unban this member"] = "Desbloquear Usuario";
	$Translation["ban this member"] = "Bloquear Usuario";
	$Translation["View member records"] = "Ver registros del usuario";
	$Translation["send message to member"] = "Enviar mail al usuario";
	$Translation['displaying members'] = "Mostrando Usuarios del <MEMBERNUM1> al <MEMBERNUM2> de <MEMBERS>";
	$Translation['activate member'] = "Validar Usuario.";
	$Translation['ban member'] = "Bloquear Usuario.";
	$Translation['view entered member records'] = "Ver todos los registros del usuario.";
	$Translation['send email to member'] = "Enviar mail al usuario.";
	
	//pageViewRecords.php
	$Translation['data records'] = "Data Records";
	$Translation['show records'] = "Show records from";
	$Translation['all tables'] = "All tables";
	$Translation['sort records'] = "Sort records by";
	$Translation['date created'] = "Date created";
	$Translation['date modified'] = "Date modified";
	$Translation['newer first'] = "Newer first";
	$Translation['older first'] = "Older first";
	$Translation['created'] = "Created";
	$Translation['modified'] = "Modified";
	$Translation['data'] = "Data";
	$Translation['change record ownership'] = "Change ownership of this record";
	$Translation['sure delete record'] = "Are you sure you want to delete this record?";
	$Translation['delete record'] = "Delete this record";
	$Translation['displaying records'] = "Displaying records <RECORDNUM1> to <RECORDNUM2> of <RECORDS>";
