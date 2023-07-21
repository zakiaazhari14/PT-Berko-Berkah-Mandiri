<?php 

$conn = mysqli_connect("localhost", "root", "");

mysqli_select_db($conn, "pt_bbm");

$result = mysqli_query($conn, "SELECT * FROM spare_part");

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PT Berko Berkah Mandiri</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Style -->
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <!-- Navbar Start -->
    <nav class="navbar">
      <a href="./index.php" class="navbar-logo">PT. Berko Berkah Mandiri</a>

      <div class="navbar-nav">
        <a href="./index.php">Beranda</a>
        <a href="index.php#about">Tentang Kami</a>
        <div class="dropdown">
          <a href="#product" class="dropbtn">Produk</a>
          <div class="dropdown-content">
            <a href="#service1">Alat Uji Kendaraan Bermotor</a>
            <a href="#service2">SIM PKB</a>
            <a href="./spare.php">Spare Part</a>
          </div>
        </div>
        <a href="#galeri">Galeri</a>
        <a href="#forum">Forum</a>
        <a href="./index.php#contact">Kontak</a>
      </div>

      <div class="navbar-extra">
        <a href="#" id="search"><i data-feather="search"></i></a>
        <a href="#" id="select-menu"><i data-feather="menu"></i></a>
      </div>
    </nav>

    <!-- Navbar end -->
  </body>
</html>

    <!-- Judul Start -->
    <div class="add justify text-center">
        <a href="tambah.php" class="btn btn-primary">Tambah Data</a>
      </div>
    <!-- Judul End -->
    <!-- Table Start -->
        <div class="container" style="overflow-x:auto">
          <table class="column">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kode Spare Part</th>
                <th>Nama Spare Part</th>
                <th>Spesifikasi</th>
                <th>Merek</th>
                <th>Tipe</th>
                <th>Tahun Produksi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php $i = 1 ?>
            <?php while($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                <td><?= $i ?></td>
                    <td><?= $row["kode_spare_part"] ?></td>
                    <td><?= $row["nama_spare_part"] ?></td>
                    <td><?= $row["spesifikasi"] ?></td>
                    <td><?= $row["merek"] ?></td>
                    <td><?= $row["tipe"] ?></td>
                    <td><?= $row["tahun_produksi"] ?></td>
                    <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>" onclick="return confirm('Ubah Data??')" class="btn btn-primary mt-4">Ubah</a>
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Hapus Data??')" class="btn btn-danger mt-3">Hapus</a>

                    </td>
                </tr>
                <?php $i++ ?>
            <?php endwhile ?>
            </tbody>
          </table>
        </div>
      </body>
    <!-- Table Start -->

<!-- Footer Start -->
<footer>
    <div class="sosmed">
      <div class="kontak">
        <a href="">Dapat Menghubungi</a>
        <p>PT Berko Berkah Mandiri</p>
        <p>Jl. Batur Dalam Lingk. Cipayung 4/1 No.26
         </p>
         <p> Depok 16417</p>
          <p>Telp :
            (62-21) 7707136 - (62-21) 29218594
            </p>
            <p>Fax : (62-21) 77834783
              info@ptbbm.com</p>
      </div>
      <div>
        <div class="socials">
          <a href="https://www.instagram.com/ptberkoberkahmandiri/"><i data-feather="instagram"></i></a>
          <a href="#"><i data-feather="twitter"></i></a>
          <a href="#"><i data-feather="facebook"></i></a>
          <a href="https://www.youtube.com/@BBMBerko"><i data-feather="youtube"></i></a>
        </div>

  
        <div class="links">
          <a href="#home">Home</a>
          <a href="#about">Tentang Kami</a>
          <a href="#product">Produk</a>
          <a href="#contact">Kontak</a>
        </div>
  
        <div class="credit">
          <p>Created by <a href="">Zaki Auliya Azhari</a>. | &copy; 2023</p>
        </div>
      </div>
      <div class="partner">
        <a href="">Partner</a>
        <p>Be Smarty</p>
        <p>alat-uji-kendaraan.com</p>
      </div>
    </div>
    </footer>
    
    <!-- Footer end -->

    <!-- Feather Icon -->
    <script>
      feather.replace();
    </script>

    <!-- My Javascript -->
    <script src="js/script.js"></script>
  </body>
</html>

