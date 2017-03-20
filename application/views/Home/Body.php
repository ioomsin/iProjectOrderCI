<!-- <div class="container">  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <div class="jumbotron">
        <h3 class="display-3">I Love Cactus</h3>      	
    </div>

    <div class="card-deck">
    	<?php 
	    	foreach ( $result as $rs )
	    	{
    	?>
    	<!-- card -->
    	<div class="card" style="width: 20rem;">
    		<div class="text-center">
    			<img class="card-img-top" src="<?php echo base_url('assets/imgs/items/'.$rs['ItemImage']); ?>" width="200" height="200" alt="Card image cap">
    		</div>
            <div class="card-block">
              <h4 class="card-title">
              	<?php echo $rs['ItemName'];?>
              </h4>
              <p class="card-text">
              	<?php echo $rs['ItemDescription'];?>
              </p>
              <!-- <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p> -->
            </div>
		</div>	<!-- /card -->
		<?php 
	    	}
		?>
		<!-- card -->
		<!-- <div class="card">
            <img class="card-img-top" src="<?php echo base_url('assets/imgs/IMG_318x180.jpg'); ?>" alt="Card image cap">
            <div class="card-block">
              <h4 class="card-title">Super Kabuto</h4>
              <p class="card-text">Astrophytum Super Kabuto</p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
		</div> --> <!-- /card -->
    </div> <!-- /card-deck -->

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- </div> -->  <!-- END Container -->	