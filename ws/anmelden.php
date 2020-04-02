<form action="" method="post">
<div class="box">
<style> 
body {background-color: lightgrey;}
</style>
<br>
<p class = "schrift"> Bitte loggen sie sich ein </p>
<br>

<br>
<br>

  <input type="text" class = "eingabe" name="benutzername" 
  placeholder="Benutzername">
  
  <br>
  <br>

  <input type="password" class = "eingabe" name="passwort" 
   placeholder="Passwort">
   <br>
   <br>
  
  <input type="submit" class = "eingabe" name="absenden" 
  value="Absenden"><br>
<p class="schrift-logreg"> Ich habe noch kein Kundenkonto </p>
<p class="schrift-logreg"> <a href="index.php?page=registrieren"> Zum Registrieren </a> </p>
</form>

</div>
<?php

$db = new mysqli('localhost','root','','kevin_ws');
if($db->connect_error){
  echo $db->connect_error;
}

if(isset($_POST['absenden'])){
  $benutzername = strtolower($_POST['benutzername']);
  $passwort = $_POST['passwort'];
  $passwort = md5($passwort);

  $search_user = $db->prepare("SELECT ID_Kunde FROM kunde WHERE name = ? AND password = ?");
  $search_user->bind_param('ss',$benutzername,$passwort);
  $search_user->execute();
  $search_result = $search_user->get_result();

  if($search_result->num_rows == 1){
    $search_object = $search_result->fetch_object();

    $_SESSION['kunde'] = $search_object->ID_Kunde;
    header('Location: index.php?page=Home'); 
  
    
  }
  else echo ' <p class="schrift">Deine Angaben sind leider nicht korrekt!</p>';
}
?>
