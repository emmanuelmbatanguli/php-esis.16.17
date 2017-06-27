<!doctype>
<html>
	<head>
		<title>Attribution des fonctions</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<?php include_once('head.php'); ?>
		
		<div>
			<h2>Attribuer une tâche à un Agent</h2>
			<form method="post" action="tache.dao.interro.php">
				<label for="description">Description :</label>
				<input type="text" name="description" id="description" /><br />
				<label for="datedebut">Date début :</label>
				<input type="date" name="datedebut" id="datedebut" /><br />
				<label for="datefin">Date fin :</label>
				<input type="date" name="datefin" id="datefin" /><br />
				<label for="idagent">Agent :</label>
				<select name="idagent" id="idagent">
				
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
				
				</select><br />
				<input type="submit" value="Enregistrer" />
			</form>
		</div>
		<div>
			<h2>Liste des tâches</h2>
			<?php
				require_once('tache.class.php');
				require_once('tache.dao.php');
				require_once('agent.class.php');
				require_once('agent.dao.php');
				
				$tdao = new TacheDAO();
				$lt = $tdao->getAllTache();
				$adao = new AgentDAO();
				$la = $adao->getAllAgent();
				
				echo '<table>';
				echo '
					<tr>
						<th>N°</th>
						<th>DESCRIPTION</th>
						<th>DATE DEBUT</th>
						<th>DATE FIN</th>
						<th>AGENT</th>
						<th>MODIFIER</th>
						<th>SUPPRIMER</th>
						<th>nombre de tâches</th>
					</tr>
				';
				$compteur = 1;
				$nom="";
				foreach($lt as $t) {
					$emma=$tdao->getAllNumbersOfTache($t->getIdAgent());
					echo '<tr>
							<td>'.$compteur.'</td>
							<td>'.$t->getDescription().'</td>
							<td> <strong>Du</strong> '.date("d",strtotime($t->getDatedebut())).'-'.date("m",strtotime($t->getDatedebut())).'-'.date("Y",strtotime($t->getDatedebut())).'</td>
							<td> <strong>Du</strong> '.date("d",strtotime($t->getDatefin())).'-'.date("m",strtotime($t->getDatefin())).'-'.date("Y",strtotime($t->getDatefin())).'</td>
						';
						
					foreach($la as $a) {
						if($t->getIdAgent() == $a->getId()) {
							echo '
								<td>'.$a->getNom().'</td>
							';
							$nom=$a->getNom();
							break;
						}
					}
					echo '<td><a href="update.dao.interro.php?id='.$t->getId().'"><img src="ct.png" alt="change" width="42px;" /></a></td>';
					echo '<td><a href="delete_it.php?id='.$t->getId().'"><img src="dt.png" alt="change" width="33px;" /></a></td>';
					echo '<td>'.$emma.'</td>';
					echo '</tr>';
					$compteur++;
				}
				echo '</table>';
			?>
		</div>
		
		<?php include_once('foot.php'); ?>
	</body>
</html>