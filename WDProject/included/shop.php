<!-- SHOP START -->
<div class="h_container">
  <h1>Products</h1>
</div>
<div class="product_container">

  <div class="row">
    <?php
    // $result = $database->GetProd();
    while ($user_data = mysqli_fetch_array($result)) {
      prodcard($user_data['name'], $user_data['printer_desc'], $user_data['price'], $user_data['img_src'], $user_data['id']);
    }
    ?>
  </div>
</div>
<!-- SHOP END -->