<?php

include_once 'bootstrap.php';
include_once 'Newsletter.php';
include_once 'Resource.php';
include_once 'Template.php';

################################

?><h1><?=READ ." ". NEWSLETTER?></h1><?php

$n = Newsletter::read($_GET['id']);

include_once 'template_load.php';
include_once 'template_str_replacement.php';

echo $user_template;

?>

<p><a href="javascript:history.back(1)"><?=BACK?></a></p>