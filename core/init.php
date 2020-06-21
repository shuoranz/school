<?php 
//Start Session
session_start();
//Include Configuration
require_once($pre_position.'config/config.php');

//Helper Function Files
require_once($pre_position.'helpers/system_helper.php');
require_once($pre_position.'helpers/format_helper.php');
require_once($pre_position.'helpers/db_helper.php');

//Autoload Classes
function __autoload($class_name){
    //require_once('libraries/'.$class_name.'.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/libraries/'.$class_name.'.php');
}