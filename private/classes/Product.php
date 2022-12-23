<?php

namespace MyApp\classes;

class Product
{
  // ----- START OF ACTIVE RECORD CODE ------
  static protected $database;
  static protected $columns = [];

  static public function set_database($database) {
    self::$database = $database;
  }

  static public function find_by_sql($sql) {
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed.");
    }

    // results into objects
    $object_array = [];
    while($record = $result->fetch_assoc()) {
      $object_array[] = self::instantiate($record);
    }

    $result->free();

    return $object_array;
  }

  static public function select_all() {
    $sql = "SELECT * FROM products";
    return self::find_by_sql($sql);
  }

  static protected function instantiate($record) {
    $object = new self;
    foreach($record as $property => $value) {
      if(property_exists($object, $property)) {
        $object->$property = $value;
      }
    }
    return $object;
  }

  // public function save() {
  //   $attributes = $this->attributes();
  //   $sql = "INSERT INTO products (";
  //   $sql .= join(', ', array_keys($attributes));
  //   $sql .= ") VALUES (";
  //   $sql .= "'" . $this->sku . "', ";
  //   $sql .= "'" . $this->name . "', ";
  //   $sql .= "'" . $this->price . "', ";
  //   $sql .= "'" . $this->size . "'";
  //   // $sql .= join("', '", array_values($attributes));
  //   $sql .= ")";
  //   $result = self::$database->query($sql);
  //   if($result) {
  //     $this->id = self::$database->insert_id;
  //   }
  //   return $result;
  // }

  public function attributes()
  {
    $attributes = [];
    foreach (static::$columns as $column) {
      if ($column == 'id') {
        continue;
      }
      $attributes[$column] = $this->$column;
    }
    return $attributes;
  }

  // protected function sanitized_attributes()
  // {
  //   $sanitized = [];
  //   foreach ($this->attributes() as $key => $value) {
  //     $sanitized[$key] = self::$database->escape_string($value);
  //   }
  //   return $sanitized;
  // }

  // ----- END OF ACTIVE RECORD CODE ------

  public $id;
  public $sku;
  public $name;
  public $price = 0.0;
  public $weight_kg = 0.0;
  public $size = 0;
  public $width = 0;
  public $length = 0;
  public $height = 0;
  public $dimensions;

  // public function __construct($args=[]) {
  //   $this->sku = $args['sku'] ?? '';
  //   $this->name = $args['name'] ?? '';
  //   $this->price = $args['price'] ?? '';
  //   $this->size = $args['size'] ?? '';
  // }
}

?>