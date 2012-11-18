<?php

include_once 'bootstrap.php';
include_once 'Newsletter.php';
include_once 'Resource.php';

################################

?><h1><?=READ_NEWSLETTER?></h1><?php

$n = Newsletter::read($_GET['id']);

$template = file_get_contents('template.html');

include_once 'template_str_replacement.php';

echo $user_template;

?>

<p><a href="javascript:history.back(1)"><?=BACK?></a></p>