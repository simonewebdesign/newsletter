<?php

include_once 'bootstrap.php';
include_once 'Newsletter.php';
include_once 'Lista.php';

#########################

#$newsletters = Newsletter::all();
$most_active_users_db = $db->query("SELECT
  u.id, u.name, u.email, u.is_active, u.is_subscribed, u.has_received_mail, u.created_at,
  e.id, e.user_id, e.resource_id, e.requested_at, e.ip_address, e.user_agent,
  COUNT(e.id) number_of_entries
  FROM users u 
  LEFT JOIN entries e ON u.id = e.user_id 
  WHERE u.is_active = 1
  GROUP BY u.id
  ORDER BY number_of_entries DESC
  LIMIT 50");
$most_active_users = $most_active_users_db->fetchAll(PDO::FETCH_OBJ);

$browsers_db = $db->query("SELECT user_agent, count(u.id) number_of_users
  FROM entries e
  LEFT JOIN users u ON u.id = e.user_id
  GROUP BY user_agent
  ORDER BY number_of_users DESC");
$browsers = $browsers_db->fetchAll(PDO::FETCH_OBJ);

$lists = Lista::all();
?>

<h1>Statistics</h1>

  <table>
    <thead>
      <tr>
        <th>Lista</th>
        <th>Utenti attivi</th>
        <th>Utenti inattivi</th>
        <th>Totale indirizzi</th>
      </tr>
    </thead>
    <tbody>
<?php foreach ($lists as $list) { ?>
      <tr>
        <td><?=$list->name?></td>
        <td></td>
        <td></td>
        <td></td>        
      </tr>
<?php } ?>
    </tbody>
    <tfoot>
    
    </tfoot>
  </table>
  
  <table><caption>Top 50 most active users</caption>
    <thead>
      <tr>
        <th># Rank</th>
        <th>User email</th>
        <th># of clicks</th>
      </tr>
    </thead>
    <tbody>
<?php $count=0; ?>
<?php foreach ($most_active_users as $user) { ?>
    <tr>
      <td><?=++$count?></td>
      <td><?=$user->email?></td>
      <td><?=$user->number_of_entries?></td> 
    </tr>
<?php } ?>
    </tbody>
  </table>


  <table><caption>Browser usage statistics</caption>
    <thead>
      <tr>
        <th># Rank</th>
        <th>Browser</th>
        <th>Platform</th>
        <th># of users</th>
      </tr>
    </thead>
    <tbody>
<?php $count=0; ?>
<?php foreach ($browsers as $browser) { ?>
<?php $get_browser = get_browser($browser->user_agent, true); ?>
<?php if ($get_browser['browser'] == 'Default Browser') continue; ?>
    <tr>
      <td><?=++$count?></td>
      <td><?=$get_browser['browser']?></td>
      <td><?=$get_browser['platform']?></td>   
      <td><?=$browser->number_of_users?></td> 
    </tr>
<?php } ?>
    </tbody>
  </table>  