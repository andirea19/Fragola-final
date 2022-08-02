<?php

return [
	
	'user-management' => [
		'title' => 'User Management',
		'created_at' => 'Time',
		'fields' => [
		],
	],
	
	'permissions' => [
		'title' => 'Permissions',
		'created_at' => 'Time',
		'fields' => [
			'title' => 'Title',
		],
	],
	
	'roles' => [
		'title' => 'Roles',
		'created_at' => 'Time',
		'fields' => [
			'title' => 'Title',
			'permission' => 'Permissions',
		],
	],
	
	'users' => [
		'title' => 'Users',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Name',
			'email' => 'Email',
			'password' => 'Password',
			'role' => 'Role',
			'remember-token' => 'Remember token',
		],
	],
	'app_create' => 'Erstellen',
	'app_save' => 'Sichern',
	'app_edit' => 'Bearbeiten',
	'app_view' => 'Anzeigen',
	'app_update' => 'Updaten',
	'app_list' => 'Liste',
	'app_no_entries_in_table' => 'Leer',
	'custom_controller_index' => 'Custom controller index.',
	'app_logout' => 'Logout',
	'app_add_new' => 'Neu',
	'app_are_you_sure' => 'Sind Sie sicher?',
	'app_back_to_list' => 'Zurück zur Liste',
	'app_dashboard' => 'Dashboard',
	'app_delete' => 'Löschen',
	'global_title' => 'Quick LMS',
];