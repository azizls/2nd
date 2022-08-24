<?php
include '../config.php' ;
	require_once '../model/evenement.php';

    $update=false;
	class evenementController {
		function afficherevenement(){
			$sql="SELECT * FROM evenement";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerevenement($id_event){
			$sql="DELETE FROM evenement WHERE id_event=:id_event";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_event', $id_event);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajouterevenement($id_event){
			$sql="INSERT INTO evenement (id_event,nom_evenement) 
			VALUES (:id_event, :nom_evenement)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_event' => $evenement->getid_event(),
					'nom_event' => $evenement->getnom_event(),
					'date_event' => $evenement->getdate_event(),
                    'id_categorie' => $evenement->getid_categorie()
                   
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}	
            //header("Location: index.php");		
		}
		function recupererevenement($id_event){
			$sql="SELECT * from evenement where id_event=$id_event";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$id_event=$query->fetch();
				return $id_event;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function afficherid($user_id){
			$sql="SELECT * FROM evenement WHERE user_id=$user_id";
			$db = config::getConnexion();
			
			try{
				$req=$db->query($sql);
				return $req;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		
		function modifierevenement($evenement, $id_event){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE evenement SET 
					id_event= :id_event,						  
                    nom_event= :nom_event,
                    date_event= :date_event,
                    id_categorie= :id_categorie

						
					WHERE id_event= :id_event'
				);
				$query->execute([
					'id_event' => $evenement->getid_event(),
					'nom_evenement' => $evenement->getnom_evenement(),
                    'date_event' => $evenement->getdate_event(),
                    'id_categorie' => $evenement->getid_categorie()
					
					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>

