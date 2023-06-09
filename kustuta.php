<?PHP

include("config.inc");

if($_GET['id']){
  $id=$_GET['id'];
  $paring_kustuta="DELETE from reganud where id='$id'";
  var_dump($paring_kustuta);
  $valjund=mysqli_query($conn,$paring_kustuta);


  if ($valjund==1) {

    echo "Kirje kustutatud";
//	sleep(5);	
   header("Location: admin.php");
  }else{
    echo "Kirjet ei kustutatud";
  }
}
 ?>
