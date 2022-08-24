<?php
include '../config.php' ;
	require_once '../model/categorie.php';

    $update=false;
	class categorieController {
		function affichercategorie(){
			$sql="SELECT * FROM categorie";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimercategorie($id_categorie){
			$sql="DELETE FROM categorie WHERE id_categorie=:id_categorie";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_categorie', $id_categorie);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajoutercategorie($id_categorie){
			$sql="INSERT INTO categorie (id_categorie,nom_categorie) 
			VALUES (:id_categorie, :nom_categorie)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_categorie' => $categorie->getid_categorie(),
					'nom_categorie' => $categorie->getnom_categorie()
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}	
            //header("Location: index.php");		
		}
		function recuperercategorie($id_categorie){
			$sql="SELECT * from categorie where id_categorie=$id_categorie";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$id_categorie=$query->fetch();
				return $id_categorie;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function afficherid($user_id){
			$sql="SELECT * FROM reclamation WHERE user_id=$user_id";
			$db = config::getConnexion();
			
			try{
				$req=$db->query($sql);
				return $req;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		
		function modifiercategorier($categorie, $id_categorie){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE categorie SET 
					id_categorie= :id_categorie,						  
                    nom_categorie= :nom_categorie
						
					WHERE id_categorie= :id_categorie'
				);
				$query->execute([
					'id_categorie' => $categorie->getid_categorie(),
					'nom_categorie' => $categorie->getnom_categorie()
					
					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>

