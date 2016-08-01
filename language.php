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
	// PLEASE NOTE:
	// ============
	// When a new version of AppGini is released, new strings
	// might be added to the "defaultLang.php" file. To translate
	// them, simply copy them to this file ("language.php") and 
	// translate them here. Do NOT translate them directly in 
	// the "defaultLang.php" file.
	// =====================================================
		


	// datalist.php
	$Translation['No matches found!'] = "No hay registros";
	$Translation['powered by'] = "Producido por";
	$Translation['quick search'] = "B&uacute;squeda rápida";
	$Translation['records x to y of z'] = "Registro <FirstRecord> de <LastRecord> a <RecordCount>";
	$Translation['filters'] = "Filtros";
	$Translation['filter'] = "Filtro";
	$Translation['filtered field'] = "Campo filtrado";
	$Translation['comparison operator'] = "Operador de comparaci&oacute;n";
	$Translation['comparison value'] = "Valor de comparaci&oacute;n";
	$Translation['and'] = "Y";
	$Translation['or'] = "O";
	$Translation['equal to'] = "Igual a ";
	$Translation['not equal to'] = "No igual a";
	$Translation['greater than'] = "Mayor a";
	$Translation['greater than or equal to'] = "Mayor o igual a";
	$Translation['less than'] = "Inferior a";
	$Translation['less than or equal to'] = "Inferior o igual a";
	$Translation['like'] = "Similar";
	$Translation['not like'] = "No similar";
	$Translation['is empty'] = "Vacio";
	$Translation['is not empty'] = "No vacio";
	$Translation['apply filters'] = "Aplicar filtros";
	$Translation['save filters'] = "Guardar y aplica filtros";
	$Translation['saved filters title'] = "HTML C&oacutedigo de los Filtros Aplicados";
	$Translation['saved filters instructions'] = "Copia el c&oacutedigo abajo y pegalo en un archivo HTML para guardar el filtro que acaba de definir, para que pueda volver a &eacutel en cualquier momento en el futuro sin tener que redefinirlo. Puede guardar el código HTML en su ordenador o en cualquier servidor y acceder a esta vista de tabla prefiltrado a través de &eacutel.";
	$Translation['hide code'] = "Ocultar el c&oacute;digo";
	$Translation['printer friendly view'] = "Vista de impresi&oacuten";
	$Translation['save as csv'] = "Descargar en formato csv (valores separados por comas)";
	$Translation['edit filters'] = "Editar filtros";
	$Translation['clear filters'] = "Borrar filtros";
	$Translation['order by'] = 'Ordenado por';
	$Translation['go to page'] = 'Ir a la p&aacutegina:';
	$Translation['none'] = 'No';
	$Translation['Select all records'] = 'Seleccionar todos los registros';
	$Translation['With selected records'] = 'Con los registros seleccionados';
	$Translation['Print Preview Detail View'] = 'Vista preliminar de detalles';
	$Translation['Print Preview Table View'] = 'Vista preliminar de tabla';
	$Translation['Print'] = 'Imprimir';
	$Translation['Cancel Printing'] = 'Cancelar impresi&oacuten';
	$Translation['Cancel Selection'] = 'Cancelar selecci&oacuten';
	$Translation['Maximum records allowed to enable this feature is'] = 'M&aacuteximo n&uacutemero de registros permitidos es';

	// _dml.php
	$Translation['are you sure?'] = ' ¿ Est&aacute seguro de borrar este registro ? ';
	$Translation['add new record'] = 'A&ntilde;adir registro';
	$Translation['update record'] = 'Actualizar registro';
	$Translation['delete record'] = 'Borrar registro';
	$Translation['deselect record'] = 'Cancelar';
	$Translation["couldn't delete"] = 'No se pudo eliminar el registro debido a la presencia de <RelatedRecords> relacionados record(s) en la tabla [<TableName>]';
	$Translation['confirm delete'] = 'Este registro tiene <RelatedRecords> relacionados record(s) en la tabla [<TableName>]. ¿Todavía quiere eliminar? <Delete> &nbsp; <Cancel>';
	$Translation['yes'] = 'S&iacute';
	$Translation['no'] = 'No';
	$Translation['pkfield empty'] = ' este es un campo clave y no puede estar vac&iacuteo.';
	$Translation['upload image'] = 'Cargar nuevo archivo ';
	$Translation['select image'] = 'Seleccionar imagen ';
	$Translation['remove image'] = 'Borrar imagen';
	$Translation['month names'] = 'Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio,Agosto,Septiembre,Octubre,Noviembre,Diciembre';
	$Translation['field not null'] = 'No se puede dejar este campo vac&iacuteo.';
	$Translation['*'] = '*';
	$Translation['today'] = 'Hoy';
	$Translation['Hold CTRL key to select multiple items from the above list.'] = 'Mantener pulsada la tecla CTRL para seleccionar varios elementos de la lista anterior.';
	$Translation['Save New'] = 'Grabar';
	$Translation['Save As Copy'] = 'Guardar Nuevo <br> Registro';
	$Translation['Deselect'] = 'Cancelar';
	$Translation['Add New'] = 'A&ntilde;adir';
	$Translation['Delete'] = 'Borrar';
	$Translation['Cancel'] = 'Cancelar';
	$Translation['Print Preview'] = 'Vista previa';
	$Translation['Print'] = 'Imprimir';
	$Translation['Save Changes'] = 'Guardar';
	$Translation['CSV'] = 'Guardar CSV';
	$Translation['Reset Filters'] = 'Mostrar todos';
	$Translation['Find It'] = 'Buscar';
	$Translation['Previous'] = 'Previo';
	$Translation['Next'] = 'Siguiente';
	$Translation['Back'] = 'Atras';

	// lib.php
	$Translation['select a table'] = "Ir a ...";
	$Translation['homepage'] = "P&aacute;gina inicio";
	$Translation['error:'] = "Error:";
	$Translation['sql error:'] = "SQL error:";
	$Translation['query:'] = "Query:";
	$Translation['< back'] = "&lt; Atr&aacutes";
	$Translation["if you haven't set up"] = "Si no ha configurado la base de datos, sin embargo, puede hacerlo haciendo clic en <a href='setup.php'>aqui</a>.";
	$Translation['file too large']="Error: El archivo subido excede el tama&ntilde;o máximo permitido de <MaxSize> KB";
	$Translation['invalid file type']="Error: Este tipo de archivo no está permitido. Sólo archivos <FileTypes> pueden cargarse";

	// setup.php
	$Translation['goto start page'] = "Ir a p&aacutegina inicio";
	$Translation['no db connection'] = "No se pudo establecer una conexi&oacuten de base de datos.";
	$Translation['no db name'] = "No se pudo acceder a la base de datos denominada '<dbname>' en este servidor.";
	$Translation['provide connection data'] = "Por favor, facilite los siguientes datos para conectarse a la base de datos:";
	$Translation['mysql server'] = "Servidor MySQL (host)";
	$Translation['mysql username'] = "Usuario MySQL";
	$Translation['mysql password'] = "Clave MySQL";
	$Translation['mysql db'] = "Nombre de la Base de Datos";
	$Translation['connect'] = "Conectar";
	$Translation['couldnt save config'] = "No se pudo guardar los datos de conexión en 'config.php'.<br />Por favor, asegurese de que la carpeta:<br />'".dirname(__FILE__)."'<br />es grabable (chmod 775 o chmod 777).";
	$Translation['setup performed'] = "El programa de instalación ya esta cumplimentado";
	$Translation['delete md5'] = "Si desea forzar la instalación para correr de nuevo, primero debe eliminar el archivo 'setup.md5' de esta carpeta.";
	$Translation['table exists'] = "La tabla <b><TableName></b> existe, contiene <NumRecords> registros.";
	$Translation['failed'] = "Fallo";
	$Translation['ok'] = "Ok";
	$Translation['mysql said'] = "MySQL dijo:";
	$Translation['table uptodate'] = "Tabla actualizada.";
	$Translation['couldnt count'] = "No se pudo contar con los registros de la tabla <b><TableName></b>";
	$Translation['creating table'] = "Creando tabla <b><TableName></b> ... ";

	// separateDVTV.php
	$Translation['please wait'] = "Por favor, espere";

	// _view.php
	$Translation['tableAccessDenied']="Lo sentimos! Usted no tiene permiso para acceder a esta tabla. P&oacutengase en contacto con el administrador.";

	// incCommon.php
	$Translation['not signed in']="Usted no se ha registrado en";
	$Translation['sign in']="Acceder";
	$Translation['signed as']="Conectado como";
	$Translation['sign out']="Desconectar";
	$Translation['admin setup needed']="La gesti&oacuten de Administrador de la configuraci&oacuten no se realiz&oacute. Por favor, inicie sesi&oacuten en el <a href=admin/>panel de administrador</a> y configure el entorno.";
	$Translation['db setup needed']="El Programa de instalaci&oacuten no se ha realizado todav&iacutea. Por favor, inicie sesi&oacuten en el <a href=setup.php>p&aacutegina de entorno</a> primero.";
	$Translation['new record saved']="El nuevo registro se ha guardado correctamente.";
	$Translation['record updated']="Los cambios en el registro se ha guardado correctamente.";

	// index.php
	$Translation['admin area']="Administraci&oacuten";
	$Translation['login failed']="Su intento de inicio de sesi&oacuten anterior ha fallado. Int&eacute;ntelo de nuevo.";
	$Translation['sign in here']="Entra aqu&iacute";
	$Translation['remember me']="Recu&eacute;rdame";
	$Translation['username']="Email Usuario";
	$Translation['password']="Clave";
	$Translation['go to signup']="¿No tienes un nombre de usuario? <br />&nbsp; <a href=membership_signup.php>Entra aquí</a>";
	$Translation['forgot password']="Si olvid&oacute; su clave, <a href=membership_passwordReset.php> pulse aqu&iacute;</a>";
	$Translation['browse as guest']="O <a href=index.php>click here</a> para continuar <br />&nbsp; como usuario invitado.";
	$Translation['no table access']="Usted no tiene permisos suficientes para acceder a cualquier p&aacute;gina aqu&iacute;. Por favor, registrese en primer lugar.";

	// checkMemberID.php
	$Translation['user already exists']="Usuario '<MemberID>' existente. Intentelo con otro usuario.";
	$Translation['user available']="Usuario: '<MemberID>' est&aacute; disponible y se puede utilizar.";
	$Translation['empty user']="Por favor, escriba un nombre de usuario en el primer cuadro a continuación, haga clic en 'Comprobar disponibilidad'.";

	// membership_thankyou.php
	$Translation['thanks']="Gracias por Registrarse";
	$Translation['sign in no approval']="Si perteneces a un grupo que no requiere aprobaci&oacute;n del administrador, tu puedes entrar a la aplicaci&oacute;n ahora pulsando  <a href=index.php?signIn=1>aqu&iacute;</a>.";
	$Translation['sign in wait approval']="Si perteneces a un grupo que requiere aprobaci&oacute;n del administrador, por favor espera a recibir un email de confirmaci&oacute;n.";

	// membership_signup.php
	$Translation['username empty']="Usted debe proporcionar un nombre de usuario. Por favor, vuelva atr&aacute;s y escriba un nombre de usuario";
	$Translation['password invalid']="Debe proporcionar una clave de 4 caracteres o más, sin espacios. Por favor, regrese y escriba una clave v&aacute;lida";
	$Translation['password no match']="Debe proporcionar una clave de 4 caracteres o más, sin espacios. Por favor, regrese y escriba una clave v&aacute;lida";
	$Translation['username exists']="Ese usuario ya existe. Por favor, vuelva a atr&aacute;s y elija un nombre de usuario distinto.";
	$Translation['email invalid']="Direcci&oacute;n de correo electr&oacute;nico no v&aacute;lida. Por favor, volver atr&aacute;s y corregir su direcci&oacute;n de correo electr&oacute;nico.";
	$Translation['group invalid']="Grupo no v&aacute;lido. Por favor, volver atr&aacute;s y corregir la selecci&oacute;n de grupo.";
	$Translation['sign up here']="Reg&iacute;strese aqu&iacute;!";
	$Translation['registered? sign in']="Ya est&aacute; registrado? <a href=index.php?signIn=1>Conectarse aqu&iacute;</a>.";
	$Translation['sign up disabled']="Lo sentimos! Registrarse est&aacute; temporalmente desactivado por el administrador. Int&eacute;ntelo de nuevo m&aacute;s tarde.";
	$Translation['check availability']="Compruebe si este nombre de usuario está disponible";
	$Translation['confirm password']="Confirmar Clave";
	$Translation['email']="e-mail";
	$Translation['group']="Grupo";
	$Translation['groups *']="Si decide inscribirse a un grupo marcados con un asterisco (*), no podr&aacute; iniciar la sesi&oacute;n hasta el administrador que lo apruebe. Usted recibir&aacute; un correo electr&oacute;nico cuando se aprob&oacute;.";
	$Translation['sign up']="Registrarse aqu&iacute;";

	// membership_passwordReset.php
	$Translation['password reset']="Restablecer Clave";
	$Translation['password reset details']="Introduzca su nombre de usuario o direcci&oacute;n de correo electr&oacute;nico. A continuaci&oacute;n, te enviaremos un enlace especial a su correo electr&oacute;nico. Despu&eacute;s de hacer clic en ese enlace, se le pedir&aacute; que escriba una clave nueva.";
	$Translation['password reset subject']="Instrucciones para restablecer clave";
	$Translation['password reset message']="Estimado usuario, 

Si usted ha solicitado restablecer o cambiar su clave, por favor haga clic en este enlace: 

<ResetLink> 


Si usted no solicitó un restablecimiento o cambio de clave, por favor ignore este mensaje. 
	
Saludos.";
	$Translation['password reset ready']="Un correo electr&oacute;nico con instrucciones para restablecer la clave ha sido enviada a su direcci&oacute;n de correo electr&oacute;nico registrada. Por favor, mantenga esta ventana abierta y siga las instrucciones del mensaje de correo electr&oacute;nico. <br /> <br /> Si usted no recibe este correo electr&oacute;nico dentro de los 5 minutos, intente restablecer la clave de nuevo, y aseg&uacute;rese de ingresar un nombre de usuario correcto o direcci&oacute;n de correo electr&oacute;nico.";
	$Translation['password reset invalid']="Clave incorrecta. <a href=membership_passwordReset.php>Int&eacute;ntelo de nuevo</a>, o vaya a <a href=index.php>p&acute;gina de inicio</a>.";
	$Translation['password change']="Cambiar Clave";
	$Translation['new password']="Nueva Clave";
	$Translation['password reset done']="Su clave ha sido cambiado correctamente. Ahora puede <a href=index.php?signOut=1> entrar con su nueva clave aqu&iacute;</a>.";
?>
