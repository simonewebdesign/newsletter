<?php

include_once 'bootstrap.php';
include_once 'Lista.php';
include_once 'User.php';

################################

?><h1><?=CREATE ." ". LISTA?></h1><?php

include_once '_list_form.php';

if ( isset($_POST['submit']) ) {

  if ( Lista::create($_POST['name']) ) {

    echo SUCCESS;
    $list_id = $db->lastInsertId();
    include 'save_users_in_list.php';

  } else {
    echo FAIL;
  }
}

?><p><a href="javascript:history.back(1)"><?=BACK?></a></p>