<?php

// fetch email addresses and remove duplicates
$emails = Lista::remove_duplicates_from($_POST['email_addresses']);

/* Saves users in the list.
* @param $list_id the ID of the mailing list you want to save the users to.
* @param $emails an array of unique emails.
*
*/
foreach ($emails as $email) {
  if ( !empty($email) && User::findByEmail($email) == false ) { // user doesn't exist yet
    if ( User::create($email) ) {
      echo "<p><b>$email</b> aggiunto con successo alla lista <b>{$_POST['name']}</b>.";
    }
    else {
      // Probabilmente fallisce perche` e` gia` nel db.
      echo "<p>ERRORE durante l'inserimento di <b>$email</b>.";
    }
  }
}
// Setto la list_id all'id della lista corrente, cosi' l'aggiunta e' completa
$update_list_id = $db->prepare("UPDATE users SET list_id = $list_id WHERE list_id <= 0");
$update_list_id->execute();
