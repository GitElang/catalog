<?php
    require "koneksi.php";

    $queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Shoes Addict</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php";?>
<!--banner-->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1>Sneakers Head Store</h1>
            <h3>Looking For ur sneakers?</h3>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="produk.php">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="Search ur sneakers" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword" autocomplete="off">
                        <button type="submit" class="btn warna7">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!--hightlighted kategori-->
    <div class="container-flud py-5">
        <div class="container text-center">
            <h3>you might vibe with this. </h3>
            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-casual d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Casual">Casual</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-boots d-flex justify-content-center align-items-center">
                    <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Boots">Boots</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-sport d-flex justify-content-center align-items-center">
                    <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=sport">Sport</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--about us-->
    <div class="container-fluid warna7 py-5">
        <div class="container text-center text-white">
            <h3>About Us</h3>
            <p class="fs-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo alias error maxime tenetur voluptatibus ipsam ea, dolores labore. Tenetur, aliquam illum. Dolore enim ratione dolorem voluptate doloremque exercitationem veniam soluta.
            </p>
        </div>
    </div>
    <!--produk-->

    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>

            <div class="row mt-5">
                <?php while($data = mysqli_fetch_array($queryProduk)){?>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card h-100" >
                        <div class="img-box">
                        <img src="img/<?php echo $data['foto'];?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $data['nama'];?></h4>
                            <p class="card-text text-truncate"><?php echo $data['detail'];?></p>
                            <p class="card-text text-harga">Rp. <?php echo $data['harga'];?></p>
                            <a href="produk-detail.php?nama= <?php echo$data['nama'];?>" class="btn warna7  ">Show Detail</a>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <button class="btn btn-outline-primary mt-3" href="produk.php ">See More</button>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>