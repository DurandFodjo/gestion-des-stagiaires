<?php
require_once("connection.php");
$log=$_POST['login'];
$pass=$_POST['motdepasse'];
$PC=md5($pass);
$req="select * from utilisateurs where login='$log' and passwd='$PC'";
$rs=mysql_query($req) or die (mysql_error());
if ($u=mysql_fetch_assoc($rs)){
    session_start();
    $_SESSION['NIV']=$u['Niveau'];
    header("location:page.html");
}
else {
    header("location:Authentification.html");
}
?> 