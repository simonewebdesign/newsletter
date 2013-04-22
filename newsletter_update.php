<?php include_once 'bootstrap.php' ?>

<h1><?=UPDATE ." ". NEWSLETTER?></h1>

<?php

$n = Newsletter::read($_GET['id']);

if ( isset($_POST['submit']) ) {
  if ( Newsletter::update($_GET['id'], $_POST['subject'], $_POST['template_id']) ) {
    echo SUCCESS . " Dati della newsletter aggiornati. ";
    if ( Resource::create($_FILES['resource'], $n->id) ) {
      echo "Nuova immagine aggiunta con successo.";
    } else {
      echo "Immagine non aggiornata.";
    }
  } else {
    echo FAIL . " I dati della newsletter non sono stati aggiornati.";
  }
}

$n = Newsletter::read($_GET['id']);
include_once '_newsletter_form.php';

include_once "back.php";
include_once "foot.php";
