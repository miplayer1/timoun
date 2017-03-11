<?php

// Initialisation du script commun à toutes les pages

// reporting des erreurs
error_reporting(E_ALL);

// import des fonctions
require_once("private/controller/functions.php");

// Controller
// Traitement automatisé du formulaire
$idForm = verifierInput("idForm");
if ($idForm != "")
{
	// Pour automatiser le traitement formulaire
	// Mise en place d'une convention de nommage de fichier
	$traitement = "private/controller/process-$idForm.php";
	
	// Vérification de l'existence du fichier
	if (is_file($traitement))
	{
		// Chargement du code
		require_once($traitement);
	}
}else
{
  //header('Location:index.php');
}

?>