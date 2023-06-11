<?php
include "../../php/config.php";

$cat_name = mysqli_real_escape_string($con, $_POST['cat_name']);

$sql = "INSERT INTO tbcategories
			(cat_name) 
		  VALUES 
		    ('$cat_name')";
$query = mysqli_query($con, $sql);

$url = "../page.php?menu=cat";
$pesan = "Successfully Added";

echo "<script>alert('$pesan'); location='$url'; </script>";
?>