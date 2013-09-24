<?php

class Newsletter extends DBHandler {

  /* @return bool */
  static function create($subject, $template_id) {
    $q = "INSERT INTO newsletters (subject, template_id, created_at) VALUES (?,?,NOW())";
    $sql_data = array($subject, $template_id);
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
  static function update($id, $subject, $template_id) {
    if ($id > 0) {  
      $q = "UPDATE newsletters SET subject=?, template_id=?, updated_at=NOW() WHERE id=?";   
      $sql_data = array($subject, $template_id, $id);
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
      $q = "UPDATE newsletters SET is_sent=?, sent_at=NOW() WHERE id=?";
      $sql_data = array(1, $id);
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
