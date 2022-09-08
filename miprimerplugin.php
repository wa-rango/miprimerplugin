<?php
/*
Plugin Name: Mi primer plugin
Plugin URI: Http// Mi primer plugin.com
Description: Este es mi primer plugin que va cambiar los titulos de cada entrada de un blog o categoria
Version: 1.0
Author: Alejandro Arango
Author URI: Http://miurlpersonal.com
License: GPL2
License URI:  https://www.gnu.org/license/gpl-2.0.html
Text Domain: miprimerplugin
Domain Patch: /languages
*/
if( ! function_exists('mp_install') ) {
    function mp_install(){
    //Accion a ejecutar
//    require_once 'activador.php';
    }
}

if( ! class_exists('MP_Mi_Class') ) {
    class  MP_Mi_Class {
        
    }
}

function mp_deactivation() {
    // Accion a ejecutar
    flush_rewrite_rules();
}

function mp_desinstall() {
    // Borrar Tablas en la base de datos
    // Quitar alguna configuraciones
    // u Opciones 
}

register_activation_hook( __FILE__, 'mp_install' );
register_deactivation_hook( __FILE__, 'mp_deactivation' );

function addMenusPages( $menus) {
    
    if( is_array($menus) ) {
        
        for( $i=0; $i < count($menus); $i++ ) {
            
            add_menu_page(
                $menus[$i]['PageTitle'],
                $menus[$i]['menuTitle'],
                $menus[$i]['capacibility'],
                $menus[$i]['menuSlug'],
                $menus[$i]['functionName'],
                $menus[$i]['iconUrl'],
                $menus[$i]['position'],
            );   
            
        }
    
    }
    
}

if( !function_exists('mp_options_page') ) {
    
    add_action('admin_menu', 'mp_options_page');
    
    function mp_options_page() {
    
        $menus = [];

        $menus[] = [
            'PageTitle' => 'MP Pruebas',
            'menuTitle' => 'MP Pruebas',
            'capacibility' => 'manage_options',
            'menuSlug' => 'mp_pruebas',
            'functionName' => 'mp_pruebas_page_display',
            'iconUrl' => plugin_dir_url(__FILE__) . 'img/sveacol-20-wp.svg',
            'position' => 15,
        ];
        
          $menus[] = [
            'PageTitle' => 'MP Pruebas2',
            'menuTitle' => 'MP Pruebas2',
            'capacibility' => 'manage_options',
            'menuSlug' => 'mp_pruebas2',
            'functionName' => 'mp_pruebas_page_display',
            'iconUrl' => plugin_dir_url(__FILE__) . 'img/sveacol-20-wp.svg',
            'position' => 16,
        ];
        
          $menus[] = [
            'PageTitle' => 'MP Pruebas3',
            'menuTitle' => 'MP Pruebas3',
            'capacibility' => 'manage_options',
            'menuSlug' => 'mp_pruebas3',
            'functionName' => 'mp_pruebas_page_display',
            'iconUrl' => plugin_dir_url(__FILE__) . 'img/sveacol-20-wp.svg',
            'position' => 17,
        ];
                                
        addMenusPages( $menus );

    }
    
}

if( ! function_exists( 'mp_pruebas_page_display' ) ) {
    
    function mp_pruebas_page_display() {
        
        ?>

        <?php if( current_user_can('manage_options') ) : ?>
        <!-- HTML -->
       
        <div class="wrap">

            <form action="" method="post">

                <input type="text" placeholder="Texto">

                <?php submit_button('Enviar'); ?>    
                
            </form>

        </div>

        <?php else: ?>

        <p>
            No tienes acceso a  esta seccion 
        <p/>    

        <?php endlf; ?>

        <?php
    
     }
    
}