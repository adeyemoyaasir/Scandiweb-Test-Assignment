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

// Display errors
function display_errors($errors=[]) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"errors\">";
    $output .= "Errors:";
    $output .= "<ul>";
    foreach($errors as $error) {
      $output .= "<li>" . $error . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

function get_current_inputs() {
  $input_values = ['sku', 'name', 'price'];

  if($_POST['typeSwitcher'] == 'dvd') {
    $input_values[] = 'size';
  }

  if($_POST['typeSwitcher'] == 'book') {
    $input_values[] = 'weight_kg';
  }

  if($_POST['typeSwitcher'] == 'furniture') {
    $input_values[] = 'width';
    $input_values[] = 'length';
    $input_values[] = 'height';
  }

  return $input_values;
}

// Validate inputs
function validate_inputs() {
  $errors = [];
  $inputs = get_current_inputs();

  foreach($inputs as $input) {
    if (empty($_POST[$input])) {  
      $errors[] = "{$input} can't be empty.";
    }
  }

    if(!empty($errors)) {
      return display_errors($errors);
    } else {
      select_instance();
  }
}

// Select a Book/DVD/Furniture instance based on the size/weight/dimension values
function select_instance() {
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
      create_instance($book);
    }

    if ($_POST['size'] != NULL) {
      $dvd = new DVD($args);
      create_instance($dvd);
    }

    if ($_POST['width'] != NULL && $_POST['length'] != NULL && $_POST['height'] != NULL) {
      $furniture = new Furniture($args);
      create_instance($furniture);
    }
  }

  // Create the instances
  function create_instance($obj) {
    $result = $obj->save();
    if ($result === true) {
      header("Location: index.php");
      exit;
    }
  }

  function get_selected_type($type) {
    if(isset($_POST['typeSwitcher']) && $_POST['typeSwitcher'] == $type) {
    echo 'selected';
    }
  }
