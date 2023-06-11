<?php
include "../../php/config.php";
$idcat = mysqli_real_escape_string($con, $_POST['idcat']);
$cat_name = mysqli_real_escape_string($con, $_POST['cat_name']);

$sql = "UPDATE tbcategories SET cat_name='$cat_name' WHERE idcat='$idcat'";
$query = mysqli_query($con, $sql);

$url = "../page.php?menu=cat";
$pesan = "Successfully Edited";

echo "<script>alert('$pesan'); location='$url'; </script>";
?>