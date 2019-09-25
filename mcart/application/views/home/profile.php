<?php
  echo'<pre>';
  print_r( $this->session->userdata());
  echo'</pre> <br><br>';
?>


<div class="container">

<?php
	foreach($user_data as $row){
		echo "<h2 class='text-info'>".$row->firstname ." ". $row->middlename ." ". $row->lastname."</h2>" ;
		echo "<h2 class='text-info'>".$row->email ."</h2>" ;
		echo "<h2 class='text-info'>".$row->mobile ."</h2>" ;
		$dateTime = new DateTime("$row->created_at", new DateTimeZone('Asia/Kolkata'));
        echo "<h2 class='text-info'>Joining Date: ". $dateTime->format("d/m/y  H:i A")."</h2>";
	}
?>




</div>
