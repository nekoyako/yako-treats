<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-custom" style="color:black">Product Management</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-custom" style="color:black">
                Add Product Form
            </h6>
        </div>
        <form action="product/product_insert.php" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label>Product Name:</label>
                    <input type="text" class="form-control" placeholder="Insert Product Name" name="product_name"
                        required>
                </div>
                <div class="form-group">
                    <label>Product Type:</label>
                    <input type="text" class="form-control" placeholder="Insert Product Type" name="product_type"
                        required>
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
                    <label>Size:</label>
                    <input type="text" class="form-control" placeholder="Insert Product Size" name="size" required>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <input type="text" class="form-control" placeholder="Insert Product Description" name="description"
                        required>
                </div>
                <div class="form-group">
                    <label>Price:</label>
                    <input type="number" class="form-control" placeholder="Insert Price" name="price" required>
                </div>
                <div class="form-group">
                    <label>Link CTA:</label>
                    <input type="text" class="form-control" placeholder="Insert Link" name="link_cta" required>
                </div>
                <div class="form-group">
                    <label>Image:<sup class="text-danger"><br>image ratio = square (1:1)</sup></label>
                    <input type="file" class="form-control" placeholder="Insert Image" name="image">
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