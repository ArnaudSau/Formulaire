<?php

  //Variables pour la requete
  $success = 0;
  $msg = "Une erreur est survenue !";

  //Variables pour la bdd
  $serveur = "localhost";
  $login = "root";
  $pass = "";
  $bdd = new PDO("mysql:host=$serveur;dbname=inscrit",$login,$pass);

  if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['telephone'])){ //Vérifie que ce soit non vide

    //Attributions des valeur des champs auc variables
    $nom = htmlspecialchars(strip_tags($_POST['nom']));
    $prenom = htmlspecialchars(strip_tags($_POST['prenom']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $telephone = htmlspecialchars(strip_tags($_POST['telephone']));

    if(filter_var($email,FILTER_VALIDATE_EMAIL)){ // Vérifie l'email

      // AJOUT BDD
      $requete = $bdd->prepare("INSERT INTO inscrit(nom, prenom, email, telephone) VALUES(?, ?, ?, ?)"); //requete préparé
      $requete->execute(array($nom, $prenom, $email, $telephone));   // execution
      $success = 1;
      $msg = "Vous avez bien été inscrit à l'événement";

    } else {
      $msg = "Adresse email invalide";
    }

  }else {
    $msg = "Veuillez renseigner tous les champs";
  }

  $res = ["success" => $success,"msg" => $msg];
  echo json_encode($res); // Valeur echangé avec le Javascript

 ?>
