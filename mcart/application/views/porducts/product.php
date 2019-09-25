
<div class="container">
<?php 
    // echo "<h1>".$productname."</h1>";

    // print_r($productname);
    foreach($productname as $row){
        echo $row->product_category ."<br>";
    }

?>
</div>