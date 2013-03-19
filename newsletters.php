<?php

include_once 'bootstrap.php';
include_once 'Newsletter.php';

#########################

$newsletters = Newsletter::all();

?>

<h1><?=$cfg['site_name']?> <?=NEWSLETTERS?></h1>

<?php include_once 'menu.php'; ?>
    
<?php if ($newsletters) { ?>

<table>
  
  <thead>
    <tr>
      <th>ID</th>
      <th><?=SUBJECT?></th>
      <th><?=CREATED_AT?></th>
      <th><?=UPDATED_AT?></th>
      <th><?=SENT_AT?></th>
      <th colspan=4><?=ACTIONS?></th>
    </tr>
  </thead>
  
  <tbody>
    <?php foreach ($newsletters as $n) { ?>
    <tr>
      <td><?=$n->id?></td>
      <td><?=$n->subject?></td>
      <td><?=date(PHP_DATE, strtotime($n->created_at))?></td>
                  
      <?php if ($n->updated_at == '0000-00-00 00:00:00') { ?>    
      <td><?=NEVER?></td>
      <?php } else { ?>    
      <td><?=date(PHP_DATE, strtotime($n->updated_at))?></td>    
      <?php } ?>
      
      <?php if ($n->sent_at == '0000-00-00 00:00:00') { ?>
      <td><?=NEVER?></td>
      <?php } else { ?>
      <td><?=date(PHP_DATE, strtotime($n->sent_at))?></td>
      <?php } ?>

      <td><a href="<?=$cfg['root']?>newsletter_read.php?id=<?=$n->id?>"><?=READ?></a></td>
      <td><a href="<?=$cfg['root']?>newsletter_update.php?id=<?=$n->id?>"><?=UPDATE?></a></td>
      <td><a href="<?=$cfg['root']?>newsletter_delete.php?id=<?=$n->id?>" class="delete"><?=DELETE?></a></td>
      <td><a href="<?=$cfg['root']?>select_list.php?newsletter_id=<?=$n->id?>" class="send"><?=SEND?></a></td>
    </tr>
    <?php } ?>
  </tbody>
  
  <tfoot>
  </tfoot>

</table>

<?php } else { ?>

<p><?=NO_DATA?></p>

<?php }

include_once "foot.php";
