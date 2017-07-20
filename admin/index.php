<?php
/*
 * Minimal bootstrap file; 
 * acts like a router; 
 * loads the requested file;
 */
$module = 'admin';

/* 
 * Load config.app;
 * Main configuration file
 */
require_once 'config/config.app.php';

/* 
 * Load class.Menu.php;
 * Menu generator class
 */
require_once 'library/class.Menu.php';

/* 
 * Load config.colors;
 * Skins configuration file
 */
require_once 'config/config.colors.php';

/* 
 * Load config.menus;
 * Generate Sidebar Menu
 */
require_once 'config/config.menus.php';

/* 
 * Load config.scripts;
 * Dynamically load JavaScript files in the header and footer
 */
require_once 'config/config.scripts.php';

/*
 * Start the session
 */
session_start();

/*
 * Requested page;
 * Index by default
 */
$page = isset($_GET['page']) ? $_GET['page'] : 'timeline_3';
$section = isset($_GET['section']) ? $_GET['section'] : 'index';

/* Load header 
*/
require_once 'header.php';

/*
 * Load page;
 */
$admin_pages = array (
    0 => 'signup',
    1 => 'media_3',
    2 => 'signup1'
);
if ((!isset($_SESSION['login_user_role']) || $_SESSION['login_user_role'] != 1) 
        && in_array_r($page, $admin_pages) == true) {
    require_once 'pages/unauthorized.php';
} else {
	require_once 'pages/' . $page . '.php';
}

/* Load footer */
require_once 'footer.php';