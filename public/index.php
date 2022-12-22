<?php $page_title = 'Product List'; ?>
<?php include('../private/shared/head.php'); ?>
<body>
  <header>
    <nav>
      <h1>Product List</h1>
      <div id='nav-buttons'>
        <button id='add-product-btn' type='button'>ADD</button>
        <button id='delete-product-btn' type='button'>MASS DELETE</button>
      </div>
    </nav>
  </header>
  <main>
   <div class='product'>
    <input type="checkbox" name="checkbox" class="delete-checkbox">
    <div class='product-info'>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
   </div>
  </main>
<?php include('../private/shared/footer.php'); ?>
</body>
</html>