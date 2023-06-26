<?php


//HELLOW PARGOL, 
//Please excuse the file title, it started out as a simple function and became so much more
//I am both scared and lazy to change its file name and it messes things up so if it is okay with you, It will remain as is.

//Thank you!


function prodcard($productname, $productdesc, $productprice, $productimg, $productid){
    $element = "
    <div class='col'>
    <!-- Product Card 1 start -->
    <form action='index.php?addwish&id=$productid' method='post'>
      <div class='card' style='width: 18rem;'>
        <img src='upload/$productimg' class='card-img-top' alt='...'>
        <div class='card-body'>
          <h5 class='card-title'>$productname</h5>
          <p class='card-text'>$productdesc</p>
        </div>
        <ul class='list-group list-group-flush'>
          <li class='list-group-item'>$productprice$</li>
        </ul>
        <div class='card-body'>
            <button type='submit' name='addcart' class='btn btn-primary'>Add to Cart</button>
            <button type='submit' name='addwish' class='btn btn-outline-secondary'>Add to Wishlist</button>
            <input type='hidden' name='id' value='$productid'>
        </div>
      </div>
    </form>
    <!-- Product Card 1 end -->
  </div>
  ";
  echo $element;
}
//two different but exactly the same result of either using "my 'text' and my $variable"
//vs 'my "text" and my '.$variable.''
function cartProduct($productimg, $productname, $productdesc, $productprice, $productid){
  $element = '
  <form action="account.php?action=remove&id='.$productid.'" method="post" class="cart-items">
                    <div class="border rounded">
                      <div class="row bg-white">
                        <div class="col-md-3">
                          <img src="upload/'.$productimg.'" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                          <h5 class="pt-2">'.$productname.'</h5>
                          <small class="text-secondary">'.$productdesc.'</small>
                          <h5 class="pt-2">'.$productprice.'$</h5>
                          <button type="submit" name="addwish" class="btn btn-outline-secondary btn-sm">Save for Later</button>
                          <button type="submit" name="remove" class="btn btn-danger btn-sm">Remove</button>
                        </div>
                        <div class="col-md-3 py-5">
                        </div>
                      </div>
                    </div>
                  </form>
  ';
  echo $element;
}

function wishProd($userid, $productid, $productprice, $productdesc,$productname,$productimg,$wishId){
  $element = '
  <form action="account.php?addcart&id='.$productid.'" method="post" class="cart-items">
                    <div class="border rounded">
                      <div class="row bg-white">
                        <div class="col-md-3">
                          <img src="upload/'.$productimg.'" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                          <h5 class="pt-2">'.$productname.'</h5>
                          <small class="text-secondary">'.$productdesc.'</small>
                          <h5 class="pt-2">'.$productprice.'$</h5>
                          <button type="submit" name="addcart" class="btn btn-success btn-sm">Add to Cart</button>
                          <button type="submit" name="deletewish" class="btn btn-danger btn-sm"><a href="back-end/deletewish.php?deleteid='.$wishId.'" style="text-decoration: none;" class="text-light">Remove</a></button>

                          <input type="hidden" name="prodid" value="'.$productid.'">
                          <input type="hidden" name="userid" value="'.$userid.'">

                        </div>
                        <div class="col-md-3 py-5">
                        </div>
                      </div>
                    </div>
                  </form>
  ';
  echo $element;
}
