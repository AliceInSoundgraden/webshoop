
<?php 
$db = new mysqli('localhost','root','','kevin_ws');
if($db->connect_error):
  echo $db->connect_error;
endif;
$search_user = $db->prepare("SELECT * FROM kunde WHERE ID_Kunde = ?");
$search_user->bind_param('i',$_SESSION['kunde']);
$search_user->execute();
$search_result = $search_user->get_result();
$search_object = $search_result->fetch_object(); ?>

<button id=abutton1 onclick="abmelde()"> <?php echo '<img src="nutzerbild.png" id="nutzerbild" alt="">'.' '.$search_object->Name.'<br>';?> </button>



<?php echo '<form action="" method="post"><input type="submit" id="abutton" name="abmelden" value="Abmelden"></form>'; ?>

<script>
function abmelde() {
  var x = document.getElementById("abutton");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>

<?php



  
  if(isset($_POST['abmelden'])):
    session_destroy();
    header('Location: index.php?page=Home');
  endif;
  

  

