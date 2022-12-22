<?php

 use MyApp\classes\Product;

 include_once('../private/initialize.php'); 
 
 ?>
 <!-- Have different page title for each page -->
<?php $page_title = 'Product List'; ?>
<?php include('../private/shared/head.php'); ?>
<body>
  <header>
    <nav>
      <h1>Product List</h1>
      <div id='nav-buttons'>
       <a href="./new_product.php"><button id='add-product-btn' type='button'>ADD</button></a> 
        <button id='delete-product-btn' type='button'>MASS DELETE</button>
      </div>
    </nav>
  </header>
  <main>
  <!-- Get all the products from the database and display them -->
  <?php $products = Product::select_all(); ?>
  <?php foreach ($products as $product) { ?>
   <div class='product'>
    <input type="checkbox" name="checkbox" class="delete-checkbox">
    <div class='product-info'>
      <span><?= $product['sku']; ?></span>
      <span><?= $product['name']; ?></span>
      <span><?= $product['price']; ?></span>
      <span><?php
        echo $product['weight_kg'] != 0 ? "Weight: " . $product['weight_kg'] . "KG" : '';

        echo $product['size'] != 0 ?  "Size: " . $product['size'] . "MB" : '';

        echo $product['dimensions'] != '0' ? 
        "Dimension: " . extract_from_database_array($product['dimensions']): '';
       ?>
       </span>
    </div>
   </div>
   <?php }; ?>
  </main>
<?php include('../private/shared/footer.php'); ?>
</body>
</html>