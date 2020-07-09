<?php
session_start(); // Si on utilise les sessions, important au début de la page (ou dans un include)
if(isset($_POST['pseudo']) && isset($_POST['mdp']))
{
  if(($_POST['pseudo'] != '') && ($_POST['mdp'] != '')) {
    // Récupération du pseudo et mot de passe dans une base de données. Exemple ici en dur évidemment
    // Il est nécessaire d'échapper les caractères spéciaux si besoin ici afin d'éviter une injection SQL dans le contexte SQL.
    if ( $_POST['pseudo'] == 'pseudo' && $_POST['mdp'] == 'mdp' )
    {
      // Créer la session, le cookie ou autre ici
      $_SESSION['connecte']=1;
      $reponse = 'ok';
    }
    else
    {
      $reponse = 'Utilisateur ou mot de passe incorrect !';
    }
  }
  else
  {
    $reponse = 'Des valeurs sont vides';
  }
}
else
{
  $reponse = 'Des valeurs ne sont pas envoyées';
}
echo json_encode(['reponse' => $reponse]);
?> 
