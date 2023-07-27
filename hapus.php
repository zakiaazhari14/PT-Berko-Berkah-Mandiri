<?php
function koneksi()
{
  $conn = mysqli_connect("localhost", "root", "");
  mysqli_select_db($conn, "pt_bbm");
  return $conn;
}

// function untuk melakukan query dan memasukannya kedalaam array
function query($sql)
{
  $conn = koneksi();
  $result = mysqli_query($conn, "$sql");
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

$id = $_GET["id"];
// menambah fungsi hapus
function hapus($id)
{
  $conn = koneksi();

  mysqli_query($conn, "DELETE FROM spare_part where id = $id") or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

if (hapus($id) > 0) {
  echo "
            <script>
                alert('data berhasil dihapuss!');
                document.location.href = 'Admin/admin.php';
            </script>
        ";
} else {
  echo "
            <script>
                alert('data gagal ditambahkann!');
                document.location.href = 'Admin/admin.php';
            </script>
        ";
}