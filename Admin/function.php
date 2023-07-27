<?php

// fungsi untuk melakukan koneksi ke database
function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "pt_bbm") or die("Database salah!");

    return $conn;
}

// menambah fungsi registrasi
function registrasi($data)
{
  $conn = koneksi();
  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);


  // cek username sudah ada atu belum
  $result = mysqli_query($conn, "SELECT username FROM user
        WHERE username ='$username'");

  if (mysqli_fetch_assoc($result)) {
    echo "<script>
                alert('username sudah terdaftar');
                </script>";
    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // tambahkan userbaru ke database
  $query_tambah = "INSERT INTO user VALUES('', '$username', '$password')";
  mysqli_query($conn, $query_tambah);
  return mysqli_affected_rows($conn);
}



// Assuming you're passing the search query via GET method
if (isset($_GET['search_query'])) {
    $conn = koneksi();
    $search_query = $_GET['search_query'];

    // Query to fetch data based on the search query
    $query = "SELECT * FROM spare_part WHERE nama_spare_part LIKE '%$search_query%' OR kode_spare_part LIKE '%$search_query%'";
    $result = mysqli_query($conn, $query);
} else {
    $conn = koneksi();
    // If no search query provided, fetch all data
    $query = "SELECT * FROM spare_part";
    $result = mysqli_query($conn, $query);
}

// Number of results per page
$results_per_page = 10;

// Get current page from URL, default to 1 if not set
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the starting row number for the current page
$start_from = ($current_page - 1) * $results_per_page;

// Query to fetch paginated data
$query_paginated = $query . " LIMIT $start_from, $results_per_page";
$result_paginated = mysqli_query($conn, $query_paginated);


