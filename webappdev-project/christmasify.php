<?php

    // exit if file is called directly
    if (!defined('ABSPATH'))
    {
        exit;
    }

    // Retrieves activate option
    $status = get_option('christmasifier_active')['option1'];

    // If checkbox to activate is selected, begin christmasification
    if ($status==1)
	christmasify();

    // If checkbox is deselected, remove christmasification
    else if ($status==0)
	dechristmasify();
        
    // Connects to Google Fonts and enqueues the custom CSS
    function add_christmas_style()
    {
        ?>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mountains+of+Christmas:wght@700&display=swap"
              rel="stylesheet">
        <?php
        
        wp_enqueue_style('ChristmasStyle', plugins_url('css/christmas.css', __FILE__));
        wp_enqueue_style('SnowflakeStyle', plugins_url('css/Snowflake.css', __FILE__));
    }
    
    // Adds Christmas wishes to the end of every post
    function christmas_wishes($content)
    {
        $content = $content . '<br><h3>Merry Christmas!</h3>';
        return $content;
    }
    
    // Activates Christmasifier
    function christmasify()
    {
        add_filter('the_content', 'christmas_wishes');
        add_action('wp_enqueue_scripts', 'add_christmas_style');
        add_action('wp_enqueue_scripts', 'add_snowflake_script');
    }

    // Deactivates Christmasifier
    function dechristmasify()
    {
        remove_filter( 'the_content', 'christmas_wishes' );
	remove_action('wp_enqueue_scripts', 'add_christmas_style');
        remove_action('wp_enqueue_scripts', 'add_snowflake_script');
    }

    // Adds custom snowflake animation JavaScript
    function add_snowflake_script()
    {
        wp_enqueue_script('ChristmasScript', plugins_url('js/Snowflake.js', __FILE__));
    }
