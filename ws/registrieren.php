<form action="" method="post">
<div class = "box">
body {background-color: lightgrey;}
<br>
<p class = "schrift"> Erstellen sie ihr Kundenkonto </p>
<br>

<br>
<br>
  <input type="text" class = "eingabe" name="name" placeholder="Benutzername..."><br>
<br>
  <input type="password" class = "eingabe" name="password" placeholder="Passwort..."><br>
<br>
  <input type="password" class = "eingabe" name="password2" placeholder="Passwort wiederholen..."><br>
<br>
  <input type="submit" class = "eingabe" name="absenden" value="Absenden"><br>
<p class="schrift-logreg"> Ich habe bereits ein Kundenkonto </p>
<p class="schrift-logreg"> <a href="index.php?page=anmelden"> Zum Login </a> </p>




  
</form>
<?php

$db = new mysqli('localhost','root','','kevin_ws');
if($db->connect_error):
  echo $db->connect_error;
endif;
if(isset($_POST['absenden'])):

  $benutzername = $_POST['name'];
  $passwort = $_POST['password'];
  $passwort2 = $_POST['password2'];

  $search_user = $db->prepare("SELECT ID_Kunde FROM kunde WHERE Name = ?");
  $search_user->bind_param('s',$benutzername);
  $search_user->execute();
  $search_result = $search_user->get_result();

  if($search_result->num_rows == 0):
    if($passwort == $passwort2):
      $passwort = md5($passwort);
      $insert = $db->prepare("INSERT INTO kunde (name,password) VALUES (?,?)");
      $insert->bind_param('ss',$benutzername,$passwort);
      $insert->execute();
      if($insert !== false):
         echo '<p class="schrift">Dein Account wurde erfolgreich erstellt!<p>';
      endif;
    else:
      echo '<p class="schrift">Deine Passwörter stimmen nicht überein!<p>';
    endif;
  else:
    echo '<p class="schrift">Der Benutzername ist leclasser schon vergeben!<p>';
  endif;

endif;
?>
</div>