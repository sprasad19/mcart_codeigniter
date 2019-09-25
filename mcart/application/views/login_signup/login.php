<h1 class="text-center"><?php echo $login ?></h1>
<div class="container">
    <div class="row mt-5">
        <div class="col-sm-3">
            <!-- One of three columns -->
        </div>
        <div class="col-sm-6">
            <?php

if($this->session->flashdata("error")) {
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
			. $this->session->flashdata("error") .
		'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>' ;
}

	  ?>
            <form method="post" action="<?php echo BASEURL; ?>authentication">

                <div class="form-group">
                    <label>Enter Email</label>
                    <input type="text" name="email" class="form-control" />
                    <span class="text-danger text-center">
                        <?php
				// echo form_error('email');
				?></span>
                </div>
                <div class="form-group">
                    <label>Enter Password</label>
                    <input type="password" name="password" class="form-control" />
                    <span class="text-danger text-center">
                        <?php
													// echo form_error('password');

													?></span>
                </div>
                <div class="form-group float-right">
                    <input type="submit" name="insert" value="Login" class="btn btn-info" />

                </div>
            </form>
        </div>
        <div class="col-sm-3">
            <!-- One of three columns -->
        </div>
    </div>
</div>
