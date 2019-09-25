<div class="container">
    <div class="row mt-5">
        <div class="col-sm-2">
            <!-- One of three columns -->
        </div>
        <div class="col-sm-8">

            <h2 class="text-center"><?php echo $title ?></h2>

            <?php
            if ($this->session->flashdata("error")) {
                echo ("<div class='alert alert-danger alert-dismissible fade show' role='alert'>"
                    . $this->session->flashdata("error") .
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
						</button>
					</div>");
            } else { }
            if ($this->session->flashdata("success")) {
                echo ("<div class='alert alert-success alert-dismissible fade show' role='alert'>"
                    . $this->session->flashdata("success") .
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button>
			</div>");
            } else { }

            ?>


            <?php echo form_open_multipart(BASEURL . 'seller/productvalidation'); ?>

            <div class="form-group">
                <input type="text" name="product_name" class="form-control"  placeholder="Prodcut Name" autocomplete="false">
                <?php
                if (form_error('product_name')) {
                    echo ("<span class='font-italic  text-danger'>" . form_error('product_name') . "</span>");
                } else { }
                ?>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <input type="text" name="product_price" class="form-control"  placeholder="Poduct Price" autocomplete="off">
                    <?php
                    if (form_error('product_price')) {
                        echo ("<span class='font-italic  text-danger'>" . form_error('product_price') . "</span>");
                    } else { }
                    ?>
                </div>
                <div class="form-group col-md-3">
                    <!-- <label for="product_image">Poduct Image</label> -->
                    <input type="number" name="product_qty" class="form-control" placeholder="Quantity" autocomplete="off">

                    <?php
                    if (form_error('product_qty')) {
                        echo ("<span class='font-italic  text-danger'>" . form_error('product_qty') . "</span>");
                    } else { }
                    ?>
                </div>
                <div class="form-group col-md-6">
                    <!-- <label for="product_image">Poduct Image</label> -->
                    <input type="file" name="product_image" class="form-control"  autocomplete="off">

                    <?php
                    if (form_error('product_image')) {
                        echo ("<span class='font-italic  text-danger'>" . form_error('product_image') . "</span>");
                    } else { }
                    ?>
                </div>
            </div>

            <div class="form-group mytext_area">

                <textarea name="product_description" class=" form-control "  placeholder="Product Descritpion" rows="5" autocomplete="off"></textarea>
                <?php
                if (form_error('product_description')) {
                    echo ("<span class='font-italic  text-danger'>" . form_error('product_description') . "</span>");
                } else { }
                ?>
            </div>
            <div class="form-group mytext_area">

                <textarea name="product_meta" class=" form-control " placeholder="Product Meta" rows="2" autocomplete="off"></textarea>
                <?php
                if (form_error('product_meta')) {
                    echo ("<span class='font-italic  text-danger'>" . form_error('product_meta') . "</span>");
                } else { }
                ?>
            </div>

            <div class="form-group">
                <select class="custom-select" name="category_id" >
                    <option selected>Please Choose Product Category</option>
                    <!-- <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option> -->
                    <?php
                    foreach ($product_category as $rows) {
                        echo ("<option value='$rows->product_id_category'>$rows->product_category</option>");
                    }


                    ?>
                </select>
                <?php
                if (form_error('category_id')) {
                    echo ("<span class='font-italic  text-danger'>" . form_error('category_id') . "</span>");
                } else { }
                ?>
            </div>

            <div class="form-group float-right">
                <button type="submit" id="register" name="add_product" class="btn btn-info">Add Product</button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="col-sm-2">
        <!-- One of three columns -->
    </div>
</div>
</div>

<?php
// foreach($product_category as $rows){
//     echo "<pre>";
//     print_r($rows);
//     echo "</pre>";
// }


?>