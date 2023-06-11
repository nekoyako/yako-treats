<?php
// Include file config.php untuk mendapatkan detail koneksi
include("../php/config.php");

// Mendapatkan ID pengguna dari session
$uid = $_SESSION['id'];

// Mengeksekusi kueri untuk mendapatkan nama pengguna berdasarkan ID
$sql = "SELECT username FROM tbuser WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $uid);
$stmt->execute();
$stmt->bind_result($uname);

if ($stmt->fetch()) {
    // Menutup statement
    $stmt->close();

    // Menampilkan nama pengguna
    echo '
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">' . $uname . '</span>
                    <img class="img-profile rounded-circle" src="../assets/images/admin.png">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>';
}