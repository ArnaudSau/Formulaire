//ASYNCHRONE
document.getElementById("inscription").addEventListener("submit", function(e) {
    e.preventDefault(); // comportement par defaut désactivé

    if(verifForm(this)){ //Vérification du formulaire

      var data = new FormData(this);
      var xhr = new XMLHttpRequest();

      xhr.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){  // Vérification de la requete
          console.log(this.response);
          var res = this.response;
          if (res.success){
            alert(this.response.msg);
            console.log("Utilisateur inscrit !"); // OK
          } else {
            alert(this.response.msg); //message d'erreur provenant du PHP
          }
        }else if (this.readyState == 4){  // Erreur lors de la requete
          alert("Une erreur est survenue !");
        }
      }

      xhr.open("POST","async/script.php",true);  // echange avec script.php en POST
      xhr.responseType = "json"   // force le type de response en json
      xhr.send(data); // envoie les données du formulaire

      return false;
  }
});

//SURLIGNE
function surligne(champ, erreur) // Surligne le champ en rouge si erreur
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}

//***************
// VERIFICATION DES CHAMPS
//***************
function verifNom(champ) // Vérification du champs Nom
{
   if(champ.value.length < 2 || champ.value.length > 25)
   {
      surligne(champ, true); //erreur -> surligne en rouge
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function verifMail(champ) // Vérification du champ mail
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);  //erreur -> surligne en rouge
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function verifPortable(champ)  // Vérification du champ portable
{
  var regex = new RegExp(/^(06|07)[0-9]{8}/gi);

  if(!regex.test(champ.value))
  {
     surligne(champ, true); //erreur -> surligne en rouge
     return false;
  }
  else
  {
     surligne(champ, false);
     return true;
  }
}

function verifForm(f)   //Vérification de tous les champs lors du submit
{
   var nomOk = verifNom(f.nom);
   var prenomOk = verifNom(f.prenom);
//   var mailOk = verifMail(f.email);  Vérif fait par le php
   var portableOk = verifPortable(f.telephone);

   if(nomOk && prenomOk && portableOk)
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}
