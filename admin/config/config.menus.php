<?php
$config['menu'] = array(
	'admin' => array(

		array(
			'label' => 'Groups',
			'icon' => 'fa fa-group',
			'type' => 'collapse',
			'page' => array(
				array(
					'label' => 'Union Bank',
					'icon' => 'fa fa-filter',
					'page' => 'timeline_3',
					'onClick' => "filterCriteria=noFilter; selectedFilter='all'"
				),
				array(
					'label' => 'Zone',
					'icon' => 'fa fa-filter',
					'page' => 'timeline_3',
					'onClick' => "filterCriteria=filterByZone; selectedFilter='zone'"
				),
				array(
					'label' => 'Regional',
					'icon' => 'fa fa-filter',
					'page' => 'timeline_3',
					'onClick' => "filterCriteria=filterByRegion; selectedFilter='region'"
				),
				array(
					'label' => 'Branch',
					'icon' => 'fa fa-filter',
					'page' => 'timeline_3',
					'onClick' => "filterCriteria=filterByBranch; selectedFilter='branch'"
				)
			)
		),
		
		array(
					'label' => 'Messages',
					'icon' => 'fa fa-envelope',
					'type' => 'collapse',
					
					'page' => array(
						array(
							'label' => 'Inbox',
							'icon' => 'fa fa-inbox',
							'page' => 'email'
						),
						array(
							'label' => 'Compose',
							'icon' => 'fa fa-pencil',
							'page' => 'email_compose'
						),
					)
				),
		array(
			'label' => 'Extra',
			'icon' => 'fa fa-gift',
			'type' => 'collapse',
			'page' => array(
				array(
					'label' => 'Dashboard',
					'icon' => 'fa fa-dashboard',
					'type' => 'collapse',
					'page' => array(
						array(
							'label' => 'Analytics',
							'icon' => 'fa fa-bar-chart-o',
							'page' => 'dashboard_analytics'
						),
						array(
							'label' => 'Users',
							'icon' => 'fa fa-user',
							'page' => 'dashboard_users'
						),
						array(
							'label' => 'Overview',
							'icon' => 'fa fa-dashboard',
							'page' => 'dashboard_overview'
						),
					)
				),
				
				array(
					'label' => 'Calendar',
					'icon' => 'fa fa-circle-o',
					'page' => 'calendar'
				),
				array(
					'label' => 'Maps',
					'icon' => 'fa fa-map-marker',
					'type' => 'collapse',
					'page' => array(
						array(
							'label' => 'Vector Maps',
							'icon' => 'fa fa-map-marker',
							'page' => 'maps_vector'
						),
						array(
							'label' => 'Google Maps',
							'icon' => 'fa fa-map-marker',
							'page' => 'maps_google'
						),
					)
				),
				
				array(
					'label' => 'Support',
					'icon' => 'fa fa-life-saver',
					'type' => 'collapse',
					'page' => array(
						
						array(
							'label' => 'Forum Overview',
							'icon' => 'fa fa-folder-o',
							'page' => 'support_forum_overview'
						),
						array(
							'label' => 'Forum Post',
							'icon' => 'fa fa-folder-o',
							'page' => 'support_forum_post'
						),
						array(
							'label' => 'Knowledge Base',
							'icon' => 'fa fa-file-text-o',
							'page' => 'support_kb'
						),
						array(
							'label' => 'Questions',
							'icon' => 'fa fa-question',
							'page' => 'support_questions',
							
						),
						array(
							'label' => 'Answers',
							'icon' => 'fa fa-info',
							'page' => 'support_answers'
						),
					)
				),
				
				
				
			
			)
		),
		
		array(
			'label' => 'Skins',
			'class' => 'category border-top'
		),
		array(
			'label' => 'Skins Custom HTML',
			'class' => 'reset',
			'file' => 'skins.php'
		),
		
	)
);