<?php
/*
* Z-ERP Standart Library (Radmaster Toolkit)
*
* This file is published under RADMASTER PUBLIC LICENSE (RMPL)
* radmaster.net/public-licence.txt
*
*/

class Zerp_Registry extends Zerp_Std_Class {

	/**
	 * @return Std_CLass
	 */
	public static function getInstance(){



		if (!self::$_instance) self::$_instance = new self();


		return  self::$_instance;

	}


}



class Registry extends Zerp_Registry {
	
}

?>