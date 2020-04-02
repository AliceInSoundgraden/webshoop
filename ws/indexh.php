<html>
  <head>
  
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Webshop</title>
  </head>
  <body>
  <div class = "komplett">
  <div class = "kopf">
  <img src="logo.png" class="logo" alt="">
<?php 
if(isset($_SESSION['kunde'])){
require('abmeldung.php'); }
else 
require('anmeldung.php'); ?>

<?php
$warenitems = ' ';
 if(isset($_SESSION['kunde'])){
$id = $_SESSION['kunde'];
$ssql = "SELECT ID_Warenkorb FROM Warenkorb WHERE ID_Kunde =".$id;
$wareergebnis = mysqli_query($db, $ssql);
$warenitems = mysqli_num_rows($wareergebnis);
}
?>

<nav>
<button id="ware"><a href="index.php?page=Warenkorb"> Warenkorb(<?php echo $warenitems?>) </a></button>
</nav>
   
<script>


</script>
    <nav class="navigation">
      <a  href="index.php?page=Home">Home</a> 
      <a  href="index.php?page=Scanner">Scanner</a>
      <a  href="index.php?page=Monitore">Monitore</a> 
      <a  href="index.php?page=Drucker">Drucker</a>
   </nav>


</div> 
<div class = "produkte">
<?php 
	if($s !== 'anmelden' and $s !== 'registrieren' and $s !== 'Warenkorb' ): 
	while($row= mysqli_fetch_array($result, MYSQLI_ASSOC)):?>
	<div class="punkt">
	<?php include 'karte.php'?>
	</div>
	<?php endwhile;
	endif;?>
</div>
<?php if(isset($_SESSION['kunde'])): ?>
<div class ="warenkorb">
<?php $warenkorb = warenanzeige();?>
<?php foreach($warenkorb as $warenkorb):?>
<div class="karte"> 
<div> </div>
<div><?php echo $warenkorb['Name']; ?></div>
<div><?php echo $warenkorb['Beschreibung']; ?>  </div>
<div><?php echo $warenkorb['Preis']; ?> </div>
</div>
<?php endforeach;?>
</div>
<?php endif; ?>


<?php if($s == 'anmelden')
{include 'anmelden.php';}?>

<?php if($s == 'registrieren')
{include 'registrieren.php';}?>

</div>

