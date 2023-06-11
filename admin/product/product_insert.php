<?php
include "../../php/config.php";

$product_name = mysqli_real_escape_string($con, $_POST['product_name']);
$product_type = mysqli_real_escape_string($con, $_POST['product_type']);
$idcat = mysqli_real_escape_string($con, $_POST['idcat']);
$size = mysqli_real_escape_string($con, $_POST['size']);
$price = mysqli_real_escape_string($con, $_POST['price']);
$description = mysqli_real_escape_string($con, $_POST['description']);
$link_cta = mysqli_real_escape_string($con, $_POST['link_cta']);
$image = "";
$image_cek = $_FILES['image']['name'];

if ($image_cek != "") {
	$folder = "../../images/product"; //folder tempat upload gambar
	$tmp_name = $_FILES['image']['tmp_name']; //file yg diupload
	$name = md5(date("YmdHis"));
	$split = explode(".", $image_cek); //membagi nama string berdasarkan titik
	$ext_file = end($split); //nama ekstensi file, cth: jpg atau png 
	$image = $name . "." . $ext_file; //gabungkan nama foto baru dengan ekstensi
	move_uploaded_file($tmp_name, "$folder/$image");
}

$sql = "INSERT INTO tbproduct
			(product_name,product_type,idcat,size,description,price,link_cta,image) 
		  VALUES 
		    ('$product_name','$product_type','$idcat','$size','$description','$price','$link_cta','$image')";
$query = mysqli_query($con, $sql);

$url = "../page.php?menu=product";
$pesan = "Successfully Added";

echo "<script>alert('$pesan'); location='$url'; </script>";
?>