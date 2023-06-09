<?php include('config.inc'); ?>
<?php
 session_start();
 if (isset($_SESSION['tuvastamine'])) {
   header('Location: admin.php');
   exit();
   }
 if (!empty($_POST['login']) && !empty($_POST['pass'])) {
 $login = htmlspecialchars(trim($_POST['login']));
 $pass = htmlspecialchars(trim($_POST['pass']));
if ($login=='Admin'&& $pass=='Passw0rd'){
 //SIIA UUS KONTROLL
 

 $_SESSION['tuvastamine'] ='misiganes';
 header('Location: admin.php');
} else {
    echo "kasutaja või parool on vale";
 }
 }

?>
<h1>Login</h1>
<form action="" method="post">
 Login: <input type="text" name="login"><br>
 Password: <input type="password" name="pass"><br>
 <input type="submit" value="Logi sisse">
</form>