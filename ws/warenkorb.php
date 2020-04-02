


<?php

function warenanzeige() {
	$db = new mysqli('localhost','root','','kevin_ws');
if($db->connect_error):
  echo $db->connect_error;
endif;

$id = $_SESSION['kunde'];
$sql ="SELECT produkte.ID_Produkt,produkte.Name,produkte.Beschreibung,produkte.Preis FROM Warenkorb JOIN Produkte ON(Warenkorb.ID_Produkt = Produkte.ID_Produkt) WHERE ID_Kunde = ".$id;
$results = mysqli_query($db, $sql);
if($results === false) {
	return[];


}
$found = [];
	while($row= mysqli_fetch_array($results, MYSQLI_ASSOC)) {
	
	$found[] = $row;
}
return $found;

}



