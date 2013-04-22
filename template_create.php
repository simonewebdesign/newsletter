<?php

include_once 'bootstrap.php';

?><h1><?=CREATE ." ". TEMPLATE?></h1><?php

include_once '_template_form.php';

if ( isset($_POST['submit']) ) {

  if ( Template::create($_POST['name'], $_POST['body']) ) {
    echo SUCCESS;
  } else {
    echo FAIL . " Template non creato.";
  }
}

include_once "back.php";
include_once "foot.php";
