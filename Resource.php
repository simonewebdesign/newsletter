<?php

class Resource extends DBHandler {

  private static function upload($file) {
    
    $upload_folder_name = 'uploads';
    
    // Uploading image in the specified folder
    if ( $file['size'] > 1048576 ) {
      die('error image too large');
    } else {
      // Ottengo le informazioni sull'immagine
      list($width, $height, $type, $attr) = getimagesize($file['tmp_name']);
      // TODO aggiungere controllo sulla grandezza dell'immagine
      // Controllo che il file sia in uno dei formati GIF, JPG o PNG
      // Chiaramente deve essere diverso da tutti questi 3 formati contemporaneamente per dare errore
      if ( ($type!=1) && ($type!=2) && ($type!=3) ) {
        die("L'immagine non è stata caricata poiché non è in un formato accettabile (GIF, JPG, PNG)");
      } else {
        // stabilisco l'estensione del nome del file da salvare
        if ($type == 1)
          $ext = ".gif";
        if ($type == 2)
          $ext = ".jpg";
        if ($type == 3)
          $ext = ".png";
        // L'immagine è perfetta per essere caricata così com'è sul server.
        $upload_path = $upload_folder_name . '/' . uniqid() . $ext;
        // Procedo con l'upload
        if ( !move_uploaded_file($file['tmp_name'], $upload_path) ) {
          die("È avvenuto un errore durante l'upload dell'immagine.");
        } else {
          return $upload_path;
        }
      }
    }
  }
  
  static function create($file, $newsletter_id) {
    if ( is_uploaded_file($file['tmp_name']) && $newsletter_id > 0 ) {
      
      $upload_path = self::upload($file);
      
      // Inserting resource into database
      $q = "INSERT INTO resources (mime_type, path, created_at, newsletter_id) VALUES (?,?,NOW(),?)";

      $sql_data = array(
        $file['type'], // TODO qui c'è da modificare il path per far funzionare il tracciamento.
        $upload_path,
        $newsletter_id
      );
      
      $s = self::$db->prepare($q);
      return $s->execute($sql_data);
    }
    return false;
  }

  static function read() {
    return false;
  }
/*
  static function update($id, $file, $newsletter_id) {
    if ( $id > 0 && is_uploaded_file($file['tmp_name']) && $newsletter_id > 0 ) {
      
      $upload_path = self::upload($file);
      
      // Inserting resource into database
      $q = "UPDATE resources SET mime_type";
      $q = "INSERT INTO resources (mime_type, path, created_at, newsletter_id) VALUES (?,?,?,?)";

      $sql_data = array(
        $file['type'], // TODO qui c'è da modificare il path per far funzionare il tracciamento.
        $upload_path,
        date("Y-m-d H:i:s"), // 2001-03-10 17:16:18 (the MySQL DATETIME format)
        $newsletter_id
      );
      
      $s = self::$db->prepare($q);
      return $s->execute($sql_data);
    }
    return false;
  }
*/
  static function delete() {
    return false;
  }
  
  static function findByNewsletterId($id) {
    if ($id > 0) {
      $q = "SELECT * FROM resources WHERE newsletter_id=?";
      $s = self::$db->prepare($q);
      if ( $s->execute(array($id)) ) {
        return $s->fetchObject();
      }
    }
    
    return false;
  }

}
