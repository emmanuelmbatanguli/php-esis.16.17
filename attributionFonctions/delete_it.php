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
			
			<?php
				require_once('tache.class.php');
				require_once('tache.dao.php');

				
				$tdao = new TacheDAO();
				
				if(isset($_GET['id']))
				{
					$id = $_GET['id'];
					$nom1="";
					
					if($tdao->delTache($id) === true)
					{
						echo "<p>Tache Supprimee Avec Succes</p>";
						echo "<p>============<img src=\"dt.png\" alt=\"change\" width=\"33px;\" />=================</p>";
						echo '<p>id===>>> '.$id.''.$nom1.'</p>';
					}
		
					else
					{
						echo "<p>Tache Non Trouvee</p>";
					}
				}
			?>
		</div>
		
		<?php include_once('foot.php'); ?>
	</body>
</html>