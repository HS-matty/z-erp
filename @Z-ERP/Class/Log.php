<?php

class Zerp_Class_Log extends  Zerp_Std_Class{
	
		// php 5.2 compatibily
	public static $_class_name_static = 'Zerp_Std_Class';
	public $_messages = array();
	
	/**
	 * Enter description here...
	 *
	 * @param unknown_type $message
	 * @param unknown_type $params
	 * @return unknown
	 */
	public function addMessage($message,$params){
		$this->_messages[] = $message;
		return $this;
	}
	
	public function getMessages(){
		return $this->_messages;
	}
	
	
	public static function _init_instance_registry($name = null,$class_name = 'Zerp_Class_Log'){
		if (!$name) $name = 'Zerp_Class_Log';
		
		if (!$instance = Registry::get($name)){
			$instance = new $class_name;
			Registry::set($name,$instance);
		}
		return $instance;
	}
	/**
	 * Enter description here...
	 *
	 * @param unknown_type $message
	 * @param unknown_type $params
	 * @return Zerp_Class_Log
	 */
/*	public static function add($message,$params = null){
		
		self::_init_instance_registry();
		/*@var logger Zerp_Class_Log*/
	//	$logger = self::_getLogger();
//		$logger->addMessage($message,$params);
//		return $logger;
		
	//}*/
	
	/**
	 *  ...
	 *
	 * @param string $param_name
	 * @return Std_Class
	 */
	public function getAllMessage($param = null){
		
		return $this->_messages;
				
		//return self::getInstance()->getParam($param_name);
	}
	
/*	public static function _getLogger($name = 'Zerp_Class_Log'){
		
		return Registry::get($name);
	}*/
	
	public static function getRegistryInstance($name){
		
		return Registry::get($name);
	}
	
	
	
	
}

class Log extends Zerp_Class_Log  {
	
	// php 5.2 compatibily (late static binding)
	
	public static $_class_name_static = 'Log';
	
	/**
	 * Enter description here...
	 *
	 * @return 
	 */
	/*public static function instance(){
		return self::getInstance();
	}*/
}


class Log_Sql extends  Log {
	

/*	// php 5.2 compatibily (late static binding)
	public static $_class_name_static = 'Logger_Sql';
	
	public static function add($message,$params = null)){
		
		Registry::set(Zerp_Class_Log_class_name,Logger_Sql::$_class_name_static);
		return Zerp_Class_Log::add($message,$params = null);
	}
	*/

	/**
	 * Enter description here...
	 *
	 * @param string $message
	 * @return Zerp_Class_Log
	 */
	public static function add($message){
		
		/*@var instance Zerp_Class_Log*/
		$instance = get_log_sql();
		$instance->addMessage($message);
		return $instance;
	}
	/**
	 * Enter description here...
	 *
	 * @return Zerp_Class_Log
	 */
	public function instance(){
		//return !_get_log_sql(); //:DDDDDDD
		return get_log_sql(); //:DDDDDDD
	}
	
}

//function_exists()
//** php 5.2 late static binding !Trikz! :DDDD

/**
 * Enter description here...
 *
 * @return Zerp_Class_Log
 */
function get_log(){
	
	/*@var instance Zerp_Class_Log*/
	$name = 'Log';
	if(!$instance = Registry::get($name)){
		$instance = Zerp_Class_Log::_init_instance_registry($name);
	}
	
	return $instance;
	
	
}


function log_add($message){
	$name = 'Log';
	if(!$log = Registry::get($class_name)){
		$log = Zerp_Class_Log::_init_instance_registry($name);
	}
	/*@var $log Zerp_Class_Log*/
	 
	$log->addMessage($message);
	return $log;
	
}

function log_get_messages($params = null){
	$name = 'Log';
	if(!$log = Registry::get($name)){
		$log = Zerp_Class_Log::_init_instance_registry($name);
	}
	/*@var $log Zerp_Class_Log*/
	 
	return $log->getAllMessage($params);
	
}


/**
 * Enter description here...
 *
 * @return Zerp_Class_Log
 */
function get_log_sql(){
	
	/*@var instance Zerp_Class_Log*/
	$name = 'Log_Sql';
	if(!$instance = Registry::get($name)){
		$instance = Zerp_Class_Log::_init_instance_registry($name);
	}
	
	return $instance;
	
	
}

function log_add_sql($message){
	$class_name = 'Log_Sql';
	if(!$log = Registry::get($name)){
		$log = Zerp_Class_Log::_init_instance_registry($name);
	}
	/*@var $log Zerp_Class_Log*/
	 
	$log->addMessage($message);
	return $log;
	
}

function log_sql_get_messages($params = null){
	$name = 'Log_Sql';
	if(!$log = Registry::get($name)){
		$log = Zerp_Class_Log::_init_instance_registry($name);
	}
	/*@var $log Zerp_Class_Log*/
	 
	return $log->getAllMessage($params);
	
}



?>