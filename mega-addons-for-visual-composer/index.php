<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
	/*
	Plugin Name: Mega Addons For WPBakery Page Builder
	Description: Mega Addons gives you multi plugins all in one. It's very powerful for any theme.
	Plugin URI: https://addons.topdigitaltrends.net/
	Author: Topdigitaltrends
	Author URI: https://www.topdigitaltrends.net/
	Version: 4.4.0
	Requires at least: 4.9
	Tested up to: 7.1
	Text Domain: mega-addons-for-visual-composer
	License: GPLv2
	*/
	
	/*
	
	    Copyright (C) 2018  Topdigitaltrends  nasir179125@gmail.com
	
	    This program is free software; you can redistribute it and/or modify
	    it under the terms of the GNU General Public License, version 2, as
	    published by the Free Software Foundation.
	
	    This program is distributed in the hope that it will be useful,
	    but WITHOUT ANY WARRANTY; without even the implied warranty of
	    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	    GNU General Public License for more details.
	
	    You should have received a copy of the GNU General Public License
	    along with this program; if not, write to the Free Software
	    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	*/
	require_once('main.php');
	$N_object = new VC_MEGA( __FILE__ );
	$N_object->init();
	// AJAX must not initialize settings before its save handler authorizes the request.
	if ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) {
		$N_object->activation();
	}

?>