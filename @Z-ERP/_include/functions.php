<?php

function _is_array($var){
	
	 return (bool)($var instanceof ArrayAccess or is_array($var));
}




?>