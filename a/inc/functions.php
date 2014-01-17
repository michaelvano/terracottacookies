<?
/* =================================================================
- noBulMedia.com
- a/inc/functions.php
- Version 2.0 - 2012-07-23
- Includes the config.php to access the database. Reads through all
the files in the "functions" folder and includes them
====================================================================*/

// ADDS THE CONFIG FILE THAT ACCESSES THE DATABASE
require($_SERVER['DOCUMENT_ROOT'].'/config.php');

// ADDS ALL THE FUNCTIONS LOCATED IN THE FUNCTIONS FOLDER

$_functions = opendir($_SERVER['DOCUMENT_ROOT'].'/a/inc/functions');
while(false !== ($_file = readdir($_functions))) {
	if ($_file != "." && $_file != "..") { 
		include($_SERVER['DOCUMENT_ROOT'].'/a/inc/functions/'.$_file);
	}
}
closedir($_functions);

/*
include($_SERVER['DOCUMENT_ROOT'].'/a/inc/functions/database.php');
include($_SERVER['DOCUMENT_ROOT'].'/functions/general.php');
include('functions/validator.php');
include('functions/login.php');
*/




?>