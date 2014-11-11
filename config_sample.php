<?php
$cfg = array(
  # site settings
  'site_name'           => 'Your Website Name',
  'address'             => 'Your geographic address',

  # paths
  'site_url'            => 'www.example.com',
//  'site_full_url'       => 'http://example.com',
  'site_full_url'       => 'http://localhost', # without a trailing slash
  'site_root'           => '/',
  'root'                => '/newsletter/', # application path
  'logo'                => 'assets/images/header.jpg',
  'unsubscribe_url'     => 'unsubscribe.php',
  'online_version_url'  => 'view.php',

  # mail settings
  'from_name'           => 'Sender name',
  'from'                => 'newsletter@example.com', # mittente (no-reply)

  'reply_to_name'       => 'Recipient name',
  'reply_to'            => 'info@example.com',

  'mail'                => array('username' => 'newsletter@example.com', 'password' => 'secret'),
  'smtp_server'         => array('main' => 'smtp1.example.com', 'backup' => 'smtp2.example.com'),

  /* production database settings
  'hostname'            => '127.0.0.1',
  'dbname'              => 'dbname',
  'username'            => 'root',
  'password'            => '',
  //*/

  //* test database settings
  'hostname'            => 'localhost',
  'port'                => null,
  'dbname'              => 'newsletter',
  'username'            => 'root',
  'password'            => 'toor',
  //*/

  # miscellaneous
  'language'            => 'en',
  'regex'               => '^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$^',
  'limit'               => 300, # limit of emails to send before refreshing the send.php page
  'word_wrap'           => 50,
  'timeout'             => 10000, # refresh timeout, in milliseconds.
  'debug_mode'          => 0, # enables SMTP debug information (2 for testing)
  'smtp_auth'           => true,
  'charset'             => 'utf8',
  'max_allowed_fails'   => 5
);
