<?php	
/*
 * Z-ERP Standart Library (Radmaster Toolkit)
 * 
 * This file is published under RADMASTER PUBLIC LICENSE (RMPL) 
 * radmaster.net/public-licence.txt
 * 
 */ 

include_once('Element.php');

class Zerp_Std_Class extends Zerp_Std_Element{

	public $_dependency_primary_element;
	public $_dependency_secondary_elements = array();



	public $_dependency = array();




	static public $_default_path; //for include classed and etc


	public static function setDefaultPath($default_path){

		Std_Class::$_default_path = $default_path;
	}



	public function __construct($param = null,$registry_auto_set = false){


		//kind of bug
		//$type = $this->getType();//Std_Type::TYPE_Undefined

		//check for type

		$class_name = get_class($this);

		if($class_name == 'Output'){

			$test = 1;
		}




		if(!method_exists($this,'getType')){

			$class = get_class($this);

		}


		$class_name = get_class($this);

		$class_name_array = explode("_",$class_name);

		$type_name = $class_name_array[count($class_name_array)-1];

/*		$reflector = new ReflectionObject($this);
		$type = null;

		if($constant = $reflector->getConstant('TYPE_'.$type_name)){

			$type = $constant;

		}else{
			
			$type = Std_Type::TYPE_Undefined;

		}
		$this->setType($type);*/



		//if Std_Class object - $param => $name
		//else $param => $value


		
		if($type_name == 'Class' || $registry_auto_set) {
			if($param) $this->setName($param);
			else $this->setName($type_name);
			
		}
		else $this->setValue($param);


		if($registry_auto_set){
			Registry::set($param,$this);
		}




		$this->onInit();

		return $this;

	}



	public function is_empty()
	{
		return empty($this->_data);
	}


	public function generateId($params_string,$auto_set = true){

		$id = sha1($params_string);
		if($auto_set) $this->setId($id);
		return $id;
	}


	public function getCurrentClassFileName(){
		$class = new ReflectionClass($this);

		return $class->getFileName();
	}


	public function setValueArray(array $arr){



		$_value = $this->getValue();
		if(!$_value || !($_value instanceof Std_Class) ) {

			$_value = new Std_Class();
			$this->setValue($_value);
		}



		foreach ($arr as $key => $val){

			if(!$el = $this->getValue()->getElement($key))	$el = $this->getValue()->addElement();
			$el->setName($key);
			$el->setValue($val);
			//$this->getValue()->addElement($el);
		}

		return $this;
	}

	public function addElementsFromArray(array $elements){

		foreach ($elements as $key=>$val){

			$el = $this->addElement();
			$el->setName($key);
			$el->setTitle($val);
			$el->setValue($val);
		}

		return $this;

	}



	public static function isClassFileExists($class_file,$class_name = null,$path = null, $extension = '.php'){

		if(!$class_file && $class_name) {

			$class_file = Std_Class::getPathFromClassName($class_name);
			$class_file .= $extension;
		}

		//$return_value = false;
		if(!$path) $path = Std_Class::$_default_path;

		$file = $path.'/'.$class_file;
		return file_exists($file);


	}




	/**
	 * Enter description here...
	 *
	 * @return Std_Class
	 */
	public function deleteAllElements(){
		$this->_elements = array();
		return $this;
	}
	
	
	
	
	
	/**
	 * A bit changes 
	 */
	
	
	
	public $_params = array();

	
	
	public function onInit(){

		$this->init();
		return true;

	}

	
	public function init(){
		return true;
	}
	

	/**
	 * Enter description here...
	 *
	 * @param mixed $value
	 * @return Std_Class
	 */
	public function addParam($value){

		$this->_params[] = $value;
		return $this;
	}


	/**
	 * Enter description here...
	 *
	 * @param string $name
	 * @param mixed $value
	 * @return Std_Class
	 */
	public function setParam($name,$value){

		$this->_params[$name] = $value;
		return $this;
	}


	/**
	 * Enter description here...
	 *
	 * @param string $name
	 * @return mixed || null
	 */
	public function getParam($name){
		return $this->_params[$name];
	}


	/**
	 * Enter description here...
	 *
	 * @param string $name
	 * @return array
	 */
	public function getParams(){
			return $this->_params;
	}
	
	
	/**
	 * Enter description here...
	 *
	 * @param string $name
	 * @return array
	 */
	
	public function getAllParam(){
		return $this->getParams();
	}
	
	/**
	 * Enter description here...
	 *
	 * @param string $name
	 * @return Std_Class_Ext	
	 *  */
	public function clearParams(){
		$this->_params = array();
		return $this;
	}
	

}

class Std_Class extends Zerp_Std_Class{
	
}


	?>