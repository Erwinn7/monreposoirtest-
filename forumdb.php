<?php
//variables
$pseudo = htmlspecialchars(addslashes($_POST['pseudo']));
$message = htmlspecialchars(addslashes($_POST['message']));
//requetes sql 
$insertion = "INSERT INTO forum VALUES('','$pseudo','$message')";
if(!empty($_POST['pseudo'] && strlen(trim($_POST['message'])))!=0){
	mysql_connect('localhost','root','');
	mysql_select_db('projet');
	mysql_query($insertion);
	mysql_close(mysql_connect('localhost','root',''));
	header('Location: forum.php');
}
else{
	header('Location: forum.php');
}

?>