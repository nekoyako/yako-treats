<?php
$id = isset($_GET['id']) ? $_GET['id'] : "";
$id = mysqli_real_escape_string($con, $id);
$sql = "SELECT * FROM tbuser WHERE id='$id' ";
$query = mysqli_query($con, $sql);
$data = mysqli_fetch_array($query);
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-primaryx" style="color:black" ;>User Data Management</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold " style="color:black" ;>
                Edit User Data
            </h6>
        </div>
        <form action="user/user_update.php" method="post">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">
            <div class="card-body">
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" class="form-control" placeholder="Insert Username " name="username" required
                        value="<?= $data['username']; ?>">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control" placeholder="Insert Email" name="email" required
                        value="<?= $data['email']; ?>">
                </div>
                <div class="form-group">
                    <label>Password:<sup class="text-danger"><br>if not change the password, ignore</sup></label>
                    <input type="password" class="form-control" placeholder="Insert Password" name="password">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn" style="color: white; background: navy">
                    <i class="fas fa-save"></i> Save
                </button>
                <a href="page.php?menu=user" class="btn" style="color: white; background: orange">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
        </form>
    </div>

</div>