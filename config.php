<?php
$cfg = array(
  # site settings
  'site_name'           => 'Your Website name here',
  'address'             => 'Your geographic address',
  
  # paths
  'site_url'            => 'www.example.com',
//  'site_full_url'       => 'http://playpc.it',
  'site_full_url'       => 'http://localhost',
  'site_root'           => '/',
  'root'                => '/newsletter/',        # application path  
  'logo'                => 'assets/images/header.jpg',  
  'unsubscribe_url'     => 'unsubscribe.php',
  'online_version_url'  => 'view.php',

  # mail settings
  'from_name'           => 'Sender name here',  
  'from'                => 'sender@email.here',       # mittente (no-reply)
  
  'reply_to_name'       => 'Recipient name here',
  'reply_to'            => 'recipient@email.here',
  
  'mail'                => array('username' => 'sender@email.here', 'password' => 'secret'),
  'smtp_server'         => array('main' => 'smtp.example.com', 'backup' => 'smtp2.example.com'),
  
  /* production database settings
  'hostname'            => '127.0.0.1',
  'dbname'              => 'dbname',
  'username'            => 'root',
  'password'            => '',
  //*/
  
  //* test database settings
  'hostname'            => 'localhost',
  'dbname'              => 'newsletter',
  'username'            => 'root',
  'password'            => '',
  //*/
  
  # miscellaneous
  'language'            => 'it',  
  'regex'               => '^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$^',
  'limit'               => 100,          # limit of emails to send before refreshing the send.php page
  'word_wrap'           => 50,
  'timeout'             => 10000,        # refresh timeout, in milliseconds.
  'debug_mode'          => 0,            # enables SMTP debug information (2 for testing)
  'smtp_auth'           => true,
  'charset'             => 'UTF-8'
);