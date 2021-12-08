<?php
    /**
     * @package WebAppDev
     * @version 1.0.0
     */
    /*
    Plugin Name: The Christmasifier
    Description: Web Application Development
    Author: Christopher Babich, Jessica Rangel and Sarah Boyd
    Version: 1.0.0
    Author URI:
    */
    
    // exit if file is called directly
    if (!defined('ABSPATH'))
    {
        exit;
    }
    
    // Displays settings page only if the user is an admin
    if (is_admin())
    {
        //include the dependencies
        require_once plugin_dir_path(__FILE__) . 'admin/settings.php';

    }

    // Requires main Christmasifier file
    require_once plugin_dir_path(__FILE__) . 'christmasify.php';




