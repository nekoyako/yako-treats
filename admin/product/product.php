<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "";
if ($aksi == "add") {
    include "product_add.php";
} else if ($aksi == "edit") {
    include "product_edit.php";
} else {
    ?>
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-primaryx" style="color:black" ;>Product Management</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold" style="color:black" ;>
                        Product Data
                    </h6>
                </div>
                <div class="card-body">
                    <a href="page.php?menu=product&aksi=add" class="btn btn-custom">
                        <i class="fas fa-plus"></i> Add Product
                    </a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="20">No</th>
                                    <th width="100">Product Name</th>
                                    <th width="75">Product Type</th>
                                    <th width="100">Categories</th>
                                    <th width="75">Size</th>
                                    <th width="100">Description</th>
                                    <th width="75">Price</th>
                                    <th width="50">CTA</th>
                                    <th width="75">Image</th>
                                    <th width="100">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = "SELECT * FROM tbproduct";
                                $query = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($query)) {
                                    $link_hapus = "product/product_delete.php?id=$row[idproduct]";
                                    $link_edit = "page.php?menu=product&aksi=edit&id=$row[idproduct]";

                                    $image = "default.jpg";
                                    if (!empty($row['image'])) {
                                        $image = $row['image'];
                                    }
                                    $image = "../images/product/$image";
                                    ?>
                                    <tr>
                                        <td>
                                        <?= $no; ?>
                                        </td>
                                        <td>
                                        <?= $row['product_name']; ?>
                                        </td>
                                        <td>
                                        <?= $row['product_type']; ?>
                                        </td>
                                        <td>
                                        <?= $row['idcat']; ?>
                                        </td>
                                        <td>
                                        <?= $row['size']; ?>
                                        </td>
                                        <td>
                                        <?= $row['description']; ?>
                                        </td>
                                        <td align="right">
                                        <?= $row['price']; ?>
                                        </td>
                                        <td>
                                        <?= $row['link_cta']; ?>
                                        </td>
                                        <td>
                                            <img src="<?= $image; ?>" width="75" height="75">
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