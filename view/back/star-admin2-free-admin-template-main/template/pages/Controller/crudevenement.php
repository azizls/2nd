<?php
include 'config2.php' ;
	require_once '../model/evenement.php';

    $update=false;
	class evenementcontroller {
		function afficherevenement(){
			$sql="SELECT * FROM evenement";
			$db = config2::getConnexion();
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
			$db = config2::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_event', $id_event);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajouterevenement($evenement){
			$sql="INSERT INTO evenement (nom_event,date_event,time, nom_categorie) 
			VALUES ( :nom_event, :date_event, :time, :nom_categorie)";
			$db = config2::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					
					'nom_event' => $evenement->getnom_event(),
					'date_event' => $evenement->getdate_event(),
					'time' => $evenement->gettime(),
					'nom_categorie' => $evenement->getnom_categorie(),
                   
                   
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}	
            //header("Location: index.php");		
		}
		function recupererevenement($id_event){
			$sql="SELECT * from evenement where id_event=$id_event";
			$db = config2::getConnexion();
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
			$db = config2::getConnexion();
			
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
				$db = config2::getConnexion();
				$query = $db->prepare(
					'UPDATE evenement SET 
										  
                    nom_event= :nom_event,
                    date_event= :date_event,
					time= :time,
                    nom_categorie= :nom_categorie

						
					WHERE id_event= :id_event'
				);
				$query->execute([
					
					'nom_event' => $evenement->getnom_event(),
                    'date_event' => $evenement->getdate_event(),
					'time' => $evenement->gettime(),
                    'nom_categorie' => $evenement->getnom_categorie(),
					'id_event' => $id_event
					
					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>

