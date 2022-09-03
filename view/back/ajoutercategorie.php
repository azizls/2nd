<?php
include 'controller/crudcategorie.php';
require_once 'model/categorie.php';
$categoriecontroller = new categoriecontroller();
$error = "";


$comment = null;

// create an instance of the controller
//$blogC = new blogController();
if (
    isset($_POST["id_categorie"]) &&
    isset($_POST["nom_categorie"])
) {
    if (
        !empty($_POST["id_categorie"]) &&
        !empty($_POST['nom_categorie'])
    ) {
        $categorie = new categorie(
            $_POST['id_categorie'],
            $_POST['nom_categorie']

        );
        $categoriecontroller->ajoutercategorie($categorie);
       

        // header('Location:'affichercategorie.php' );
    } else
        $error = "Missing information";
}
