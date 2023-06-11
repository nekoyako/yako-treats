<?php
include "../../php/config.php";
$idcat = $_GET['id'];

$sql = "SELECT * FROM tbcategories WHERE idcat='$idcat' ";
$query = mysqli_query($con, $sql);
$data = mysqli_fetch_array($query);

$sql = "DELETE FROM tbcategories WHERE idcat='$idcat' ";
$query = mysqli_query($con, $sql);

$url = "../page.php?menu=cat";
$pesan = "Successfully Deleted";

echo "<script>alert('$pesan'); location='$url'; </script>";
?>