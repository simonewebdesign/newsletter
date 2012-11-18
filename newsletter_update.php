<?php

//TODO Buggato: da sistemare.

include_once 'bootstrap.php';
include_once 'Newsletter.php';
include_once 'Resource.php';

################################

?><h1><?=UPDATE_NEWSLETTER?></h1><?php

$n = Newsletter::read($_GET['id']);

  //var_dump($_POST);
  //var_dump($_FILES);
if ( isset($_POST['submit']) ) {
  if ( Newsletter::update($_POST['subject'], $_POST['description']) && 
       Resource::create($_FILES['resource'], $n->id) ) {
    echo SUCCESS;
  } else {
    echo FAIL;
  }
}

$n = Newsletter::read($_GET['id']);
include_once '_newsletter_form.php';

?><p><a href="javascript:history.back(1)"><?=BACK?></a></p>