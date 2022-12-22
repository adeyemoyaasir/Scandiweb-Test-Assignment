<?php include_once('../private/initialize.php'); ?>
<!-- Have different page title for each page -->
<?php $page_title = 'Product Add'; ?>
<?php include('../private/shared/head.php'); ?>
<body>
  <form action="">
    <select name="typeSwitcher" id="productType">
      <option value="dvd">DVD</option>
      <option value="book">Book</option>
      <option value="furniture">Furniture</option>
    </select>
  </form>
<?php include('../private/shared/footer.php'); ?>
</body>
</html>