<?php
    if(!defined('WP_UNINSTALL_PLUGIN')){
        die;
    }
    
    remove_menu_page( 'account' );