<button id=abutton2 > <a href="index.php?page=anmelden">  <?php echo 'Anmelden<br>oder Registrieren';?> </a></button>
<?php 
$db = new mysqli('localhost','root','','kevin_ws');
if($db->connect_error):
  echo $db->connect_error;
endif;










  

