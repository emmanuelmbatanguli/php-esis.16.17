<?php


require_once('tache.dao.php');
$bdd = Connexion::getConnexion();
if(isset($_POST['idagent']) and isset($_POST['description']) and !empty($_POST['datedebut']) and !empty($_POST['datefin'])) 
	{

		$description =$_POST['description'];
		$dateDebut = $_POST['datedebut'];
		$dateFin = $_POST['datefin'];
		$idAgent =  $_POST['idagent'];
		$req = $bdd->query("INSERT INTO tache (id, description, datedebut, datefin, idagent) VALUES (null, '$description', '$dateDebut', '$dateFin','$idAgent')");
		require_once("taches.php");	
	}

?>