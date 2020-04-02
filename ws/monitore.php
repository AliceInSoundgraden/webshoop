<?php

$db = new mysqli('localhost','root','','kevin_ws');
if($db->connect_error):
  echo $db->connect_error;
endif;

$sql = "SELECT ID_Produkt,Name,Beschreibung,Preis FROM produkte WHERE Kategorie = 2";
$result = mysqli_query($db, $sql);
