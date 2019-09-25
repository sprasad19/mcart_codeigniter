
<div class="container">
<div class="row page-content">
 <div class="col-md-8 m-auto">
        <h2><?php echo $title; ?></h2>
        <div class="mt-3 mb-3">
            <?php
    if($this->session->flashdata("error")) {
        echo ("<div class='alert alert-danger alert-dismissible fade show' role='alert'>"
                    . $this->session->flashdata("error") .
                "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>") ;
        }else{

        }
    if($this->session->flashdata("success")) {
        echo ("<div class='alert alert-success alert-dismissible fade show' role='alert'>"
            . $this->session->flashdata("success") .
        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
        </div>");}
        else{

        }
  ?>
        </div>
        <?php echo form_open(BASEURL.'seller/addcategory'); ?>
        <div class="form-group">
            <input type="text" name="add_category" class="form-control" id="add_category"
                placeholder="Category Name">
            <?php
                if(form_error('add_category')){
                echo ("<span class='font-italic  text-danger'>" .form_error('add_category') ."</span>");
                }else{
                }
            ?>
        </div>
        <div class="form-group float-right">
            <button type="submit" id="addproduct" class="btn btn-primary">Add Category</button>
        </div><br><br><br>
        <?php echo form_close(); ?>
                <div >
                    <hr>
                    <h2 class="text-secondary">
                        <?php
                        echo $title1;
                        // print_r($all_cat);
                        ?>
                    </h2>
                    <?php
                    foreach ($all_cat as $row){
                        echo "<span class='col-md-2 ml-2 bg-light text-muted'>".$row->product_category."</span>";
                    }?>
                </div>
    </div>
</div>