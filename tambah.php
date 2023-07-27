<?php
function koneksi()
{
  $conn = mysqli_connect("localhost", "root", "");
  mysqli_select_db($conn, "pt_bbm");
  return $conn;
}

// menambahkan fungsi tambah
function tambah($data)
{
  // ambil data dari tiap elemen dalam form
  $conn = koneksi();

  $kode_spare_part = htmlspecialchars($data["kode_spare_part"]);
  $nama_spare_part = htmlspecialchars($data["nama_spare_part"]);
  $spesifikasi = htmlspecialchars($data["spesifikasi"]);
  $merek = htmlspecialchars($data["merek"]);
  $tipe = htmlspecialchars($data["tipe"]);

  // Check if "tahun_produksi" key exists in the $data array before accessing it
  $tahun_produksi = isset($data["tahun_produksi"]) ? htmlspecialchars($data["tahun_produksi"]) : null;
 
  // query insert data
  $query = "INSERT INTO spare_part
                VALUES
                ('', '$kode_spare_part', '$nama_spare_part', '$spesifikasi', '$merek', '$tipe', '$tahun_produksi')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


// cek apakah tombol sudah ditekan atau belum
if (isset($_POST["tambah"])) {
  // cek apakah data berhasil di tambahkan atau tidak
  if (tambah($_POST) > 0) {
    echo "
            <script>
                alert('data berhasil ditambahkan')
                document.location.href = 'Admin/admin.php';
            </script>
        ";
  } else {
    echo "
    <script>
        alert('data gagal ditambahkan')
        document.location.href = 'Admin/admin.php';
    </script>
";
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <!-- font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

  <!-- icon -->
  <link rel="shortcut icon" href="../asset/img/icon.png" type="image/png">

  <!-- css -->
  <link rel="stylesheet" href="style.css">

  <title>Tambah Data</title>
</head>

<body>
  <!-- tambah -->
  <div class="container vh-100">
    <div class="row justify-content-center h-100 pt-3">
      <div class="card my-auto">
        <div class="card-header text-center text-white">
          <h2 style="color: black;">Tambah Data</h2>
        </div>
        <div class="card-body text-white">
          <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group" style="color:black">
              <label for="kode_spare_part">Kode Spare Part : </label>
              <input type="text" class="form-control" name="kode_spare_part" id="kode_spare_part" required>
            </div>
            <div class="form-group" style="color:black">
              <label for="nama_spare_part">Nama Spare Part : </label>
              <input type="text" class="form-control" name="nama_spare_part" id="nama_spare_part" required>
            </div>
            <div class="form-group" style="color:black">
              <label for="spesifikasi">Spesifikasi : </label>
              <input type="text" class="form-control" name="spesifikasi" id="spesifikasi" required>
            </div>
            <div class="form-group" style="color:black">
              <label for="merek">Merek : </label>
              <input type="text" class="form-control" name="merek" id="merek" required>
            </div>
            <div class="form-group" style="color:black">
              <label for="tipe">Tipe : </label>
              <input type="text" class="form-control" name="tipe" id="tipe" required>
            </div>
            <div class="form-group" style="color:black">
              <label for="tahun_produksi">Tahun Produksi : </label>
              <input type="text" class="form-control" name="tahun_produksi" id="tahun_produksi" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-2" name="tambah">Tambah Data</button>
            <a href="Admin/admin.php" class="btn btn-danger w-100 mt-2">Kembali</a>
          </form>
        </div>      
      </div>
    </div>
  </div>
  <!-- tambah -->

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>