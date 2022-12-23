<?php

namespace MyApp\classes;
use MyApp\classes\Product;

class DVD extends Product {
  static protected $columns = ['id', 'sku', 'name', 'price', 'size'];

  public function save() {
    $attributes = $this->attributes();
    $sql = "INSERT INTO products (";
    $sql .= join(', ', array_keys($attributes));
    $sql .= ") VALUES (";
    $sql .= "'" . $this->sku . "', ";
    $sql .= "'" . $this->name . "', ";
    $sql .= "'" . $this->price . "', ";
    $sql .= "'" . $this->size . "'";
    // $sql .= join("', '", array_values($attributes));
    $sql .= ")";
    $result = self::$database->query($sql);
    if($result) {
      $this->id = self::$database->insert_id;
    }
    return $result;
  }

  public function __construct($args=[]) {
    $this->sku = $args['sku'] ?? '';
    $this->name = $args['name'] ?? '';
    $this->price = $args['price'] ?? '';
    $this->size = $args['size'] ?? '';
  }
}

?>