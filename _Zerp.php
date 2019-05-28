<?php

// Z-ERP INIT  ***********************

global $z_erp_dir;
$root_dir = dirname(__FILE__);
$z_erp_dir = $root_dir . '/@Z-ERP';


//include_once($z_erp_dir.'/include.php');
include_once($z_erp_dir.'/Zerp.php');
Zerp::load('Class_Log');


// ************************************

?>