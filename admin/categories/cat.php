<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "";
if ($aksi == "add") {
    include "cat_add.php";
} else if ($aksi == "edit") {
    include "cat_edit.php";
} else {
    ?>
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-primaryx" style="color:black" ;>Categories Management</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold" style="color:black" ;>
                        Categories Data
                    </h6>
                </div>
                <div class="card-body">
                    <a href="page.php?menu=cat&aksi=add" class="btn btn-custom">
                        <i class="fas fa-plus"></i> Add Categories
                    </a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="20">No</th>
                                    <th width="150">Categories Name</th>
                                    <th width="75">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = "SELECT * FROM tbcategories";
                                $query = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($query)) {
                                    $link_hapus = "categories/cat_delete.php?id=$row[idcat]";
                                    $link_edit = "page.php?menu=cat&aksi=edit&id=$row[idcat]";

                                    ?>
                                    <tr>
                                        <td>
                                        <?= $no; ?>
                                        </td>
                                        <td>
                                        <?= $row['cat_name']; ?>
                                        </td>
                                        <td>
                                            <a href="<?= $link_edit; ?>" class="btn" style="color: white; background: #466d1d">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= $link_hapus; ?>" class="btn" style="color: white; background: #c01605"
                                                onclick="return confirm('Do you want to delete this?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    <?php
}
?>