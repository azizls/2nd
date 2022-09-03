<?php
	include ('../controller/crudevenement.php');
	$evenementcontroller=new evenementcontroller();
	$evenementcontroller->supprimerevenement($_GET["id_event"]);
	header('Location:afficherevenement.php');
?>