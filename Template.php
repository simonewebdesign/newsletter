<?php

class Template extends DBHandler {

  /* @return bool true on success, false on failure. */
  static function create($name, $body) {
    $q = "INSERT INTO templates (name, body, created_at) VALUES (?,?,?)";
    $sql_data = array(
      $name,
      $body,
      date("Y-m-d H:i:s")
    );
    $s = self::$db->prepare($q);
    return $s->execute($sql_data);
  }
  
  /* @return Template object, directly from db. Null if not found. */
  static function read($id) {
    $q = "SELECT * FROM templates WHERE id=?";
    $s = self::$db->prepare($q);
    if ( $s->execute(array($id)) ) {
      return $s->fetchObject();
    }
    return null;
  }
  
  /* @return bool true on success, false on failure. */
  static function update($id, $name, $body) {
    if ($id > 0) {  
      $q = "UPDATE templates SET name=?, body=?, updated_at=? WHERE id=?";   
      $sql_data = array(
        $name,
        $body,
        date("Y-m-d H:i:s"),
        $id
      );
      $s = self::$db->prepare($q);
      return $s->execute($sql_data);
    }
    return false;
  }
  
  /* @return bool true on success, false on failure. */
  static function delete($id) {
    if ($id > 0) {  
      $q = "UPDATE templates SET is_deleted=1 WHERE id=?";
      $s = self::$db->prepare($q);
      return $s->execute(array($id));
    }
    return false;
  }
  
  /* @return array containing all the templates */
  static function all() {
    $s = self::$db->query("SELECT * FROM templates WHERE is_deleted=0");
    return $s->fetchAll(PDO::FETCH_OBJ);
  }

}
