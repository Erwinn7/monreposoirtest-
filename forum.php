<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="flavicon.png">
	<link rel="stylesheet" type="text/css" href="layout/css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Erwinn7 Forum</title>
	<style >
	body{ 
		background-image: url('layout/images/back.jpg');
	    background-attachment: fixed;
		 }
		#conteneur{
			background-color: #c3c3c3;
			display: inline-block;
			margin-top: 50px;
			margin-right: 375px;
			margin-left: 375px; 
			width: 600px;
			border:0px black solid;
			border-radius: 10px;
			padding: 15px;

		}
		textarea{
			border: 0px black solid;
			border-radius: 10px;
			box-shadow: 0px 3px 6px #7f7f80;
		}
		textarea:hover{
			box-shadow: 3px 6px 9px #7f7f80;
			transition: 0.3s;
		}
		#message{
			color: #ffffff;
			background-color: grey ;
			border: 1px grey solid;
			border-radius: 6px;
			padding: 5px;
			margin: 10px;
		}
		#p{
			font-size: 12px;
			position: relative;
			padding-right: 0px;
		}
		#send:hover{
			box-shadow: 3px 6px 9px #7f7f80;
			transition: 0.3s;
		}

	</style>
</head>
<body>
<div class="container-fluid" style="width: 700px;" id="conteneur">
	<p id="p" class="text-danger">Today :  <?php echo date("Y-m-d  H:i:s")." GMT" ?></p>

	<!-- afficher les messages -->

	<?php 
	   mysql_connect('localhost','root','');
	   mysql_select_db('projet');

	  $lecture = mysql_query("SELECT pseudo,message FROM forum ORDER BY id DESC ");      
	   if ($lecture) {
	    	while ($tuple = mysql_fetch_array($lecture)) {

	     	  $pseud = $tuple['pseudo'];
	   	      $msg = $tuple['message'];
	   	      echo "<strong>".htmlspecialchars(stripslashes($pseud))."</strong> : ";?> 
	   	      <div id="message">
	   	      	<?php echo htmlspecialchars(stripslashes($msg)) ."<br>";?>
	   	      	</div>
	   	      	<?php 
	   	    }
	   }
	 ?>
<!-- formulaire -->
<div class="form-group" >
	<form action="forumdb.php" method="POST" enctype="multipart/form-data">
		<label> Pseudo: <input type="text" name="pseudo" required placeholder="Pseudo" class="form-control"> </label>
		<label for="message"> Ecrire un message:</label><br/>
		<textarea name="message" rows="5" class="form-control" required ></textarea><br/>
		<input type="submit" name="send" value="Send" id="send" style="width: 200px;">	    
	</form>
</div>

</div>
<div class=" bg-dark text-success container" style="text-align: center; font-size: 12px; height: 100px;">
	<p style="margin: 0px;">  ©Copyright 2019 | M'Light corp- all right reserved<p>
</div>
</body>
</html>