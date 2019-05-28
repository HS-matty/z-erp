<?php
/*
 * Z-ERP 
 * Hytex Solutions Limited
 * http://hytex.radmaster.net
 * 
 */ 

include_once('_include/functions.php');

//libs
//include_once('Lib/Simplehtmldom/simple_html_dom.php');

//end libs

include_once('Lib/Zerp-Stl/_include.php');

class Zerp extends Zerp_Std_Class {
	
	
	public static function load($name){
		$path = dirname(__FILE__);
		return Zerp_Std::loadClass($name,$path);
	}
	
	
}


?>