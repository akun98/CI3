<div class="container">
   <div class="py-5 text-center">
       <h2>Selamat datang <?php echo $user->nama ?></h2>

        <span class="badge badge-primary">
       		<?php echo $user->nama_level; ?>
       </span>
       		<?php echo "<br> Have A Nice Day!"; ?>
       </h2><br><br>
   		<div class="row">
   			<div class="col-sm"></div>
   			<div class="col-sm">
   				<a href="<?php echo site_url()?>V_Blog/add/">
	   				<img src="../assets/img/edit.png" class="img-fluid"> <br><br>
		   			<h4>Create News</h4>
	   			</a>
   			</div>
	   		<div class="col-sm"></div>
	    </div>
   </div>
   </div>
</div>
