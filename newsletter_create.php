<?php

include_once 'bootstrap.php';
include_once 'Newsletter.php';
include_once 'Resource.php';

################################

?><h1><?=CREATE_NEWSLETTER?></h1><?php

include_once '_newsletter_form.php';

if ( isset($_POST['submit']) ) {

  //var_dump($_POST);
  //var_dump($_FILES);

  if ( Newsletter::create($_POST['subject'], $_POST['description'], $_POST['custom_template_html']) 
       && 
       Resource::create($_FILES['resource'], $db->lastInsertId()) 
     ) {
    echo SUCCESS;
  } else {
    echo FAIL;
  }
}

?><p><a href="javascript:history.back(1)"><?=BACK?></a></p>