<div class="karte">
	<div class="kartentitel">
	<?php echo $row['Name']; ?>
	<img src="lol.png" class="bild" alt="">
	
	</div>
	<div class="kartenbeschreibung">
	<?php echo $row['Beschreibung']; ?>
	<hr>
	<?php echo "Preis :"." ".$row['Preis']; ?>
	</div>
	<div class="kartenoption">
	<button class="button"><a href="index.php/add/<?php echo $row['ID_Produkt']?>">In den Warenkorb </a></button
	</div>
</div>