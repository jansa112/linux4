<!DOCTYPE html>
<head>
<title>filter.php</php>
</head>
<h1>Adminnile</h1>
<form action="logout.php" method="post">
 <input type="submit" value="Logi välja" name="logout">
</form>
<?php
session_start();
if (!isset($_SESSION['tuvastamine'])) {
  header('Location: login.php');
  exit();
  }
?>

<?php include('config.inc'); ?>
<!doctype html>
<html lang="et">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Administreerimine</title>
  </head>
<body>
<?php
echo "<h3>Nimekiri</h3>";
$valik='Laps';
var_dump($valik);

$valik = ($_POST['valik']);
var_dump($valik);

$paring="select * from reganud where vkl like '$valik' order by id";
$valjund=mysqli_query($conn,$paring);
echo '<table class="table table-striped" border=1px>';
echo'<th class="w-25">Eesnimi</th><th class="w-25">Perenimi</th><th class="w-10">Vanuseklass</th><th class="w-25">E-mail</th><th class="w-10">Kustuta</th><th class="w-10">Muuda</th>';
while($rida=mysqli_fetch_row($valjund))
{
print_r($rida);
echo'<tr>';
echo "<td><strong>".$rida[1]."</strong></td><td>".$rida[2]."</td><td>".$rida[3]."</td><td>".$rida[4]."</td><td><a href='kustuta.php?id=".$rida[0]."' onclick=\"return confirm('Are you sure?')\"> Kustuta</a></td><td><a href='muuda.php?id=".$rida[0]."'> Muuda</a></td>";
//echo "<a href='muuda.php?id=".$rida[0]."'> Muuda</a>";
echo'</tr>';

}


?>

<br>
<a class="btn btn-primary" href="admin.php" role="button">Tagasi</a>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
</body>
</html>