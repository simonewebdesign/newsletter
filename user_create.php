<?php

include_once 'bootstrap.php';
include_once 'User.php';
include_once 'Lista.php';

################################

$lists = Lista::all();

?><h1><?=CREATE ." ". USER?></h1><?php

include_once '_user_form.php';

if ( isset($_POST['submit']) ) {
  if ( User::create($_POST['email'], $_POST['name'], $_POST['list_id']) ) {
    echo SUCCESS;
  } else {
    echo FAIL . " L'Utente non e' stato creato (Probabilmente esiste gia').";
  } 
}


include_once "back.php";
include_once "foot.php";
