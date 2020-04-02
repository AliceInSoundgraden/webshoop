
<?php
$db = new mysqli('localhost','root','','kevin_ws');
if($db->connect_error):
  echo $db->connect_error;
endif;
session_start();
$page = 'Fehler.php';
$s = '';
if(isset($_GET['page'])){$s = $_GET['page'];}

switch ($s) {
	case ' ':
		$page = 'home.php';
		break;
	case 'Home':
		$page = 'home.php';
		break;	
	case 'anmelden':
		$page = 'index.php';
		break;
	case 'registrieren':
		$page = 'index.php';
		break;
	case 'Monitore':
		$page = 'monitore.php';
		break;
	case 'Scanner':
		$page = 'scanner.php';
		break;
	case 'Drucker':
		$page = 'drucker.php';	
		break;
	case 'Warenkorb':
		$page = 'Warenkorb.php';	
		break;
}	




require_once($page);

include 'indexh.php';

require 'indexe.php';

?>


