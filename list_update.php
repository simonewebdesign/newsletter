<?php

include_once 'bootstrap.php';
include_once 'Lista.php';

################################

?><h1><?=UPDATE_LIST?></h1><?php

$l = Lista::read($_GET['id']);

if (isset($_POST['submit'])) {
  if ( Lista::update($_POST['name']) ) {
    echo SUCCESS;
  } else {
    echo FAIL;
  }
}

$l = Lista::read($_GET['id']);
include_once '_list_form.php';

?><p><a href="<?=$cfg['root']?>lists.php"><?=BACK?></a></p>