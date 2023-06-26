<!-- NAVBAR START -->
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Printers'R'Us</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="products.php">Products</a>
                </li>
                <li class="nav-item">
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo '<a class="nav-link" href="account.php">My Account</a></li><li class="nav-tiem"><a class="nav-link" href="logout.php">Log Out</a></li>';
                    } else {
                        echo '<a class="nav-link" href="login.php">My Account</a>';
                    }
                    ?>
                    <!-- <a class="nav-link" href="account.php">My Account</a> -->
                </li>
            </ul>
            <button class="btn btn-outline-success me-2" type="button"><a href="account.php" class="nav-link">Your Cart
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $count = count($_SESSION['cart']);
                        echo "<span>($count)</span></a>";
                    } else {
                        echo "<span>(0)</span></a>";
                    }

                    ?>
            </button>
        </div>
    </div>
</nav>
<!-- NAVBAR END -->