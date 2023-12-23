<?php
    require "koneksi.php";
    $querykategori = mysqli_query($con, "SELECT * FROM kategori");

    //get produk by nama produk/keyword
    if(isset($_GET['keyword'])){
        $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
    }
    //get produk kategori
    else if(isset($_GET['kategori'])){
        $queryGetKategoriId= mysqli_query($con, "SELECT * FROM kategori WHERE nama='$_GET[kategori]'");
        $kategoriId = mysqli_fetch_array($queryGetKategoriId);

        $queryProduk = mysqli_query($con,"SELECT * FROM produk WHERE kategori_id='$kategoriId[id]'");
   }
    //get produk by default
    else{
        $queryProduk = mysqli_query($con, "SELECT * FROM produk");
    }
    $countdata = mysqli_num_rows($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoes Addict | Produk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
 <?php require "navbar.php"; ?>


    <!--banner-->
    <div class="container-fluid banner-produk d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center">Produk</h1>
        </div>
    </div>

    <!--body-->
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mt-3 mb-5">
                <h3>Kategori</h3>
                <ul class="list-group">
                    <?php while($kategori = mysqli_fetch_array($querykategori)){ ?>
                    <a class="no-decoration" href="produk.php?kategori=<?php echo $kategori['nama'];?>">
                        <li class="list-group-item"><?php echo $kategori['nama'];?></li>
                    </a>
                    <?php }?>
                </ul>
            </div>
            <div class="col-lg-9" >
                <h3 class="text-center mb-3">Produk</h3>
                <div class="row">
                    <?php 
                        if($countdata<1){
                    ?>
                        <h4 class="text-center">Not found</h4>
                    <?php       
                        }
                    ?>
                    <?php while($produk = mysqli_fetch_array($queryProduk)){?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100" >
                            <div class="img-box">
                                <img src="img/<?php echo $produk['foto']?>" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $produk['nama']?></h4>
                                <p class="card-text text-truncate"><?php echo $produk['detail']?></p>
                                <p class="card-text text-harga">Rp.<?php echo $produk['harga']?></p>
                                <a href="produk-detail.php?nama=<?php echo $produk['nama']?>" class="btn warna7  ">Show Detail</a>
                            </div>
                        </div>
                    </div>
                    <?php }?>  

                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>