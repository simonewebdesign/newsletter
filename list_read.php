<?php include_once 'bootstrap.php' ?>

<h1><?=READ ." ". LISTA?></h1>

<?php

$lista = Lista::read($_GET['id']);
$users = User::all_where("list_id={$lista->id}");

?>

<h2><?=$lista->name?> mailing list</h2>
<h4>Creata il <?=date(PHP_DATE, strtotime($lista->created_at))?></h4>

<h3>Elenco dei partecipanti</h3>
<?php include_once '_users_table.php';

include_once "back.php";
include_once "foot.php";
