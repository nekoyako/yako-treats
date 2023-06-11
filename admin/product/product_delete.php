<?php
include "../../php/config.php";
$idproduct = $_GET['id'];

$sql = "SELECT * FROM tbproduct WHERE idproduct='$idproduct' ";
$query = mysqli_query($con, $sql);
$data = mysqli_fetch_array($query);

if (!empty($data['image'])) {
    unlink("../../images/product/$data[image]"); //menghapus foto produk yang dihapus
}

$sql = "DELETE FROM tbproduct WHERE idproduct='$idproduct' ";
$query = mysqli_query($con, $sql);

$url = "../page.php?menu=product";
$pesan = "Successfully Deleted";

echo "<script>alert('$pesan'); location='$url'; </script>";
?>