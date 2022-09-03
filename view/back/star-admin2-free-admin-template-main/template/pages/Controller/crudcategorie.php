<?php
    include 'config.php' ;
	require_once ('../model/categorie.php');

    $update=false;
	class categoriecontroller {
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
		function supprimercategorie($nom_categorie){
			$sql="DELETE FROM categorie WHERE nom_categorie=:nom_categorie";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':nom_categorie', $nom_categorie);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajoutercategorie($categorie){
			$sql="INSERT INTO categorie (nom_categorie) 
			VALUES ( :nom_categorie)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					
					'nom_categorie' => $categorie->getnom_categorie()
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}	
            //header("Location: index.php");		
		}
		function recuperercategorie($nom_categorie){
			$sql="SELECT * from categorie where nom_categorie=$nom_categorie";
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
			$sql="SELECT * FROM categorie WHERE user_id=$user_id";
			$db = config::getConnexion();
			
			try{
				$req=$db->query($sql);
				return $req;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		
		function modifiercategorie($categorie, $nom_categorie){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE categorie SET 
											  
                    nom_categorie= :nom_categorie
						
					WHERE nom_categorie= :nom_categorie'
				);
				$query->execute([
					
					'nom_categorie' => $nom_categorie
					
					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>

