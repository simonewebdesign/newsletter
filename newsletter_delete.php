<?php

include_once 'bootstrap.php';
include_once 'Newsletter.php';

################################

?><h1><?=DELETE ." ". NEWSLETTER?></h1><?php

if ( Newsletter::delete($_GET['id']) ) {
  echo SUCCESS;
} else {
  echo FAIL;
}

?>

<p><a href="javascript:history.back(1)"><?=BACK?></a></p>