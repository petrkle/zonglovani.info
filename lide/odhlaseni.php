<?php
/*
if(isset($_GET["next"]) and ereg("^/",$_GET["next"])){
	$next=$_GET["next"];
}elseif(isset($_POST["next"]) and ereg("^/",$_POST["next"])){
	$next=$_POST["next"];
}else{
	$next="/";
}
 */
session_start();
session_destroy();
header("Location: /");
exit();
?>
