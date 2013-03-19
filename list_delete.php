<?php

include_once 'bootstrap.php';
include_once 'Lista.php';

################################

?><h1><?=DELETE ." ". LISTA?></h1><?php

if ( Lista::delete($_GET['id']) ) {
  echo SUCCESS;
} else {
  echo FAIL;
}

?>

<p><a href="<?=$cfg['root']?>lists.php"><?=BACK?></a></p>