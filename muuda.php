<?PHP

include("config.inc");

if($_GET['id']){
  $id=$_GET['id'];
  //echo "kustuta valgus";
  $paring_muuda="select * from reganud where id=$id";
  //var_dump($paring_muuda);
  $valjund=mysqli_query($conn,$paring_muuda);
  while($rida=mysqli_fetch_row($valjund))
{
  var_dump($paring_muuda);
?>
<h1>Muutmine!</h1>
  <form action="#" method="get">
    Eesnimi <input type="text" name="eesnimi" value="<?php echo $rida[1]; ?>"><br>
    Perenimi <input type="text" name="perenimi" value="<?php echo $rida[2]; ?>"><br>
    Vkl <input type="text" name="vkl" value="<?php echo $rida[3]; ?>"><br>
    E-mail <input type="text" name="email" value="<?php echo $rida[4]; ?>"><br>
    <input type="number" name="id" hidden value="<?php echo $rida[0]; ?>"><br>
    <input type="submit" value="Muuda andmed"><br>
</form>
<?PHP
} 
}
if($_GET['id'] && $_GET['eesnimi']){
  $id = $_GET['id'];
  $eesnimi = $_GET['eesnimi'];
  $perenimi = $_GET['perenimi'];
  $vkl = $_GET['vkl'];
  $email = $_GET['email'];
  
  $paring_uuenda = "UPDATE reganud 
  SET eesnimi='$eesnimi',
  perenimi='$perenimi',
  vkl='$vkl',
  email='$email'
  WHERE id='$id'
  ";
  //var_dump($paring_uuenda);
  $valjund = mysqli_query($conn, $paring_uuenda); 

  if ($valjund==1) {
    echo "Kirje lisatud";
    header("Location: admin.php");
  }else{
    echo "Kirjet ei lisatud";
  }
}
 ?>