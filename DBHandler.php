<?php

class DBHandler {

  public static $db;
 
  public static function init($db) {
    self::$db = $db;
  }
}
