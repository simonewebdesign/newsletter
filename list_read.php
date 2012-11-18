<?php

include_once 'bootstrap.php';
include_once 'Lista.php';

################################

?><h1><?=READ_LIST?></h1><?php

$n = Lista::read($_GET['id']);

// TODO

?>

Non c'è niente qui.

<p><a href="<?=$cfg['root']?>lists.php"><?=BACK?></a></p>