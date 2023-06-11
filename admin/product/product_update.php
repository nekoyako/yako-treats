<?php
include "../../php/config.php";
$idproduct = mysqli_real_escape_string($con, $_POST['idproduct']);
$product_name = mysqli_real_escape_string($con, $_POST['product_name']);
$product_type = mysqli_real_escape_string($con, $_POST['product_type']);
$price = mysqli_real_escape_string($con, $_POST['price']);
$link_cta = mysqli_real_escape_string($con, $_POST['link_cta']);
$description = mysqli_real_escape_string($con, $_POST['description']);

$sql = "UPDATE tbproduct SET product_name='$product_name',
								product_type='$product_type',
								price='$price',
								description='$description',
								link_cta='$link_cta'
								WHERE idproduct='$idproduct'";
$query = mysqli_query($con, $sql);

$image_cek = $_FILES['image']['name'];

if ($image_cek != "") {
	$folder = "../../images/product"; //folder tempat upload gambar
	$tmp_name = $_FILES['image']['tmp_name']; //file yg diupload
	$name = md5(date("YmdHis"));
	$split = explode(".", $image_cek); //membagi nama string berdasarkan titik
	$ext_file = end($split); //nama ekstensi file, cth: jpg atau png 
	$image = $name . "." . $ext_file; //gabungkan nama foto baru dengan ekstensi
	move_uploaded_file($tmp_name, "$folder/$image");

	//hapus foto lama
	$sql = "SELECT * FROM tbproduct WHERE idproduct='$idproduct' ";
	$query = mysqli_query($con, $sql);
	$data = mysqli_fetch_array($query);

	if (!empty($data['image'])) {
		unlink("../../images/product/$data[image]"); //menghapus foto produk yang dihapus
	}

	$sql = "UPDATE tbproduct SET image='$image'
					WHERE idproduct='$idproduct'";
	$query = mysqli_query($con, $sql);

}



$url = "../page.php?menu=product";
$pesan = "Successfully Edited";

echo "<script>alert('$pesan'); location='$url'; </script>";
?>