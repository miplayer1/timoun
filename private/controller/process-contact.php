<?php

  // initialisation variables
  $feedback = "";

  // si le formulaire a bien été transmis
  if (isset($_POST['send']))
  {
    // récupération des inputs du formulaire
    $nom        = trim($_POST['nom']);
    $courriel   = trim($_POST['courriel']);
    $objet      = trim($_POST['objet']);
    $message    = $_POST['message'];
    $newsletter = $_POST['newsletter'];
  }

   // vérification de la validité des inputs
  if (($nom !== "") && ($courriel !== "") && ($objet !== "") && ($message !== ""))
  {
    // vérification format courriel
    if (filter_var($courriel, FILTER_VALIDATE_EMAIL))
    {
      $message = wordwrap($message, 70);
      
      // construction du mail.  A tester sur serveur local
      // construction destinataire et objet
      $to = 'timounasso@gmail.com';
      $subject = "$nom vous a envoyé un message via le formulaire de contact de votre site.";
      
      // construction du message
      $msg  = "Nom: $nom\r\n";
      $msg .= "Email: $courriel\r\n";
      $msg .= "Message: \r\n$message\r\n\r\n";
      
      // vérification inscription à la newsletter
      if (isset($_POST['newsletter']) && $_POST['newsletter'] == 'subscribe')
      {
        $msg .= "Inscrivez moi à la newsletter avec l'adresse $courriel\r\n\r\n";
      }
      
      //echo $msg;
      
      // construction du header
      $headers  = "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
      $headers .= "From: $nom <$courriel>\r\n";
      $headers .= "X-Priority: 1\r\n";
      $headers .= "X-MSMail-Priority: High\r\n\r\n";
      
      // envoi du mail
      mail($to, $subject, $msg, $headers);
      
      // simulation envoi de mail par écriture dans un fichier texte
      //file_put_contents('mail.txt', $msg, FILE_APPEND);
      
      $feedback = "Votre demande a bien été envoyée $nom, nous vous contactons au plus vite";
      
    }
    else
    {
      // feedback courriel invalide
      $feedback = "Vérifiez votre courriel";
    }
  }
  else
  {
    // feedback formulaire incomplet
    $feedback = "Une ou plusieurs informations manquantes";
  }
?>