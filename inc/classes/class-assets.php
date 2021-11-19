<?php
/**
 * Enqueue theme assets
 *
 * @package Aquila
 */

 namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Assets {
     use Singleton;
     
     protected function __construct() {
         // load class.
         $this->setup_hooks();
    }
    
    protected function setup_hooks() {
        /**
        * Action.
        */
        add_action( 'wp_enqueue_scripts', [ $this, 'register_style' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'register_script' ] );
    }

	public function register_style(){
        //  wp_enqueue_style( 'style-css', get_stylesheet_uri(), [], filemtime( get_template_directory() . '/style.css' ), 'all' );
		//  wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/main.js', [], filemtime( get_template_directory() . '/assets/main.js' ), true );
		
		// Register styles.
		wp_register_style( 'style-css', get_stylesheet_uri(), [], filemtime( AQUILA_DIR_PATH . '/style.css' ), 'all' );
		wp_register_style( 'bootstrap-css', AQUILA_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all' );
		
		// Enqueue Styles.
		wp_enqueue_style( 'style-css' );
		wp_enqueue_style( 'bootstrap-css' );
	}

	public function register_script(){
		// Register scripts.
		wp_register_script( 'main-js', AQUILA_DIR_URI . '/assets/main.js', [], filemtime( AQUILA_DIR_PATH . '/assets/main.js' ), true );
		wp_register_script( 'bootstrap-js', AQUILA_DIR_URI . '/assets/src/library/js/bootstrap.min.js', [ 'jquery' ], false, true );

		// Enqueue Scripts.
		wp_enqueue_script( 'main-js' );
		wp_enqueue_script( 'bootstrap-js' );
	}
 }