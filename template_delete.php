<?php

include_once 'bootstrap.php';
include_once 'Template.php';

################################

?><h1><?=DELETE ." ". TEMPLATE?></h1><?php

if ( Template::delete($_GET['id']) ) {
  echo SUCCESS;
} else {
  echo FAIL;
}

?>

<p><a href="javascript:history.back(1)"><?=BACK?></a></p>