<?php include('config.inc'); ?>
<!doctype html>
<html lang="et">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Lisamine</title>
  </head>
<body>

<?php
if (!empty($_GET['eesnimi']) && !empty($_GET['perenimi']) && !empty($_GET['vkl']) &&  !empty($_GET['email']) ) {
 $eesnimi = htmlspecialchars(trim($_GET['eesnimi']));
//echo $eesnimi;
 $perenimi = htmlspecialchars(trim($_GET['perenimi']));
//echo $perenimi;
 $vkl = htmlspecialchars(trim($_GET['vkl']));
//echo $vkl;
 $email = htmlspecialchars(trim($_GET['email']));

$kontroll="SELECT * FROM reganud WHERE email='$email'";
//var_dump($kontroll);
$result = mysqli_query($conn,$kontroll);
//var_dump($result);
if (mysqli_num_rows($result) > 0) {
	echo $email;
        echo "<br>Selline e-mail juba eksisteerib, paranda andmed<br>";
    } else {
        //echo 'not found';
  //  }

 //päring
    $paring = "INSERT INTO reganud (eesnimi,perenimi,vkl,email) VALUES ('$eesnimi','$perenimi','$vkl','$email')";
//var_dump($paring);
 $valjund = mysqli_query($conn, $paring);
  //päringu vastuste arv
 $tulemus = mysqli_affected_rows($conn);
 if ($tulemus == 1) {
 echo "Osaleja registreeritud";
 } else {
 echo "Kirjet ei lisatud";
}   
}
  
}
?>
<br>
<a class="btn btn-primary" href="index.html" role="button">Tagasi</a>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
</body>
</html>