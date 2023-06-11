<?php
include "../php/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Email apakah sudah terpakai atau belum?
    $sql_cek = "SELECT * FROM tbuser WHERE email='$email'";
    $query_cek = mysqli_query($con, $sql_cek);
    $num_cek = mysqli_num_rows($query_cek);

    if ($num_cek == 0) {
        // Memastikan password dan konfirmasi password cocok
        if ($password === $confirm_password) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO tbuser (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

            $query = mysqli_query($con, $sql);

            if ($query) {
                ?>
                <script>
                    alert("Successfully Registered!");
                    location.href = "login.php";
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("An error occurred while saving data!: <?php echo mysqli_error($con); ?>");
                    location.href = "register.php";
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("Passwords do not match!");
                location.href = "register.php";
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("E-mail has been used!");
            location.href = "register.php";
        </script>
        <?php
    }
} else {
    ?>
    <script>
        alert("Invalid!");
        location.href = "register.php";
    </script>
    <?php
    exit;
}
?>