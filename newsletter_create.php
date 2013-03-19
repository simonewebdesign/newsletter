<?php

include_once 'bootstrap.php';
include_once 'Newsletter.php';
include_once 'Resource.php';
include_once 'Template.php';

################################

?><h1><?=CREATE ." ". NEWSLETTER?></h1><?php

include_once '_newsletter_form.php';

if ( isset($_POST['submit']) ) {

  if ( Newsletter::create($_POST['subject'], $_POST['template_id']) && 
       Resource::create($_FILES['resource'], $db->lastInsertId()) ) {
    echo SUCCESS;
  } else {
    echo FAIL;
  }
}


include_once "back.php";
include_once "foot.php";
