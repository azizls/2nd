<?php
    include '../model/evenement.php';
    include '../Controller/crudevenement.php';

    
    $error = "";

    // create reponse
    $evenementcontroller = null;

    // create an instance of the controller
    $evenementcontroller = new evenementcontroller();
    if (
        
       
		isset($_POST["nom_event"]) && isset($_POST["date_event"] )) 		
     
		
    
     {
        if (
             
           
			!empty($_POST["nom_event"]) && !empty($_POST["date_event"]) 
             
			 
        
        ) {
            $evenement = new evenement(
               
            
				$_POST['nom_event'],
                $_POST['date_event']
                    
            );
            $evenementcontroller-> ajouterevenement($evenement);
            header('Location:afficherevenement.php');
        }}
        else{

            $error = "Missing information";
    }

    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="afficherliste.php">Retour à la liste des reclmation</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                
            
    

				<tr>
                    <td>
                        <label for="nom_event">nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom_event" id="nom_event" maxlength="100"></td>
                </tr>

                <tr>
                    <td>
                        <label for="date_event">date:
                        </label>
                    </td>
                    <td><input type="date" name="date_event" id="date_event" maxlength="100"></td>
                </tr>
                
                          
                <tr>
                    <td></td>
                    <td>
                    <input type="hidden" value=<?PHP echo  $_GET['id_categorie']; ?> name="id">
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>