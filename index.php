<?php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
define('BASEPATH','/opt/bitnami/apps/mfa-api/MFA-API-WEB-INF');
include(BASEPATH ."/include/config.php");
include(BASEPATH ."/include/functions.inc.php");
include(CODEPATH."/logger.class.php");



if ($_SERVER['PATH_INFO'] == "" || $_SERVER['PATH_INFO'] == "/")
{
	die;
}
else
{
	$tmp_arr_path		= explode("/",$_SERVER['PATH_INFO']);
	$do		= $tmp_arr_path[1];
	$action	= $tmp_arr_path[2];
	$id		= $tmp_arr_path[3];
	$num	= $tmp_arr_path[4];
	$num1	= $tmp_arr_path[5];
	$num2	= $tmp_arr_path[6];
	$num3	= $tmp_arr_path[7];
	$num4	= $tmp_arr_path[8];
}



$logger = new logger();



define("TEMPLATES_PRF","json_");
header('Expires: -1');
header('Cache-Control: no-store, no-cache and must-revalidate');
header('Pragma: no-Cache');
if(preg_match('/MSIE/i',$_SERVER['HTTP_USER_AGENT']))
{
	header("Content-type: application/json");		
} 		
define('TEMPLATEPATH',TEMPLATEPATH_JSON);



// set the default controller
if(empty($do))
{
	// return with an error message and log the same.
}

$TEMPLATE->do 		= $do;
$TEMPLATE->action 	= $action;
$TEMPLATE->id 		= $id;
$TEMPLATE->num 		= $num;

switch($do)
{
	case "sms_one_way_otp":
	{
		
		include_once(CODEPATH."/".$do."Action.php");
		$tmp_class_name = $do."Action";
		$tmp_obj_controller = new $tmp_class_name();	
		switch($_SERVER['REQUEST_METHOD'])
		{
			case 'POST': $res = $tmp_obj_controller->execute_post();  break;
		}			
		break;
	}
	case "standard":
	{
		include_once(CODEPATH."/".$do."Action.php");
		$tmp_class_name = $do."Action";
		$tmp_obj_controller = new $tmp_class_name();
		switch($_SERVER['REQUEST_METHOD'])
		{
			case 'POST': $res = $tmp_obj_controller->execute_post();  break;
		}						
		break;
	}
	case "get_user_otp":
	{
		include_once(CODEPATH."/".$do."Action.php");
		$tmp_class_name = $do."Action";
		$tmp_obj_controller = new $tmp_class_name();
		switch($_SERVER['REQUEST_METHOD'])
		{
			case 'POST': $res = $tmp_obj_controller->execute_post();  break;
		}						
		break;
	}	
	
}





?>
