<h1 class="text-center"><?php echo $register ?></h1>
<div class="container">
    <div class="row mt-5">
        <div class="col-sm-2">
            <!-- One of three columns -->
        </div>
        <div class="col-sm-8">

		<h2 class="text-center">Register Form</h2>

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


            <?php echo form_open(BASEURL.'signup/user'); ?>

            <div class="form-group">
                <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name">
                <?php
		if(form_error('firstname')){
		echo ("<span class='font-italic  text-danger'>" .form_error('firstname') ."</span>");

		}else{

		}
	?>
            </div>
            <div class="form-group">
                <input type="text" name="middlename" class="form-control" id="middlename" placeholder="Middle Name">
                <?php
		if(form_error('middlename')){
		echo ("<span class='font-italic  text-danger'>" .form_error('middlename') ."</span>");

		}else{

		}
	?>
            </div>
            <div class="form-group">
                <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name">
                <?php
		if(form_error('lastname')){
			echo ("<span class='font-italic  text-danger'>" .form_error('lastname') ."</span>");

			}else{

			}
	?>
            </div>
            <div class="form-group">
                <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Your Mobile Number">
                <?php
		if(form_error('mobile')){
		echo ("<span class='font-italic  text-danger'>" .form_error('mobile') ."</span>");

		}else{

		}
	?>
            </div>
            <div class="form-group">
                <input type="text" name="email" class="form-control" id="email" placeholder="Your Email">
                <?php
		if(form_error('email')){
		echo ("<span class='font-italic  text-danger'>" .form_error('email') ."</span>");

		}else{

		}
	?>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                <?php
	if(form_error('password')){
	echo ("<span class='font-italic  text-danger'>" .form_error('password') ."</span>");

	}else{

	}
?>
            </div>
            <div class="form-group">
                <input type="password" name="confirm_password" class="form-control" id="confirm-password"
                    placeholder="Confirm Password">
                <?php
		if(form_error('confirm_password')){
		echo ("<span class='font-italic  text-danger'>" .form_error('confirm_password') ."</span>");

		}else{

		}
	?>
            </div>
            <div class="form-group float-right">
                <button type="submit" id="register" class="btn btn-info">Sign up</button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="col-sm-2">
        <!-- One of three columns -->
    </div>
</div>
</div>
