<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once ('ARG-functions.php');

// echo "<pre>";
// echo print_r($_SERVER);
// echo "</pre>";

$egPCfiles = 'C:\\Users\\Dave\\AutoRemote-EventGhost\\';    
$func = $_GET['func'];
$asfile = urldecode($_GET['asfile']);
// $uf = $_GET['uf'];

switch ($func) {
	case "uf" :
		uniqueFolder();
		break;
	case "bt" :
        makeBatchFile($asfile,$uf);
        break;
	case "sc" :
        makeScriptFile($asfile,$uf);
		break;
}

?>