
<!doctype>
<html>
	<head>
		<title>Attribution des fonctions</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>

		<?php
			include_once('head.php');
			require_once('tache.class.php');
			require_once('tache.dao.php');
			$tdao = new TacheDAO();
			
			if(isset($_GET['id']))
			{
				$_tache = $tdao->getTache($_GET['id']);
				if ($_tache != null) 
				{
					echo 
					"<div>
						<h2>Attribuer une tâche à un Agent</h2>
						<form method=\"post\" action=\"\">
							<label for=\"description\">Description :</label>
							<input type=\"text\" name=\"description\" id=\"description\" value=\"".$_tache->getDescription()."\"/><br />
							<label for=\"datedebut\">Date début :</label>
							<input type=\"date\" name=\"datedebut\" id=\"datedebut\" /><br />
							<label for=\"datefin\">Date fin :</label>
							<input type=\"date\" name=\"datefin\" id=\"datefin\" value=\""."06/06/2017"."\"/><br />
							<label for=\"idagent\">Agent :</label>
							<select name=\"idagent\" id=\"idagent\">";
							?>
							
							<?php 
								require_once('agent.class.php');
								require_once('agent.dao.php');
								
								$adao = new AgentDAO();
								$la = $adao->getAllAgent();
								
								foreach($la as $a) {
									echo '
										<option value="'.$a->getId().'">'.$a->getNom().'</option>
									';
								}
							
							?>
							
							<?php echo "</select><br />
							<input type=\"submit\" value=\"Enregistrer\" name=\"editTache\"/>
						</form>
					</div>"; ?>

					
										

					<?php


					require_once('tache.dao.php');
					//require_once('Connexion.php');
					$bdd = Connexion::getConnexion();
					if(isset($_POST['idagent']) and isset($_POST['description']) and !empty($_POST['datedebut']) and !empty($_POST['datefin'])) 
						{

							if(isset($_POST['editTache'])){
								$description =$_POST['description'];
								$dateDebut = $_POST['datedebut'];
								$dateFin = $_POST['datefin'];
								$idAgent =  $_POST['idagent'];
								$id=$_GET['id'];
								$req = $bdd->query("UPDATE tache SET description='$description', datedebut='$dateDebut', datefin='$dateFin', idAgent='$idAgent' WHERE id='$id'");
										
							}else{
							echo 'veuiller remplire les champ svp';
							}
						}
						

					
				}
			}
		include_once('foot.php');
		?>
	</body>
</html>





