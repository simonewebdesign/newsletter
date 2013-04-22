<?php include_once 'bootstrap.php';

$newsletters = Newsletter::all();

?>

<h1><?=$cfg['site_name']?> <?=NEWSLETTERS?></h1>

<?php include_once 'menu.php'; ?>
    
<?php if ($newsletters) {

include_once '_newsletters_table.php';

} else { ?>

<p><?=NO_DATA?></p>

<?php } ?>

<a href="<?=$cfg['root']?>newsletter_create.php"><?=CREATE ." ". NEWSLETTER?></a>

<?php include_once 'foot.php';
