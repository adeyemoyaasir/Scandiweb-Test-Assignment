<?php include_once('../private/initialize.php'); ?>

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
  <?php
     
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo validate_inputs();
      } 
  ?>
  <form action="" id='product_form' method='POST'>
    <label for="sku">SKU</label>
    <input type="text" name="sku" id='sku' maxlength='9' placeholder="VKR12345" value="<?= $_POST['sku'] ?? '';  ?>">
    <label for="name">Name</label>
    <input type="text" name='name' id='name' maxlength="30" placeholder='Product name' value="<?= $_POST['name'] ?? ''; ?>">
    <label for="price">Price ($)</label>
    <input type="text" name='price' id='price' placeholder="0.0" value="<?= $_POST['price'] ?? ''; ?>">
    <label for="productType">Type Switcher</label>
    <select name="typeSwitcher" id="productType">
      <option value="dvd" id='DVD' <?= get_selected_type('dvd'); ?> >DVD</option>
      <option value="book" id='Book' <?= get_selected_type('book'); ?> >Book</option>
      <option value="furniture" id='Furniture' <?= get_selected_type('furniture'); ?> >Furniture</option>
    </select>
    <div id='size-container'>
      <p>Please provide a size in megabyte (MB).</p>
      <label for="size">Size (MB)</label>
      <input type="text" name='size' id='size' placeholder='0' maxlength='5' value="<?= $_POST['size'] ?? ''; ?>">
    </div>
    <div id='weight-container'>
      <p>Please provide a weight in kilograms (KG).</p>
      <label for="weight">Weight (KG)</label>
      <input type="text" name='weight_kg' id='weight' placeholder='0.0' maxlength='3' value="<?= $_POST['weight_kg'] ?? ''; ?>">
    </div>
    <div id='dimensions-container'>
      <p>Please provide dimensions in HxWxL (height/width/length) format.</p>
      <label for="height">Height (CM)</label>
      <input type="text" name='height' id='height' placeholder='0' maxlength='5' value="<?= $_POST['height'] ?? ''; ?>">
      <label for="width">Width (CM)</label>
      <input type="text" name='width' id='width' placeholder='0' maxlength='5' value="<?= $_POST['width'] ?? ''; ?>">
      <label for="length">Length (CM)</label>
      <input type="text" name='length' id='length' placeholder='0' maxlength='5' value="<?= $_POST['length'] ?? ''; ?>">
    </div>
  </form>
<?php include('../private/shared/footer.php'); ?>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>
<script src='./script.js'></script>
</body>
</html>