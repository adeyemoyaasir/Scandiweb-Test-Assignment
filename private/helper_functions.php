<?php

use MyApp\classes\Book;
use MyApp\classes\DVD;
use MyApp\classes\Furniture;

// The furniture dimensions in the database are set in this format: '[number, number, number]'.
// With the helper function I remove the square brackets and converting it to a string format: e.g.: 12x23x45
function extract_from_database_array($string) {
  $arr = ['[', ']'];
  $replaced_string = str_replace($arr, ' ', $string);
  $new_array = explode(', ', $replaced_string);
  $new_string = implode('x', $new_array);
  return $new_string;
}

function create_instance_by_type() {

  $args = [];
  $args['sku'] = $_POST['sku'] ?? NULL;
  $args['name'] = $_POST['name'] ?? NULL;
  $args['price'] = $_POST['price'] ?? NULL;
  $args['weight_kg'] = $_POST['weight_kg'] ?? NULL;
  $args['size'] = $_POST['size'] ?? NULL;
  $args['width'] = $_POST['width'] ?? NULL;
  $args['length'] = $_POST['length'] ?? NULL;
  $args['height'] = $_POST['height'] ?? NULL;

  if ($_POST['weight_kg'] != NULL) {
    $book = new Book($args);
    $result = $book->save();

    if ($result === true) {
      header("Location: index.php");
      exit;
    }
  }

  if ($_POST['size'] != NULL) {
    $dvd = new DVD($args);
    $result = $dvd->save();

    if ($result === true) {
      header("Location: index.php");
      exit;
    }
  }

  if ($_POST['width'] != NULL && $_POST['length'] != NULL && $_POST['height'] != NULL) {
    $furniture = new Furniture($args);
    $result = $furniture->save();

    if ($result === true) {
      header("Location: index.php");
      exit;
    }
  }
}
