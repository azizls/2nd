<?php
	include ('../Controller/crudcategorie.php');
	$categoriecontroller=new categoriecontroller();
	$categoriecontroller->supprimercategorie($_GET["nom_categorie"]);
	header('Location:affichercategorie.php');
?>