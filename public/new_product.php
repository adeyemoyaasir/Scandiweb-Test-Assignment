<?php include_once('../private/initialize.php'); ?>
<!-- Have different page title for each page -->
<?php $page_title = 'Product Add'; ?>
<?php include('../private/shared/head.php'); ?>
<body>
  <header>
    <nav>
      <h1>Product Add</h1>
      <div id='form-buttons'>
        <button >Save</button>
        <a href="./index.php">
          <button type='button'>Cancel</button>
        </a>
      </div>
    </nav>
  </header>
  <form action="" id='product_form' method='POST'>
    <label for="sku">SKU</label>
    <input type="text" name="sku" id='sku'>
    <label for="name">Name</label>
    <input type="text" name='name' id='name'>
    <label for="price">Price</label>
    <input type="number" name='price' id='price'>
    <select name="typeSwitcher" id="productType">
      <option value="dvd" id='DVD'>DVD</option>
      <option value="book" id='Book'>Book</option>
      <option value="furniture" id='Furniture'>Furniture</option>
    </select>
    <label for="size">Size (MB)</label>
    <input type="number" name='size' id='size'>
    <label for="weight">Weight (KG)</label>
    <input type="number" name='weight_kg' id='weight'>
    <label for="height">Height (CM)</label>
    <input type="number" name='height' id='height'>
    <label for="width">Width (CM)</label>
    <input type="number" name='width' id='width'>
    <label for="length">Length (CM)</label>
    <input type="number" name='length' id='length'>
  </form>
<?php include('../private/shared/footer.php'); ?>
</body>
</html>