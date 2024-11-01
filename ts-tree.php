<?php
/**
 * Plugin Name: ts-tree
 * Plugin URI: 
 * Description: Plugin permettant d'afficher les contenus par arborescence de catégorie
 * Version: Version 0.1.1
 * Author: Thomas Sécher
 * Author URI:  http://www.thomas-secher.fr/
 * License: GPL2 license
 */

if ( ! defined( 'ABSPATH' ) ) exit;



require_once __DIR__.'/class/TS_Tree.class.php';
$tst = new \tstree\TS_Tree();

// initialisation de la DB : 
register_activation_hook( __FILE__ , 'initTsTreePlugin' );
function initTsTreePlugin(){	
	global $wpdb;
			
	$checkQuery = "SHOW COLUMNS FROM $wpdb->terms";

	if( !in_array('term_order', $wpdb->get_col( $checkQuery ) ) ){
		$query = "ALTER TABLE $wpdb->terms ADD `term_order` INT NOT NULL AFTER `term_group`";
		$result = $wpdb->query( $wpdb->prepare( $query ));
	}
}