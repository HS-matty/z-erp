<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty money_format modifier plugin
 *
 * Type:     modifier<br>
 * Name:     money_format<br>
 * Purpose:  Formats a number as a currency string
 * @link http://www.php.net/money_format
 * @param float
 * @param string format (default %n)
 * @return string
 */
function smarty_modifier_money_format($number, $format='%n')
{
	
	if(function_exists('money_format')){
		return(money_format($format, $number));
	}else{
		return("$".number_format($number,2));
	}

}

/* vim: set expandtab: */
?>
