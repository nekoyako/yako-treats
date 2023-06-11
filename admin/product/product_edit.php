<?php
$idproduct = isset($_GET['id']) ? $_GET['id'] : "";
$idproduct = mysqli_real_escape_string($con, $idproduct);
$sql = "SELECT * FROM tbproduct WHERE idproduct='$idproduct' ";
$query = mysqli_query($con, $sql);
$data = mysqli_fetch_array($query);
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-custom" style="color:black">Product Management</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-custom" style="color:black">
                Edit Product Data
            </h6>
        </div>
        <form action="product/product_update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idproduct" value="<?= $data['idproduct']; ?>">
            <div class="card-body">
                <div class="form-group">
                    <label>Product Name:</label>
                    <input type="text" class="form-control" placeholder="Insert Product Name" name="product_name"
                        required value="<?= $data['product_name']; ?>">
                </div>
                <div class="form-group">
                    <label>Product Type:</label>
                    <input type="text" class="form-control" placeholder="Insert Product Type" name="product_type"
                        required value="<?= $data['product_type']; ?>">
                </div>
                <div class="form-group">
                    <label>Categories:</label>
                    <select name="idcat" class="form-control">
                        <?php
                        $qry = mysqli_query($con, "SELECT * FROM tbcategories");
                        while ($row = mysqli_fetch_array($qry)) {
                            echo "<option value = '$row[idcat]'>$row[cat_name]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Size:
                        <sup class="text-danger"><br>ignore if not changing the product size</sup>
                    </label>
                    <input type="text" class="form-control" name="size" placeholder="Insert Product Size" required
                        value="<?= $data['size']; ?>">
                </div>
                <div class="form-group">
                    <label>Description:
                        <sup class="text-danger"><br>ignore if not changing the product description</sup>
                    </label>
                    <textarea class="form-control" name="description" placeholder="Insert Product Description"
                        rows="5"><?= $data['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Price:</label>
                    <input type="number" class="form-control" placeholder="Insert Price" name="price" required
                        value="<?= $data['price']; ?>">
                </div>
                <div class="form-group">
                    <label>Link CTA:</label>
                    <input type="text" class="form-control" placeholder="Insert Link CTA" name="link_cta" required
                        value="<?= $data['link_cta']; ?>">
                </div>
                <div class="form-group">
                    <label>Image:
                        <sup class="text-danger"><br>ignore if not uploading image</sup>
                    </label>
                    <input type="file" class="form-control" placeholder="Insert Image" name="image">
                    <div>
                        <br>
                        <label> previous image </label> <br>
                        <?php
                        $image = "default.jpg";
                        if (!empty($data['image'])) {
                            $image = $data['image'];
                        }
                        $link_image = "../images/product/$image";
                        ?>
                        <img src="<?= $link_image; ?>" class="col-sm-3" style="border:1px solid #ccc">
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn" style="color: white; background: navy">
                    <i class="fas fa-save"></i> Save
                </button>
                <a href="page.php?menu=product" class="btn" style="color: white; background: orange">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
        </form>
    </div>

</div>