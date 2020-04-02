<?php

connect_db(){
	
	$dbserver		= "localhost";
	$dbuser			= "root";
	$dbpasswort 	= "";
	$dbname			= "kevin_WS";
	$dbh			= mysqli_connect($dbserver, $dbuser, $dbpasswort)
						or die ("Fehler bei Connect")
						
	$mysqli_select_db($dbh, $dbname)
		or die ("Fehler bei SELECT_DB");
	
}






?>