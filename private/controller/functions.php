<?php

// FONCTION POUR AFFCIHER UNE VARIABLE GLOBALE
function afficherVar ($nomVariable)
{
	if (isset($GLOBALS[$nomVariable]))
	{
		echo $GLOBALS[$nomVariable];
	}
}

// FONCTION QUI RECUPERE LES INFOS DU FORMULAIRE
function verifierInput ($nameInput)
{
	// JE VERIFIE SI L'INFO EST PRESENTE
	if (isset($_REQUEST[$nameInput]))
	{
		// ALORS JE LA RECUPERE
		$resultat = $_REQUEST[$nameInput];
	}
	else
	{
		// SINON, JE METS UNE VALEUR PAR DEFAUT (CHAINE VIDE)
		$resultat = "";
	}

	// FILTRE QUI ENLEVE LES BALISES HTML
	$resultat = strip_tags($resultat);
	// filtre qui enlève les espaces
	$resultat = trim($resultat);
	
	// Renvoi de la valeur
	return $resultat;
}

/*
function envoyerRequeteSQL ($requeteSQL, $tabToken)
{
	// POUR UTILISER LA BASE DE DONNEES MYSQL
	// ON VA DEVOIR SE CONNECTER AVEC DES IDENTIFIANTS
	// ATTENTION: IL FAUT CHANGER CES INFORMATIONS A CHAQUE PROJET
	$userDB 	= "letitbe133";
	$passwordDB = "";
	$hostDB		= "localhost";
	$databaseDB = "resto";

	$dsn = "mysql:dbname=$databaseDB;host=$hostDB;charset=utf8";

	// CREER LA CONNEXION AVEC LA BASE DE DONNEES MYSQL
	$objetPDO = new PDO($dsn, $userDB, $passwordDB);

	// JE DONNE A MYSQL LA REQUETE QUE JE VEUX EXECUTER AVEC LES TOKENS
	// POUR QUE IL SACHE QUELLES SONT LES ZONES DANGEREUSES
	$objetPDOStatement = $objetPDO->prepare($requeteSQL);

	// EXECUTER LA REQUETE
	// ON FOURNIT LE TABLEAU ASSOCIATIF POUR QUE MYSQL PUISSE COMPLETER LA REQUETE SQL
	$objetPDOStatement->execute($tabToken);
	
	$objetPDOStatement->setFetchMode(PDO::FETCH_ASSOC);

	// POUR GERER LES SCENARIOS DE LECTURE
	// QUI AURONT BESOIN DE RECUPERER LES INFOS DE LA BASE DE DONNEES MYSQL
	return $objetPDOStatement;
}
*/