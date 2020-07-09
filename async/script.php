<?php
//  echo json_encode($_POST);
  $success = 0;
  $msg = "Une erreur est survenue !";

  if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['telephone'])){
    $nom = htmlspecialchars(strip_tags($_POST['nom']));
    $prenom = htmlspecialchars(strip_tags($_POST['prenom']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $telephone = htmlspecialchars(strip_tags($_POST['telephone']));

    if(filter_var($email,FILTER_VALIDATE_EMAIL)){

      // Ajout bdd
      $success = 1;
      $msg = "Succes";

    } else {
      $msg = "Adresse email invalide";
    }

  }else {
    $msg = "Veuillez renseigner tous les champs";
  }

  $res = ["success" => $success,"msg" => $msg];
  echo json_encode($res);
  
 ?>