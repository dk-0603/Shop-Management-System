<?php require  'partials/head.php' ?>
<?php require  'partials/header.php' ?>





<div class="main-container">

  <?php require  'partials/sidebar.php' ?>
  <div class="container">
    <?php require  'partials/controlButtons.php' ?>

    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>

        <form id="productForm" action="/insertproduct" method="post" enctype="multipart/form-data">
          <label for="productName">Product Name:</label>
          <input type="text" id="productName" name="productName" required><br>

          <label for="brand">Brand:</label>
          <input type="text" id="brand" name="brand"><br>

          <label for="category">Category:</label>
          <input type="text" id="category" name="category"><br>

          <label for="size">Size:</label>
          <input type="text" id="size" name="size"><br>

          <label for="color">Color:</label>
          <input type="text" id="color" name="color"><br>

          <label for="price">Price:</label>
          <input type="number" id="price" name="price" step="0.01" required><br>

          <label for="quantityInStock">Quantity in Stock:</label>
          <input type="number" id="quantityInStock" name="quantityInStock" required><br>

          <label for="supplier">Supplier:</label>
          <input type="text" id="supplier" name="supplier"><br>

          <label for="dateAdded">Date Added:</label>
          <input type="date" id="dateAdded" name="dateAdded"><br>

          <label for="productImage">Product Images:</label>
          <input type="file" name="images[]" id="images" accept="image/*" multiple required>

          <input type="submit" value="Add Product">

        </form>
      </div>
    </div>

    <div id="updateModal" class="modal">
      <div class="modal-content">
        <form id="updateForm" method="post" action="/update-product">
          <label for="productName">Product Name:</label>
          <input type="text" id="productName" name="productName" required>
          <!-- Add other fields as needed -->
          <input type="hidden" id="updateProductId" name="productId" value="">
          <button type="submit" class="btn btn-update">Save Changes</button>
        </form>
        <button onclick="closeUpdateModal()" class="btn btn-delete">Cancel</button>
      </div>
    </div>



    <div class="content">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Size</th>
            <th>Color</th>
            <th>Price</th>
            <th>Quantity in Stock</th>
            <th>Supplier</th>
            <th>Date Added</th>

            <?php if($_SESSION['isAdmin']) : ?>   <th class="actions">Actions</th>    <?php endif; ?>
          </tr>
        </thead>
        <tbody>
          <?php
          // Assuming $products is an array containing Product objects fetched from the database
          foreach ($products as $product) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($product->getId()) . "</td>";
            echo "<td>" . htmlspecialchars($product->getName()) . "</td>";
            echo "<td>" . htmlspecialchars($product->getBrand()) . "</td>";
            echo "<td>" . htmlspecialchars($product->getCategory()) . "</td>";
            echo "<td>" . htmlspecialchars($product->getSize()) . "</td>";
            echo "<td>" . htmlspecialchars($product->getColor()) . "</td>";
            echo "<td>" . htmlspecialchars($product->getPrice()) . "</td>";
            echo "<td>" . htmlspecialchars($product->getQuantityInStock()) . "</td>";
            echo "<td>" . htmlspecialchars($product->getSupplier()) . "</td>";
            echo "<td>" . htmlspecialchars($product->getDateAdded()) . "</td>";
            if($_SESSION['isAdmin']){
            echo '<td class="actions">
                    <button onclick="openUpdateModal(' . $product->getId() . ')" class="btn btn-update">Update</button>
                    <form method="post" action="/delete-product" onsubmit="return confirmDelete()">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="productId" value="' . $product->getId() . '">
                        <button type="submit" class="btn btn-delete">Delete</button>
                    </form>
                </td>'; };
            echo "</tr>";
          }
          ?>



          <!-- Add more data rows with buttons as needed -->
        </tbody>
      </table>
    </div>

  </div>
</div>
<script src="/Assets/js/insertmenu.js"></script>
<script src="/Assets/js/viewmenu.js"></script>
<footer></footer>
</body>

</html>