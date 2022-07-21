<?php

function connexionBDD()
{
	try
	{		
	$bdd = new PDO('mysql:host=localhost;port=3306;dbname=taxi;', 'root', '');
	}
	
	catch(Exception $e)
	{
		echo 'Erreur:'.$e->getMessage();
    }
	return $bdd;
	
}

function getAllVehicules(){

	$bdd = connexionBDD();

	$sql = 'SELECT * FROM vehicule';

	$reponse = $bdd->query($sql);

	$result = $reponse->fetchAll();

	return $result;
}

function setVehicule($marque,$modele,$couleur,$immatriculation){
	
	$bdd = connexionBDD();

	$sql = "INSERT INTO vehicule(marque,modele,couleur,immatriculation) VALUE ('".$marque."'".",". "'".$modele."'".",". "'".$couleur."'".",". "'".$immatriculation."'".")";

	$reponse = $bdd->exec($sql);

	if($reponse==false)
	{
		echo "les information a pas été ajouté!";
	}
	else
	{
		echo "les information ont bien été ajouté !";
	}
}

function updateVehicule($marque,$modele,$couleur,$immatriculation, $id){
		
	$bdd = connexionBDD();

	$sql = "UPDATE vehicule SET marque ='$marque', modele ='$modele', couleur ='$couleur', immatriculation ='$immatriculation' WHERE id_vehicule=".$id ;

	$reponse = $bdd->exec($sql);
		
		if($reponse==false)
		{
			echo "les information a pas été modifié !";
		}
		else
		{
			echo "les information ont bien été modifié !";
		}
}

function get1Vehicule($id){

	$bdd = connexionBDD();

	$sql = 'SELECT * FROM vehicule WHERE id_vehicule ='.$id;

	$reponse = $bdd->query($sql);

	$result = $reponse->fetch();

	return $result;
}

function deleteVehicule($id){

	$bdd = connexionBDD();

	$sql = 'DELETE FROM vehicule WHERE id_vehicule ='.$id;

	$reponse = $bdd->query($sql);
}

