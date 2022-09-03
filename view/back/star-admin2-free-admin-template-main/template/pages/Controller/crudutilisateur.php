<?php
include '../../../config.php' ;
	require_once '../model/utilisateurs.php';

    $update=false;
	class utilisateursController {
		function afficherutilisateurs(){
			$sql="SELECT * FROM utilisateurs";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerutilisateurs($id_utilisateur){
			$sql="DELETE FROM utilisateurs WHERE id_utilisateur=:id_utilisateur";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_utilisateur', $id_utilisateur);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajouterutilisateurs($id_utilisateur){
			$sql="INSERT INTO utilisateurs (id_utilisateur,nom_utilisateurs) 
			VALUES (:id_utilisateur, :nom_utilisateurs)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_utilisateur' => $utilisateurs->getid_utilisateur(),
					'tickets' => $utilisateurs->gettickets(),
					'id_event' => $utilisateurs->getid_event()
                   
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}	
            //header("Location: index.php");		
		}
		function recupererutilisateurs($id_utilisateur){
			$sql="SELECT * from utilisateurs where id_utilisateur=$id_utilisateur";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$id_utilisateur=$query->fetch();
				return $id_utilisateur;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function afficherid($user_id){
			$sql="SELECT * FROM utilisateurs WHERE user_id=$user_id";
			$db = config::getConnexion();
			
			try{
				$req=$db->query($sql);
				return $req;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		
		function modifierutilisateurs($utilisateurs, $id_utilisateur){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE utilisateurs SET 
					id_utilisateur= :id_utilisateur,						  
                    tickets= :tickets,
                    id_event= :id_event

						
					WHERE id_utilisateur= :id_utilisateur'
				);
				$query->execute([
					'id_utilisateur' => $utilisateurs->getid_utilisateur(),
					'nom_utilisateurs' => $utilisateurs->getnom_utilisateurs(),
                    'id_event' => $utilisateurs->getid_event()
					
					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>

