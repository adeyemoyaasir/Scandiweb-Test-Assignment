<?php include_once('../private/initialize.php'); ?>
<?php

use MyApp\classes\DVD;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  create_instance_by_type();
  // $args = [];
  // $args['sku'] = $_POST['sku'] ?? NULL;
  // $args['name'] = $_POST['name'] ?? NULL;
  // $args['price'] = $_POST['price'] ?? NULL;
  // $args['weight_kg'] = $_POST['weight_kg'] ?? NULL;
  // $args['size'] = $_POST['size'] ?? NULL;
  // $args['width'] = $_POST['width'] ?? NULL;
  // $args['length'] = $_POST['length'] ?? NULL;
  // $args['height'] = $_POST['height'] ?? NULL;

  // $book = new DVD($args);
  // $result = $book->save();

  // if ($result === true) {
  //   header("Location: index.php");
  //   exit;
  // }
} else {
  $book = [];
}

?>
<!-- Have different page title for each page -->
<?php $page_title = 'Product Add'; ?>
<?php include('../private/shared/head.php'); ?>
<body>
  <header>
    <nav>
      <h1>Product Add</h1>
      <div id='form-buttons'>
        <button id="submit" type="submit" form='product_form' >Save</button>
        <a href="./index.php">
          <button type='button'>Cancel</button>
        </a>
      </div>
    </nav>
  </header>
  <form action="" id='product_form' method='POST'>
    <label for="sku">SKU</label>
    <input type="text" name="sku" id='sku' placeholder="VKR12345">
    <label for="name">Name</label>
    <input type="text" name='name' id='name' placeholder='Product name'>
    <label for="price">Price ($)</label>
    <input type="number" name='price' id='price' placeholder="0.0">
    <label for="productType">Type Switcher</label>
    <select name="typeSwitcher" id="productType">
      <option value="dvd" id='DVD'>DVD</option>
      <option value="book" id='Book'>Book</option>
      <option value="furniture" id='Furniture'>Furniture</option>
    </select>
    <div id='size-container'>
      <p>Please provide a size in megabyte (MB).</p>
      <label for="size">Size (MB)</label>
      <input type="number" name='size' id='size' placeholder='0'>
    </div>
    <div id='weight-container'>
      <p>Please provide a weight in kilograms (KG).</p>
      <label for="weight">Weight (KG)</label>
      <input type="number" name='weight_kg' id='weight' placeholder='0.0'>
    </div>
    <div id='dimensions-container'>
      <p>Please provide dimensions in HxWxL (height/width/length) format.</p>
      <label for="height">Height (CM)</label>
      <input type="number" name='height' id='height' placeholder='0'>
      <label for="width">Width (CM)</label>
      <input type="number" name='width' id='width' placeholder='0'>
      <label for="length">Length (CM)</label>
      <input type="number" name='length' id='length' placeholder='0'>
    </div>
  </form>
<?php include('../private/shared/footer.php'); ?>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>
<script src='./script.js'></script>
</body>
</html>