<?php
include "../../php/config.php";
$id = mysqli_real_escape_string($con, $_POST['id']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$password = md5($password);

$sql = "UPDATE tbuser SET username='$username',
                            email='$email',
                            password='$password'
                            WHERE id='$id'";
$query = mysqli_query($con, $sql);

$url = "../page.php?menu=user";
$pesan = "Update Successfully";

echo "<script>alert('$pesan'); location='$url'; </script>";
?>