<?php
$product_category =    $this->Productmodel->all_category();
if ($this->session->userdata('user_vh')) {

    ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo BASEURL."products/?product="."all"; ?>"><img class="img-responsive rounded-circle " height="25px" src="<?php echo base_url("assets/sitelogo.png") ?>"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarColor02">
        <span>

            <!-- <a class="nav-link dropdown dropdown-toggle " href="#" id="dropdownCategory" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color:whitesmoke;">Category</a>
           
            <div class="dropdown-menu  "   aria-labelledby="dropdownCategory">
                <a class="dropdown-item" href="">cate1</a>

                <a class="dropdown-item" href="#">cate2</a>
                <a class="dropdown-item" href="#">cate3</a>

            </div> -->
            <div class="dropdown">
                <button class="btn dropdown-toggle text-white" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                <a class="dropdown-item" href="<?php echo BASEURL."products/?product="."all"; ?>">All</a>
                    <?php
                        foreach ($product_category as $row) {
                                $productid = BASEURL."products/?product=".$row->product_id_category;
                            echo "<a class='dropdown-item' href='$productid'>" .$row->product_category. "</a>" ;
                         }
                        ?>
                    <!-- <!-- <a class="dropdown-item" href="#">Another item</a> -->
                    <!-- <a class="dropdown-item" href="#">One more item</a> -->
                </div>
            </div>
        </span>
        <form class="form-inline my-2 my-lg-0 bd-highlight">
            <div class="input-group   ">

                <!-- <span> <input type="text" size="80" class="form-control" placeholder="Search Products">
                    <button type="submit" class="btn btn-Primary"><i class="fas fa-search"></i></button>
                </span> -->

                <!-- <input type="text" class="form-control" placeholder="Search Products" size="90%" aria-describedby="searchBtn">
                <div class="input-group-append">
                    <span class="input-group-text" id="searchBtn"><i class="fas fa-search"></i></span>
                </div> -->
                <input type="text" class="form-control" name="search" size="90%" placeholder="Search Products">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
            </div>
        </form>
        <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item active">
                <a class="nav-link" href="<?php //echo BASEURL . 'user' 
                                                ?>"><span class="sr-only">(current)</span></a>
            </li> -->
            <!-- <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li> -->
            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $uname ?></a>
            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="dropdownId">
                <a class="dropdown-item" href="<?php echo BASEURL . 'user/profile' ?>">Profile</a>
                <!-- <a class="dropdown-item" href="<?php //echo BASEURL . 'user/profile' 
                                                        ?>">Add Category</a> -->

                <a class="dropdown-item" href="<?php echo BASEURL . 'seller/addpcat'
                                                    ?>">Add Category</a>
                <a class="dropdown-item" href="<?php echo BASEURL . 'seller/addproduct'
                                                    ?>">Add Product</a>
                <a class="dropdown-item" href="<?php echo BASEURL . 'settings/logout' ?>">Logout</a>

            </div>
        </ul>
    </div>
</nav>

<?php
} else {
    ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img class="img-responsive rounded-circle " height="25px" src="<?php echo base_url("assets/sitelogo.png") ?>"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarColor02">
        <span>
            <div class="dropdown">
                <button class="btn dropdown-toggle text-white" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                    <a class="dropdown-item" href="#">All</a>
                    <a class="dropdown-item" href="#">Another item</a>
                    <a class="dropdown-item" href="#">One more item</a>
                </div>
            </div>
        </span>
        <form class="form-inline my-2 my-lg-0  bd-highlight">
            <div class="input-group ">
                <!-- <span> <input type="text" size="80" class="form-control" placeholder="Search Products">
                    <button type="submit" class="btn btn-Primary"><i class="fas fa-search"></i></button>
                </span> -->

                <!-- <input type="text" class="form-control" placeholder="Search Products" size="80" aria-describedby="searchBtn">
                <div class="input-group-append">
                    <span class="input-group-text" id="searchBtn"><i class="fas fa-search"></i></span>
                </div> -->
                <input type="text" class="form-control" name="search" size="90%" placeholder="Search Products">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
            </div>
        </form>
        <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li> -->
            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mcart</a>
            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="dropdownId">
                <a class="dropdown-item" href="<?php echo BASEURL . 'login' ?>">Login</a>
                <a class="dropdown-item" href="<?php echo BASEURL . 'signup' ?>">Signup</a>
            </div>
        </ul>
    </div>
</nav>


<?php

}

?>