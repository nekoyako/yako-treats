<?php
include "../../php/config.php";
$id = $_GET['id'];

$sql = "DELETE FROM tbuser WHERE id='$id' ";
$query = mysqli_query($con, $sql);

$url = "../page.php?menu=user";
$pesan = "User deleted!";

echo "<script>alert('$pesan'); location='$url'; </script>";
?>