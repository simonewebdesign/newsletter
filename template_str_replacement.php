<?php

$r = Resource::findByNewsletterId($n->id);

$user_template = $template;
$user_template = str_replace(':from',              $cfg['from'],                $user_template);
$user_template = str_replace(':site_name',         $cfg['site_name'],           $user_template);
$user_template = str_replace(':logo',              $cfg['logo'],                $user_template);
$user_template = str_replace(':address',           $cfg['address'],             $user_template);
$user_template = str_replace(':reply_to',          $cfg['reply_to'],            $user_template);
$user_template = str_replace(':site_url',          $cfg['site_url'],            $user_template);
$user_template = str_replace(':site_full_url',     $cfg['site_full_url'],       $user_template);
$user_template = str_replace(':unsubscribe_url',   $cfg['unsubscribe_url'],     $user_template);
$user_template = str_replace(':creation_date',     date("d/m/Y", strtotime($n->created_at)), $user_template);
$user_template = str_replace(':online_version_url',$cfg['online_version_url'],  $user_template);
$user_template = str_replace(':root',              $cfg['root'],                $user_template);
$user_template = str_replace(':image_path',        $r->path,                    $user_template);

$user_id = isset($u->id) ? $u->id : 0;
$user_template = str_replace(':user_id',           $user_id,                    $user_template);

$newsletter_id = isset($_GET['id']) ? $_GET['id'] : $_GET['newsletter_id'];
$user_template = str_replace(':newsletter_id',     $newsletter_id,              $user_template);
