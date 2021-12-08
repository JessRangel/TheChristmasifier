<?php

    // exit if file is called directly
    if (!defined('ABSPATH'))
    {
        exit;
    }

    // Adds actions    
    add_action('admin_init', 'christmasifier_init');
    add_action('admin_menu', 'christmasifier_add_page');

    // Registers setting to be retrieved later
    function christmasifier_init()
    {
        register_setting('christmasifier_options', 'christmasifier_active', 'christmasifier_validate');
    }

    // Add menu page to the dashboard
    function christmasifier_add_page()
    {
        add_menu_page('Christmasifier', 'Christmasifier', 'manage_options', 'christmasifier', 'christmasifier_do_page');
    }

    // Draw the menu page itself
    function christmasifier_do_page()
    {
        ?>
        <div class="wrap">
            <h2>Christmasifier Settings</h2>
            <form method="post" action="options.php">
                <?php
                    settings_fields('christmasifier_options'); ?>
                <?php
                    $options = get_option('christmasifier_active'); ?>
                <table class="form-table">
                    <tr ><th scope="row">Activate: </th>
                        <td><input name="christmasifier_active[option1]" type="checkbox" value="1" <?php checked('1', $options['option1']); ?> /></td>
                    </tr>
                </table>
                <p class="submit">
                    <input type="submit" class="button-primary" value="<?php
                        _e('Save Changes') ?>"/>
                </p>
            </form>
        </div>
        <?php
        
        display_status();
    }

    // Checks whether the option is checked to activate or deactivate    
    function is_active()
    {
        $options = get_option('christmasifier_active');
                
        return $options['option1'];
    }

    // Displays the currently selected status
    function display_status()
    {
	$status = is_active();

	if($status==1)
        {
            echo '<h2>Christmasifier is active!</h2>';
        }
    
        if($status==0)
        {
            echo '<h2>Christmasifier deactivated.</h2>';
        }
    }

    // Sanitize and validate input. Accepts an array, return a sanitized array.
    function christmasifier_validate($input)
    {
        // Our value is either 0 or 1
        $input['option1'] = ($input['option1'] == 1 ? 1 : 0);
        
        return $input;
    }
    