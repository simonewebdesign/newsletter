<?php

include_once 'bootstrap.php';

$templates = Template::all();

?>

<h1><?=$cfg['site_name']?> <?=TEMPLATES?></h1>

<?php include_once 'menu.php'; ?>
    
<?php if ($templates) {

include_once '_templates_table.php';

} else { ?>

<p><?=NO_DATA?></p>

<?php } ?>

<a href="<?=$cfg['root']?>template_create.php"><?=CREATE ." ". TEMPLATE?></a>

<?php include_once 'foot.php';
