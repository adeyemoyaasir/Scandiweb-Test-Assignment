<?php

namespace MyApp\classes;

class Product
{
  static protected $database;
  static protected $columns = [];

  // Set the database
  static public function set_database($database)
  {
    self::$database = $database;
  }

  static public function select_all()
  {
    $sql = "SELECT * FROM products ";
    $result = self::$database->query($sql);
    return $result;
  }
}

?>