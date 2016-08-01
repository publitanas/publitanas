<?php
	/*
	 * You can add custom links in the home page by appending them here ...
	 * The format for each link is:
		$homeLinks[] = array(
			'url' => 'path/to/link', 
			'title' => 'Link title', 
			'description' => 'Link text',
			'groups' => array('group1', 'group2'), // groups allowed to see this link, use '*' if you want to show the link to all groups
			'grid_column_classes' => '', // optional CSS classes to apply to link block. See: http://getbootstrap.com/css/#grid
			'panel_classes' => '', // optional CSS classes to apply to panel. See: http://getbootstrap.com/components/#panels
			'link_classes' => '', // optional CSS classes to apply to link. See: http://getbootstrap.com/css/#buttons
			'icon' => 'path/to/icon' // optional icon to use with the link
		);
	 */


		$homeLinks[] = array(
			'url' => './generadorCalendarioTurnosView.php', 
			'title' => 'Generador del Calend. de Turnos', 
			'description' => '',
			'groups' => array('Contacto Zonal', 'Nexo Informatico', 'Admins', 'Superintendente de Turno Avanzado'), // groups allowed to see this link, use '*' if you want to show the link to all groups
			'grid_column_classes' => 'col-xs-12 col-md-6 col-lg-4', // optional CSS classes to apply to link block. See: http://getbootstrap.com/css/#grid
			'panel_classes' => 'panel panel-info', // optional CSS classes to apply to panel. See: http://getbootstrap.com/components/#panels
			'link_classes' => 'btn btn-lg btn-info', // optional CSS classes to apply to link. See: http://getbootstrap.com/css/#buttons
			'icon' => 'resources/table_icons/database_repeat.png' // optional icon to use with the link
		);

		$homeLinks[] = array(
			'url' => './verCalendarioTurnosView.php', 
			'title' => 'Ver Calendario de Turnos', 
			'description' => '',
			'groups' => array('Contacto Zonal', 'Superintendente de Turno', 'Superintendente de Turno Avanzado', 'Nexo Informatico', 'Coordinador PPAM', 'Voluntarios', 'Admins'), // groups allowed to see this link, use '*' if you want to show the link to all groups
			'grid_column_classes' => 'col-xs-12 col-md-6 col-lg-4', // optional CSS classes to apply to link block. See: http://getbootstrap.com/css/#grid
			'panel_classes' => 'panel panel-info', // optional CSS classes to apply to panel. See: http://getbootstrap.com/components/#panels
			'link_classes' => 'btn btn-lg btn-info', // optional CSS classes to apply to link. See: http://getbootstrap.com/css/#buttons
			'icon' => 'resources/table_icons/calendar_view_week.png' // optional icon to use with the link
		);

?>