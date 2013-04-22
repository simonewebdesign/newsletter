<?php

class User {
  
  static function create($email, $name='', $list_id=0) {
    $q = "INSERT INTO users (name, email, created_at, list_id) VALUES (?,?,?,?)";
    $sql_data = array(
      $name,
      $email,
      date("Y-m-d H:i:s"), // 2001-03-10 17:16:18 (the MySQL DATETIME format)
      $list_id
    );
    $s = self::$db->prepare($q);
    return $s->execute($sql_data);
  }
  
  static function read($id) {
    if ($id > 0) {
      $q = "SELECT * FROM users WHERE id=?";
      $s = self::$db->prepare($q);
      if ( $s->execute(array($id)) ) {
        return $s->fetchObject();
      }
    }
    return false;
  }
  
  static function update($id, $email='', $name='', $list_id=0) {
    if ($id > 0 && $list_id > 0) {
      $q = "UPDATE users SET email=?, name=?, updated_at=?, list_id=? WHERE id=?";   
      $sql_data = array(
        $email,
        $name,
        date("Y-m-d H:i:s"), // 2001-03-10 17:16:18 (the MySQL DATETIME format)
        $list_id,
        $id
      );
      $s = self::$db->prepare($q);
      return $s->execute($sql_data);
    }
    return false;
  }
  
  static function delete($id) {
    if ($id > 0) {  
      $q = "UPDATE users SET is_active=0 WHERE id=?";
      $s = self::$db->prepare($q);
      return $s->execute(array($id));
    }
    return false;
  }
  
  static function setMailAsReceived($id) {
    if ($id > 0) {
      $q = "UPDATE users SET has_received_mail=1 WHERE id=?";
      $s = self::$db->prepare($q);
      return $s->execute(array($id));
    }
    return false;
  }
  
  static function resetFetch() {
    return self::$db->exec("UPDATE users SET has_received_mail=0, fails=0");
  }

  static function all($limit=0) {
    $q = "SELECT * FROM users WHERE is_active >= 1";
    if ( !empty($limit) && is_numeric($limit) ) {
      $q .= " LIMIT $limit";
    }
    $s = self::$db->query($q);
    return $s->fetchAll(PDO::FETCH_OBJ);
  }

  static function all_where($condition, $limit=0) {
    $q = "SELECT * FROM users WHERE is_active >= 1 AND $condition";
    if ( !empty($limit) && is_numeric($limit) ) {
      $q .= " LIMIT $limit";
    }
    $s = self::$db->query($q);
    return $s->fetchAll(PDO::FETCH_OBJ);
  }

  /* @return bool */
  static function unsubscribe($id) {
    if ($id > 0) {
      $s = self::$db->prepare("UPDATE users SET is_subscribed=0 WHERE id=?");
      return $s->execute(array($id));
    }
    return false;
  }
  
  /* @return the record from db, false otherwise. */
  static function findByEmail($email) {
    if (!empty($email)) {
      $s = self::$db->prepare("SELECT * FROM users WHERE email=?");
      if ( $s->execute(array($email)) ) {
        return $s->fetchObject();
      }
    }
    return false;
  }

  /* questo metodo recupera tutti gli users a cui non è ancora stata spedita la newsletter, in una determinata mailing list. 
  @return array of users on success, false otherwhise.
  */
  static function toBeSent($limit, $list_id) {
  
    $q = "SELECT u.id, u.name, u.email,	u.is_active, u.is_subscribed, u.has_received_mail, u.created_at, u.updated_at, u.last_seen_at FROM users AS u INNER JOIN lists ON lists.id = u.list_id WHERE is_active >= 1 AND is_subscribed >= 1 AND has_received_mail <= 0 AND lists.id=?";
    
    if ( !empty($limit) && is_numeric($limit) ) {
      $q .= " LIMIT $limit";
    }
    
    $s = self::$db->prepare($q);
    if ( $s->execute(array($list_id)) ) {
      return $s->fetchAll(PDO::FETCH_OBJ);
    }
  }

  static function increment_fails($id) {
    if ($id > 0) {
      $q = "UPDATE `users` SET `fails`=`fails`+1 WHERE `id`=?";
      $s = self::$db->prepare($q);
      return $s->execute(array($id));
    }
    return false;
  }

  static function get_invalid_ones_by_list_id($list_id, $max_allowed_fails=5){
    if ($list_id > 0) {
      $q = "SELECT * from `users` WHERE `list_id`=? AND `fails`>=?";
      $s = self::$db->prepare($q);
      if ( $s->execute(array($list_id, $max_allowed_fails)) ){
        return $s->fetchAll(PDO::FETCH_OBJ);
      }
    }
    return false;
  }
  
}
