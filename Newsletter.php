<?php

class Newsletter {

  static $db; # database PDO instance.

  /* @return bool */
  static function create($subject, $description='', $custom_template_html='') {
    $q = "INSERT INTO newsletters (subject, description, created_at, custom_template_html) VALUES (?,?,?,?)";
    $sql_data = array(
      $subject,
      $description,
      date("Y-m-d H:i:s"), // 2001-03-10 17:16:18 (the MySQL DATETIME format)
      $custom_template_html
    );
    $s = self::$db->prepare($q);
    return $s->execute($sql_data);
  }
  
  /* @return Newsletter object, directly from db */
  static function read($id) {
    if ($id > 0) {
      $q = "SELECT * FROM newsletters WHERE id=?";
      $s = self::$db->prepare($q);
      if ( $s->execute(array($id)) ) {
        return $s->fetchObject();
      }
    }
    return null;
  }
  
  /* @return bool */
  static function update($id, $subject='', $description='') {
    if ($id > 0) {  
      $q = "UPDATE newsletters SET subject=?, description=?, updated_at=? WHERE id=?";   
      $sql_data = array(
        $subject,
        $description,
        date("Y-m-d H:i:s"), // 2001-03-10 17:16:18 (the MySQL DATETIME format)
        $id
      );
      $s = self::$db->prepare($q);
      return $s->execute($sql_data);
    }
    return false;
  }
  
  /* @return bool */
  static function delete($id) {
    if ($id > 0) {  
      $q = "UPDATE newsletters SET is_deleted=1 WHERE id=?";
      $s = self::$db->prepare($q);
      return $s->execute(array($id));
    }
    return false;
  }
  
  /* @return bool */
  static function send($id) {
    if ($id > 0) {
      $q = "UPDATE newsletters SET is_sent=?, sent_at=? WHERE id=?";
      $sql_data = array(
        1,
        date("Y-m-d H:i:s"), // 2001-03-10 17:16:18 (the MySQL DATETIME format)
        $id
      );
      $s = self::$db->prepare($q);
      return $s->execute($sql_data);
    }
    return false;
  }
  
  /* @return Newsletter object, directly from db */
  static function all() {
    $s = self::$db->query("SELECT * FROM newsletters WHERE is_deleted <= 0");
    return $s->fetchAll(PDO::FETCH_OBJ);
  }

}

/***** INITIALIZATION *****/
Newsletter::$db = $db;