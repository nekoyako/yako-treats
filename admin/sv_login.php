<?php
session_start();
include("../php/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan email dan password yang dikirimkan melalui formulir login
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = $_POST['password'];

    // Query untuk mendapatkan data user berdasarkan email
    $sql = "SELECT * FROM tbuser WHERE email = '$email'";
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($query);

    // Memeriksa keberhasilan query dan verifikasi password
    if ($result && password_verify($password, $result['password'])) {
        // Autentikasi berhasil
        $_SESSION['id'] = $result['id'];
        header("Location: page.php");
        exit();
    } else {
        // Autentikasi gagal
        ?>
        <script>
            alert("Authentication Failed!");
            location.href = "login.php";
        </script>
        <?php
        exit;
    }
} else {
    ?>
    <script>
        alert("Invalid!");
        location.href = "login.php";
    </script>
    <?php
    exit;
}

?>