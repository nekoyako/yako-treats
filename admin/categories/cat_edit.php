<?php
$idcat = isset($_GET['id']) ? $_GET['id'] : "";
$idcat = mysqli_real_escape_string($con, $idcat);
$sql = "SELECT * FROM tbcategories WHERE idcat='$idcat' ";
$query = mysqli_query($con, $sql);
$data = mysqli_fetch_array($query);
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-custom" style="color:black">Categories Management</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-custom" style="color:black">
                Edit Categories Data
            </h6>
        </div>
        <form action="categories/cat_update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idcat" value="<?= $data['idcat']; ?>">
            <div class="card-body">
                <div class="form-group">
                    <label>Categories Name:</label>
                    <input type="text" class="form-control" placeholder="Insert Categories Name" name="cat_name"
                        required value="<?= $data['cat_name']; ?>">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn" style="color: white; background: navy">
                    <i class="fas fa-save"></i> Save
                </button>
                <a href="page.php?menu=cat" class="btn" style="color: white; background: orange">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
        </form>
    </div>

</div>